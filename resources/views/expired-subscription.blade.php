@include('header')

<div class="container">

    <div class="dashboard-item">
        <div class="dashboard-header">
            <h4 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"></h4>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-today" role="tabpanel" aria-labelledby="pills-today-tab">
                <div class="tabel-responsive">
                    
                
                   
                    <form id="payment-form" action="{{route('pay-expired-subscription')}}" method="post">
                        <h5>Your subscription expired</h5>
                        <h5>Choice subscription: </h5>
                        <label  class="form-control" id="braintree">
                            <input type="radio" name="selected_plan" class="edd-gateway" id="braintree" value="bronthe_monthsub" >Bronze monthly subscription
                        </label>
                        <label  class="form-control" id="coingate">
                            <input type="radio" name="selected_plan" class="edd-gateway" id="coingate" value="silver_yearsub" >Bronze yearly subscription
                        </label>
                        <label  class="form-control" id="braintree">
                            <input type="radio" name="selected_plan" class="edd-gateway" id="braintree2" value="premium_monthsub" >Premium month subscription
                        </label>
                        <label  class="form-control" id="coingate">
                            <input type="radio" name="selected_plan" class="edd-gateway" id="coingate2" value="premium_yearsub" >Premium year subscription
                        </label>
                        
                        <h5>Method pay </h5>
                        <label for="braintreep" class="form-control" id="braintree">
                            <input type="radio" name="payment-mode" class="edd-gateway" id="braintreep" value="braintree" checked="checked">Credit Card</label>
                        <label for="coingatep" class="form-control" id="coingate">
                            <input type="radio" name="payment-mode" class="edd-gateway" id="coingatep" value="coingate" >Pay with Crypto</label>
                        @csrf
                        <input class="form-control" type="submit" value="Pay" />
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>



@include('footer')


<script type="text/javascript">

</script>

