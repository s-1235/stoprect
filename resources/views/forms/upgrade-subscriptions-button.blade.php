@if($user && $user->isCoingateSubMonth())
    <div class="col-12">
        <button class="form-control btn-outline-success coingate-pay-month-upgrade">UPGRADE</button>
    </div>
@endif

@if($user && $user->isBraintreeSubMonth())
    <div class="col-12">
        <button class="form-control btn-outline-success braintree-pay-month-upgrade">UPGRADE</button>
    </div>
@endif
@if($user && $user->isCoingateSubYear())
    <div class="col-12">
        <button class="form-control btn-outline-success coingate-pay-year-upgrade">UPGRADE</button>
    </div>
@endif

@if($user && $user->isBraintreeSubYear())
    <div class="col-12">
        <button class="form-control btn-outline-success braintree-pay-year-upgrade">UPGRADE</button>
    </div>
@endif