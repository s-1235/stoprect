@include('header')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="text-center"><div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert"> x</button>
                    <strong>Success! </strong>The Record has been successfully updated!
                </div></div><br>
            @endif
            @if(session('error'))
                <div class="alert alert-danger text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert"> x</button>
                <strong>Error! </strong>Something went wrong!
                </div><br>
            @endif
        </div>
    </div>
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
            <h3 class="my-5"><a href="{{route('emerging-coin')}}">Emerging coin</a> >> Edit emerging coin</h3>

            <form method="post" action="{{route('edit-emerging-coin')}}" class="form-inline" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ $record->id }}">
                <div class="form-group col-4 mb-2">
                    <label for="message-text" class="col-form-label">Entry point:</label>
                    <input type="text" class="form-control" name="buy_price" value="{{ $record->buy_price }}">
                </div>
                <div class="form-group col-4 mb-2">   
                    <label for="message-text" class="col-form-label">Coin:</label>
                    <select class="form-control "  data-live-search="true" name="currency_id" >

                        @foreach ($assets as $value)
                            @php
                              $sel = ($value->id == $record->currency_id) ? 'selected' : '';
                            @endphp
                            <option value="{{ $value->id }}" {{$sel}}>{{ $value->asset_code }}( {{ $value->asset_name }} )</option>
                        @endforeach
                        
                    </select>
                </div>

                <div class="form-group col-4 mb-2">
                    <label for="message-text" class="col-form-label">Buy/Sell:</label>
                    <select class="form-control" name="trade">
                        <option value="buy" {{ $record->trade === 'buy'?'selected':'' }}>Buy</option>
                        <option value="sell" {{ $record->trade === 'sell'?'selected':'' }}>Sell</option>
                    </select>
                </div>
                <div class="form-group col-4 mb-2">
                    <label for="message-text" class="col-form-label" data-toggle="tooltip" data-placement="top" title="Set the date on which the coin will be displayed">Date:</label>
                    <input type="date" class="form-control" name="date" value="{{date('Y-m-d', strtotime($record->dated)) }}" required>
                </div>

{{--                <div class="form-row col-4">--}}
{{--                    <label for="message-text" class="col-form-label" data-toggle="tooltip" data-placement="top" title="Upload image of coin (jpg, png, jpeg, webp) recomended size 120x120px">Coin Image:</label>--}}
{{--                    <div class="custom-file ">--}}
{{--                        <input type="file" class="custom-file-input main-input"--}}
{{--                               id="coin_img"--}}
{{--                               name="coin_img"--}}
{{--                               value=""--}}
{{--                               >--}}
{{--                        <label class="custom-file-label main-label" for="coin_img">Coin Image</label>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="d-inline-block">
                   @php
                        $class = 'show';
                    @endphp

                </div>
                <div class="d-inline-block " >
                    <img src='{{$record->coin_img}}' width="200" alt="">
                </div>
                <div class="form-group col-12 mb-2 expl_text {{ $class }}">
                    <label for="">Further information</label>
                    <textarea class="form-control" id="" cols="30" rows="10" name="explanatory_text">{{ $record->explanatory_text }}</textarea>
                </div>
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
        if($(this).is(':checked')){
            $('.expl_text').removeClass('d-none');
        }else{
            $('.expl_text').addClass('d-none');
            // $('.expl_text').fadeOut();
        }
    });

</script>
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>