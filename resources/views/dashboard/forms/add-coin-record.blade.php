@include('header')
<div class="container">
  
</div>
<style type="text/css">
    .form-inline .form-control{
        width: 100% !important;
        display: block !important;
    }
</style>

<div class="container">
    <div class="row">

        <div class="col-12">
            <h3 class="my-5"><a class="link" href="{{route('my-account')}}">CRYPTOCURRENCY PRICES TODAY</a>  >> Add Coin of record </h3>
            @include('dashboard.help-text.help-text',[
                'helpText' => config('constants.help-text.add-coin-record')
            ])
            <form method="post" action="{{route('add-coin-record')}}" class="form-inline" enctype="multipart/form-data">
                <div class="form-group col-4 mb-2">
                    <label for="message-text" class="col-form-label">Coin:</label>
                    <select class="form-control" data-live-search="true" name="currency_id" required>
                        
                        @foreach ($assets as $asset) 
                            <option value="{{$asset->id}}">{{ $asset->asset_code  }} ({{$asset->asset_name}})</option>';
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-4 mb-2">
                    <label for="message-text" class="col-form-label">Buy/Sell:</label>
                    <select class="form-control" name="trade" required>
                        <option value="buy">Buy</option>
                        <option value="sell">Sell</option>
                    </select>
                </div>
                <div class="form-group col-4 mb-2">
                    <label for="message-text" class="col-form-label" data-toggle="tooltip" data-placement="top" title="Max characters 100">Buy price:<span class="label-require">*</span></label>
                    <input type="text" class="form-control" name="buy_price" required>
                </div>
                <div class="form-group col-4 mb-2">
                    <label for="message-text" class="col-form-label" data-toggle="tooltip" data-placement="top" title="Max characters 100">Take Profit:<span class="label-require">*</span></label>
                    <input type="text" class="form-control" name="take_of_it" maxlength="8" required>
                </div>
                <div class="form-group col-4 mb-2">
                    <label for="message-text" class="col-form-label" data-toggle="tooltip" data-placement="top" title="Max characters 100" >Stop loss:<span class="label-require">*</span></label>
                    <input type="text" class="form-control" name="stop_loss" maxlength="8" required>
                </div>
{{--                <div class="form-group col-4 mb-2">--}}
{{--                    <label for="message-text" class="col-form-label">Status:</label>--}}
{{--                    <select class="form-control" name="status" required>--}}
{{--                        <option value="win">Win</option>--}}
{{--                        <option value="loss">Loss</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
                <div class="form-group col-12 mb-2 expl_text d-none">
                    <label for="">Further information</label>
                    <textarea class="form-control" id="" cols="30" rows="10" name="explanatory_text"></textarea>
                </div>
                <div class="col-6"> </div>
                <div class="col-12"> </div>
                <br>
                <div class="col-6"> </div>
                <div class="form-group col-6 mb-3 ">
                    @csrf
                    <button name="submit" type="submit" value="submit" class="float-right btn btn-danger btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('footer')
<script type="text/javascript">
    $(".alert").fadeOut(5000);
    $('#emerging_coin, #coin_of_the_month').on('change', function () {
        if ($('#emerging_coin').is(':checked')) {
            $('.expl_text').removeClass('d-none');
            $('.expl_text').addClass('show');
        } else if ($('#coin_of_the_month').is(':checked')) {
            $('.expl_text').removeClass('d-none');
            $('.expl_text').addClass('show');
        } else {
            $('.expl_text').removeClass('show');
            $('.expl_text').addClass('d-none');
        }
    });
</script>
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>