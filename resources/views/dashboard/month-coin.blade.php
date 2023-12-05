@include('dashboard.header-coin-records')


<div class="wrapper">
    <div class="container">@include('dashboard.header-tabs')</div>
    <main data-fp data-fp-effect="slider" data-spollers class="coin-block">
        @if ($user->isPremiumPlan() || $user->isAdmin())
            @foreach($coinsMonth as $key => $coins)
                @foreach($coins as $coin)
                    @php
                    $trade = $coin->trade === 'buy' ? 'BOUGHT' : 'SOLD';
                    $class_style = $coin->trade === 'buy' ? 'up' : 'down';
                    $title = 'Coin on the movie';
                    @endphp
                    @include('dashboard.coin-record')
                @endforeach
            @endforeach
        @else
            <div class="cls cls-2 active" >
                <div class="row">
                    <div class="col-6 offset-3 align-content-center">
                        <h6 class="cta"> Subscribe Premium Pakage to see "Coin of the month"</h6>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>