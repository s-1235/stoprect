<?php


namespace App\Services;


use App\Helpers\HandlerPromocode;
use App\Helpers\SubscribeHelper;
use App\Interfaces\PaymentClient;
use App\Models\Promocode;
use App\Models\Setting;
use App\Models\UserSubscription;
use App\Services\Coingate\SubscriptionDetailsData;
use App\User;
use CoinGate\Client;
use Illuminate\Support\Facades\Log;

/**
 * Class CoingateClient
 * @method $this getPlanTypeName($subscribeId)
 * 
 */
class CoingateClient extends Client implements PaymentClient
{
    use SubscribeHelper;
    
    private const  SUBSCRIPTION_STATUS_ACTIVE = 'active';
    private const COINGATE_SUBSCRIPTION = 'coingate';


    public  $client;
    private $token;
    
    public function __construct()
    {

        $this->token = env('COINGATE_TOKEN_STOPRECT');
        $this->client = new \GuzzleHttp\Client(['base_uri' => 'https://api-sandbox.coingate.com']);
       
        parent::__construct($this->token, true);
    }


    /**
     * @return mixed
     */
    public function getSubscribers($page, $perPage)
    {
        try {
            $result = $this->client->request(
                'GET', '/api/v2/billing/subscribers', [
                'headers' => $this->getHeaders(),
                'form_params' => [ 
                    'page' => $page,
                    'per_page' => $perPage
                ]
            ]);

            return json_decode($result->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error get subscribers",[$t]);
        }
    } 
    
    
    public function getPaymentsList()
    {
        try {
        $result = $this->client->request('GET', '/api/v2/billing/payments',[
            'headers' => $this->getHeaders()
        ]);
        
        return json_decode($result->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error create sub",[$t->getMessage(), $t->getLine()]);
        }
    } 
    
    public function getPaymentsSubscriber($userId)
    {
        try {
            $result = $this->client->request('GET', '/api/v2/billing/subscriptions/'.$userId.'/payments',[
                'headers' => $this->getHeaders()
            ]);
            
            return json_decode($result->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error create sub",[$t->getMessage(), $t->getLine()]);
        }
    }


    /**
     * @param $id
     *
     * @return mixed
     */
    public function getSubscriptionDetail($id)
    {
        try {
            $result = $this->client->request('GET', '/api/v2/billing/details/'.$id,[
                'headers' => $this->getHeaders()
            ]);
            
            return json_decode($result->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error create sub",[$t->getMessage(), $t->getLine()]);
        }
        return '';
    }

    /**
     * @param $page
     * @param $perPage
     *
     * @return mixed
     */
    public function getSubscriptions($page, $perPage)
    {
        try {
            $result = $this->client->request(
                'GET', '/api/v2/billing/subscriptions', [
                    'headers' => $this->getHeaders(), 
                    'form_params' => [
                        'page' => $page,
                        'per_page' => $perPage
                    ],
                ]);

            return json_decode($result->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error get sub",[$t->getMessage(), $t->getLine()]);
        }
    } 
    
    public function getSubscriptionById($subscriptionId)
    {
        try {
            $result = $this->client->request('GET', '/api/v2/billing/subscriptions/'.$subscriptionId,[
                'headers' => $this->getHeaders(),
            ]);
            $data = $result->getBody()->getContents();
            Log::alert('coingate get sub by id', [$data]);
            return  json_decode($data, false, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error create sub",[$t->getMessage(), $t->getLine()]);
        }
    }
    

    /**
     * @param $email
     *
     * @return object|false
     */
    public function getActiveSubscription($email)
    {
        $result = $this->getSubscriptions(1, 10);
        $subscriptionsAllArr = [];
        for ($i = 0; $i <= $result->total_pages; $i++) {
            $subscriptions = $this->getSubscriptions($i, 10);

            if ($subscriptionsArr = $this->getActiveSubscribeFromResultApi($email, $subscriptions->subscriptions)) {
                $val = last($subscriptionsArr);
                if ($i == 0) {
                    $newestSub = $val;
                }
                if ($val->id > $newestSub->id) {
                    $newestSub = $val;
                }
            }
        }
        $t = collect($subscriptionsAllArr);
//        Log::alert("COINGATE", [$t->getMessage(), $t->getLine()]);
        Log::alert("COINGATE1", [$t->sortByDesc('id')]);
        Log::alert("COINGATE2", [$newestSub]);
        return false;
    } 
    
    /**
     *
     * @return mixed
     */
    public function getSubscriptionDetailsAll()
    {
        try {
            $result = $this->client->request('GET', '/api/v2/billing/details/',[
                'headers' => $this->getHeaders()
            ]);
            
            return json_decode($result->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error create sub",[$t->getMessage(), $t->getLine()]);
        }
    }

    public function createSubscription($userId, $subscribeDetailId)
    {
        try {
            $result = $this->client->request('POST', '/api/v2/billing/subscriptions',[
                'headers' => $this->getHeaders('post'),
                'form_params' => [
                    'subscriber' => $userId,
                    'details' => $subscribeDetailId
                ],
            ]);
    
            return json_decode($result->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error create sub",[$t->getMessage(), $t->getLine()]);
        }
    }
    
    
    public function createCustomer($email)
    {
        try {
            $result = $this->client->request('POST', '/api/v2/billing/subscribers',[
                'headers' => $this->getHeaders('post'),
                'form_params' => [
                    'email' => $email,
                ],
            ]);
    
            return json_decode($result->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error create sub",[$t->getMessage(), $t->getLine()]);
        }
    }
    
    
    public function activateSubscription($subscriptionId)
    {
        try {
            $result = $this->client->request(
                'PATCH', '/api/v2/billing/subscriptions/' . $subscriptionId . '/activate', [
                    'headers' => $this->getHeaders('patch'),
                ]
            );

            return json_decode($result->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error create sub",[$t->getMessage(), $t->getLine()]);
        }
    }
    
    
    

    private function getHeaders($method=false) :array
    {
        $headers = [
            "Authorization" => "Bearer ".$this->token,
            "User-Agent" => "CoinGate/v2 (PHP Library v4.1.0)",
            "Accept" => "application/json"
        ];
        
        if ($method === 'post' || $method === 'patch') {
            $headers['content-type'] = 'application/x-www-form-urlencoded';
        }
        
        return $headers; 
    }

    

    private function getActiveSubscribeFromResultApi($email, $subscriptions)
    {
        $subscriptionArr = [];
        foreach ($subscriptions as $subscription) {
            if ($subscription->subscriber->email === $email
            && $subscription->status === self::SUBSCRIPTION_STATUS_ACTIVE) {
                $subscriptionArr[] = $subscription;
            }
        }
        
        return $subscriptionArr;
    }

    public function getLedgerAccountsList()
    {
        try {
            $result = $this->client->request(
                'GET', 'api/v2/ledger/accounts?page=1&per_page=100', [
                    'headers' => $this->getHeaders('get'),
                ]
            );

            return json_decode($result->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error create sub",[$t->getMessage(), $t->getLine()]);
        }
    }
    
    public function getCurrenciesList()
    {
        try {
            $result = $this->client->request(
                'GET',
                'api/v2/currencies',
                [
                    'headers' => $this->getHeaders('get'),
                ]
            );
    
            return json_decode($result->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error create sub",[$t->getMessage(), $t->getLine()]);
        }
    
    }

    public function createOrder()
    {
        $data = [
            'order_id' => 123,
            'price_amount' => 1,
            'price_currency' => 'EUR',
            'receive_currency' => 'EUR',
            'title' => 'order title',
            'description' => 'desc',
            'callback_url' => env('APP_URL') ."/api-webhook",
            'cancel_url' => env('APP_URL') ."/api-webhook",
            'success_url' => env('APP_URL') ."/my-account",
            'token' => 'token_check',
            'purchaser_email' => 'rkkurchinskyj@gmail.com'
        ];
        try {
            $result = $this->client->request(
                'POST',
                'api/v2/orders',
                [
                    'headers' => $this->getHeaders('patch'),
                    'form_params' => $data
                ]
            );
    
            return json_decode($result->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error create sub",[$t->getMessage(), $t->getLine()]);
        }
    }

    public function createSubscriptionDetails($subscriptionDetailsData)
    {
        try {
            $result = $this->client->request(
                'POST',
                'api/v2/billing/details',
                [
                    'headers' => $this->getHeaders('post'),
                    'form_params' => $subscriptionDetailsData
                ]
            );

            return json_decode($result->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error create sub",[$t->getMessage(), $t->getLine()]);
        }
    }

    public function editSubscription($subscriptionId, $data)
    {
        
        try {
            $result = $this->client->request(
                'PATCH',
                'api/v2/billing/subscriptions/'.$subscriptionId,
                [
                    'headers' => $this->getHeaders('patch'),
                    'form_params' => $data
                ]
            );
    
            return json_decode($result->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $t) {
            Log::channel('api')->alert("Coingate error edit sub",[$t->getMessage(), $t->getLine()]);
        }
    }

    /**
     * We get promocode details in db from braintree promocode
     * because we assume that promocode discounts are equal for
     * Braintree and Coingate. In additional coingate don't have
     * web interface for create discount.
     * @param $email
     * @param $selectedPlan
     * @param $promocode
     *
     * @return mixed
     */
    public function handleSubscription($email, $selectedPlan, $promocode)
    {
            Log::alert("promocode", [$promocode]);
            $url = '';

            $subscription = new UserSubscription();
            $handlerPromocode = new HandlerPromocode();
            $customerCoingate = $this->getSubscriberByEmail($email);
            if (! $customerCoingate) {
                Log::alert("create new customer");
                $customerCoingate = $this->createCustomer($email);
            }
             
            $subscribeDetail = $this->getSubscriptionDetail(Setting::getCoingatePlanIdByPlanType($selectedPlan));
            
            $promocode = $handlerPromocode->getPromocodeByName($promocode, config('constants.braintree'), new Promocode());

            $subscriptionDetailId = $this->formationDetails($subscribeDetail, $promocode);
            
            $userSubscriptionCoingate = $this->createSubscription($customerCoingate->id, $subscriptionDetailId);
            $this->activateSubscription($userSubscriptionCoingate->id);
            $result = $this->getPaymentsSubscriber($userSubscriptionCoingate->id);
            Log::channel('api')->alert("Result", [$result->payments[0]]);
            Log::alert("Result", [$result->payments[0]]);
            $subscription->where('email',$email)->delete();
            $subscription->saveSubscription(
                $email,
                $subscribeDetail->id,
                $result->payments[0]->payment_method, 
                $userSubscriptionCoingate->id,
            self::COINGATE_SUBSCRIPTION
            );
        
            $url = $result->payments[0]->payment_url;
   
        Log::alert("Url".$url);
        return $url;
    }

    public function upgradeSubscription($userId, $subscriptionDetailsUpgradeId, SubscriptionDetailsData $subscriptionDetailsData)
    {
        try {
            $userSubscription = UserSubscription::where('user_id' , $userId)->first();
            $subscriptionCurrent = $this->getSubscriptionById($userSubscription->subscription_id);
            $subscriptionDetailsUpgrade = $this->getSubscriptionDetail($subscriptionDetailsUpgradeId);
            $amountUpgrade = $this->getAmountPayUpgrade(
                $subscriptionCurrent->details->items[0]->price,
                $subscriptionCurrent->next_delivery_date,
                $subscriptionDetailsUpgrade->items[0]->price,
                $subscriptionCurrent->details->payment_method
            );
            $subscriptionDetailsData->setPrice($amountUpgrade); 
            $subscriptionDetailsDataLeftAmount = $this->createSubscriptionDetails($subscriptionDetailsData);
            $result = $orderUpgradeSubscription = $this->createSubscription($subscriptionCurrent->subscriber->id, $subscriptionDetailsDataLeftAmount->id);
            Log::alert('upgrade create sub', [$result]);
            return $this->activateSubscription($orderUpgradeSubscription->id);
        } catch (\Throwable $t) {
            Log::channel('api')->alert('Upgrade subscription',[$t->getMessage(), $t->getLine()]);
        }
        return $orderUpgradeSubscription;   
    }

    public function isActiveSubscribe()
    {
        // TODO: Implement isActiveSubscribe() method.
    }

    public function getSubscriberByEmail($email)
    {
        $perPage = 10;
        $result = $this->getSubscribers(1, $perPage);
        for ($i = 0; $i <= $result->total_pages; $i++) {
            $subscribers = $this->getSubscribers($i, $perPage);

            if ($subscriber = $this->searchByEmailSubscriber($email, $subscribers)) {
                Log::alert("COINGATE FOUND SUBSCRIBER", ["page ".$i, $subscriber]);
                return $subscriber;
            }
        }
        Log::alert("COINGATE NOT FOUND SUBSCRIBER");
        return false;
    }

    /**
     * Search by email in the collection 
     * @param $email
     * @param $subscribers
     */
    private function searchByEmailSubscriber($email, $subscribers)
    {
        $collection = collect($subscribers->subscribers);
        return $collection->where('email', $email)->first();
    }
    

    public function getPriceByPlanId($planId)
    {
        $result = $this->getSubscriptionDetail($planId);
        if (!$result) {
            return '';
        }
        return $result->items[0]->price;
    }

    private function formationDetails($subscribeDetail, $promocode)
    {
        if ($promocode) {
//            $subscribeDetail->details->items[0]->price
//            $subscribeDetail->details->payment_method
            if ($promocode) {
                $promocode->markUsed();
            }
            $price = $subscribeDetail->items[0]->price;
//            $precentage = 100 / ($price / $promocode->discount);
            $subscriptionDetailsData = new SubscriptionDetailsData(
                $subscribeDetail->title . 'Promocode -€' . $promocode->discount,
                'Subscription '. $subscribeDetail->description,
                round($price - $promocode->discount),
                'promocode_'.time(),
                $subscribeDetail->payment_method
            );
            $subscriptionDetailsPromocode = $this->createSubscriptionDetails($subscriptionDetailsData);
            
            return $subscriptionDetailsPromocode->id;
        }
        return $subscribeDetail->id;
    }


}