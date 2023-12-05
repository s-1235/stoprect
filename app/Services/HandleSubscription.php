<?php


namespace App\Services;


class HandleSubscription
{
    private $clientsSubscribeApi;

    public function __construct()
    {
        $this->clientsSubscribeApi[config('constants.coingate')] = new CoingateClient();
        $this->clientsSubscribeApi[config('constants.braintree')] = new BraintreeClient();
    }
    
    public function searchActiveSubscription($email)
    {
        $activeSubscriptions=[];
        foreach ($this->clientsSubscribeApi as $key => $clientApi) {
            if ($subscription = $clientApi->getActiveSubscription($email)) {
               $activeSubscriptions[] = $subscription;  
            }
            usleep(200000);
        }
    }
    
    public function upgradeSubscription()
    {
        
    }
    
    public function downgradeSubscription()
    {
        
    }
}