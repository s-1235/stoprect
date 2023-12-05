<?php

return [
    'plans_name' => [
            "bronze_monthsub"     => 'Bronze monthly',
            "bronze_yearsub"      => 'Bronze yearly',
            "premium_monthsub"    => 'BIG BALZZ monthly',
            "premium_yearsub"     => 'BIG BALZZ yearly',
            "silver_monthsub"     => 'Silver monthly',
            "silver_yearsub"      => 'Silver yearly',
        ],

    'plans_id' => [
        "bronze_monthsub"     => "bronze_monthsub",
        "bronze_yearsub"      => "bronze_yearsub",
        "premium_monthsub"    => "premium_monthsub",
        "premium_yearsub"     => "premium_yearsub",
        "silver_monthsub"     => "silver_monthsub",
        "silver_yearsub"      => "silver_yearsub",
    ],

    'user_status_active'   => 'active',
    'user_status_deactive' => 'deactive',
//  payment gateways
    'braintree' => 'braintree',
    'coingate'  => 'coingate',

    'display_days' => 360,
    'help-text' => [
        'settings' => 'In order for the system to understand which subscriptions to offer to the user, you need to insert the IDs of the subscriptions in the Settings section <br>
You need get subscription id from here for Coingate and  insert in the appropriate field in the section ”Settings”. You have 6 six price plan so you need copy 6 subscription id<br>
<a style="color: blue" href="https://dashboard-sandbox.coingate.com/account/billing/subscriptions">Coingate</a><br>

You need get subscription id from here for Braintree and  insert in the appropriate field in the section ”Settings”. You have 6 six price plan so you need copy 6 subscription id<br>
<a style="color: blue" href="https://sandbox.braintreegateway.com/merchants/4cnxcpznmsfpc7pp/plans">Braintree</a><br>
 section “Subscription” and then “Plans”<br>
',

        'add-coin' =>'Here you add the coin that you will then select in the "Emerging coin" and "Coin of month" tabs, "CRYPTO CURRENCY PRICES TODAY"
                <br>then use the names for tabs "1", "2", "3" as you add the coin entry to one of these tabs.<br>
                Limits of fields: <br>
                Coin name: 100 characters<br>
                Coin short name: 100 characters (Get short name from coinmarket.com)<br>
                Status: if you dont want the coin to be shown in the list when adding to tabs "1", "2", "3",<br>
                Coin image: Upload image of coin (jpg, png, jpeg, webp) recomended size 120x120px. Get it from coinmarket.com',
        'add-coin-record' =>'Here you add the record of coin to "CRYPTO CURRENCY PRICES TODAY"
                <br>
                Limits of fields: <br>
                Buy price: 100 characters <br>
                TakeProfit: 100 characters <br>
                StopLoss: 100 characters <br>',

        'add-coin-emerging' =>'Here you add the record of coin to "EMERGING COIN"
                <br>
                Limits of fields: <br>
                Entry point: 100 characters <br>
                Further information: 2048 characters <br>
                Date: set the date emerging coin<br>',
        'add-coin-month' =>'Here you add the record of coin to "COIN OF THE MONTH"
              <br>
                Limits of fields: <br>
                Entry point: 100 characters <br>
                Further information: 2048 characters <br>
                Date: set the date coin of the month<br>
                ',

        'add-ananlytics' =>'Here you add the article to "EARLY ALERTS" <br>
                you need add either image or link from youtube.com, choose one of the two<br>
                Limits of fields: <br>
                Title: 255 characters <br>
                Add links to Youtube: add link from youtube <br>
                UPLOAD IMAGE: support formats (jpg, png, jpeg, webp) recomended size 820x450px. Not very big because user have bad internet connection so its load long <br>
                Analytics text: 2048 characters <br>
                Author: by default value "Angel.M", it\'s editable, limit 255 characters <br>
                ',
        'promocode-help' =>'For each plan type and month year need to create own promocode<br>
                Braintree promo code<br>
                To add a promo code you need first add a promo code to the Braintree panel then go to the admin panel and set the amount of promo code and expiration date for this promo code.<br>
                Coingate promo code<br>
                Don’t need do any operations, when you add to admin promocode in Braintree and then in admin panel that is enough<br>
                Limits of fields:<br>
                Promocode name: 255 characters <br>
                Promocode amount: Max 11 digits it\'s how many promo code do you want create. When user use promocode this amount decreased
                Date expired for use: When promo code expired
                Plan type: For which plan this promocode can use
                Period type: For which period this promocode can use. For example: bronze monthly
                Promocode braintree: choice discount which you created early in Braintree panel. This discount automaticaly created for Coingate
                ',
    ]

];
