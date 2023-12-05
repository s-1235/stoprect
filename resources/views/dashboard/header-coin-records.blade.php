<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stop Rect</title>
    <link type="image/x-icon" rel="shortcut icon" href="public/assets/images/favicon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <link type="text/css" rel="stylesheet" href="public/assets/css/dashstyles.css" />
    <link type="text/css" rel="stylesheet" href="public/assets/css/responsive.css" />
    <link type="text/css" rel="stylesheet" href="public/assets/css/header.css" />
    <link type="text/css" rel="stylesheet" href="public/assets/css/record-coin.css" />
    <link type="text/css" rel="stylesheet" href="public/assets/css/coin-card.css" />
    <script src="https://js.braintreegateway.com/web/dropin/1.33.7/js/dropin.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.88.4/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.88.4/js/data-collector.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/assets/css/record-coin.css"> 
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

</head>
<body>
<style>
    .head {

        background-color: "#cecece";
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
@if(session('message'))
    @php

        if(session('status') === 'success') {
            $style = 'success';
        } elseif (session('status') === 'failed'){
            $style = 'danger';
        } else {
            $style = 'warning';
        }

    @endphp
    <div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-{{$style}} alert-dismissible hideMe' >
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        {{session('message')}}
    </div>
@endif
@if ($errors->any())

    @foreach ($errors->all() as $error)
        <div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-danger alert-dismissible hideMe' >
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            {{$error}}
        </div>
        <br>
    @endforeach

@endif
<script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
<header class="bg-danger fixed" >

    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container " >
            <a class="navbar-brand" href="{{route('home')}}">
                <svg width="273" height="53" viewBox="0 0 273 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="0.849121" width="140.643" height="51.4122" fill="white" />
                    <path d="M38.4336 19.1096V21.2024H33.3728V19.1096C33.3728 18.932 33.2967 18.8432 33.1445 18.8432H16.3261C16.1486 18.8432 16.0598 18.932 16.0598 19.1096V24.7411C16.0598 24.9187 16.1486 25.0074 16.3261 25.0074H33.1445C34.5905 25.0074 35.8334 25.5275 36.8735 26.5675C37.9135 27.5822 38.4336 28.8252 38.4336 30.2965V35.928C38.4336 37.3993 37.9135 38.655 36.8735 39.695C35.8334 40.7097 34.5905 41.217 33.1445 41.217H16.3261C14.8548 41.217 13.5992 40.7097 12.5591 39.695C11.5444 38.655 11.0371 37.3993 11.0371 35.928V33.8352H16.0598V35.928C16.0598 36.1056 16.1486 36.1944 16.3261 36.1944H33.1445C33.2967 36.1944 33.3728 36.1056 33.3728 35.928V30.2965C33.3728 30.1189 33.2967 30.0301 33.1445 30.0301H16.3261C14.8548 30.0301 13.5992 29.5228 12.5591 28.5081C11.5444 27.4681 11.0371 26.2124 11.0371 24.7411V19.1096C11.0371 17.6383 11.5444 16.3953 12.5591 15.3806C13.5992 14.3406 14.8548 13.8205 16.3261 13.8205H33.1445C34.5905 13.8205 35.8334 14.3406 36.8735 15.3806C37.9135 16.3953 38.4336 17.6383 38.4336 19.1096ZM40.7859 13.8205H68.1824V18.8432H57.0336V41.217H51.9728V18.8432H40.7859V13.8205ZM75.8818 13.8205H92.7002C94.1461 13.8205 95.3891 14.3406 96.4291 15.3806C97.4692 16.3953 97.9892 17.6383 97.9892 19.1096V35.928C97.9892 37.3993 97.4692 38.655 96.4291 39.695C95.3891 40.7097 94.1461 41.217 92.7002 41.217H75.8818C74.4105 41.217 73.1548 40.7097 72.1147 39.695C71.1001 38.655 70.5927 37.3993 70.5927 35.928V19.1096C70.5927 17.6383 71.1001 16.3953 72.1147 15.3806C73.1548 14.3406 74.4105 13.8205 75.8818 13.8205ZM75.8818 36.1944H92.7002C92.8524 36.1944 92.9285 36.1056 92.9285 35.928V19.1096C92.9285 18.932 92.8524 18.8432 92.7002 18.8432H75.8818C75.7042 18.8432 75.6154 18.932 75.6154 19.1096V35.928C75.6154 36.1056 75.7042 36.1944 75.8818 36.1944ZM101.82 13.8586H123.89C125.361 13.8586 126.617 14.3786 127.657 15.4187C128.697 16.4587 129.217 17.7017 129.217 19.1476V26.5295C129.217 27.9754 128.697 29.2184 127.657 30.2584C126.617 31.2985 125.361 31.8185 123.89 31.8185L106.957 31.8566L106.843 31.8185V41.217H101.82V13.8586ZM124.156 26.5295V19.1476C124.156 18.9701 124.067 18.8813 123.89 18.8813H107.109C106.932 18.8813 106.843 18.9701 106.843 19.1476V26.5295C106.843 26.707 106.932 26.7958 107.109 26.7958H123.89C124.067 26.7958 124.156 26.707 124.156 26.5295Z" fill="#FD4D5D" />
                    <path d="M181.609 19.1476V26.5295C181.609 27.9754 181.089 29.2184 180.049 30.2584C179.009 31.2985 177.753 31.8185 176.282 31.8185H174.798L181.609 39.9233V41.217H176.13L168.215 31.8185H159.35H159.235V41.217H154.213V13.8586H176.282C177.753 13.8586 179.009 14.3786 180.049 15.4187C181.089 16.4587 181.609 17.7017 181.609 19.1476ZM159.502 26.7958H176.282C176.46 26.7958 176.549 26.707 176.549 26.5295V19.1476C176.549 18.9701 176.46 18.8813 176.282 18.8813H159.502C159.324 18.8813 159.235 18.9701 159.235 19.1476V26.5295C159.235 26.707 159.324 26.7958 159.502 26.7958ZM210.556 13.8205V18.8432H190.428V25.0074H206.637V30.0301H190.428V36.1944H210.556V41.217H185.367V13.8205H210.556ZM241.384 18.8432H219.353C219.175 18.8432 219.087 18.932 219.087 19.1096V35.928C219.087 36.1056 219.175 36.1944 219.353 36.1944H241.384V41.217H219.353C217.882 41.217 216.626 40.7097 215.586 39.695C214.571 38.655 214.064 37.3993 214.064 35.928V19.1096C214.064 17.6383 214.571 16.3953 215.586 15.3806C216.626 14.3406 217.882 13.8205 219.353 13.8205H241.384V18.8432ZM243.622 13.8205H271.019V18.8432H259.87V41.217H254.809V18.8432H243.622V13.8205Z" fill="white" />
                </svg>
            </a>
            <button class="navbar-toggler" style="outline:1px solid white;" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <!--<span class="navbar-toggler-icon " style=""></span>-->
                <i class="fa fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav" >

                    @if(!isset($is_register))
                        @if (!isset($user))
                            @include('auth.login')
                        @else
                            <li><a class="login-btn " style="" title="My Account" href="{{route('my-account')}}">Dashboard</a></li>
                            @if($user->isAdmin())
                                <li><a class="login-btn " style="" title="Promocodes" href="{{route('promocodes')}}">Promocodes</a></li>
                                <li><a class="login-btn " style="" title="Settings" href="{{route('settings')}}">Settings</a></li>
                                <li><a class="login-btn " style="" title="Settings" href="{{route('users')}}">Users</a></li>
                                <li><a class="login-btn " style="" title="Settings" href="{{route('subscriptions')}}">Subscriptions</a></li>
                                <li><a class="login-btn " style="" title="Log Out" href="{{route('logout')}}">Log Out</a></li>
                            @else
                                <li><a class="login-btn " style="" title="Payment History" href="{{route('payment-history')}}">Payment History</a></li>
                                <li><a class="login-btn " style="" title="Log Out" href="{{route('logout')}}">Log Out</a></li>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
@if($user->status !== config('constants.user_status_active') && $user->user_type !== 'ADM')
    <div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-danger alert-dismissible hideMe' ><button type='button' class='close' data-dismiss='alert'>&times;</button>Your Subscription has been Expired</div>
@endif