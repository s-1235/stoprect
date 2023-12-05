<?php


namespace App\Services\Coingate;


/**
 * Class SubscriptionDetailsData
 * Data class to convert to array
 * @package App\Services\Coingate
 */
class SubscriptionDetailsData
{
        public $title;
        public $description;
        public $details_id;
        public $callback_url;
        public $send_paid_notification = true;
        public $send_payment_email = true;
        public $payment_method = "instant";
        public $price_currency = "EUR";
        public $receive_currency = "EUR";
        public $underpaid_cover_pct = '"0.2"';


        
    public function __construct($title, $description, $price, $detailsId, $paymentMethod = null)
    {
            $this->title = $title;
            $this->description = $description;
            $this->details_id = $detailsId;
            $this->send_payment_email = true;
            $this->callback_url = env('APP_URL') . "/api-webhook";
            $this->items = [
                [
                    "description" => $description,
                    "price" => $price,
                    "quantity" => "1"
                ]
            ];
            if ($paymentMethod) {
                $this->payment_method = $paymentMethod;
            }
    }

    public function setPrice($price)
    {
        $this->items[0]['price'] = round($price,2);
    }
         
}