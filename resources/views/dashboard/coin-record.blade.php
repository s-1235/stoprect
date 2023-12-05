<div data-fp-section class="coin-block__section coin-card">
    <div class="coin-card__container">
        <h2 class="coin-card__title">{{$title}}</h2>
        <div class="coin-card__block">
            <div class="coin-card__body">
                <div class="coin-card__header">
                    <div class="coin-card__icon">
                        <img src="{{$coin->asset->coin_img}}" alt="icon" />
                    </div>
                    <div class="coin-card__label">{{  $coin->asset->asset_name}} {{  strtoupper($coin->asset->asset_code)}}</div>
                </div>
                <div class="coin-card__info info-coin">
                    <div class="info-coin__specification specification-coin">
                        <ul class="specification-coin__list">
                            <li class="specification-coin__item">
                                Entry Point <span>${{ $coin->buy_price}}</span>
                            </li>
                            <li class="specification-coin__item">
                                Date<span>{{$coin->datestr}}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="info-coin__statistic">
                        <div class="info-coin__status info-coin__status_{{$class_style}}">
                            WE {{$trade}}
                        </div>
                    </div>
                </div>
            </div>
            @if($coin->explanatory_text)
                <div class="coin-card__spollers spollers">
                    <div class="spollers__item">
                        <button type="button" data-spoller class="spollers__title">
                            Further Information
                        </button>
                        <div class="spollers__body">{{ $coin->explanatory_text}}</div>
                    </div>
                </div>
            @endif
        </div>
        @if ($user->isAdmin())
            <div class="coin-card__actions">
                @if (Route::current()->getName() === 'emerging-coin')
                    <a href="{{route('form-edit-emerging-coin', ['id' => $coin->id])}}" class="coin-card__edit">Edit</a>
                @else
                    <a href="{{route('form-edit-month-coin', ['id' => $coin->id])}}" class="coin-card__edit">Edit</a>
                @endif
            </div>
        @endif
    </div>
</div>
