@include('header')


<style>
    .head {

        background-color: "#cecece";
    }
    .btn-outline-success{
        color:#00bd9c;


    }
    .btn-outline-success:hover{
        background-color:#00bd9c;
        border-color: #00bd9c;

    }
    .btn-outline-success:not(:disabled):not(.disabled).active, .btn-outline-success:not(:disabled):not(.disabled):active, .show>.btn-outline-success.dropdown-toggle {
        color: #fff;
        background-color: #00bd9c;
        border-color: #00bd9c;
    }

    .h-25{
        display:none;
    }

    .cls{
        padding-top:50px;

    }

    .upgrade {
        background-color: #37368c;
        border: none;
        color: white;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        /*font-family:'Arial';*/
        font-size: 12px;
        font-weight:normal;
        margin-top:10px;

    }

    .up {border-radius: 20px;}

     .fit-text {
         position: relative;
         /*top: 50%;*/
         /*left: 1%;*/
         /*right: 1%;*/
     }
</style>
<div class="container">

    @include('dashboard.header-tabs')
    @if ($user->isPremiumPlan() || $user->isAdmin())
        <div>
            <div>
                <hr style="margin-top: 3em">
                <h4 class="cta text-left">Analytics</h4>

                <div class="analytics-articles">

                    @include('dashboard.analytics-record')

                </div>
            </div>
        </div>
    @else
        <div class="cls cls-2 active" >
            <div class="row">
                <div class="col-6 offset-3 align-content-center">
                    <h6 class="cta"> Subscribe Premium Pakage to see "EARLY ALERTS"</h6>
                    <div class="row align-content-center">
                        @include('forms.upgrade-subscriptions-button')
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

</body>

@include('footer')
<script type="text/javascript">
    $('.card-article').on('click', function(e) {
        if( $(e.target).is('.share-link') ) {
            e.preventDefault();
            //your logic for the button comes here

        }
        //Everything else within the ancho will cause redirection***
    });
    var $temp = $("<input>");
    var $email = $('.share-link').first().text();
    function copyFunction(event){

        event.preventDefault()
        const copyValue = event.target.getAttribute('data-share-link');
        if (window.isSecureContext && navigator.clipboard) {
            navigator.clipboard.writeText(copyValue);
            alert("Share link copied!");
        } else {
            const textArea = document.createElement('textarea');
            textArea.value = copyValue;
            document.body.appendChild(textArea);
            textArea.select();
            try {
                document.execCommand('copy');
                alert("Share link copied!");
            } catch (err) {
                console.error('Unable to copy to clipboard', err);
                alert('Unable to copy to clipboard', err);
            }
            document.body.removeChild(textArea);
        }
    }

    function deleteAnalyticRecord(event){
        event.preventDefault()
        articleId = $(event.target).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        url = 'delete-analytic';
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                'id':articleId,
            },
            success: function (data) {
                alert("DONE")
                window.location.reload();
            },
        })
    }

</script>
</html>
