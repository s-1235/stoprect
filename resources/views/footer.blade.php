
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="public/assets/js/pass-validation.js"></script>
{{--<script src="public/assets/js/record-coin.js"></script>--}}
<script type="text/javascript">
 $(".coingate-pay-month-upgrade").on('click', function (){
     alert('We sent to your email payment to upgrade your subscription')
     sendCoingatePay('month')
 })
 $(".coingate-pay-year-upgrade").on('click', function (){
     alert('We sent to your email payment to upgrade your subscription')
     sendCoingatePay('year')
 })
 $(".braintree-pay-month-upgrade").on('click', function (){
     sendBraintreePay('month')
 })
 
 $(".braintree-pay-year-upgrade").on('click', function (){
     sendBraintreePay('year')
 }) 
 
 $("#o_1").on('click', function (){
     price = $("#price_promocode").data('old_price_month')
     $("#price_promocode").text(price);
 })
 $("#o_2").on('click', function (){
     price = $("#price_promocode").data('old_price_year')
     $("#price_promocode").text(price);
 })

 
// Notifications

let hiddenFormMessageTimeout;

function formMessage(status, message, timeout) {
    document.querySelector('.notification')?.remove();
    clearTimeout(hiddenFormMessageTimeout);

    const notification = document.createElement('div');
    notification.classList.add('notification');
    notification.classList.add(`${status === 200 ? 'notification_success' : 'notification_error'}`);
    notification.innerHTML = `
        <div class="notification__container">
            <div class="notification__message">
                ${message}
            </div>
        </div>
        `;

    document.body.appendChild(notification);

    setTimeout(() => notification.classList.add('show'), 10);

    hiddenFormMessageTimeout = setTimeout(() => hiddenFormMessage(notification), timeout);

    function hiddenFormMessage(item) {
        item.classList.remove('show');

        setTimeout(() => {
            document.querySelector('.notification')?.remove();
        }, 500);
    }
}

 function sendCoingatePay(upgradeType) {
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     url = 'coingate-pay-upgrade';
     $.ajax({
         type: 'POST',
         url: url,
         data: {
             'bill_period':upgradeType,
         },
         success: function (data) {
             location.reload();
         },
         error: function (data) {
             alert("Something wrong, please write to support")
         },
     })
 }
 
 function sendBraintreePay(upgradeType) {
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     url = 'braintree-pay-upgrade';
     $.ajax({
         type: 'POST',
         url: url,
         data: {
             'bill_period':upgradeType,
         },
         success: function (data) {
             location.reload();

             alert("Thanks for payment, we upgraded your new plan")
         },
         error: function (data) {
             alert("Something wrong, please write to support")
         },
     })
 }


</script>
    <script type="text/javascript">
    $(".checkbox").change(function() {
        if(this.checked) {
            $('table').addClass('table-dark');
        }else{
            $('table').removeClass('table-dark');
        }

    });
    $(function() {
        $('.selectpicker').selectpicker();
    });
    
</script>
<script type="text/javascript">
    $(".alert").fadeOut(5000);
</script><script type="text/javascript">
    $("#btn_promocode").on('click', function (){
        promocode = $("#promocode").val();
        if($('#o_1').prop('checked') == true) {
            selectedPlan = $('#o_1').val()
        } 
        
        if($('#o_2').prop('checked') == true) {
            selectedPlan = $('#o_2').val()
        }
        sendPromocode(promocode, selectedPlan)
    })


    function sendPromocode(promocode, selectedPlan) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        url = 'send-promocode';
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                'promocode_name':promocode,
                'selected_plan':selectedPlan,
            },
            success: function (discount) {
                alert("We applied your promocode")
                price  = $("#price").text()
                if($('#o_1').prop('checked')) {
                    price = $("#price_promocode").data('old_price_month')
                }
                if($('#o_2').prop('checked')) {
                    price = $("#price_promocode").data('old_price_year')
                }
                newPrice = price - discount;
                $("#price_promocode").text(newPrice)
                
            },
            error: function (data) {
                $("#promocode").val('')
            
                console.log(data.responseText)
                formMessage(data.status, data.responseText, 5000)
                
                // alert(data.responseText) // use this message for error
            },
        })
    }
</script>
</body>
</html>