<?php


namespace App\Interfaces;


interface PaymentClient
{
    public function isActiveSubscribe();

    /**
     * @param $email
     *
     * @return object|false
     */
    public function getActiveSubscription($email);

    /**
     * @param $subId
     *
     * @return mixed
     */
    public function getSubscriptionById($subId);

    public function getPriceByPlanId($plandId);
}