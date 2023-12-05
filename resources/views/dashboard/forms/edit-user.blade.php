@include('header')
<div class="container">
    
    

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    '<br><div class="alert alert-danger text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert"> x</button>
                        <strong>Error! </strong>{{$error}}
                    </div>
                    <br>
                @endforeach
            </ul>
        </div><br />
    @endif

</div>
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
            <h3 class="my-5"><a href="{{route('my-account')}}">Dashboard</a> >> Update User </h3>
            <form method="post" action="{{route('edit-user-save')}}" class="form-inline" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ $user_edit->id }}">
{{--                <div class="form-group col-4 mb-2">--}}
{{--                    <label for="username" class="col-form-label">Username</label>--}}
{{--                    <input type="text" class="form-control" name="username" value="{{  old('username',$user_edit->username) }}" required>--}}
{{--                </div>--}}
{{--                <div class="form-group col-4 mb-2">--}}
{{--                    <label for="first_name" class="col-form-label">First name</label>--}}
{{--                    <input type="text" class="form-control" name="first_name" value="{{  old('first_name', $user_edit->first_name) }}" required>--}}
{{--                </div>--}}
{{--                <div class="form-group col-4 mb-2">--}}
{{--                    <label for="last_name" class="col-form-label">Last name</label>--}}
{{--                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name',$user_edit->last_name )}}" required>--}}
{{--                </div>--}}

                <div class="form-group col-3 mb-2">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email',$user_edit->email) }}" required>
                </div>


{{--                <div class="form-group col-3 mb-2">--}}
{{--                    <label for="status" class="col-form-label">Status</label>--}}
{{--                    <select class="form-control" name="status" required>--}}
{{--                        <option value="active" {{ $user_edit->status === 'active' ? 'selected':'' }}  >Active</option>--}}
{{--                        <option value="inactive" {{ $user_edit->status === 'inactive' ? 'selected' : '' }}  >Inactive</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
                <div class="form-group col-6 mb-2">
                    <label for="password" class="col-form-label">Password (If you do not want to change the password, leave it empty)</label>
                    <input type="password" class="form-control" name="password" value="{{ old('password', '') }}" >
                </div>

                <div class="form-group col-3 mb-2">
                    <label for="message-text" class="col-form-label">&nbsp;</label>
                    @csrf
                    <button name="submit" type="submit" value="submit" class="float-right btn btn-danger btn-block">Update</button>
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