<?php

namespace App\Http\Controllers;

use App\Helpers\HandlerPromocode;
use App\Helpers\MessageHelper;
use App\Models\UserSubscription;
use App\Services\BraintreeClient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Braintree;

class PaymentController extends Controller
{
    use MessageHelper;

    private const BRAINTREE_SUBSCRIPTION               = 'braintree';
    private const BRAINTREE_SUBSCRIPTION_STATUS_ACTIVE = 'ACTIVE';

    /**
     * @var Braintree\Gateway
     */
    private $gateway;

    /**
     * @var BraintreeClient
     */
    private $clientBraintree;
    private $user;

    public function __construct()
    {
        $this->gateway = new Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MARCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUB_KEY'),
            'privateKey' => env('BRAINTREE_PRIV_KEY')
        ]);
        $this->user = new User();
        $this->clientBraintree = new BraintreeClient();
    }

   

    public function payBraintree(Request $request, HandlerPromocode $handlerPromocode)
    {
        Log::alert("PAY", $request->all());
        try  {
            return (new BraintreeClient())->handleSubscriptionPay($request, $handlerPromocode);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Braintree error create sub",[$t]);
            Log::channel('api')->alert("Braintree error create sub",[$t->getLine()]);
            Log::channel('api')->alert("Braintree error create sub",[$t->getFile()]);
        }      
    }
    
}
