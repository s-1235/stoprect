@include('header')


@if(isset($msg['delete_promocode']))
    <br><div class="container"><div class="alert alert-success text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert"> x</button>
            <strong>Success! </strong>Promocode successfully deleted!
        </div>
    </div>
    <br>
@endif

<div class="container">
   
    <input type="hidden" name="user_id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" id="user_id">
    <div class="dashboard-item">
        <div style="overflow-x:auto;position:relative">
            @if($user->isAdmin())
                <a href="{{route('add-promocode')}}" class="shadow-lg btn  btn-outline-info" style="float: right; margin-bottom: 10px;">+ Add promocode</a>
            @endif
            
        </div>
        <div class="dashboard-header">
            <h4 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"> Promocodes</h4>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-today" role="tabpanel" aria-labelledby="pills-today-tab">
                <div class="tabel-responsive">
                    <table class="tabel-main wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name<br>
                                (name which use user)
                            </th>
                            <th>Discount</th>
                            <th>Plan type</th>
                            <th>Period type</th>
                            <th>number of <br>promocodes</th>
                            <th>number of <br>remaining promocodes</th>
                            <th>expiration date<br> for use</th>
{{--                            <th>payment gateway</th>--}}
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                       
                        @foreach ($promocodes as $promocode)
                            <tr id="row_{{ $promocode->id}}">
                                <td>{{$promocode->id}}</td>
                                <td>{{$promocode->name}}</td>
                                <td>- ${{$promocode->discount}}</td>
                                <td>{{$promocode->plan_type}}</td>
                                <td>{{$promocode->period_type}}</td>
                                <td>{{$promocode->amount}}</td>
                                <td>{{$promocode->amount_left}}</td>
                                <td>{{$promocode->date_expired}}</td>
{{--                                <td>{{$promocode->type}}</td>--}}
                                <td>
                                    &nbsp;<a href="{{route('delete-promocode',['id'=> $promocode->id])}}"><i class="fas fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')

<script type="text/javascript">
    $(".alert").fadeOut(5000);
</script>


