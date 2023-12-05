@include('header')

<div class="container">
    
    <div class="dashboard-body">
        <div class="dashboard-header dashboard-header-title">
            <h4 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">BILLED TODAY: {{$selected_price}}$</h4>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-today" role="tabpanel" aria-labelledby="pills-today-tab">
                <form id="payment-form" action="{{route('handle-pay-braintree')}}" method="post">
                    <!-- Putting the empty container you plan to pass to
                        `braintree.dropin.create` inside a form will make layout and flow
                        easier to manage -->
                    <div id="dropin-container"></div>
                        
                    <button id="submit-pay" style="display: none" class="form-control-button" type="submit" name="Checkout">Confirm And Pay</button>
                    <input type="hidden" id="nonce" name="payment_method_nonce"/>
                    <input type="hidden" id="device_data" name="device_data"/>
                    <input type="hidden" id="selected_plan" name="selected_plan" value="{{$selected_plan}}"/>
                    <input type="hidden" id="email" name="email" value="{{$email}}" required/>
                    <input type="hidden" id="promocode" name="promocode" value="{{$promocode}}" required/>
                    <input type="hidden" id="user-token" value="{{$token}}">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>



@include('footer')




<script type="text/javascript">
  
    // $('#submit-pay').click(function (){
    //     $('#submit-pay').prop('disabled', true);
    // });
    const form = document.getElementById('payment-form');

    braintree.dropin.create({
        authorization:  $('#user-token').val(),
        container: '#dropin-container'
    }, (error, dropinInstance) => {
        if (error) console.error(error);

        form.addEventListener('submit', event => {
            event.preventDefault();

            dropinInstance.requestPaymentMethod((error, payload) => {
                if (error) console.error(error);

                // Step four: when the user is ready to complete their
                //   transaction, use the dropinInstance to get a payment
                //   method nonce for the user's selected payment method, then add
                //   it a the hidden field before submitting the complete form to
                //   a server-side integration
                document.getElementById('nonce').value = payload.nonce;
                form.submit();
            });
        });
       
    });

    braintree.client.create({
        authorization:  $('#user-token').val()
    }, function (err, clientInstance) {
        // Creation of any other components...

        braintree.dataCollector.create({
            client: clientInstance
        }, function (err, dataCollectorInstance) {
            if (err) {
                // Handle error in creation of data collector
                return;
            }
            // At this point, you should access the dataCollectorInstance.deviceData value and provide it
            // to your server, e.g. by injecting it into your form as a hidden input.
            var deviceData = dataCollectorInstance.deviceData;
            $("#device_data").val(deviceData)
        });
    });

    $(window).load(function() {
        $("#submit-pay").show();
    });
</script>