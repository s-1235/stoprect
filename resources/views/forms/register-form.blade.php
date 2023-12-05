@include('header')

@php
if(strpos($selected_plans_raw[0], 'bronze') !== false) {
    $style = 'bronze';
}
if(strpos($selected_plans_raw[0], 'silver') !== false) {
    $style = 'silver';
}
if(strpos($selected_plans_raw[0], 'premium') !== false) {
    $style = 'ballz';
}
@endphp
<div class="subscription-confirmation subscription-confirmation_{{$style}}">
    <div class="subscription-confirmation__container">
        <div class="subscription-confirmation__block block-modal">
            <form id="payment-form" action="{{route('pay-subscription')}}" method="post" data-valid-pass="init" data-progress-pass class="block-modal__form form">
                <div class="form__prices options">
                    <div class="options__item options__item_prices">
                        <input id="o_1" class="options__input" checked type="radio" value="{{$selected_plans_raw[0]}}" name="selected_plan">
                        <label for="o_1" class="options__label">
                            <div class="options__description">{{ $selected_plans_name[0] }}</div>
                            <div class="options__price">{{$prices[0]}} <span class="options__subprice">/ month</span></div>
                        </label>
                    </div>
                    <div class="options__item options__item_prices options__item_annually">
                        <span class="options__discount">-20%</span>
                        <input id="o_2" class="options__input" type="radio" value="{{$selected_plans_raw[1]}}" name="selected_plan">
                        <label for="o_2" class="options__label">
                            <div class="options__description">{{$selected_plans_name[1]}} </div>
                            <div class="options__price">{{round($prices[0] - $prices[0] / (100 / 20))}} <span class="options__subprice">/ month</span></div>
                        </label>
                    </div>
                </div>
                <div class="form__promocode promocode">
                    <input autocomplete="off" type="text" id="promocode" name="promocode" placeholder="Enter promo code" class="promocode__input input input_promocode">
                    <button id="btn_promocode" type="button" class="promocode__button button-form button-form_green">Apply</button>
                </div>
                <div class="form__billed">BILLED TODAY: $<span id="price_promocode" data-old_price_year="{{$prices[1]}}" data-old_price_month="{{$prices[0]}}">{{$prices[0] ?? $prices[0] }}</span></div>
                <div class="form__payment options">
                    <div class="options__item options__item_payment">
                        <input id="o_3" class="options__input" checked type="radio" value="coingate" name="payment-mode">
                        <label for="o_3" class="options__label"><span class="options__text">Pay With Crypto</span></label>
                    </div>
                    <div class="options__item options__item_payment">
                        <input id="o_4" class="options__input" type="radio" value="braintree" name="payment-mode">
                        <label for="o_4" class="options__label">
                            <div class="options__icons">
                                <img src="assets/images/pay-icons/mc.jpg" class="options__icon" alt="MasterCard" img>
                                <img src="assets/images/pay-icons/v.jpg" class="options__icon" alt="Visa" img>
                                <img src="assets/images/pay-icons/ax.jpg" class="options__icon" alt="AmericanExpress" img>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="form__items">
                    <div class="form__item">
                        <label class="form__label" for="email">Email</label>
                        <input id="email" required autocomplete="off" type="email" name="email" placeholder="" class="form__input input input__email">
                    </div>
                    <div class="form__item">
                        <label class="form__label" for="password">Password</label>
                        <div class="form__body">
                            <input id="password" data-valid-pass="pass1" autocomplete="off" type="password" name="password" placeholder="" pattern="(?=.*\d)(?=.*[a-z]).{7,}" class="form__input input input__pass">
                            <button class="form__viewpass" type="button"></button>
                        </div>
                        <div class="pass-message">
                            <div id="pswmeter"></div>
                            <h3 class="pass-message__title">Password must contain the following:</h3>
                            <div id="pass-letter" class="pass-message__item invalid">A letter</div>
                            <div id="pass-number" class="pass-message__item invalid">A number</div>
                            <div id="pass-length" class="pass-message__item invalid">Minimum 7 characters</div>
                        </div>
                    </div>
                    <div class="form__item">
                        <label class="form__label" for="password_confirmed">Confirm password</label>
                        <div class="form__body">
                            <input id="password_confirmed" data-valid-pass="pass2" autocomplete="off" type="password" name="password_confirmed" placeholder="" class="form__input input input__pass">
                            <input id="selected_price" type="hidden" name="selected_price" placeholder="" >
                            <button class="form__viewpass" type="button"></button>
                        </div>
                    </div>
                </div>
                <div class="form__actions">
                    @csrf
                    <button id="confirm-pay-btn" type="submit" data-valid-pass="submit" class="form__button button-form button-form_green">Confirm And Pay</button>
                </div>
                <div class="form-err-message">
                    <div class="form-err-message__body">
                        <div class="form-err-message__item"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@include('footer')


<script type="text/javascript">
$("#confirm-pay-btn").on( "click", function() {
    alert( "Handler for `click` called." );
    price = $("#price_promocode").text();
    $("#selected_price").val(price);
} );
</script>

