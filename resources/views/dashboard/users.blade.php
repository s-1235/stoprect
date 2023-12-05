@include('header')


@if(isset($msg['delete_user']))
    <br><div class="container"><div class="alert alert-success text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert"> x</button>
            <strong>Success! </strong>User successfully deleted!
        </div>
    </div>
    <br>
@endif

<div class="container">
    <input type="hidden" name="user_id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" id="user_id">
    <div class="dashboard-item">
        <div class="dashboard-header">
            <h4 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Available Users</h4>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-today" role="tabpanel" aria-labelledby="pills-today-tab">
                <div class="tabel-responsive">
                    <table class="tabel-main wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Plan</th>
                            <th>Subscription type</th>
                            <th>Status</th>
                            
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                       
                        @foreach ($users as $user)
                            <tr id="row_{{ $user->id}}">
                                <td>{{ $user->created_at->format('Y-m-d H:i')}}</td>
                                <td>#{{ $user->id}}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->plan_type }}</td>
                                <td>{{ $user->subscription->subscription_type }}</td>
                                <td>
                                    @if ($user->status === 'active')
                                        <p class="tag green-tag">Active</p>
                                    @else 
                                        <p class="tag red-tag">Not active</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('edit-user-form',['id'=> $user->id])}}">
                                        <i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal" title="Edit Record"></i>
                                    </a>
    
                                    &nbsp;<a href="{{route('delete-user',['id'=> $user->id])}}"><i class="fas fa-trash text-danger"></i></a>
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
    $(window).on('load', function() {
        var user_id = $('#user_id').val();
        if (user_id != '') {
            setTimeout(reloadUrl, 2000);
        }
        function reloadUrl() {
            window.location.replace('users.php');
        }
    });
</script>


