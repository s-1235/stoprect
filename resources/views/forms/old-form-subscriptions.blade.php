<section class="aggregator-section" id="prices">
    <div class="container">
        <h3 class="wow fadeInUp">At bitcoinwetrust.com, we do all the work; you take the credit! Just with one
            subscribtion you get all
            the crypto aggregator.</h3>
        <div class="price-box-wrap">
            <div class="price-box active wow fadeInUp">
                <ul class="nav nav-pills price-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-year-tab" data-bs-toggle="pill" data-bs-target="#pills-year" type="button" role="tab" aria-controls="pills-year" aria-selected="true">Year</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-month-tab" data-bs-toggle="pill" data-bs-target="#pills-month" type="button" role="tab" aria-controls="pills-month" aria-selected="false">Month</button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-year" role="tabpanel" aria-labelledby="pills-year-tab">
                        <div class="aggregator-body">
                            <h6 class="prc">{{ $prices->where('name','basic_yearsub')->first()->value_2  }}€ a year</h6>
                            <ul>
                                <li><i class="far fa-check"></i>
                                    <p> BTC & ETH Signals </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> Up to 7 signals a week </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> Advanced Journalism </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> See onexpencive software </p>
                                </li>
                            </ul>
                            <form method="post" action="{{route('register-subsbcriber')}}" style="margin-top: 120px;">
                                <input type="hidden" name="plan_name" value="Basic Yearly Plan">
                                <input type="hidden" name="plan_description" value="Basic Yearly Plan">
                                @csrf
                                <br>
{{--                                <button class="btn btn-gradient" type="submit" name="selected_plan" value="coingate_basic_yearsub">Pay with Crypto</button>--}}
{{--                                <button class="btn btn-gradient" type="submit" name="selected_plan" value="paypal_basic_yearsub">PayPal - Actionable Experience</button>--}}
{{--                                <button class="btn btn-gradient" type="submit" name="selected_plan" value="braintree_basic_yearsub">Credit card</button>--}}
                                <button class="btn btn-gradient" type="submit" name="selected_plan" value="basic_yearsub">GET STARTED</button>

                            </form>
                        </div> 
                    </div>
                    <div class="tab-pane fade" id="pills-month" role="tabpanel" aria-labelledby="pills-month-tab">
                        <div class="aggregator-body">
                            <h6 class="prc">{{ $prices->where('name','basic_monthsub')->first()->value_2 }}€ a month</h6>
                            <ul>
                                <li><i class="far fa-check"></i>
                                    <p> BTC & ETH Signals </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> Up to 7 signals a week </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> Advanced Journalism </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> See onexpencive software </p>
                                </li>
                            </ul>
                            <form method="post" action="{{route('register-subsbcriber')}}" style="margin-top: 120px;">
                                <input type="hidden" name="plan_name" value="Basic Monthly Plan">
                                <input type="hidden" name="plan_description" value="Basic Monthly Plan">
                                @csrf
                                <br>
{{--                                <button class="btn btn-gradient" type="submit" name="selected_plan" value="coingate_basic_monthsub">Pay with Crypto</button>--}}
{{--                                <button class="btn btn-gradient" type="submit" name="selected_plan" value="paypal_basic_monthsub">PayPal - Actionable Experience</button>--}}
{{--                                <button class="btn btn-gradient" type="submit" name="selected_plan" value="braintree_basic_monthsub">Credit card</button>--}}
                                <button class="btn btn-gradient" type="submit" name="selected_plan" value="basic_monthsub">GET STARTED</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="price-box active wow fadeInUp">
                <ul class="nav nav-pills price-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-year01-tab" data-bs-toggle="pill" data-bs-target="#pills-year01" type="button" role="tab" aria-controls="pills-year01" aria-selected="true">Year</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-month01-tab" data-bs-toggle="pill" data-bs-target="#pills-month01" type="button" role="tab" aria-controls="pills-month01" aria-selected="false">Month</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-year01" role="tabpanel" aria-labelledby="pills-year01-tab">
                        <div class="aggregator-body">
                            <h6 class="prc">{{ $prices->where('name','premium_yearsub')->first()->value_2 }}€ a year <span>Super Promo 10 spots!</span></h6>
                            <ul>
                                <li><i class="far fa-check"></i>
                                    <p> BTC & ETH Signals </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> Top Coin of the Month Recomendation </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> Emerging Top small-cap altcoin recomendation </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> Insiders </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> Warning on pre-upcoming suddent changes which we </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> Advanced Journalism </p>
                                </li>
                            </ul>
                            <form method="post" action="{{route('register-subsbcriber')}}" style="margin-top: 20px;">
                                <input type="hidden" name="plan_name" value="Premium Yearly Plan">
                                <input type="hidden" name="plan_description" value="Premium Yearly Plan">
                                @csrf
                                <br>
{{--                                <button class="btn btn-gradient" type="submit" name="selected_plan" value="coingate_premium_yearsub">Pay with Crypto</button>--}}
{{--                                <button class="btn btn-gradient" type="submit" name="selected_plan" value="paypal_premium_yearsub">PayPal - Actionable Experience</button>--}}
{{--                                <button class="btn btn-gradient" type="submit" name="selected_plan" value="braintree_premium_yearsub">Credit card</button>--}}
                                <button class="btn btn-gradient" type="submit" name="selected_plan" value="premium_yearsub">GET STARTED</button>

                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-month01" role="tabpanel" aria-labelledby="pills-month01-tab">
                        <div class="aggregator-body">
                            <h6 class="prc">{{ $prices->where('name','premium_monthsub')->first()->value_2 }}€ a month <span>Super Promo 10 spots!</span></h6>
                            <ul>
                                <li><i class="far fa-check"></i>
                                    <p> BTC & ETH Signals </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> Top Coin of the Month Recomendation </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> Emerging Top small-cap altcoin recomendation </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> Insiders </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> Warning on pre-upcoming suddent changes which we </p>
                                </li>
                                <li><i class="far fa-check"></i>
                                    <p> Advanced Journalism </p>
                                </li>
                            </ul>
                            <form method="post" action="{{route('register-subsbcriber')}}" style="margin-top: 20px;">
                                <input type="hidden" name="plan_name" value="Premium Monthly Plan">
                                <input type="hidden" name="plan_description" value="Premium Monthly Plan">
                                @csrf
                                <br>
                                <button class="btn btn-gradient" type="submit" name="selected_plan" value="premium_monthsub">GET STARTED</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>