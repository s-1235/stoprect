@include('dashboard.header-coin-records')

<div class="wrapper">
    <div class="container">@include('dashboard.header-tabs')</div>
    <main data-fp data-fp-effect="slider" data-spollers class="coin-block">
        @if ($user->isPremiumPlan() || $user->isAdmin())
            @foreach($coinsEmerging as $key => $coins)
                @foreach($coins as $coin)
                    @php
                        $trade = $coin->trade === 'buy' ? 'BOUGHT' : 'SOLD';
                        $class_style = $coin->trade === 'buy' ? 'up' : 'down';
                        $title = 'Emerging coin';
                    @endphp
                    @include('dashboard.coin-record')
                @endforeach
            @endforeach
        @else
            <div class="cls cls-2 active" >
                <div class="row">
                    <div class="col-6 offset-3 align-content-center">
                        <h6 class="cta"> Subscribe Premium Pakage to see "Emerging Coin"</h6>
                        <div class="row align-content-center">
                            @include('forms.upgrade-subscriptions-button')
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>
</div>
   
<script src="public/assets/js/record-coin2.js"></script>
<script src="public/assets/js/coin-card.js"></script>
</body>
@include('footer') 
</html>