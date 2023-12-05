<html dir="ltr" lang="en-US">

<head>
    <title>Stop Rect</title>
    <link type="image/x-icon" rel="shortcut icon" href="public/assets/images/favicon.png" />
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:title" content="Stoprect" />
    <meta property="og:description" content="Trading crypto and getting RECT?" />
    <meta property="og:image" content="https://www.stoprect.com/assets/images/stoprecthome.png" />
    <meta property="og:url" content="https://www.stoprect.com/" />
    
    <!-- Twitter -->
    <meta name="twitter:card" content="Stoprect">
    <meta name="twitter:title" content="Stoprect">
    <meta name="twitter:description" content="Trading crypto and getting RECT?">
    <meta name="twitter:image" content="https://www.stoprect.com/assets/images/stoprecthome.png">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" > -->
    

    <link type="text/css" rel="stylesheet" href="/assets/font/stylesheet1.css" />
    <!-- <link type="text/css" rel="stylesheet" href="/assets/css/all.min.css" /> -->
    <!-- <link type="text/css" rel="stylesheet" href="/assets/css/bootstrap.min.css"  /> -->
    <!-- <link type="text/css" rel="stylesheet" href="/assets/css/jquery.fancybox.min.css" /> -->
    <link type="text/css" rel="stylesheet" href="/assets/css/owl.carousel.min.css" />
    <!-- <link type="text/css" rel="stylesheet" href="/assets/css/animate.css" /> -->
    <!-- <link type="text/css" rel="stylesheet" href="/assets/css/styles3.css" /> -->
    <!-- <link type="text/css" rel="stylesheet" href="/assets/css/responsive.css" /> -->
    <!-- <link type="text/css" rel="stylesheet" href="/assets/css/main-page-style.css" /> -->
    <!-- <link type="text/css" rel="stylesheet" href="assets/css/style_update_section.css" /> -->
    <link type="text/css" rel="stylesheet" href="/assets/css/bootstrap1.min.css">
    <link type="text/css" rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <link type="text/css" rel="stylesheet" href="/assets/css/fontawesome.min.css">
    <!--<link type="text/css" rel="stylesheet" href="/assets/css/style1.min.css">-->
    <link type="text/css" rel="stylesheet" href="/assets/css/style.min.css">
    
{{--    <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="9ae453d0-b118-43ce-bf84-4b892aac1d98" data-blockingmode="auto" type="text/javascript"></script>--}}
 
    <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="a02a0222-dea9-4e9e-9009-2b755961f28d" data-blockingmode="auto" type="text/javascript"></script>
</head>

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
@if ($errors->any())

    @foreach ($errors->all() as $error)
        <div style='font-size: 18px;z-index:1000;padding-bottom:35px;' class='alert alert-danger alert-dismissible hideMe' >
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            {{$error}}
        </div>
        <br>
    @endforeach
      
@endif

<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-3">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">
                <img class="logo" src="assets/img/logo.svg" alt="Stoprect logo">
            </a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarNav" class="collapse navbar-collapse">
                <ul class="navbar-nav gap-5 nav-menu">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link text-white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#feature" class="nav-link text-white">Feature</a>
                    </li>
                    <li class="nav-item">
                        <a href="#instructions" class="nav-link text-white">Instructions</a>
                    </li>
                    <li class="nav-item">
                        <a href="#pricingSection" class="nav-link text-white">Pricing</a>
                    </li>
                </ul>
                <ul class="navbar-nav" >
                    @if (!$user)
                        @include('auth.login')
                    @else
                        <li><a class="btn btn-light text-primary rounded-pill px-4 shadow-sm d-lg-block my-btn" title="My Account" href="{{route('my-account')}}">My Account</a></li>

                        <li><a class="btn btn-light text-primary rounded-pill px-4 shadow-sm d-lg-block my-btn" title="Log Out" href="{{route('logout')}}">Log Out</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <section id="heroSection">
    
        <div class="container">
        
            <div class="row align-items-center">
                <div class="col-10 col-lg-5">
                    <h2 class="text-white display-4 fw-bold pt-10">Trading <br>
                        crypto and <br>
                        gettingRECT?
                    </h2>
                </div>
                <div class="col-lg-7" >
                    <div class="hero-frame " >
                        <div class="owl-carousel">
                            
                            <div class="owl-item">
                                <img src="assets/images/newimage.png" alt="Slide">
                            </div>
                            <div class="owl-item">
                                <img src="assets/images/frame26.png" alt="Slide">
                            </div>
                            <!--<div class="owl-item">-->
                            <!--    <img src="assets/images/hero-slider-03.webp" alt="Slide">-->
                            <!--</div>-->
                            <div class="owl-item">
                                <img src="assets/images/pitch.png" alt="Slide">
                            </div>
                            <div class="owl-item">
                                <img src="assets/images/hero-slider-04.webp" alt="Slide">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="stopSection">
        <div class="container" >
            <div class="col-md-10 col-lg-6 mx-auto my-5">
                <div class="ps-4 section-header">
                    <img class="img-fluid w-50" src="assets/img/stop-text.svg" alt="">
                    <p class="pt-5 fs-5 text-uppercase fw-bolder">IS A COPY-PASTE TRADING PLATFORM <br> THAT YOU CAN
                        FOLLOW </p>
                </div>
            </div>
            <div class="col-10 mx-auto">
                <div class="row blur-bg">
                    <div class="col-lg-6">
                        <div class="stop_blk">
                            <img class="img-fluid" src="assets/images/chart-1.webp" alt="chart">
                        </div>
                        <div class="stop_blk">
                            <img class="img-fluid" src="assets/images/chart-3.webp" alt="chart">
                        </div>
                        <div class="stop_blk">
                            <img class="img-fluid" src="assets/images/chart-5.webp" alt="chart">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="stop_blk">
                            <img class="img-fluid" src="assets/images/chart-2.webp" alt="chart">
                        </div>
                        <div class="stop_blk">
                            <img class="img-fluid" src="assets/images/chart-4.webp" alt="chart">
                        </div>
                        <div class="stop_blk">
                            <img class="img-fluid" src="assets/images/chart-6.webp" alt="chart">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="launchSection">
        <div class="container" >
            <div class="col-10 mx-auto">
                <div class="blur-bg" style="min-height: 638px;border-radius: 50px;">
                    <div class="d-flex gap-2 align-items-center">
                        <img class="img-fluid w-25" src="assets/img/bitcoin.png" alt=""> <span class="fs-3 fw-bold"><h2 class="fw-bold fs-small" style="text-align: center;">Crypto Fear & Greed Index Tracker</h2></span>
                    </div>
                    <div class="content-flex" style="display:flex;margin-top: 20px;">
                        <div class="table-container blur-bg1" id="resultTable" style="
                        border-radius: 0.7rem;
                        width: 60%;
                        margin-left: 1.5rem;
                        width: 60%;">
                          <table class="fw-bolder" style="text-align: center;
                          width: 100%;
                          height: 21rem;">
                            <thead>
                              <tr>
                                <th class="table-head">Timeframe</th>
                                <th class="table-head">Condition</th>
                                <th class="table-head">Greed Index</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                            </tbody>
                          </table>
                        </div>
                        <div class="prices">
                          <div class="prices-first blur-bg1">
                            <h3 class="current-price">Current price</h3>
                            <h1 class="coin-price">$26892.31</h1>
                          </div>
                          <div class="prices-two blur-bg1">
                            <h3 class="average-heading">Average</h3>
                            <h1 class="average-value">47</h1>
                            <h6 class="average-sub-heading" style="color: rgb(200, 193, 26);">NEUTRAL</h6>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
    @include('forms.form-subscriptions')

    <!---------coin_move Section START ---------->
    <section id="coinSection">
        <div class="container">
            <div class="d-flex flex-column align-items-center col-11 col-md-8 col-lg-4 mx-auto">
                <div class="blur-bg mb-4 text-center py-3" style="min-height: 100px;margin-top: -1rem;">
                    <h2 class=" fs-1 fw-bold " style="padding-top: 20px;">Coin On The Move</h2>
                </div>
                <div class="blur-bg d-flex flex-column align-items-center" style="min-height: 400px;margin-top: -1px;">
                    <div class="d-flex gap-2 align-items-center">
                        <img class="img-fluid w-25" src="assets/img/dogecoin-doge-logo.svg" alt=""> <span
                            class="fs-3 fw-bold">Dogecoin DOGE</span>
                    </div>
                    <a class="btn rounded-pill shadow-sm m-3" href="#">long</a>
                    <ul class="list-unstyled py-3">
                        <li class="large fw-semibold">Our Entry Point <b>$0.06</b></li>
                        <li class="large fw-semibold">Our Stop Loss <b>$0.05</b></li>
                    </ul>
                    <div class="d-flex flex-column small">
                        <span class="small fw-semibold">Date : October 17</span>
                        <span class="small fst-italic fw-semibold">By Jonas Paulius</span>
                    </div>
                    <hr class="w-100">
                    <a class="small text-black-50 text-decoration-none fw-semibold" href="#" >Further Information</a>
                </div>
                <a href="#" class="down_arrow"><i class="fas fa-caret-down"></i></a>
            </div>
        </div>
    </section>
    <!---------coin_move Section End ---------->


    <!---------contact Section START ---------->
    <section id="contactSection">
        <div class="container">
            <div class="contact-text">
                <h2 class="fs-medium fw-bold">Got Some <span class="text-primary">CRYPTO TORQUE ?</span></h2>
                <h2 class="fs-medium fw-bold">Got Some <span class="text-primary">EARLY BIRD NEWS ?</span></h2>
            </div>
            <div class="d-flex flex-column align-self-end align-items-end  col-md-8">
                <div class="contact-imgs d-flex w-110 px-5">
                    <div>
                        <img class="img-fluid" src="assets/img/photo_1.png" alt="">
                    </div>
                    <div>
                        <img class="img-fluid" src="assets/img/photo_2.png" alt="">
                    </div>
                    <div>
                        <img class="img-fluid" src="assets/img/photo_3.png" alt="">
                    </div>
                    <div>
                        <img class="img-fluid" src="assets/img/photo_4.png" alt="">
                    </div>
                    <div>
                        <img class="img-fluid" src="assets/img/photo_5.png" alt="">
                    </div>
                </div>
                <a href="#" class="btn btn-primary rounded-pill text-white fw-bold fs-5 w-30 py-3 ">Contact Now</a>
            </div>
        </div>
    </section>
    <!---------contact Section End ---------->
</main>

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
                                <svg width="31" height="25" viewBox="0 0 31 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M27.7368 0.222656H3.26316C1.30115 0.222656 0 1.56578 0 3.533V20.9123C0 22.8795 1.30115 24.2227 3.26316 24.2227H27.7368C29.6988 24.2227 31 22.8795 31 20.9123V3.533C31 1.56578 29.6988 0.222656 27.7368 0.222656ZM28.5526 3.533V6.01576L28.309 6.20897C26.9314 7.30135 24.7506 9.03065 20.3947 12.6364C20.0403 12.8342 19.5738 13.1847 19.0726 13.5613C18.0923 14.2979 16.9797 15.1339 16.3158 15.1192C14.9722 15.1358 13.5141 14.0918 12.4216 13.3096C12.0353 13.033 11.6947 12.7891 11.4211 12.6364C7.06876 9.03353 4.8875 7.30385 3.50953 6.21116L3.50952 6.21115L3.26316 6.01576V3.533H28.5526ZM3.26316 9.3261V20.9123H28.5526V9.3261C27.1596 10.4655 25.1836 12.0648 22.0263 14.2916C20.8022 15.5937 18.5047 17.9303 16.3158 17.602C13.2982 17.9303 10.9713 15.5593 9.78947 14.2916C6.63158 12.0642 4.65615 10.4654 3.26316 9.3261Z" fill="#FD7076" />
                                </svg>
                            </span>
                        support@stoprect.com
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
            <p class="copyright">Â© Copyright 2021</p>
        </div>
        <div class="footer-img"><img src="assets/images/monkeys.png" alt="Sticky Image" style="width:380px;"></div>
        <div class="contact-info wow fadeInUp">
            <ul>
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                            <span>--}}
{{--                                <svg width="18" height="25" viewBox="0 0 18 25" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.68966 0.222656C4.0267 0.222656 0 4.25456 0 9.06476C0 11.9249 0.754653 13.1412 4.16259 18.6336L4.16271 18.6338C4.91493 19.8462 5.79642 21.2668 6.82759 22.9595C7.97137 24.5762 10.0296 24.5746 11.1724 22.9595C12.2037 21.2667 13.0852 19.8459 13.8374 18.6336L13.8375 18.6334C17.2473 13.1379 18 11.9247 18 9.06476C18 4.24936 13.9681 0.222656 8.68966 0.222656ZM6.213 17.4476L6.21297 17.4476C2.97889 12.3864 2.48276 11.61 2.48276 9.69634C2.48276 5.78329 5.53957 2.74897 9.31034 2.74897C13.0811 2.74897 16.1379 5.78329 16.1379 9.69634C16.1379 11.6048 15.6823 12.3183 12.4151 17.4343C11.5779 18.7451 10.5562 20.3449 9.31034 22.3279C8.06892 20.352 7.0494 18.7565 6.213 17.4476ZM8.68966 5.27529C6.63286 5.27529 4.96552 6.97188 4.96552 9.06476C4.96552 11.1576 6.63286 12.8542 8.68966 12.8542C10.7465 12.8542 12.4138 11.1576 12.4138 9.06476C12.4138 6.97188 10.7465 5.27529 8.68966 5.27529Z" fill="#FD7076" />--}}
{{--                                </svg>--}}
{{--                            </span>--}}
{{--                        <p>325 Manchester Road</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                            <span>--}}
{{--                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.6842 0.22275L23.1052 1.48591C24.3157 1.52075 25 2.38345 25 3.38064C25 14.93 15.64 24.2274 4.15786 24.2227C3.15838 24.2227 2.29597 23.5382 2.26312 22.328L0.999966 17.907C0.824238 17.129 1.3445 16.0975 2.26312 15.3806L7.31575 13.4859C7.93447 13.275 8.96562 13.5281 9.84207 14.1175L11.1052 16.0122C13.5542 14.8034 15.579 12.778 16.7894 10.328L14.8947 9.06486C14.3088 8.18788 14.0557 7.1564 14.2631 6.53854L16.1579 1.48591C16.8773 0.568977 17.9085 0.0438586 18.6842 0.22275ZM3.52628 17.907L4.78944 22.328C14.762 22.2809 23.0581 13.9848 23.1052 4.01222L18.6842 2.74907L16.7894 7.17012L19.9473 9.69643C17.8713 14.6632 15.431 17.0941 10.4736 19.1701L7.94733 16.0122L3.52628 17.907Z" fill="#FD7076" />--}}
{{--                                </svg>--}}
{{--                            </span>--}}
{{--                        <p>+1-202-555-0109</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
            <ul>
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                            <span>--}}
{{--                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 0.222656C5.37097 0.222656 0 5.59362 0 12.2227C0 18.8517 5.37097 24.2227 12 24.2227C18.629 24.2227 24 18.8517 24 12.2227C24 5.59362 18.629 0.222656 12 0.222656ZM12.3158 22.3279C6.9071 22.3279 2.52632 17.9471 2.52632 12.5384C2.52632 7.12976 6.9071 2.74897 12.3158 2.74897C17.7245 2.74897 22.1053 7.12976 22.1053 12.5384C22.1053 17.9471 17.7245 22.3279 12.3158 22.3279ZM10.9791 13.5706L15.1773 16.5335C15.4443 16.7207 15.8152 16.6631 16.008 16.4086L16.9377 15.1649C17.1305 14.9056 17.0761 14.5454 16.8091 14.3581L13.506 12.0244V5.21995C13.506 4.90302 13.2389 4.64371 12.9126 4.64371H11.3302C11.0039 4.64371 10.7368 4.90302 10.7368 5.21995V13.1048C10.7368 13.2873 10.8258 13.4602 10.9791 13.5706Z" fill="#FD7076" />--}}
{{--                                </svg>--}}
{{--                            </span>--}}
{{--                        <p>9 - 12, Mon - Tue</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                            <span>--}}
{{--                                <svg width="31" height="25" viewBox="0 0 31 25" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M27.7368 0.222656H3.26316C1.30115 0.222656 0 1.56578 0 3.533V20.9123C0 22.8795 1.30115 24.2227 3.26316 24.2227H27.7368C29.6988 24.2227 31 22.8795 31 20.9123V3.533C31 1.56578 29.6988 0.222656 27.7368 0.222656ZM28.5526 3.533V6.01576L28.309 6.20897C26.9314 7.30135 24.7506 9.03065 20.3947 12.6364C20.0403 12.8342 19.5738 13.1847 19.0726 13.5613C18.0923 14.2979 16.9797 15.1339 16.3158 15.1192C14.9722 15.1358 13.5141 14.0918 12.4216 13.3096C12.0353 13.033 11.6947 12.7891 11.4211 12.6364C7.06876 9.03353 4.8875 7.30385 3.50953 6.21116L3.50952 6.21115L3.26316 6.01576V3.533H28.5526ZM3.26316 9.3261V20.9123H28.5526V9.3261C27.1596 10.4655 25.1836 12.0648 22.0263 14.2916C20.8022 15.5937 18.5047 17.9303 16.3158 17.602C13.2982 17.9303 10.9713 15.5593 9.78947 14.2916C6.63158 12.0642 4.65615 10.4654 3.26316 9.3261Z" fill="#FD7076" />--}}
{{--                                </svg>--}}
{{--                            </span>--}}
{{--                        <p>support@stoprect.com</p> --}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</footer>
<a onclick="topFunction()" id="myBtn" title="Go to top" style="display: block;"></a>


<!-- Head script -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Optional JavaScript -->

<script src="public/assets/js/jquery.min.js"></script>
<script src="public/assets/js/jquery.fancybox.min.js"></script>
<script src="public/assets/js/bootstrap.min.js"></script>
<script src="public/assets/js/owl.carousel.min.js"></script>
<script src="public/assets/js/wow.js"></script>
<script src="public/assets/js/plan-section.js"></script>
<script src="public/assets/js/timer.js"></script>
<script src="public/assets/js/main.js"></script>
<!-- <script src="public/assets/js/custom.js"></script> -->

<script>
    $(document).ready(function() {
        $(".hideMe").slideUp(10000);
    });
    $('.btn-toggle').click(function () {
        $(this).find('.btn').toggleClass('active');

        if ($(this).find('.btn-primary').length > 0) {
            $(this).find('.btn').toggleClass('btn-primary');
        }
        if ($(this).find('.btn-danger').length > 0) {
            $(this).find('.btn').toggleClass('btn-danger');
        }
        if ($(this).find('.btn-success').length > 0) {
            $(this).find('.btn').toggleClass('btn-success');
        }
        if ($(this).find('.btn-info').length > 0) {
            $(this).find('.btn').toggleClass('btn-info');
        }

        $(this).find('.btn').toggleClass('btn-default');

    });

    // $('form').submit(function () {
    //     alert($(this["options"]).val());
    //     return false;
    // });

    let totalValue = 0;
        let completedRequests = 0;
        const sequence = ['1h', '2h', '4h', '12h', '1d', '1w'];
        $.getJSON('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd', function(data) {
            const bitcoinPrice = data.bitcoin.usd;
            $(".coin-price").html("$"+bitcoinPrice);
            console.log('Current Bitcoin Price in USD:', bitcoinPrice);
            }).fail(function(error) {
            console.error('Error fetching Bitcoin price:', error);
            });

        
        function fetchResultsByInterval(interval,index) {
        const apiUrl = `https://api.taapi.io/rsi?secret=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjbHVlIjoiNjJhMDdjNDY2YzI4YjU1Y2Q1ZDdmM2JkIiwiaWF0IjoxNjkxOTA3NjYxLCJleHAiOjMzMTk2MzcxNjYxfQ.nwmLmZCtVknQurxHgLgFspOzrl1JENeERlp5eih_Vhw&exchange=binance&symbol=ETH/USDT&interval=${interval}`;

            $.getJSON(apiUrl, function(data) {
                
                var fearvalue = fearindex(data.value);
                var newRowContent = `<tr><td style="font-family: Bahnschrift;font-style: normal;font-weight: 700;">${interval}</td><td style="font-family: Bahnschrift;font-style: normal;font-weight: 700;">${fearvalue}</td><td style="font-family: Bahnschrift;font-style: normal;font-weight: 700;">${data.value}</td></tr>`;
                $("#resultTable tbody").append(newRowContent);
                
                totalValue += data.value;
                completedRequests++;
                if (completedRequests < sequence.length) {
                    fetchResultsByInterval(sequence[completedRequests]);
                } else {
                console.log('All data fetched and inserted into the table.');
                }
                if (completedRequests === sequence.length) {
                // Last iteration, print the total 
                    let average = totalValue / 6;
                    $(".prices-two .average-value").html(average.toFixed(2));
                    $(".prices-two .average-sub-heading").html(fearindex(average.toFixed(2)));
                }

            }).fail(function(error) {
                console.error('Error fetching results:', error);
            });
        }
        console.log(sequence.length)
        fetchResultsByInterval(sequence[completedRequests],completedRequests);
        
        function fearindex(data){
            var fearvalue = "";
            if(data >= 0 && data < 25){
                fearvalue = "Extreme Fear";
            }
            else if(data >= 25 && data < 50){
                fearvalue = "Fear";
            }else if(data >= 50 && data < 75){
                fearvalue = "Greed";
            }else if(data >= 75 && data <= 100){
                fearvalue = "Extreme Greed";
            }
            return fearvalue;
        }
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/64233c2a31ebfa0fe7f5343b/1gskq6283';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
 
 
<!-- Cookie Consent by FreePrivacyPolicy.com https://www.FreePrivacyPolicy.com -->
{{--<script type="text/javascript" src="//www.freeprivacypolicy.com/public/cookie-consent/4.0.0/cookie-consent.js" charset="UTF-8"></script>--}}
{{--<script src="public/assets/js/cookie/load.js"></script>--}}
{{--<script id="CookieDeclaration" src="https://consent.cookiebot.com/a02a0222-dea9-4e9e-9009-2b755961f28d/cd.js" type="text/javascript" async></script>--}}
{{--<script type="text/javascript" charset="UTF-8">--}}
{{--    document.addEventListener('DOMContentLoaded', function () {--}}
{{--        cookieconsent.run({"notice_banner_type":"standalone","consent_type":"express","palette":"light","language":"en","page_load_consent_levels":["strictly-necessary"],"notice_banner_reject_button_hide":false,"preferences_center_close_button_hide":false,"page_refresh_confirmation_buttons":false,"website_name":"stoprect.com","website_privacy_policy_url":"https://stoprect.com"});--}}
{{--    });--}}
{{--</script>--}}
<!-- Cookie Consent by FreePrivacyPolicy.com https://www.FreePrivacyPolicy.com -->
{{--<script type="text/javascript" src="//www.freeprivacypolicy.com/public/cookie-consent/4.0.0/cookie-consent.js" charset="UTF-8"></script>--}}
{{--<script type="text/javascript" charset="UTF-8">--}}
{{--    document.addEventListener('DOMContentLoaded', function () {--}}
{{--        cookieconsent.run({"notice_banner_type":"simple","consent_type":"express","palette":"light","language":"en","page_load_consent_levels":["strictly-necessary"],"notice_banner_reject_button_hide":false,"preferences_center_close_button_hide":false,"page_refresh_confirmation_buttons":false,"website_name":"stoprect.com","website_privacy_policy_url":"https://stoprect.com/privacy-policy"});--}}
{{--    });--}}
{{--</script>--}}
 
{{--<noscript>Cookie Consent by <a href="https://www.freeprivacypolicy.com/" rel="noopener">Free Privacy Policy Generator</a></noscript>--}}
<!-- End Cookie Consent by FreePrivacyPolicy.com https://www.FreePrivacyPolicy.com -->





<!-- Below is the link that users can use to open Preferences Center to change their preferences. Do not modify the ID parameter. Place it where appropriate, style it as needed. -->

{{--<a href="#" id="open_preferences_center">Update cookies preferences</a>--}}


</body>

</html>