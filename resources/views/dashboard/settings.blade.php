@include('header')


<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-center m-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert"> x</button>
                        <strong>Error! </strong>{{$error}}
                    </div><br>
                @endforeach
            </ul>
        </div><br />
    @elseif((Session::get('status'))  == 1)
        <div class="text-center m-2">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"> x</button>
                <strong>Success! </strong>The Record has been successfully added!
            </div>
        </div><br>
    @endif
    <div class="row">
        <div class="col-12">
            <h3 class="my-5"><a href="{{route('my-account')}}">Dashboard</a> >> Settings </h3>
            @include('dashboard.help-text.help-text',[
           'helpText' => config('constants.help-text.settings')
       ])
            <form method="post" action="{{route('settings-save')}}" class="form-inline" enctype="multipart/form-data">
                <div class="form-group col-4 mb-2">
                    <label for="display_records" class="col-form-label">How many records want to display to users?</label>
                    <input type="number" class="form-control" value="{{$settings->where('name', 'display_records')->first()->value}}" name="display_records"  required>
                </div>
                <div class="form-group col-4 mb-2">
                    <label for="recipient-name" class="col-form-label">&nbsp;</label>
                    @csrf
                    <button name="submit" type="submit" value="view-settings" class="float-right btn btn-danger btn-block">Submit</button>
                </div>
            </form>
            <div class="row">
                <hr>

            <form method="post" class="form-inline" enctype="multipart/form-data">
                <div class="form-group  col-12 ">
                <h1 style="font-size: 1em">Payment gateways settings </h1>
                    <hr>
                </div>
                <div class="form-group  col-12 ">
                 <h5 style="margin-top: 2em">Coingate Details id
                     <p >
                     @if(env('APP_DEBUG'))
                     <a class="link" href="https://dashboard-sandbox.coingate.com/account/billing/details"> Link to details id</a>
                    @else
                     <a class="link" href="https://dashboard.coingate.com/account/billing/details"> Link to details id</a>
                    @endif
                     </p>
                 </h5><br>
                </div>
                @foreach($coingate_plans as $plans)
                  
                <div class="form-group  col-6 ">
                    <label for="{{$plans->name.'-'.$plans->type}}" class="col-form-label">{{Str::title(str_replace(['_', 'sub'],[' ', ' Subscription'],$plans->name))}}</label>
                    <input style="width: 100%" type="text" class="form-control" value="{{ $plans->value }}" name="{{$plans->name.'-'.$plans->type}}" required>
                </div>
                @endforeach
                <hr>
                <div class="form-group  col-12 ">
                    <h5 class="my-12" style="margin-top: 2em">Braintree Plan id
                        @if(env('APP_DEBUG'))
                            <p class="my-12"><a href="https://sandbox.braintreegateway.com/merchants/"> Link to plans id</a></p>
                    @else
                        <p class="my-12"><a href="https://braintreegateway.com/merchants/"> Link to plans id</a></p>
                    @endif
                    </h5>
                </div>
                @foreach($braintree_plans as $plans)
                  
                <div class="form-group  col-6 ">
                    <label for="{{$plans->name.'-'.$plans->type}}" class="col-form-label">{{Str::title(str_replace(['_', 'sub'],[' ', ' Subscription'],$plans->name))}}</label>
                    <input style="width: 100%" type="text" class="form-control" value="{{ $plans->value }}" name="{{$plans->name.'-'.$plans->type}}" required>
                </div>
                @endforeach
             
                <div class="form-group col-6">
                    <label for="recipient-name" class="col-form-label">&nbsp;</label>
                    @csrf
                    <button name="submit" type="submit" value="gateway-settings" class="float-right btn btn-danger btn-block">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@include('footer')