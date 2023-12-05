<!-- crypto PRICING -->

<section id="launchSection">
    <div class="blur-bg" >
    <div class="d-flex flex-column align-items-center">
            <div data-tabs-body="">
                <div data-tabs-item="">
                    <div class="d-flex gap-4 gap-lg-1 flex-column flex-lg-row justify-content-around align-items-center" style="margin-top: 10px;">
                        <div class="col-10 col-lg-3 rounded-3 p-3">
                            <img src="assets/images/flamingoo.png" width="500" height="460" style="border-radius: 18.5px;" alt="">
                        </div>
                        <div class="col-10 col-lg-3 rounded-3 p-3">
                            <img src="assets/images/pepee.png" width="500" height="460" style="border-radius: 18.5px;" alt="">
                        </div>
                        <div class="col-10 col-lg-3 rounded-3 p-3">
                            <img src="assets/images/litecoin.png" width="500" height="460" style="border-radius: 18.5px;" alt="">
                        </div>
                        
                    </div>
                </div>
                <div data-tabs-item="" hidden="">
                    <div class="d-flex gap-4 gap-lg-1 flex-column flex-lg-row justify-content-around align-items-center" style="margin-top: 10px;">
                        <div class="col-10 col-lg-3 rounded-3 p-3">
                            <img src="assets/images/flamingoo.png" width="500" height="460" style="border-radius: 18.5px;" alt="">
                        </div>
                        <div class="col-10 col-lg-3 rounded-3 p-3">
                            <img src="assets/images/litecoin.jpg" width="500" height="460" style="border-radius: 18.5px;" alt="">
                        </div>
                        <div class="col-10 col-lg-3 rounded-3 p-3">
                            <img src="assets/images/pepee.jpg" width="500" height="460" style="border-radius: 18.5px;" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="pricingSection">
    <div data-tabs class="col-10 col-lg-8 col-xl-7 mx-auto">
        <div class="row text-center">
            <h2 class="fw-bold fs-small"> Choose Your <span class="text-secondary">Best Plan</span></h2>
            <div class="pricing-btn">
                <div data-tabs-titles class="tabs__navigation">
                    <button type="button" class="tabs__title _tab-active">Monthly</button>
                    <button type="button" class="tabs__title">Yearly</button>
                </div>
            </div>
            <p class="medium fst-italic fw-semibold"><span class="fs-medium text-primary fw-bolder">*</span> We pay 10 most
                expencive crypto world subscribtions and you get it all
                just for minor 1!</p>
        </div>
        <div class="d-flex flex-column align-items-center">
            <div data-tabs-body>
                <div>
                    <div 
                        class="d-flex gap-4 gap-lg-1 flex-column flex-lg-row justify-content-around align-items-center" style="margin-top: 10px;">
                        <div class="pricing-card col-10 col-lg-3 rounded-3 p-3">
                            <h4 class="pricing-card__header fw-bold">Bronze</h4>
                            <div class="pricing-card__price price p-3">
                                <div class="price--old">NORMALLY €118</div>
                                <div class="price--new">{{ $prices->where('name',config('constants.plans_id.bronze_monthsub'))->first()->value_2  }}€</div>
                                <div class="price__desc">/month paid monthly</div>
                            </div>
                            <div class="pricing-card__desc">With this subscription You can
                                follow our <span class="text-secondary">BTC + ETH</span> trades
                            </div>
                            <form method="post" action="{{route('register-subsbcriber')}}" >
                                @csrf
                                <button 
                                        class="pricing-card__btn"
                                        type="submit" 
                                        name="selected_plan" 
                                        value="{{config('constants.plans_id.bronze_monthsub')}}">
                                    Choose plan
                                </button>
                            </form>
                        </div>
                        <div class="pricing-card col-10 col-lg-3 rounded-3 p-3">
                            <h4 class="pricing-card__header fw-bold">Silver</h4>
                            <div class="pricing-card__price price p-3">
                                <div class="price--old">NORMALLY €178</div>
                                <div class="price--new">{{ $prices->where('name',config('constants.plans_id.silver_monthsub'))->first()->value_2  }}€</div>
                                <div class="price__desc">/month paid monthly</div>
                            </div>
                            <div class="pricing-card__desc">With this subscription You will be
                                able to access our daily trades <span class="text-secondary">BTC +
                                    ETH
                                    + ALTS</span>
                            </div>
                            <form method="post" action="{{route('register-subsbcriber')}}" >
                                @csrf
                                <button 
                                        class="pricing-card__btn"
                                        type="submit"
                                        name="selected_plan"
                                        value="{{config('constants.plans_id.silver_monthsub')}}">
                                    Choose plan
                                </button>
                            </form>
                        </div>
                        <div class="pricing-card col-10 col-lg-3 rounded-3 p-3 active">
                            <h4 class="pricing-card__header" fw-bold>
                                BIG BALZZ</h4>
                            <div class="pricing-card__price price p-3">
                                <div class="price--old">NORMALLY €118</div>
                                <div class="price--new">{{ $prices->where('name',config('constants.plans_id.premium_monthsub'))->first()->value_2  }}€</div>
                                <div class="price__desc">/month paid monthly</div>
                            </div>
                            <div class="pricing-card__desc">
                                <p>With this subscription You will get </p>
                                <ul>
                                    <li>
                                        access to <span>BTC+ETH+ALTS</span>
                                    </li>
                                    <li>
                                        additionally <span>Coin of The Month</span>
                                    </li>
                                    <li>
                                        <span>Emerging Coin</span> early bird info
                                    </li>
                                </ul>
                            </div>
                            <form method="post" action="{{route('register-subsbcriber')}}" >
                                @csrf
                                <button 
                                        class="pricing-card__btn"
                                        type="submit"
                                        name="selected_plan"
                                        value="{{config('constants.plans_id.premium_monthsub')}}">
                                    Choose plan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <div 
                        class="d-flex gap-4 gap-lg-1 flex-column flex-lg-row justify-content-around align-items-center" style="margin-top: 10px;">
                        <div class="pricing-card col-10 col-lg-3 rounded-3 p-3">
                            <h4 class="pricing-card__header fw-bold">Bronze</h4>
                            <div class="pricing-card__price price p-3">
                                <div class="price--old">NORMALLY €118</div>
                                <div class="price--new">{{ round($prices->where('name',config('constants.plans_id.bronze_yearsub'))->first()->value_2  / 12, 0) }}€</div>
                                <div class="price__desc">/month paid monthly</div>
                            </div>
                            <div class="pricing-card__desc">With this subscription You can
                                follow our <span class="text-secondary">BTC + ETH</span> trades
                            </div>
                            <form method="post" action="{{route('register-subsbcriber')}}" >
                                @csrf
                                <button 
                                        class="pricing-card__btn"
                                        type="submit" 
                                        name="selected_plan" 
                                        value="{{config('constants.plans_id.premium_yearsub')}}">
                                    Choose plan
                                </button>
                            </form>
                        </div>
                        <div class="pricing-card col-10 col-lg-3 rounded-3 p-3">
                            <h4 class="pricing-card__header fw-bold">Silver</h4>
                            <div class="pricing-card__price price p-3">
                                <div class="price--old">NORMALLY €178</div>
                                <div class="price--new">{{ round($prices->where('name',config('constants.plans_id.silver_yearsub'))->first()->value_2 / 12,0) }}€</div>
                                <div class="price__desc">/month paid monthly</div>
                            </div>
                            <div class="pricing-card__desc">With this subscription You will be
                                able to access our daily trades <span class="text-secondary">BTC +
                                    ETH
                                    + ALTS</span>
                            </div>
                            <form method="post" action="{{route('register-subsbcriber')}}" >
                                @csrf
                                <button 
                                        class="pricing-card__btn"
                                        type="submit"
                                        name="selected_plan"
                                        value="{{config('constants.plans_id.premium_yearsub')}}">
                                    Choose plan
                                </button>
                            </form>
                        </div>
                        <div class="pricing-card col-10 col-lg-3 rounded-3 p-3 active">
                            <h4 class="pricing-card__header" fw-bold>
                                BIG BALZZ</h4>
                            <div class="pricing-card__price price p-3">
                                <div class="price--old">NORMALLY €118</div>
                                <div class="price--new">{{ round($prices->where('name',config('constants.plans_id.premium_yearsub'))->first()->value_2 / 12, 0) }}€</div>
                                <div class="price__desc">/month paid monthly</div>
                            </div>
                            <div class="pricing-card__desc">
                                <p>With this subscription You will get </p>
                                <ul>
                                    <li>
                                        access to <span>BTC+ETH+ALTS</span>
                                    </li>
                                    <li>
                                        additionally <span>Coin of The Month</span>
                                    </li>
                                    <li>
                                        <span>Emerging Coin</span> early bird info
                                    </li>
                                </ul>
                            </div>
                            <form method="post" action="{{route('register-subsbcriber')}}" >
                                @csrf
                                <button 
                                        class="pricing-card__btn"
                                        type="submit"
                                        name="selected_plan"
                                        value="{{config('constants.plans_id.premium_yearsub')}}">
                                    Choose plan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column align-items-center small fw-bold mt-6">
                <p>You will be able to add ratings after the first month of membership.</p>
                <div
                    class="rounded-pill shadow-sm d-inline-flex align-items-start justify-content-center gap-2 pt-2 pb-1 px-5 bg-white btn-sm">
                    <i class="fas fa-user-alt"></i>
                    <span class="fw-bold">188 reviews</span>
                </div>
                <div class="d-flex align-items-center mt-2">
                    <img src="assets/img/Star.svg" alt="">
                    <span>4.7 / 5 </span>
                </div>
            </div>
        </div>
    </div>
</section>