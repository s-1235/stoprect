<?php


namespace App\Helpers;


trait MessageHelper
{
    public function getMessageTryLogin($key) :string
    {
        $ar = [
                'subscribe_expired'             => "Your subscription has been expired, you can buy new subscription",
                'buy_subscription_not_found'    => "We haven't find your subscription, buy subscription first, if you bought it, write to our support.",
                'login_need'                    => "Login first before any Subscription!",
                'succes_login4'                 => "You have not any subscription yet!",
                'login_success'                 => "You have logged in successfully",
                'login_failed'                  => "Login failed, wrong email or password",
                'signup_success'                => "You have signed up successfully",
                'signup_failed'                 => "SignUp failed:(",
                'signup_failed_user_exist'      => "SignUp failed, user already exists",
                'gateway_inactive'              => "Payment gateway is inactive!",
                'succes_login3'                 => "You have been subscribed successfully",
                'buy_subscription_successfull'  => "You have been subscribed successfully, now you can login in."
        ];
        
        if (isset($ar[$key])) {
            return $ar[$key];
        }
        return $key;
    }
}