<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\MessageHelper;
use App\Helpers\SubscribeHelper;
use App\Interfaces\PaymentClient;
use App\Models\UserSubscription;
use App\Services\BraintreeClient;
use App\Services\CoingateClient;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{   
    use SubscribeHelper, MessageHelper;

    /**
     * @var PaymentClient[]
     */
    public $clientsSubscribeApi;

    public function __construct()
    {
        $this->clientsSubscribeApi[config('constants.coingate')] = new CoingateClient();   
//        $this->clientsSubscribeApi['paypal'] = new PayPalClient();   
        $this->clientsSubscribeApi[config('constants.braintree')] = new BraintreeClient();   
    }
    
    public function loginForm()
    {
        return view('enter-form');
    }
    
    public function login(Request $request)
    {
        if ($request->has('login')) {
            
            $credentials['email'] = $request->get('email');
            $credentials['password'] = $request->get( 'pass');
            try {
                $request->validate([
                'email' => 'bail|required|email',
                'pass' => 'required',
            ]);
            } catch (\Throwable $e){
                return redirect()->route('home')->with(['message' => $this->getMessageTryLogin($e->getMessage()), 'status' => 'failed']);
            }
            
            $userSubscription = UserSubscription::where('email', $request->email)->orderBy('id', 'DESC')->first();
            Log::alert("USER SUB", [$userSubscription]);
            if ($userSubscription) {
                Log::alert("FIND SUBSCRIPTION", [$userSubscription]);
                $isActive = $this->isActiveSubscription($userSubscription);
                Log::alert("FIND SUBSCRIPTION2", [$isActive]);

                $this->linkSubscriptionToUser($userSubscription, $request->email);
                $credentials = [
                    'email' => $request->get('email'),
                    'password' => $request->get('pass')
                ];
 
                if (Auth::attempt($credentials)) {
                    Log::alert("right creds");
                    $route = 'my-account';
                    if (! $isActive) {
                        Log::alert("right creds but not active subscription");
                   
                        Auth::user()->setStatusUserSubscription(config('constants.user_status_deactive'));
                        Auth::logout();
                        return redirect()->route('home-prices')->with(['message' => $this->getMessageTryLogin('subscribe_expired'), 'status' => 'success']);
                    }
                    Log::alert("right creds but active subscription");
                    
                    Auth::user()->setStatusUserSubscription(config('constants.user_status_active'));
                    
                    return redirect()->route($route)->with(['message' => $this->getMessageTryLogin('login_success'), 'status' => 'success']);
                }
                
                Log::alert("dont right creds ");
                return redirect()->route('home')->with(['message' => $this->getMessageTryLogin('login_failed'), 'status' => 'error']);
                
            }

            if (Auth::attempt($credentials) && Auth::user()->user_type === 'ADM') {
                return redirect()->route('my-account')->with(['message' => $this->getMessageTryLogin('login_success'), 'status' => 'success']);
            }
            Auth::logout();
            Log::alert("not found subs");
            return redirect()->route('home')->with(['message' => $this->getMessageTryLogin('buy_subscription_not_found'), 'status' => 'error']);
        }
        
        return response('User not found:(', 404);
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect()->route('home');
    }
    

    /**
     * @param $userSubscription
     *
     * @return int
     */
    protected function isActiveSubscription($userSubscription): int
    {
        $isActive = 0;
        if ($userSubscription->subscription_type === config('constants.coingate')) {
            $sub = $this->clientsSubscribeApi[config('constants.coingate')]->getSubscriptionById($userSubscription->subscription_id);
            if (isset($sub->status) && $sub->status === 'active') {
                $isActive = 1;
            }
        }
        if ($userSubscription->subscription_type === config('constants.braintree')) {
            $sub = $this->clientsSubscribeApi[config('constants.braintree')]->getSubscriptionById($userSubscription->subscription_id);
            if (isset($sub->status) && $sub->status === 'Active') {
                $isActive = 1;
            }
        }
        
        return $isActive;
    }



//    private function checkUserActiveSubscription($email)
//    {
//        $userSubscription = UserSubscription::where('email', $email)->first();
//        if (! $userSubscription) {
//            $isActive = 0;
//        } else {
//            $isActive = $this->isActiveSubscription($userSubscription);
//        }
//        if (! $isActive) {
//            Auth::user()->setStatusUserSubscription(config('constants.user_status_deactive'));
//            Auth::logout();
//            return 1;
//        }
//        return 0;
//    }
}
