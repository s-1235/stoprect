@include('header')


<?php
// ini_set('display_errors', '1');
//// ini_set('display_startup_errors', '1');
//// error_reporting(E_ALL);
//require_once('header.php');
//if (isset($_GET['id']) && !empty($_GET['id'])) {
//    $deleteUser = $db->deleteUser($_GET['id']);
//    echo '<br><div class="container"><div class="alert alert-success text-center" role="alert">
//            <button type="button" class="close" data-dismiss="alert"> x</button>
//            <strong>Success! </strong>User successfully deleted!
//            </div>
//        </div>
//        <br>';
//}
//$subscriptions = $db->getAllUsersSubscriptions($_SESSION['user_id']);
?>

<div class="container">
    <input type="hidden" name="user_id" value="{{$user->id}}" id="user_id">
    <div class="dashboard-item">
        <div class="dashboard-header">
            <h4 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Available Subscription</h4>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-today" role="tabpanel" aria-labelledby="pills-today-tab">
                <div class="tabel-responsive">
                    <table class="tabel-main wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Plan</th>
                            <th class="text-center">Start Date</th>
                            <th class="text-center">Payment gateway</th>
                            <th class="text-center">Bill period</th>
                            <th class="text-center">Status</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @foreach ($subscriptions as $subscription)--}}
                        <tr id="row_{{ $subscription->id }}">
                            <td class="text-center">#{{ $subscription->id }}</td>
                            <td class="text-center">{{ $subscription->user->email }}</td>
                            <td class="text-center">{{ $subscription->user->plan_type }}</td>
                            <td class="text-center">{{ $subscription->created_on->format('Y-m-d') }}</td>
{{--                            <td class="text-center">{{ $subscription->next_bill_date }}</td>--}}
                            <td class="text-center">{{ $subscription->subscription_type }}</td>
                            <td class="text-center">{{ $subscription->bill_period }}</td>

                            <td class="text-center">
                                @if ( strtotime($subscription->created_on) >= strtotime($subscription->expired_on))
                                    <p class="tag green-tag">Active</p>
                                @else
                                    <p class="tag red-tag">Expired</p>
                                @endif
                            </td>
                            
                        </tr>
{{--                        @endforeach--}}
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

