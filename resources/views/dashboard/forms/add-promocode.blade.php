@include('header')
<div class="container">
    @if(@isset($msg))
        @if ($msg === true)
            <br><div class="text-center">
                    <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert"> x</button>
                    <strong>Success! </strong>The Promocode has been successfully updated!
                    </div>
                </div>
                <br>
        @elseif($msg !== false)
        @else 
            <br><div class="alert alert-danger text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert"> x</button>
                <strong>Error! </strong>Something went wrong!
                </div>
            <br>
        @endif
    @endif
</div>
<style type="text/css">
    .form-inline .form-control {
        width: 100% !important;
        display: block !important;
    }
</style>

<div class="container">
    <div class="row">

        <div class="col-12">
            <h3 class="my-5"><a href="{{route('my-account')}}">Dashboard</a> >> Add Promocode </h3>
            <div class="form-group col-6 mb-2">
                @include('dashboard.help-text.help-text',[
    'helpText' => config('constants.help-text.promocode-help')
])
            </div>
            <form method="post" class="form-inline" enctype="multipart/form-data">
              
                <div class="form-group col-3 mb-2">
                    <label for="asset_name" class="col-form-label">Promocode name:<span class="label-require">*</span></label>
                    <input type="text" class="form-control" name="promocode_name" required>
                </div> 
                
                <div class="form-group col-3 mb-2">
                    <label for="asset_name" class="col-form-label">Promocode amount:<span class="label-require">*</span></label>
                    <input type="number" class="form-control" name="promocode_amount" required>
                </div>
                <div class="form-group col-3 mb-2">
                    <label for="asset_name" class="col-form-label">Date expired for use:</label>
                    <input type="date" class="form-control" name="promocode_date" required>
                </div>
                <div class="form-group col-3 mb-2">
                    <label for="asset_name" class="col-form-label">Plan type:</label>
                    <select id="plan_type" name="plan_type" class="form-control">
                        <option value="bronze">bronze</option>
                        <option value="silver">silver</option>
                        <option value="balzz">balzz</option>
                    </select>
                </div>  
                <div class="form-group col-3 mb-2">
                    <label for="asset_name" class="col-form-label">Period type:</label>
                    <select id="period_type" name="period_type" class="form-control">
                        <option value="month">month</option>
                        <option value="year">year</option>
                    </select>
                </div>
                <div class="form-group col-3 mb-2">
                    <label for="asset_name" class="col-form-label">Promocode braintree:</label>
                    <select id="braintree_promocode_id" name="braintree_promocode_id" class="form-control">
                        @foreach($braintree_promocode as $date)
                            <option value="{{$date->id}}">{{$date->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-3 mb-2">
                    <label for="message-text" class="col-form-label">&nbsp;</label>
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
</script>  