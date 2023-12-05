<?php


namespace App\Services;


use App\Helpers\HandlerPromocode;
use App\Helpers\MessageHelper;
use App\Helpers\SubscribeHelper;
use App\Interfaces\PaymentClient;
use App\Models\Promocode;
use App\Models\Setting;
use App\Models\UserSubscription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Braintree;

class BraintreeClient implements PaymentClient
{
    use MessageHelper, SubscribeHelper;
 
    const         ACTIVE                               = 'Active';
    private const BRAINTREE_SUBSCRIPTION               = 'braintree';
    private const BRAINTREE_SUBSCRIPTION_STATUS_ACTIVE = 'ACTIVE';

    public  $client;
    private $user;

    public function __construct()
    { 
        $this->client = new Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId'  => env('BRAINTREE_MARCHANT_ID'),
            'publicKey'   => env('BRAINTREE_PUB_KEY'),
            'privateKey'  => env('BRAINTREE_PRIV_KEY'),
        ]);

        $this->user = new User();
    }

    public function isActiveSubscribe()
    {
        // TODO: Implement isActiveSubscribe() method.
    }

    public function getSubscriptionById($subscriptionId)
    {
        try {
            $subscription = $this->client->subscription()->find($subscriptionId);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Braintree error get sub by id",[$t]);
        }
        
        return  $subscription;
    }

    public function createCustomer($data)
    {
        try {
            $result = $this->client->customer()->create($data);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Braintree error create customer",[$t->getMessage(), $t->getLine()]);
        }
        
        if ($result->success) {
            return $result->customer;
        }

        return false;
    }

    /**
     * Generate form where user must entered number of card and pay
     * 
     * @param $email
     * @param $selectedPlan
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function handleSubscription($email, $selectedPlan, $promocode, $selectedPrice)
    {
        try {
            $customer = $this->getCustomer($email);
            if (! $customer) {
                $customer = $this->createCustomer(['email'=>$email]);
                Log::channel('errors')->alert('Customer not found ' . $email);
                Log::channel('errors')->alert('Customer created ' ,[$customer]);
            }
            $clientToken = $this->generateToken($customer->id);
            Log::alert("Braintree show payment page");
//            $userAuth = Auth::user();
        } catch (\Throwable $t) {
            Log::channel('errors')->alert("Handle subscription", [$t]);
        } 
        
        return view('payment-braintree',[
//            'user' => $userAuth,
            'token' => $clientToken,
            'selected_price' => $selectedPrice,
            'selected_plan' => $selectedPlan,
            'email' => $email,
            'promocode' => $promocode
        ]);
    }

    public function handleSubscriptionPay(Request $request, HandlerPromocode $handlerPromocode)
    {
        $planId = Setting::getBraintreePlanIdByPlanType($request->selected_plan);
      
        Log::channel('api')->alert('PAYMENT INFO', [$request->all()]);
        // need to made payment method none
        $customer = $this->getCustomer($request->email, $request->payment_method_nonce);
        $promocode = $handlerPromocode->getPromocodeByName($request->promocode, config('constants.braintree'), new Promocode());
        $subscriptionData = $this->formationDataSubscription(
            $customer->paymentMethods[0]->token,
            $planId,
            $promocode
        );
        
        if ($customer) {
            Log::alert("create customer", [$customer]);
            $subResult = $this->client
                ->subscription()->create($subscriptionData);

            Log::alert('PAYMENT CREATE SUBSCRIPTION', [$subResult->subscription]);
            Log::alert('PAYMENT CREATE SUBSCRIPTION 2', [$subResult]);

            if (isset($subResult->success) && isset($subResult->subscription)) {
                if ($promocode) {
                    $promocode->markUsed();
                }
                Log::alert("This user1", [$this->user]);
                $userSubscription = new UserSubscription();
                $userSubscription->saveSubscription(
                    $request->email,
                    $planId,
                    $this->defineBillPeriod($subResult->subscription),
                    $subResult->subscription->id,
                    self::BRAINTREE_SUBSCRIPTION
                );
                Log::alert("OK", []);
                return redirect()->route('home')->with(['message' => $this->getMessageTryLogin('buy_subscription_successfull'), 'status' => 'success']);
            }
        }

        return redirect()->route('home')->with(['message' => $this->getMessageTryLogin('buy_subscription_successfull'), 'status' => 'error']);
    }


    /**
     * @param $email
     *
     * @return Braintree\Subscription|false|object
     * @throws Braintree\Exception\NotFound
     */
    public function getActiveSubscription($email)
    {
//        $user = User::where('email', $email)->first();
        $userSubscription = UserSubscription::where('email', $email)->orderBy('created_on', 'ASC')->first();
        Log::alert("USer subscription", [$userSubscription]); 
        $subscription = $this->client->subscription()->find($userSubscription->subscription_id);
//        $subscription = $this->client->subscription()->find($user->subscripion->subscription_id);
        Log::alert("USer subscription2", [$subscription]);

        if ($subscription->status === self::ACTIVE) {
           
            return $subscription;
        }
        return false;     
    }

    public function upgradeSubscription(string $billPeriod, string $subscriptionId)
    {
        if ($billPeriod === 'month') {
            $premiumPlanId = Setting::getBraintreePlanIdByPlanType('premium_monthsub');
        }
        if ($billPeriod === 'year') {
            $premiumPlanId = Setting::getBraintreePlanIdByPlanType('premium_yearsub');
        }

        Log::alert("upgrade subscription braintree");
        try {
            $plan = $this->getPlanById($premiumPlanId);
            $result = $this->client->subscription()->update($subscriptionId, [
                'planId' => $premiumPlanId,
                'options' => [
                    'prorateCharges' => true
                ],
                'price' => $plan->price,
            ]);
            Log::alert("finish upgrade subscription braintree");
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Braintree error upgrade sub",[$t]);
        }
        Log::channel('api')->alert('Upgrade braintree result', [$result]);
        return $result;
    }

    public function getPlanById($planId)
    {
        try {
            $result = $this->client->plan()->find($planId);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Braintree error get plan id",[$t]);
            return '';
        }
    
        Log::channel('api')->alert('Get Plan braintree result', [$result]);
        return $result;
    }

    public function searchCustomerByEmail($email)
    {
        try {
            $customer = $this->client->customer()->search(
                [
                    Braintree\CustomerSearch::email()->is($email)
                ]
            );
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Braintree error search customer",[$t]);
        }
       
       return $customer;
    }

    public function generateToken($customerId)
    {
        try {
            $clientToken = $this->client->clientToken()->generate(
                ["customerId" => $customerId]
            );
        }  catch (\Throwable $t) {
            Log::channel('api')->alert("Braintree error generate token",[$t]);
        }
        return $clientToken;
    }
    
    /**
     * @param $result
     */
    protected function defineBillPeriod($result): string
    {
        $r = Carbon::parse($result->billingPeriodStartDate);
        $diffDays = $r->diffInDays($result->nextBillingDate);
        if ($diffDays > 31) {
            return 'yearly';
        }
        return 'monthly';
    }

    /**Search customer by email if not exist create customer
     * @param $email
     * @param $payment_method_nonce
     *
     * @return false|mixed|null
     */
    protected function getCustomer($email, $payment_method_nonce=null)
    {
        $customerCollection = $this->searchCustomerByEmail($email);
        $customer = $customerCollection->firstItem();
        Log::alert("RES search cust", [$customer]);
        if ($payment_method_nonce) {
            Log::alert("RES search cust2");
            if (! $customer) {
                Log::alert("create customer");
                $customer = $this->createCustomer(
                    [
                        'email' => $email,
                        'paymentMethodNonce' => $payment_method_nonce
                    ]
                );
            }
        }
        
        return $customer;
    }

    public function getPriceByPlanId($planId)
    {
        $result = $this->getPlanById($planId);
        if ($result) {
            return $result->price;
        }
        return '';
    }

    private function formationDataSubscription($token, $planId, $promocode)
    {
        if ($promocode) {
           $data =  [
                'paymentMethodToken' => $token,
                'planId' => $planId,
                'discounts' => [
                    'add' => [[
                                  'inheritedFromId' => $promocode->discount_id,
                              ]]
                ]
            ];
        } else {
            $data =  [
                'paymentMethodToken' => $token,
                'planId' => $planId,
            ];
        }
        
        return $data;
    }
}
