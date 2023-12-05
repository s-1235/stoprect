<!doctype html>
<html dir="ltr" lang="en-US">

<head>
    <title>Stop Rect</title>
    <link type="image/x-icon" rel="shortcut icon" href="public/assets/images/favicon.png" />
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <link type="text/css" rel="stylesheet" href="public/assets/font/stylesheet.css" />
    <link type="text/css" rel="stylesheet" href="public/assets/css/all.min.css" />
    <link type="text/css" rel="stylesheet" href="public/assets/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="public/assets/css/jquery.fancybox.min.css" />
    <link type="text/css" rel="stylesheet" href="public/assets/css/owl.carousel.min.css" />
    <link type="text/css" rel="stylesheet" href="public/assets/css/animate.css" />
    <link type="text/css" rel="stylesheet" href="public/assets/css/styles.css" />
    <link type="text/css" rel="stylesheet" href="public/assets/css/responsive.css" />
    <style>
        .prc{
            font-family: 'Montserrat';
            font-weight: 600;
            font-size: 37px;
            /*line-height: 60px;*/
            color: #DE106D;
            margin-bottom: 15px;
        }
    </style>
</head>



<?php



?>

<body>

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
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <svg width="273" height="53" viewBox="0 0 273 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="0.849121" width="140.643" height="51.4122" fill="white" />
                    <path d="M38.4336 19.1096V21.2024H33.3728V19.1096C33.3728 18.932 33.2967 18.8432 33.1445 18.8432H16.3261C16.1486 18.8432 16.0598 18.932 16.0598 19.1096V24.7411C16.0598 24.9187 16.1486 25.0074 16.3261 25.0074H33.1445C34.5905 25.0074 35.8334 25.5275 36.8735 26.5675C37.9135 27.5822 38.4336 28.8252 38.4336 30.2965V35.928C38.4336 37.3993 37.9135 38.655 36.8735 39.695C35.8334 40.7097 34.5905 41.217 33.1445 41.217H16.3261C14.8548 41.217 13.5992 40.7097 12.5591 39.695C11.5444 38.655 11.0371 37.3993 11.0371 35.928V33.8352H16.0598V35.928C16.0598 36.1056 16.1486 36.1944 16.3261 36.1944H33.1445C33.2967 36.1944 33.3728 36.1056 33.3728 35.928V30.2965C33.3728 30.1189 33.2967 30.0301 33.1445 30.0301H16.3261C14.8548 30.0301 13.5992 29.5228 12.5591 28.5081C11.5444 27.4681 11.0371 26.2124 11.0371 24.7411V19.1096C11.0371 17.6383 11.5444 16.3953 12.5591 15.3806C13.5992 14.3406 14.8548 13.8205 16.3261 13.8205H33.1445C34.5905 13.8205 35.8334 14.3406 36.8735 15.3806C37.9135 16.3953 38.4336 17.6383 38.4336 19.1096ZM40.7859 13.8205H68.1824V18.8432H57.0336V41.217H51.9728V18.8432H40.7859V13.8205ZM75.8818 13.8205H92.7002C94.1461 13.8205 95.3891 14.3406 96.4291 15.3806C97.4692 16.3953 97.9892 17.6383 97.9892 19.1096V35.928C97.9892 37.3993 97.4692 38.655 96.4291 39.695C95.3891 40.7097 94.1461 41.217 92.7002 41.217H75.8818C74.4105 41.217 73.1548 40.7097 72.1147 39.695C71.1001 38.655 70.5927 37.3993 70.5927 35.928V19.1096C70.5927 17.6383 71.1001 16.3953 72.1147 15.3806C73.1548 14.3406 74.4105 13.8205 75.8818 13.8205ZM75.8818 36.1944H92.7002C92.8524 36.1944 92.9285 36.1056 92.9285 35.928V19.1096C92.9285 18.932 92.8524 18.8432 92.7002 18.8432H75.8818C75.7042 18.8432 75.6154 18.932 75.6154 19.1096V35.928C75.6154 36.1056 75.7042 36.1944 75.8818 36.1944ZM101.82 13.8586H123.89C125.361 13.8586 126.617 14.3786 127.657 15.4187C128.697 16.4587 129.217 17.7017 129.217 19.1476V26.5295C129.217 27.9754 128.697 29.2184 127.657 30.2584C126.617 31.2985 125.361 31.8185 123.89 31.8185L106.957 31.8566L106.843 31.8185V41.217H101.82V13.8586ZM124.156 26.5295V19.1476C124.156 18.9701 124.067 18.8813 123.89 18.8813H107.109C106.932 18.8813 106.843 18.9701 106.843 19.1476V26.5295C106.843 26.707 106.932 26.7958 107.109 26.7958H123.89C124.067 26.7958 124.156 26.707 124.156 26.5295Z" fill="#FD4D5D" />
                    <path d="M181.609 19.1476V26.5295C181.609 27.9754 181.089 29.2184 180.049 30.2584C179.009 31.2985 177.753 31.8185 176.282 31.8185H174.798L181.609 39.9233V41.217H176.13L168.215 31.8185H159.35H159.235V41.217H154.213V13.8586H176.282C177.753 13.8586 179.009 14.3786 180.049 15.4187C181.089 16.4587 181.609 17.7017 181.609 19.1476ZM159.502 26.7958H176.282C176.46 26.7958 176.549 26.707 176.549 26.5295V19.1476C176.549 18.9701 176.46 18.8813 176.282 18.8813H159.502C159.324 18.8813 159.235 18.9701 159.235 19.1476V26.5295C159.235 26.707 159.324 26.7958 159.502 26.7958ZM210.556 13.8205V18.8432H190.428V25.0074H206.637V30.0301H190.428V36.1944H210.556V41.217H185.367V13.8205H210.556ZM241.384 18.8432H219.353C219.175 18.8432 219.087 18.932 219.087 19.1096V35.928C219.087 36.1056 219.175 36.1944 219.353 36.1944H241.384V41.217H219.353C217.882 41.217 216.626 40.7097 215.586 39.695C214.571 38.655 214.064 37.3993 214.064 35.928V19.1096C214.064 17.6383 214.571 16.3953 215.586 15.3806C216.626 14.3406 217.882 13.8205 219.353 13.8205H241.384V18.8432ZM243.622 13.8205H271.019V18.8432H259.87V41.217H254.809V18.8432H243.622V13.8205Z" fill="white" />
                </svg>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <svg class="ham hamRotate ham7" viewBox="0 0 100 100" width="50" onclick="this.classList.toggle('active')">
                            <path class="line top" d="m 70,33 h -40 c 0,0 -6,1.368796 -6,8.5 0,7.131204 6,8.5013 6,8.5013 l 20,-0.0013" />
                            <path class="line middle" d="m 70,50 h -40" />
                            <path class="line bottom" d="m 69.575405,67.073826 h -40 c -5.592752,0 -6.873604,-9.348582 1.371031,-9.348582 8.244634,0 19.053564,21.797129 19.053564,12.274756 l 0,-40" />
                        </svg>
                    </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav menu-navs">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#feature">Feature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#instructions">Instruction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#prices">Pricing</a>
                    </li>
                </ul>
                <ul class="navbar-nav btns-ul ms-auto">
                    @if (!$user)
                       @include('auth.login')
                   @else
                        <li><a class="btn login-btn" title="Log Out" href="{{route('logout')}}">Log Out</a></li>
                        <li><a class="btn sign-btn" title="My Account" href="{{route('my-account')}}">My Account</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>




<!-- As featured in -->
<section class="featured-secton" id="feature">
    <div class="container">
        <h3 class="wow fadeInUp">As featured in</h3>
        <span class="featured-owl-span"></span>
        <div class="owl-carousel owl-theme wow fadeInUp" id="featured-owl">
            <div class="item">
                <div class="client-box">
                    <img src="public/assets/images/client-01.png" alt="">
                </div>
            </div>
            <div class="item">
                <div class="client-box">
                    <img src="public/assets/images/client-02.png" alt="">
                </div>
            </div>
            <div class="item">
                <div class="client-box">
                    <img src="public/assets/images/client-03.png" alt="">
                </div>
            </div>
            <div class="item">
                <div class="client-box">
                    <img src="public/assets/images/client-04.png" alt="">
                </div>
            </div>
            <div class="item">
                <div class="client-box">
                    <img src="public/assets/images/client-05.png" alt="">
                </div>
            </div>
            <div class="item">
                <div class="client-box">
                    <img src="public/assets/images/client-01.png" alt="">
                </div>
            </div>
            <div class="item">
                <div class="client-box">
                    <img src="public/assets/images/client-02.png" alt="">
                </div>
            </div>
            <div class="item">
                <div class="client-box">
                    <img src="public/assets/images/client-03.png" alt="">
                </div>
            </div>
            <div class="item">
                <div class="client-box">
                    <img src="public/assets/images/client-04.png" alt="">
                </div>
            </div>
            <div class="item">
                <div class="client-box">
                    <img src="public/assets/images/client-05.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->
<footer>
    <div class="container">
        <ul class="social-icons">
            <li class="wow fadeInUp">
                <a class="facebook-icon" href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li class="wow fadeInUp">
                <a class="twitter-icon" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
            <li class="wow fadeInUp">
                <a class="dribble-icon" href="#">
                    <i class="fab fa-dribbble"></i>
                </a>
            </li>
        </ul>
        <div class="copyright-wrap wow fadeInUp">
            <ul class="language-location">
                <li>
                    <a href="#">
                            <span>
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.28418 9.73637L9.08123 9.82239L8.99508 10.0253L5.95273 17.1903C5.73294 17.6771 5.09036 17.6623 4.90726 17.1368L0.564629 1.9509C0.454079 1.48784 0.845795 1.09479 1.31128 1.20577L16.5105 5.54461C16.7742 5.63631 16.8964 5.83997 16.9028 6.04588C16.9091 6.24747 16.8019 6.51728 16.4433 6.70184L9.28418 9.73637Z" stroke="#189BE9" stroke-width="1.09052" />
                                </svg>
                            </span>
                        San Francisco
                    </a>
                </li>
                <li>
                    <a href="#">
                            <span>
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.30417 12.0027H6.07831L5.91861 12.1624L1.39682 16.6842V2.73329C1.39682 1.8294 2.12872 1.09751 3.0326 1.09751H16.1189C17.0227 1.09751 17.7546 1.8294 17.7546 2.73329V10.3669C17.7546 11.2708 17.0227 12.0027 16.1189 12.0027H6.30417Z" stroke="#189BE9" stroke-width="1.09052" />
                                </svg>
                            </span>
                        English
                    </a>
                </li>
            </ul>
            <a href="#" class="copyright-close">By using this site you agree to our <strong>Cookie Policy</strong>
                <i class="far fa-times"></i></a>
            <p class="copyright">© Copyright 2021</p>
        </div>
        <div class="contact-info wow fadeInUp">
            <ul>
                <li>
                    <a href="#">
                            <span>
                                <svg width="18" height="25" viewBox="0 0 18 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.68966 0.222656C4.0267 0.222656 0 4.25456 0 9.06476C0 11.9249 0.754653 13.1412 4.16259 18.6336L4.16271 18.6338C4.91493 19.8462 5.79642 21.2668 6.82759 22.9595C7.97137 24.5762 10.0296 24.5746 11.1724 22.9595C12.2037 21.2667 13.0852 19.8459 13.8374 18.6336L13.8375 18.6334C17.2473 13.1379 18 11.9247 18 9.06476C18 4.24936 13.9681 0.222656 8.68966 0.222656ZM6.213 17.4476L6.21297 17.4476C2.97889 12.3864 2.48276 11.61 2.48276 9.69634C2.48276 5.78329 5.53957 2.74897 9.31034 2.74897C13.0811 2.74897 16.1379 5.78329 16.1379 9.69634C16.1379 11.6048 15.6823 12.3183 12.4151 17.4343C11.5779 18.7451 10.5562 20.3449 9.31034 22.3279C8.06892 20.352 7.0494 18.7565 6.213 17.4476ZM8.68966 5.27529C6.63286 5.27529 4.96552 6.97188 4.96552 9.06476C4.96552 11.1576 6.63286 12.8542 8.68966 12.8542C10.7465 12.8542 12.4138 11.1576 12.4138 9.06476C12.4138 6.97188 10.7465 5.27529 8.68966 5.27529Z" fill="#FD7076" />
                                </svg>
                            </span>
                        <p>325 Manchester Road</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                            <span>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.6842 0.22275L23.1052 1.48591C24.3157 1.52075 25 2.38345 25 3.38064C25 14.93 15.64 24.2274 4.15786 24.2227C3.15838 24.2227 2.29597 23.5382 2.26312 22.328L0.999966 17.907C0.824238 17.129 1.3445 16.0975 2.26312 15.3806L7.31575 13.4859C7.93447 13.275 8.96562 13.5281 9.84207 14.1175L11.1052 16.0122C13.5542 14.8034 15.579 12.778 16.7894 10.328L14.8947 9.06486C14.3088 8.18788 14.0557 7.1564 14.2631 6.53854L16.1579 1.48591C16.8773 0.568977 17.9085 0.0438586 18.6842 0.22275ZM3.52628 17.907L4.78944 22.328C14.762 22.2809 23.0581 13.9848 23.1052 4.01222L18.6842 2.74907L16.7894 7.17012L19.9473 9.69643C17.8713 14.6632 15.431 17.0941 10.4736 19.1701L7.94733 16.0122L3.52628 17.907Z" fill="#FD7076" />
                                </svg>
                            </span>
                        <p>+1-202-555-0109</p>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#">
                            <span>
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 0.222656C5.37097 0.222656 0 5.59362 0 12.2227C0 18.8517 5.37097 24.2227 12 24.2227C18.629 24.2227 24 18.8517 24 12.2227C24 5.59362 18.629 0.222656 12 0.222656ZM12.3158 22.3279C6.9071 22.3279 2.52632 17.9471 2.52632 12.5384C2.52632 7.12976 6.9071 2.74897 12.3158 2.74897C17.7245 2.74897 22.1053 7.12976 22.1053 12.5384C22.1053 17.9471 17.7245 22.3279 12.3158 22.3279ZM10.9791 13.5706L15.1773 16.5335C15.4443 16.7207 15.8152 16.6631 16.008 16.4086L16.9377 15.1649C17.1305 14.9056 17.0761 14.5454 16.8091 14.3581L13.506 12.0244V5.21995C13.506 4.90302 13.2389 4.64371 12.9126 4.64371H11.3302C11.0039 4.64371 10.7368 4.90302 10.7368 5.21995V13.1048C10.7368 13.2873 10.8258 13.4602 10.9791 13.5706Z" fill="#FD7076" />
                                </svg>
                            </span>
                        <p>9 - 12, Mon - Tue</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                            <span>
                                <svg width="31" height="25" viewBox="0 0 31 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M27.7368 0.222656H3.26316C1.30115 0.222656 0 1.56578 0 3.533V20.9123C0 22.8795 1.30115 24.2227 3.26316 24.2227H27.7368C29.6988 24.2227 31 22.8795 31 20.9123V3.533C31 1.56578 29.6988 0.222656 27.7368 0.222656ZM28.5526 3.533V6.01576L28.309 6.20897C26.9314 7.30135 24.7506 9.03065 20.3947 12.6364C20.0403 12.8342 19.5738 13.1847 19.0726 13.5613C18.0923 14.2979 16.9797 15.1339 16.3158 15.1192C14.9722 15.1358 13.5141 14.0918 12.4216 13.3096C12.0353 13.033 11.6947 12.7891 11.4211 12.6364C7.06876 9.03353 4.8875 7.30385 3.50953 6.21116L3.50952 6.21115L3.26316 6.01576V3.533H28.5526ZM3.26316 9.3261V20.9123H28.5526V9.3261C27.1596 10.4655 25.1836 12.0648 22.0263 14.2916C20.8022 15.5937 18.5047 17.9303 16.3158 17.602C13.2982 17.9303 10.9713 15.5593 9.78947 14.2916C6.63158 12.0642 4.65615 10.4654 3.26316 9.3261Z" fill="#FD7076" />
                                </svg>
                            </span>
                        <p>hellokraft8@gmail.com</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
<a onclick="topFunction()" id="myBtn" title="Go to top" style="display: block;"></a>

<!-- Optional JavaScript -->
<script src="public/assets/js/jquery.min.js"></script>
<script src="public/assets/js/bootstrap.bundle.min.js"></script>
<script src="public/assets/js/jquery.fancybox.min.js"></script>
<script src="public/assets/js/owl.carousel.min.js"></script>
<script src="public/assets/js/wow.js"></script>
<script src="public/assets/js/custom.js"></script>

<script>
    $(document).ready(function() {

        $(".hideMe").slideUp(3000);

    });
</script>

</body>

</html>