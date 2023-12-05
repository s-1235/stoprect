@php
if (isset($_GET['msg'])) {

if ($_GET['msg'] === "subsc_expired") {
echo "<div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-danger alert-dismissible hideMe' ><button type='button' class='close' data-dismiss='alert'>&times;</button>Your Subscription has been Expired</div>";
}

if ($_GET['msg'] === "createaccount") {
echo "<div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-warning text-dark alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Login first before any Subscription!!</div>";
}

if ($_GET['msg'] === "subscribefirst") {
echo "<div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-danger  alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>You have not any subscription yet!!</div>";
}

if ($_GET['msg'] === "LoginSuccess") {
echo "<div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-success hideMe alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>You have Logged In Successfully</div>";
}

if ($_GET['msg'] === "SignUpSuccess") {
echo "<div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-success alert-dismissible hideMe'><button type='button' class='close' data-dismiss='alert'>&times;</button>You have Signed Up Successfully</div>";
}

if ($_GET['msg'] === "SignUpFailed") {
echo "<div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-danger alert-dismissible hideMe' ><button type='button' class='close' data-dismiss='alert'>&times;</button>SignUp Failed ....</div>";
}

if ($_GET['msg'] === "AlreadyExist") {
echo "<div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-danger alert-dismissible hideMe' ><button type='button' class='close' data-dismiss='alert'>&times;</button>SignUp Failed , User Already Exists....</div>";
}

if ($_GET['msg'] === "LoginFailed") {
echo "<div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-danger alert-dismissible hideMe' ><button type='button' class='close' data-dismiss='alert'>&times;</button>Login Failed ,Wrong UserName OR Password...</div>";
}

if ($_GET['msg'] === 'paymentinactive') {
echo "<div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-danger  alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Payment gateway is inactive!!</div>";
}

if ($_GET['msg'] === "SubscriptionSuccess") {
echo "<div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-success alert-dismissible hideMe'><button type='button' class='close' data-dismiss='alert'>&times;</button>You have been subscribed successfully</div>";
}

}
@endphp