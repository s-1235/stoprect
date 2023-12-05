<?php

namespace App\Http\Controllers;

use App\Helpers\MessageHelper;
use App\Helpers\SubscribeHelper;
use App\Models\Setting;
use App\Models\UserSubscription;
use App\Services\BraintreeClient;
use App\Services\Coingate\SubscriptionDetailsData;
use App\Services\CoingateClient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SubscriptionController extends Controller
{
    use SubscribeHelper, MessageHelper;

    const COINGATE_SUBSCRIBE = 'coingate';

    public function index()
    {
        $subscriptions = UserSubscription::has('user')->get();
        $user = Auth::user();
        
        return view('dashboard.subscriptions',[
            'subscriptions' => $subscriptions,
            'user' => $user,
        ]);
    }

    public function registerSubscriber(Request $request) {
        
//        $prices = config('constants.prices');
        if ($request->method() === 'GET') {
            $selected_plan = session('selected_plan');
        } else {
            $selected_plan = $request->selected_plan;
        }

        $selected_plans_raw = $this->getRawPlanNames($selected_plan);
        $selected_plan_names = $this->defineSelectedSubscriptionName($selected_plan);
        $prices[] = (new Setting())->getValueTwoByName($selected_plans_raw[0]);
        $prices[] = (new Setting())->getValueTwoByName($selected_plans_raw[1]);
        return view('forms.register-form', [
            'selected_plans_name'   => $selected_plan_names,
            'selected_plans_raw'    => $selected_plans_raw,
            'prices'                => $prices,
            'is_register'           => 1,
        ]);
    
    }
    

    
    public function paySubscription(Request $request)
    {
        Log::alert("Pay subscribe", $request->all());
       
        // for testing
        if(env("APP_DEBUG")) {
            User::where('email', $request->get('email'))->delete();
            UserSubscription::where('email', $request->get('email'))->delete();
        }
        session($request->input());

        if (UserSubscription::where('email', $request->email)->first()) {
            $request->validate(
                [
                    'email' => 'required|email|unique:users|unique:user_subscriptions',
                ]
            );
        } 
        $this->registerUser($request);
        
        try {
            if (strpos($request->get('payment-mode'), config('constants.coingate')) !== false) {
                $path = (new CoingateClient())->handleSubscription(
                    $request->get('email'),
                    $request->get('selected_plan'),
                    $request->get('promocode')
                );
            }
            if (strpos($request->get('payment-mode'), config('constants.braintree')) !== false) {
                $path = (new BraintreeClient())->handleSubscription(
                    $request->get('email'),
                    $request->get('selected_plan'),
                    $request->get('promocode'),
                    $request->get('selected_price')
                );
                return $path;
            }
        } catch (\Throwable $t) {
            Log::channel('errors')->alert('ERR create subscription', [$t]);  
            Log::alert('ERR 1', [$request->input()]);
            return back()->withInput()
                ->with([
                    'message' => $t->getMessage(),
                    'status' => 'failed'
                ]);
        }
        return redirect()->to($path);
    }


    public function registerUser(Request $request)
    {
            // for testing
            $user = User::where('email', $request->email)->first();
            if($user && $user->user_type !== 'ADM') {
                $user->delete();
            }
            if(env("APP_DEBUG")) {
                $request->validate([
                    'password' => 'required|min:4',
                ]);
            } else {
                $request->validate([
                    'password' => 'required|min:8',
                ]);
            }
 
            $user = new User();
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('password'));
            $user->plan_type = $this->defineSelectedSubcriptionType($request->get('selected_plan'));
            $user->status = config('constants.user_status_active');
            $user->save();
    }

    public function successPay()
    {
        return view('success-pay');
    }


    public function coingateUpgradeSubscribe(Request $request)
    {
        $description = '';
        if ($request->bill_period === 'month') {
//            $subscriptionDetailUpgradeId = env("COINGATE_PREMIUM_MONTH");
            $subscriptionDetailUpgradeId = Setting::getCoingatePlanIdByPlanType('premium_monthsub');
            $description = 'monthly';
        }
        
        if ($request->bill_period === 'year') {
            $subscriptionDetailUpgradeId = Setting::getCoingatePlanIdByPlanType('premium_yearsub');
            $description = 'yearly';
        }
        
        $subscriptionDetailsData = new SubscriptionDetailsData(
            'Upgrade subscription to premium '. $description,
            'Premium subscription '. $description,
            '12',
            $subscriptionDetailUpgradeId
        );
        $client = new CoingateClient();
        $result = $client->upgradeSubscription(
            Auth::id(),
            $subscriptionDetailUpgradeId,
            $subscriptionDetailsData
        );
        
        Log::alert("Upgrade subscription coingate",[$result]);
        return response(200);
    }
    
    
    public function braintreeUpgradeSubscribe(Request $request)
    {
        $client = new BraintreeClient();
        $result = $client->upgradeSubscription($request->bill_period,
                Auth::user()->subscription
                    ->subscription_id,
        );
        
        if ($result->success) {
            $userSubscription = UserSubscription::where('email', Auth::user()->email)->first();
            $this->linkSubscriptionToUser($userSubscription, Auth::user()->email);
            return response('Ok',200);
        }
        
        return response('Cannot upgrade subscription',402);
    }


    public function expiredSubscription()
    {
        return view('expired-subscription',[
            'is_register' => 1,
        ]);
    }


    public function payExpiredSubscribe(Request $request)
    {
        Log::alert("Pay subscribe", $request->all());

      
        session($request->input());
      
        try {
            if (strpos($request->get('payment-mode'), 'coingate') !== false) {
                $path = (new CoingateClient())->handleSubscription(
                    Auth::user()->email,
                    $request->get('selected_plan'),
                    $request->get('promocode')
                );
            }
            if (strpos($request->get('payment-mode'), config('constants.braintree')) !== false) {
                $path = (new BraintreeClient())->handleSubscription(
                    Auth::user()->email,
                    $request->get('selected_plan'),
                    $request->get('promocode')
                );
                return $path;
            }
        } catch (\Throwable $t) {
            Log::alert('ERR 0', [$t]);
            Log::alert('ERR 1', [$request->input()]);
            return back()->withInput()
                ->with(['message' => $t->getMessage(), 'status' => 'failed']);
        }
        return redirect()->to($path);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    protected function getRawPlanNames($selected_plan)
    {
     
        if (strpos($selected_plan, 'bronze')!== false) {
            $selected_plans[] = config('constants.plans_id.bronze_monthsub'); 
            $selected_plans[] = config('constants.plans_id.bronze_yearsub');
        } if (strpos($selected_plan, 'silver')!== false) {
            $selected_plans[] = config('constants.plans_id.silver_monthsub');  
            $selected_plans[] = config('constants.plans_id.silver_yearsub'); ;
        } if (strpos($selected_plan, 'premium')!== false) {
            $selected_plans[] = config('constants.plans_id.premium_monthsub');
            $selected_plans[] = config('constants.plans_id.premium_yearsub'); ;
        }
        
        return $selected_plans;
    }

}
