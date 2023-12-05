<?php

namespace App\Http\Controllers;

use App\Helpers\SubscribeHelper;
use App\Models\Setting;
use App\Models\UserSubscription;
use App\Services\BraintreeClient;
use App\Services\CoingateClient;
use App\User;
use Braintree;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{

   use SubscribeHelper;

    public function hookPayment(Request $request)
    {
        
        $result = $request->all();
        Log::channel('hooks')->alert("Web hook", [$result]);
        
        $status = "";
        if ($this->isBraintreeHook($request)) {
            Log::channel('hooks')->alert("Web hook braintree");
            return $this->handleBraintreeWebhooks($result, $request);
        }
        
        
        if ($this->isCoingateHook($request['status'])) {
            $client = new CoingateClient();
            Log::channel('hooks')->alert("Web hook coingate");
            $status = $this->handleCoingateWebhooks($client, $request);
        } else {
            $status = $request->get('status');
        }

    
        return response($status, 200);
    }

    /**
     * @param array   $result
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws Braintree\Exception\InvalidSignature
     */
    protected function handleBraintreeWebhooks(array $result, Request $request)
    {
        Log::channel('hooks')->alert("Web hook bt", [$result]);
        try {
            $client = new Braintree\Gateway(
                [
                    'environment' => env('BRAINTREE_ENVIRONMENT'), 'merchantId' => env('BRAINTREE_MARCHANT_ID'), 'publicKey' => env('BRAINTREE_PUB_KEY'), 'privateKey' => env('BRAINTREE_PRIV_KEY')
                ]
            );

            $webhookNotification = $client->webhookNotification()->parse(
                $request->bt_signature, $request->bt_payload
            );

            // Example values for webhook notification properties
            Log::channel('hooks')->alert("Web hook decode 0.1", [$webhookNotification]);

            $messageType = $webhookNotification->kind; // "subscription_went_past_due"
            if ($messageType === "subscription_charged_successfully") {
                Log::channel('hooks')->alert("Web hook decode1", [$webhookNotification]);
                Log::channel('hooks')->alert("Web hook decode2", [$webhookNotification->subject['subscription']]);
                $planIdNew = $webhookNotification->subject['subscription']['planId'];
                Log::channel('hooks')->alert("Web hook decode3", [$planIdNew]);
               
                $subscriptionModel = new UserSubscription();
                $subscription = $subscriptionModel->updateOrCreate(
                    ['subscription_id' => $webhookNotification->subject['subscription']['id']],
                    ['plan_id' => $planIdNew]
                );
                if (strpos($planIdNew, 'premium') !== false 
                    && $subscription->user->plan_type === 'basic' ) {
                    LOg::alert('sub UPGR', [$subscription]);
                    $this->updateUserFirstPay($subscription, $planIdNew);
                }
               
            }
        } catch (\Throwable $t) {
            Log::channel('errors')->alert("Web hook decode3", [$t]);
        }
        
        return response("Ok", 200);
    }

    /**
     * @param CoingateClient $client
     * @param Request        $request
     *
     * @return string
     */
    protected function handleCoingateWebhooks(CoingateClient $client, Request $request): string
    {
        Log::channel('hooks')->alert("PAID1 request ",[$request->all()]);
        $subscriptionDetail = $client->getSubscriptionDetail($request['subscription']['details']['id']);
        Log::channel('hooks')->alert("PAID subscription detal",[$subscriptionDetail]);
        try {
            $detailsId = $request['subscription']['details']['details_id'];
            if ($this->getPlanTypeName($detailsId, 'coingate')) {
                $status = 'paid';
                if ($this->isPremiumPlanCoingate($request)) {
                    Log::channel('hooks')->alert("ITS UPGRADE TO PREMIUM");
                    $user = $this->updateUserToPremium($request['subscription']['subscriber']['email']);
                    $user->subscription->update(['plan_id' => $detailsId]);

                    $sub = $client->getSubscriptionById($user->subscription->subscription_id);
                    // add month for billing data 
                    $client->editSubscription(
                        $user->subscription->subscription_id, [
                            'details' => $detailsId, 
                            'start_date' => Carbon::parse($sub->start_date)->addMonth()->format('Y-m-d')
                        ]
                    );
                }
            }
        } catch (\Throwable $t) {
            Log::channel('errors')->error('Error upgrade subscription', [$t]);
        }
        return $status;
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    protected function isPremiumPlanCoingate(Request $request): bool
    {
        Log::alert('details id',[$request['subscription']['details']['details_id']]);
        
        return $request['subscription']['details']['details_id'] === Setting::getCoingatePlanIdByPlanType('premium_monthsub')
            || $request['subscription']['details']['details_id'] === Setting::getCoingatePlanIdByPlanType('premium_yearsub');
    }
    
    /**
     * @param Request $request
     *
     * @return bool
     */
    protected function isPremiumPlanBraintree(Request $request): bool
    {
        return $request['subscription']['details']['details_id'] === Setting::getBraintreePlanIdByPlanType('premium_monthsub')
            || $request['subscription']['details']['details_id'] === Setting::getBraintreePlanIdByPlanType('premium_yearsub');
    }

    /**
     * This function use for update user data if upgrade not for first payment
     * because first payment to process without exist record
     *
     * @param                               $subscription
     * @param Braintree\WebhookNotification $webhookNotification
     */
    protected function updateUserFirstPay(UserSubscription $subscription, $planIdNew): void
    {
        if (isset($subscription->user)) {
            $user = $subscription->user;
            $user->plan_type = $this->getPlanTypeName($planIdNew, config('constants.braintree'));
            $user->save();
        } else {
            Log::channel('errors')->alert("Not exist user update Braintree subs");
        }
    }

    /**
     * @param $status
     * 
     * @return bool
     */
    protected function isCoingateHook($status): bool
    {
        return $status === 'paid';
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    protected function isBraintreeHook(Request $request): bool
    {
        return isset($request->bt_signature);
    }

    /**
     * @param $email
     *
     * @return mixed
     */
    protected function updateUserToPremium($email)
    {
        $user = User::where('email', $email)->with('subscription')->first();
        $user->plan_type = env("PREMIUM_PLAN");
        $user->save();
        return $user;
    }

}
    

