<div class="row my-3 my-row-tabs">
    <div class="col-3">
        <?php
            $style = 'shadow-lg btn btn-block h-100 my-btn-outline-warning';
            if (request()->segment(count(request()->segments())) === 'my-account') {
                $style = 'shadow-lg btn btn-block h-100 my-btn-outline-warning active';
            }
        ?>
            <a href="#">
                <button class="{{$style}}" id="cls-1">
                    CRYPTO<wbr>CURRENCY PRICES TODAY
                </button>
            </a>

        <div class="h-25 " style="color:aliceblue;display:block">
        </div>
    </div>

    <div class="col-3">
        <?php
            $style = 'shadow-lg btn btn-block h-100 btn-outline-success';
            if (request()->segment(count(request()->segments())) === 'emerging-coin') {
                $style = 'shadow-lg btn btn-block h-100 btn-outline-success active';
            }
            if ($user && $user->isBasicPlan() && !$user->isAdmin()){
                $routeEmergingCoin  = "#";
                $routeMonthCoin     = "#";
                $routeAnalytic    = "#";

            } else {
                $routeEmergingCoin = "#";
                $routeMonthCoin    = "#";
                $routeAnalytic    = "#";
            }
        ?>
        <a href="{{$routeEmergingCoin}}">
            <button class="{{$style}}" id="cls-2">
                EMERGING COIN<br>
                @if ($user && $user->isBasicPlan() && !$user->isAdmin())
                    <span class="upgrade up">Upgrade To unlock</span>
                @endif
            </button>
        </a>
    </div>

    <div class="col-3">
        <?php
            $style = 'shadow-lg btn btn-block h-100 btn-outline-info';
            if (request()->segment(count(request()->segments())) === 'month-coin') {
                $style = 'shadow-lg btn btn-block h-100 btn-outline-info active';
            }
        ?>
        <a href="{{$routeMonthCoin}}">
            <button class="{{$style}}" id="cls-3">
                COIN OF THE MONTH<br>
            @if ($user && $user->isBasicPlan() && !$user->isAdmin())
                <span class="upgrade up">Upgrade To unlock</span>
            @endif
            </button>
        </a>
        <div class="h-25 btn-info" style="outline:1px solid #17a2b8">
        </div>
    </div>

    <div class="col-3">
        <?php
            $style = 'shadow-lg btn btn-block h-100 my-btn-outline-primary';
            if (request()->segment(count(request()->segments())) === 'analytics') {
                $style = 'shadow-lg btn btn-block h-100 my-btn-outline-primary active';
            }
        ?>
        <a href="{{$routeAnalytic}}">
        <button class="{{$style}}" id="cls-4">
            EARLY ALERTS<br>
            @if ($user && $user->isBasicPlan() && !$user->isAdmin())
                <span class="upgrade up">Upgrade To unlock</span>
            @endif
        </button>
        </a>
        <div class="h-25 " style="background-color:#6464bc;color:aliceblue"></div>
    </div>

</div>
@if($user && $user->isAdmin())
    <div class="row my-3 my-row-tabs" style="margin-top: 30px !important">
        <div class="col-3">
            <?php
                $style = 'shadow-lg btn btn-block h-100 my-btn-outline-warning';
                if (request()->segment(count(request()->segments())) === 'show-coins') {
                    $style = 'shadow-lg btn btn-block h-100 my-btn-outline-warning active';
                }
            ?>
            <a href="{{route('show-coins')}}">
            <button class="{{$style}}" id="cls-5">
                COINS
            </button>
            </a>
            <div class="h-25 " style="color:aliceblue;display:block">
            </div>
        </div>
    </div>
@endif

<div style="overflow-x:auto;position:relative">
    @if($user && $user->isAdmin())
        @if(Route::currentRouteName() === 'my-account')
            <a href="{{route('add-coin-record')}}" class="btn  btn-outline-info" style="float: right; margin-bottom: 10px;">+ Add record of coin</a>
        @elseif(Route::currentRouteName() === 'emerging-coin')
            <a href="{{route('add-coin-emerging')}}" class="btn  btn-outline-info" style="float: right; margin-bottom: 10px;">+ Add emerging coin</a>
        @elseif(Route::currentRouteName() === 'month-coin')
            <a href="{{route('add-coin-month')}}" class="btn  btn-outline-info" style="float: right; margin-bottom: 10px;">+ Add coin of month</a>
        @elseif(Route::currentRouteName() === 'analytics')
            <a href="{{route('add-analytics')}}" class="btn  btn-outline-info" style="float: right; margin-bottom: 10px">+ Add analytics</a>
        @elseif(Route::currentRouteName() === 'show-coins')
            <a href="{{route('add-asset')}}" class="btn  btn-outline-info" style="float: right; margin-bottom: 10px">+ Add coin</a>
        @endif
    @endif
</div>
