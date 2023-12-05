@include('header')

@if($user->status !== config('constants.user_status_active') && $user->user_type !== 'ADM')
    <div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-danger alert-dismissible hideMe' ><button type='button' class='close' data-dismiss='alert'>&times;</button>
        Your Subscription has been Expired</div>
@endif

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
</style>

<div class="container">

    @include('dashboard.header-tabs')

    <?php
    use Illuminate\Support\Carbon;
    // if($recs){
    foreach ($data as $key => $value) {

    $carbon = new Carbon();
    ?>
    <br><br><h4  class='wow fadeInUp text-center text-uppercase monthDiv'>{{$carbon->month($key)->format('F')}}</h4>

    <div class="dashboard-item" id="pills-tabContent">
        <div class="tab-pane fade active show" id="pills-today" role="tabpanel" aria-labelledby="pills-today-tab">
            <div class="tabel-responsive">
                <table class="tabel-main wow fadeInUp cls cls-1" style="visibility: visible; animation-name: fadeInUp;" >
                    <thead>
                    <tr>
                        <th class="text-center">Date</th>
{{--                        <th class="text-center">ID</th>--}}
                        <th class="text-center">Coin</th>
                        <th class="text-center">Buy/sell</th>
                        <th class="text-center">Buy Price</th>
                        <th class="text-center">TakeProfit</th>
                        <th class="text-center">StopLoss</th>
{{--                        <th class="text-center">Status</th>--}}
                        @if($user->isAdmin())
                           <th>EDIT</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($value as $key => $val)
                        @include('dashboard.forms.records')
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

@include('footer')
<style>
    .rmrad{
        border-bottom-right-radius:0px;
        border-bottom-left-radius:0px;
    }
</style>
