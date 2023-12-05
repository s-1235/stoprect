<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stop Rect</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,500;9..40,700&family=Inter:wght@400;500;700&family=Manrope:wght@500;600;700&family=Open+Sans&family=Space+Grotesk:wght@500;700&family=Teko:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/style2.css" />
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
    <!-- Header start
    ============================= -->
    <header class="header">
      <div class="auto__container">
        <div class="header__inner">
          <a href="/" class="header__logo">
            <img src="/assets/svgs/logo.svg" alt="Logo" />
          </a>
          <nav class="nav">
            <div class="nav__inner">
              <a href="/about" class="nav__link">About Us</a>
              <a href="#" class="nav__link">Contact</a>
            
            </div>
          </nav>
          <div class="header__buttons">
          @if (!$user)
          <a href="/login"><button class="button link">Login</button></a>
                        
            <button class="button primary">Get started</button>
                    @else
                        <li><a class="btn btn-light text-primary rounded-pill px-4 shadow-sm d-lg-block my-btn" title="My Account" href="{{route('my-account')}}">My Account</a></li>

                        <li><a class="btn btn-light text-primary rounded-pill px-4 shadow-sm d-lg-block my-btn" title="Log Out" href="{{route('logout')}}">Log Out</a></li>
                    @endif
            
          </div>
          <button class="profile-btn">
            <img src="/assets/svgs/user.svg" alt="User" />
          </button>
        </div>
      </div>
    </header>
    <!-- Header end
    ============================= -->
    <!-- Intro start
    ============================= --> <section class="intro">
      <div class="auto__container">
        <div class="intro__inner" data-aos="fade-up">
          <h1>
            Trades You <br />
            CAN COUNT ON.
          </h1>
          <div class="swiper intro__swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="swiper-slide-inner">
                  Coin of the
                  <img src="./assets/svgs/solena.svg" alt="Solena" /> month
                </div>
              </div>
              <div class="swiper-slide">
                <div class="swiper-slide-inner">
                  Emerging
                  <img src="/assets/images/astro-frog.png" alt="Astro Frog" />
                  Coin
                  <br />
                  <small> called at 0.000000667 Satoshi </small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Intro end
    ============================= -->
    <!-- Join start
    ============================= -->
    <section class="join">
      <div class="join__bg">
        <div class="join__bg-desktop">
          <div class="join__bg-desktop-image">
            <img src="/assets/images/person-1.jpg" alt="Person" />
          </div>
          <div class="join__bg-desktop-image">
            <img src="/assets/images/person-2.jpg" alt="Person" />
          </div>
          <div class="join__bg-desktop-image">
            <img src="/assets/images/person-3.jpg" alt="Person" />
          </div>
          <div class="join__bg-desktop-image">
            <img src="/assets/images/person-4.jpg" alt="Person" />
          </div>
          <div class="join__bg-desktop-image">
            <img src="/assets/images/person-5.jpg" alt="Person" />
          </div>
        </div>
        <div class="join__bg-mobile">
          <div class="join__bg-mobile-image">
            <img src="/assets/images/join-image-1.png" alt="Join Image" />
          </div>
          <div class="join__bg-mobile-image">
            <img src="/assets/images/join-image-2.png" alt="Join Image" />
          </div>
        </div>
      </div>
      <div class="auto__container">
        <div class="join__inner" data-aos="zoom-in-up">
          <h4>Enter your email for Discount code</h4>
          <form class="join__form">
            <label>
              <img src="/assets/svgs/profile.svg" alt="Profile" />
              <input type="text" placeholder="Name" />
            </label>
            <hr />
            <label>
              <img src="/assets/svgs/message.svg" alt="Message" />
              <input type="email" placeholder="Email Address" />
            </label>
            <button class="button primary">Join your community</button>
          </form>
        </div>
      </div>
    </section>
    <!-- Join end
    ============================= -->
    <!-- Charts start
    ============================= -->
    <section class="charts">
      <div class="auto__container">
        <div class="charts__inner">
          <div class="section__top" data-aos="fade-up">
            <h4>Crypto Fear & Greed <span>Index Tracker</span></h4>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
            </p>
          </div>
          <div class="charts__content">
            <div
              class="charts__content-inner"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div class="charts__row">
                <div class="charts__block">
                  <div class="charts__block-icon">
                    <img src="/assets/svgs/icon-1.svg" alt="icon" />
                  </div>
                  <div class="charts__block-title">Current price</div>
                  <div class="charts__block-row">
                    <div class="charts__block-index">450</div>
                    <div class="charts__block-growth">+10%</div>
                  </div>
                </div>
                <div class="charts__block">
                  <div class="charts__block-icon">
                    <img src="/assets/svgs/icon-2.svg" alt="icon" />
                  </div>
                  <div class="charts__block-title">Average</div>
                  <div class="charts__block-row">
                    <div class="charts__block-index">120</div>
                    <div class="charts__block-growth">+15%</div>
                  </div>
                </div>
                <div class="charts__block">
                  <div class="charts__block-icon">
                    <img src="/assets/svgs/icon-3.svg" alt="icon" />
                  </div>
                  <div class="charts__block-title">Timeframe</div>
                  <div class="charts__block-row">
                    <div class="charts__block-index">101</div>
                    <di class="charts__block-growth" v>-5%</di>
                  </div>
                </div>
                <div class="charts__block">
                  <div class="charts__block-icon">
                    <img src="/assets/svgs/icon-4.svg" alt="icon" />
                  </div>
                  <div class="charts__block-title">Condition</div>
                  <div class="charts__block-row">
                    <div class="charts__block-index">247</div>
                    <d class="charts__block-growth" iv>0%</d>
                  </div>
                </div>
                <div class="charts__block">
                  <div class="charts__block-icon">
                    <img src="/assets/svgs/icon-5.svg" alt="icon" />
                  </div>
                  <div class="charts__block-title">Greed Index</div>
                  <div class="charts__block-row">
                    <div class="charts__block-index">127</div>
                    <d class="charts__block-growth" iv>0%</d>
                  </div>
                </div>
                <div class="charts__block">
                  <div class="charts__block-icon">
                    <img src="/assets/svgs/icon-6.svg" alt="icon" />
                  </div>
                  <div class="charts__block-title">1H</div>
                  <div class="charts__block-row">
                    <div class="charts__block-index">127</div>
                    <d class="charts__block-growth" iv>0%</d>
                  </div>
                </div>
              </div>
              <div class="charts__wrapper">
                <div class="charts__container">
                  <div class="charts__container-top">
                    <div class="charts__container-wrapper">
                      <div class="charts__container-title">Sales Progress</div>
                      <div class="charts__container-subtitle">This Quarter</div>
                    </div>
                    <div class="charts__container-wrapper">
                      <button>
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="23"
                          height="23"
                          viewBox="0 0 23 23"
                          fill="none"
                        >
                          <path
                            d="M13.0736 5.81861C13.0736 6.8468 12.2401 7.68031 11.2119 7.68031C10.1837 7.68031 9.35022 6.8468 9.35022 5.81861C9.35022 4.79042 10.1837 3.95691 11.2119 3.95691C12.2401 3.95691 13.0736 4.79042 13.0736 5.81861Z"
                            fill="#858D9D"
                          />
                          <path
                            d="M13.0736 11.4037C13.0736 12.4319 12.2401 13.2654 11.2119 13.2654C10.1837 13.2654 9.35022 12.4319 9.35022 11.4037C9.35022 10.3755 10.1837 9.54202 11.2119 9.54202C12.2401 9.54202 13.0736 10.3755 13.0736 11.4037Z"
                            fill="#858D9D"
                          />
                          <path
                            d="M11.2119 18.8505C12.2401 18.8505 13.0736 18.017 13.0736 16.9888C13.0736 15.9606 12.2401 15.1271 11.2119 15.1271C10.1837 15.1271 9.35022 15.9606 9.35022 16.9888C9.35022 18.017 10.1837 18.8505 11.2119 18.8505Z"
                            fill="#858D9D"
                          />
                        </svg>
                      </button>
                    </div>
                  </div>
                  <div id="charts__gauge" class="charts__gauge">
                    <div class="charts__gauge-current">Bullish</div>
                  </div>
                  <div class="charts__container-bottom">
                    <div class="charts__container-bottom-item">
                      <h6>Target</h6>
                      <div class="charts__container-bottom-item-row">
                        <span>$20k</span>
                        <img
                          src="/assets/svgs/arrow-down.svg"
                          alt="Arrow down"
                        />
                      </div>
                    </div>
                    <div class="charts__container-bottom-item">
                      <h6>Revenue</h6>
                      <div class="charts__container-bottom-item-row">
                        <span>$16k</span>
                        <img src="/assets/svgs/arrow-up.svg" alt="Arrow up" />
                      </div>
                    </div>
                    <div class="charts__container-bottom-item">
                      <h6>Today</h6>
                      <div class="charts__container-bottom-item-row">
                        <span>$1.5k</span>
                        <img src="/assets/svgs/arrow-up.svg" alt="Arrow up" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="charts__container">
                  <div class="charts__container-top">
                    <div class="charts__container-wrapper">
                      <div class="charts__container-title">Statistics</div>
                      <div class="charts__container-subtitle">
                        Revenue and Sales
                      </div>
                    </div>
                    <div class="charts__container-wrapper variables">
                      <div class="charts__container-variable">
                        <span></span>
                        Statistic
                      </div>
                      <div class="charts__container-variable">
                        <span></span>
                        Statistic
                      </div>
                    </div>
                    <div class="charts__container-wrapper">
                      <button>
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="23"
                          height="23"
                          viewBox="0 0 23 23"
                          fill="none"
                        >
                          <path
                            d="M13.0736 5.81861C13.0736 6.8468 12.2401 7.68031 11.2119 7.68031C10.1837 7.68031 9.35022 6.8468 9.35022 5.81861C9.35022 4.79042 10.1837 3.95691 11.2119 3.95691C12.2401 3.95691 13.0736 4.79042 13.0736 5.81861Z"
                            fill="#858D9D"
                          />
                          <path
                            d="M13.0736 11.4037C13.0736 12.4319 12.2401 13.2654 11.2119 13.2654C10.1837 13.2654 9.35022 12.4319 9.35022 11.4037C9.35022 10.3755 10.1837 9.54202 11.2119 9.54202C12.2401 9.54202 13.0736 10.3755 13.0736 11.4037Z"
                            fill="#858D9D"
                          />
                          <path
                            d="M11.2119 18.8505C12.2401 18.8505 13.0736 18.017 13.0736 16.9888C13.0736 15.9606 12.2401 15.1271 11.2119 15.1271C10.1837 15.1271 9.35022 15.9606 9.35022 16.9888C9.35022 18.017 10.1837 18.8505 11.2119 18.8505Z"
                            fill="#858D9D"
                          />
                        </svg>
                      </button>
                    </div>
                  </div>
                  <canvas id="charts__graph" class="charts__graph"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Charts end
    ============================= -->
    <!-- Slider start
    ============================= -->
    <section class="slider">
      <div class="auto__container">
        <div class="slider__inner" data-aos="fade-up" data-aos-delay="200">
          <div class="slider__bottom">
            <h3>Trading crypto and getting rect?</h3>
            <div class="slider__content">
              <div class="slider__content-top">
                <div class="slider__content-dots">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
                <div class="slider__content-url">https://stoprect.com/</div>
              </div>
              <div class="swiper slider__swiper">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img
                      src="/assets/images/slider1.png"
                      alt="Slider image"
                    />
                  </div>
                  <div class="swiper-slide">
                    <img
                      src="/assets/images/slider2.png"
                      alt="Slider image"
                    />
                  </div>
                  <div class="swiper-slide">
                    <img
                      src="/assets/images/slider3.png"
                      alt="Slider image"
                    />
                  </div>
                  <div class="swiper-slide">
                    <img
                      src="/assets/images/slider4.png"
                      alt="Slider image"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- Slider end
    ============================= -->
    <!-- Plans start
    ============================= -->
    <section class="plans">
      <div class="plans__bg">
        <img src="/assets/svgs/plans-doughnut-small.svg" alt="background" />
        <img src="/assets/svgs/plans-doughnut-large.svg" alt="background" />
      </div>
      
      <div class="auto__container">
        <div class="plans__inner">
          <div class="plans__top" data-aos="fade-up">
            <h4>Our Best Plans</h4>
            <div class="plans__top-subtitle">
              <span> Annual Plans </span>
              <input type="checkbox" id="switch" class="switch" /><label
                for="switch"
                class="switch-label"
                >Switch</label
              >
              <span> Monthly Plans </span>
            </div>
            <p>
              Premium plan is $124 per active app per month when paying on a
              monthly basis. It's $90 per month when paying annually.
            </p>
          </div>
          <div class="plans__list">
            <div class="plan" data-aos="flip-right" data-aos-delay="150">
              <div class="plan__wrapper">
                <h4>Paper Plain plan</h4>
                <div class="plan__icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="46"
                    height="39"
                    viewBox="0 0 46 39"
                    fill="none"
                  >
                    <path
                      d="M45.2838 3.75634L38.4654 35.9114C37.9506 38.1805 36.6095 38.7453 34.7036 37.677L24.3139 30.0211L19.3015 34.8431C18.7463 35.3983 18.2831 35.8614 17.2132 35.8614L17.9604 25.2813L37.2147 7.88284C38.0523 7.13726 37.0324 6.72252 35.914 7.46971L12.1103 22.4588L1.86266 19.2505C-0.366013 18.555 -0.406358 17.0218 2.32743 15.9519L42.4096 0.509358C44.2654 -0.186193 45.8889 0.920879 45.2838 3.75634Z"
                      fill="black"
                    />
                  </svg>
                </div>

                <div class="plan__desc">
                  Lorem ipsum dolor sit amet, ad vix fuisset assentior. Vim
                  dicit lobortis molestiae no,
                </div>
                <div class="plan__price"><span>49€</span>/per month</div>
                <div class="plan__features">
                  <span>Your Access to view BTC Trades</span>
                  <span>Your Access to view ETH Trades</span>
                  <span>Get top messages to Your email</span>
                  <span>Advanced, first to know journalism</span>
                </div>
              </div>
              <button class="plan__button">
                <span>Start Now</span>
                <svg
                  width="14"
                  height="14"
                  viewBox="0 0 14 14"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M6.15261 1.28071L6.80044 0.632873C7.09491 0.367849 7.53662 0.367849 7.80164 0.632873L13.5438 6.34561C13.8089 6.64008 13.8089 7.08179 13.5438 7.34682L7.80164 13.089C7.53662 13.354 7.09491 13.354 6.80044 13.089L6.15261 12.4412C5.88758 12.1467 5.88758 11.705 6.15261 11.4105L9.71571 8.0241H1.26439C0.852126 8.0241 0.557654 7.72963 0.557654 7.31737V6.37506C0.557654 5.99225 0.852126 5.66833 1.26439 5.66833H9.71571L6.15261 2.31136C5.88758 2.01689 5.85814 1.57518 6.15261 1.28071Z"
                    fill="currentColor"
                  />
                </svg>
              </button>
            </div>
            <div class="plan" data-aos="flip-right" data-aos-delay="300">
              <div class="plan__wrapper">
                <h4>Golden plan</h4>
                <div class="plan__icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="47"
                    height="48"
                    viewBox="0 0 47 48"
                    fill="none"
                  >
                    <path
                      d="M15.5935 34.6995C15.2337 34.6305 14.8753 34.7832 14.6903 35.099C13.7562 37.0949 11.6075 38.2184 9.43393 37.8293C9.03592 35.6659 10.1624 33.4996 12.173 32.5817C12.571 32.3364 12.7002 31.818 12.455 31.4127C12.3257 31.1968 12.0966 31.044 11.844 31.0147C8.76128 30.4331 5.59337 31.5257 3.52109 33.8888C1.07283 37.2477 0.14757 41.4921 0.981771 45.5691C1.04199 45.9289 1.32691 46.2109 1.68526 46.2741C2.65605 46.4341 3.64299 46.5105 4.63874 46.5105C8.22669 46.7088 11.7368 45.3708 14.2923 42.8389C16.037 40.7724 16.764 38.0349 16.2661 35.3795C16.2265 35.0138 15.9533 34.7216 15.592 34.6452L15.5935 34.6995ZM46.5647 0.707316C46.2283 0.378336 45.5484 0.531077 45.5484 0.531077C44.3015 0.385679 43.0458 0.31812 41.793 0.309309C33.6551 0.225595 25.8301 3.39938 20.045 9.11394C19.3342 9.82478 18.6689 10.5665 18.0491 11.3478C15.3012 10.0774 12.151 9.96283 9.32084 11.0261C4.84582 12.953 2.23013 18.4385 0.0565128 24.0914C-0.112383 24.5261 0.110853 25.0152 0.545578 25.1841C0.82903 25.3001 1.14332 25.2443 1.37978 25.0622C4.44782 22.7828 8.46314 22.2306 12.0364 23.5935L10.9731 27.4399C10.8732 27.7997 11.0186 28.1816 11.3314 28.3813C14.2086 30.5241 16.7552 33.0693 18.8965 35.9303C19.1036 36.2519 19.4855 36.3988 19.8467 36.2989L23.6873 35.2429C25.0928 38.8221 24.5435 42.8682 22.226 45.9289C21.9337 46.2946 21.9954 46.8395 22.3626 47.1215C22.599 47.3139 22.9207 47.3579 23.1968 47.2522C28.8423 45.0786 34.3336 42.4629 36.2547 38.004C37.318 35.1739 37.2019 32.0295 35.933 29.2846C36.7041 28.6501 37.4472 27.9686 38.1492 27.2578C44.7744 20.5181 47.9408 11.1187 46.7556 1.74566C46.7556 1.74566 46.901 1.05833 46.5632 0.722003L46.5647 0.707316ZM41.7915 2.01443C42.8915 2.01443 43.9945 2.0673 45.0945 2.18332C45.2473 3.69751 45.2943 5.22052 45.2341 6.73471C44.0312 6.60547 42.915 6.06941 42.0515 5.22052C41.1938 4.36282 40.6592 3.24663 40.5285 2.04674C40.9412 2.02324 41.3553 2.00708 41.7754 2.00708L41.7915 2.01443ZM21.2464 10.3212C25.974 5.62587 32.1923 2.7326 38.8307 2.15101C38.9673 3.47428 39.4725 4.72998 40.2994 5.78595L35.0136 11.0629C32.0234 8.70712 27.6865 9.2285 25.3307 12.2187C23.3642 14.7198 23.3642 18.2461 25.3307 20.7487L19.1638 26.9127C17.5821 25.375 15.8608 23.9753 14.0235 22.7358C15.3159 18.0478 17.8127 13.7711 21.2464 10.3212ZM35.9785 16.5043C35.9785 19.3784 33.6537 21.7136 30.778 21.7136C27.8936 21.7209 25.5687 19.3872 25.5687 16.5101C25.5687 13.636 27.8936 11.3008 30.7692 11.3008H30.7765C33.6448 11.3008 35.9697 13.6345 35.9771 16.5043H35.9785ZM2.57233 22.3789C4.41697 17.9656 6.6655 14.0178 9.9788 12.5932C12.2347 11.7605 14.7299 11.8222 16.9461 12.7694C14.9664 15.5467 13.4581 18.6368 12.5108 21.9104C9.29 20.6106 5.66534 20.7781 2.57233 22.3701V22.3789ZM19.9833 34.5013C17.8876 31.8165 15.4643 29.3977 12.7766 27.2945L13.5506 24.4879C17.162 26.9802 20.2888 30.1173 22.7988 33.7273L19.9833 34.5013ZM34.6935 37.2858C33.2615 40.6124 29.3314 42.8609 24.918 44.7055C26.5086 41.6155 26.6687 37.9893 25.3601 34.77C28.6426 33.8125 31.74 32.3071 34.5246 30.3097C35.4719 32.5288 35.535 35.0373 34.6847 37.2947L34.6935 37.2858ZM24.5347 33.2544C23.3025 31.42 21.9132 29.6987 20.374 28.1067L26.5409 21.9427C29.5311 24.2985 33.8681 23.7859 36.2238 20.7869C38.1977 18.2857 38.1977 14.7595 36.2238 12.2584L41.5095 6.97116C42.5567 7.78921 43.8124 8.30324 45.1283 8.43983C44.5467 15.0723 41.6623 21.2994 36.9743 26.0271C33.5156 29.4623 29.2418 31.9473 24.5509 33.2397L24.5347 33.2544Z"
                      fill="black"
                    />
                  </svg>
                </div>

                <div class="plan__desc">
                  Lorem ipsum dolor sit amet, ad vix fuisset assentior. Vim
                  dicit lobortis molestiae no,
                </div>
                <div class="plan__price"><span>59€</span>/per month</div>
                <div class="plan__features">
                  <span>Your Access to view BTC Trades</span>
                  <span>Your Access to view ETH Trades</span>
                  <span>Your Access to view to Altcoin alerts</span>
                  <span>Get Top Messages to Your email</span>
                  <span>Advanced, first to know journalism</span>
                </div>
              </div>
              <button class="plan__button">
                <span>Start Now</span>
                <svg
                  width="14"
                  height="14"
                  viewBox="0 0 14 14"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M6.15261 1.28071L6.80044 0.632873C7.09491 0.367849 7.53662 0.367849 7.80164 0.632873L13.5438 6.34561C13.8089 6.64008 13.8089 7.08179 13.5438 7.34682L7.80164 13.089C7.53662 13.354 7.09491 13.354 6.80044 13.089L6.15261 12.4412C5.88758 12.1467 5.88758 11.705 6.15261 11.4105L9.71571 8.0241H1.26439C0.852126 8.0241 0.557654 7.72963 0.557654 7.31737V6.37506C0.557654 5.99225 0.852126 5.66833 1.26439 5.66833H9.71571L6.15261 2.31136C5.88758 2.01689 5.85814 1.57518 6.15261 1.28071Z"
                    fill="currentColor"
                  />
                </svg>
              </button>
            </div>
            <div class="plan" data-aos="flip-right" data-aos-delay="450">
              <div class="plan__flash-sale">Flash Sale <span>79</span> Eu!</div>
              <div class="plan__wrapper">
                <h4>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="29"
                    height="29"
                    viewBox="0 0 29 29"
                    fill="none"
                  >
                    <path
                      d="M13.5021 18.1813C14.7381 18.4988 17.5253 19.2147 17.9398 17.4486C18.3569 15.6589 15.744 15.0955 14.4329 14.8128C14.2772 14.7792 14.1398 14.7496 14.028 14.7223L13.2319 18.113C13.3102 18.132 13.4009 18.1553 13.5021 18.1813Z"
                      fill="#F7931A"
                    />
                    <path
                      d="M14.6093 13.2228C15.6402 13.4894 17.9868 14.0961 18.3653 12.4864C18.7492 10.8708 16.5592 10.4016 15.476 10.1696C15.3458 10.1417 15.2316 10.1172 15.1398 10.0946L14.3986 13.1691C14.4603 13.1843 14.531 13.2026 14.6093 13.2228Z"
                      fill="#F7931A"
                    />
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M11.3841 27.8897C18.8933 29.759 26.4849 25.182 28.3531 17.6866C30.2166 10.1866 25.647 2.57204 18.1333 0.725679C10.6424 -1.14359 3.05536 3.43338 1.18722 10.9288C-0.680914 18.4242 3.8887 26.0159 11.3841 27.8897ZM18.2875 8.98123C20.2319 9.64102 21.6502 10.617 21.3986 12.4864C21.2065 13.8472 20.4653 14.5116 19.4404 14.7453C20.8404 15.4646 21.5404 16.5551 20.8999 18.4658C20.1038 20.8621 18.1411 21.0774 15.5149 20.6101L14.911 23.1622L13.3738 22.7911L13.9777 20.2802C13.5888 20.184 13.1816 20.0832 12.7515 19.9686L12.1476 22.4978L10.6104 22.1267L11.2143 19.5746C11.003 19.5133 10.7832 19.4605 10.56 19.4069C10.4161 19.3723 10.2707 19.3374 10.1254 19.2997L8.12148 18.8323L8.84894 17.0591C8.84894 17.0591 9.9973 17.3524 9.979 17.334C10.4045 17.4303 10.6012 17.1553 10.679 16.9629L11.6123 12.9308C11.6421 12.94 11.6661 12.9446 11.6901 12.9492C11.7141 12.9537 11.7382 12.9583 11.7679 12.9675C11.7294 12.9408 11.6929 12.9314 11.6607 12.9231C11.6431 12.9186 11.6269 12.9144 11.6123 12.9079L12.294 10.0259C12.3169 9.71433 12.198 9.30654 11.5757 9.15076C11.6169 9.12785 10.4685 8.87584 10.4685 8.87584L10.8574 7.2401L12.9757 7.74869C13.1404 7.78764 13.3063 7.822 13.4721 7.85637C13.638 7.89073 13.8038 7.9251 13.9685 7.96404L14.5725 5.43483L16.128 5.80597L15.5424 8.2802C15.9496 8.36267 16.3614 8.45889 16.7685 8.55511L17.3542 6.08088L18.8914 6.45202L18.2875 8.98123Z"
                      fill="#F7931A"
                    />
                  </svg>
                  <span> UFO Plan </span>
                </h4>
                <div class="plan__row">
                  <div class="plan__discount">66% <small>off</small></div>
                  <div class="plan__offer">
                    <span>Best Price</span>
                    <img
                      src="./assets/svgs/curly-arrow.svg"
                      alt="Curly arrow"
                    />
                  </div>
                </div>
                <div class="plan__desc">
                  Lorem ipsum dolor sit amet, ad vix fuisset assentior. Vim
                  dicit lobortis molestiae no,
                </div>
                <div class="plan__price">
                  <small>200€</small> <span>49€</span>/per month
                </div>
                <div class="plan__features">
                  <span>Your Access to our copy paste BTC Trades</span>
                  <span>Your Access to our copy paste ETH Trades</span>
                  <span>Your Access to view to copy paste Altcoins</span>
                  <span>Get top messages to email</span>
                  <span>Advanced, first to know Journalism</span>
                  <span>COIN OF THE MONTH (bigest pofits, yet most risky)</span>
                  <span>EMERGING COIN (bigest profits yet most risky)</span>
                  <span>Get alert messages as SMS (NEW developing)</span>
                </div>
              </div>
              <button class="plan__button">
                <span>Start Now</span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="29"
                  height="28"
                  viewBox="0 0 29 28"
                  fill="none"
                >
                  <path
                    d="M12.8867 17.8736C14.1227 18.1911 16.91 18.907 17.3244 17.1409C17.7415 15.3512 15.1286 14.7878 13.8175 14.5051C13.6618 14.4715 13.5244 14.4419 13.4126 14.4147L12.6166 17.8053C12.6948 17.8243 12.7856 17.8476 12.8867 17.8736Z"
                    fill="#F7931A"
                  />
                  <path
                    d="M13.9939 12.9151C15.0248 13.1817 17.3714 13.7884 17.7499 12.1787C18.1338 10.5631 15.9438 10.0939 14.8607 9.86192C14.7304 9.83402 14.6162 9.80955 14.5244 9.78693L13.7832 12.8614C13.8449 12.8766 13.9156 12.8949 13.9939 12.9151Z"
                    fill="#F7931A"
                  />
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M10.7688 27.582C18.2779 29.4513 25.8695 24.8743 27.7377 17.3789C29.6012 9.87889 25.0316 2.26435 17.5179 0.417986C10.027 -1.45129 2.43998 3.12568 0.571838 10.6211C-1.2963 18.1165 3.27331 25.7082 10.7688 27.582ZM17.6721 8.67353C19.6166 9.33333 21.0349 10.3093 20.7832 12.1787C20.5911 13.5395 19.8499 14.2039 18.8251 14.4376C20.2251 15.1569 20.9251 16.2474 20.2845 18.1581C19.4885 20.5544 17.5257 20.7698 14.8996 20.3024L14.2956 22.8545L12.7584 22.4834L13.3623 19.9725C12.9734 19.8763 12.5662 19.7755 12.1362 19.6609L11.5322 22.1901L9.99499 21.819L10.5989 19.2669C10.3876 19.2056 10.1678 19.1528 9.94466 19.0992C9.8007 19.0646 9.65536 19.0297 9.51002 18.992L7.5061 18.5246L8.23355 16.7514C8.23355 16.7514 9.38192 17.0447 9.36361 17.0263C9.7891 17.1226 9.98584 16.8476 10.0636 16.6552L10.9969 12.6231C11.0267 12.6323 11.0507 12.6369 11.0747 12.6415C11.0987 12.646 11.1228 12.6506 11.1525 12.6598C11.114 12.6331 11.0775 12.6237 11.0453 12.6154C11.0277 12.6109 11.0115 12.6067 10.9969 12.6002L11.6786 9.7182C11.7015 9.40664 11.5826 8.99885 10.9603 8.84306C11.0015 8.82015 9.85316 8.56815 9.85316 8.56815L10.242 6.93241L12.3603 7.441C12.5251 7.47995 12.6909 7.51431 12.8567 7.54868C13.0226 7.58304 13.1885 7.6174 13.3532 7.65635L13.9571 5.12714L15.5126 5.49827L14.927 7.9725C15.3342 8.05498 15.746 8.1512 16.1532 8.24742L16.7388 5.77319L18.276 6.14432L17.6721 8.67353Z"
                    fill="#F7931A"
                  />
                </svg>
                <svg
                  width="14"
                  height="14"
                  viewBox="0 0 14 14"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M6.15261 1.28071L6.80044 0.632873C7.09491 0.367849 7.53662 0.367849 7.80164 0.632873L13.5438 6.34561C13.8089 6.64008 13.8089 7.08179 13.5438 7.34682L7.80164 13.089C7.53662 13.354 7.09491 13.354 6.80044 13.089L6.15261 12.4412C5.88758 12.1467 5.88758 11.705 6.15261 11.4105L9.71571 8.0241H1.26439C0.852126 8.0241 0.557654 7.72963 0.557654 7.31737V6.37506C0.557654 5.99225 0.852126 5.66833 1.26439 5.66833H9.71571L6.15261 2.31136C5.88758 2.01689 5.85814 1.57518 6.15261 1.28071Z"
                    fill="currentColor"
                  />
                </svg>
              </button>
            </div>
          </div>
          <div class="plans__info" data-aos="fade-up">
            <span>0.1 - to 1 BTC</span>
            <img src="./assets/svgs/btc-icon.svg" alt="Bitcoin" />
            <span
              >a Year Challenge
              <svg
                class="plans__info-arrows"
                xmlns="http://www.w3.org/2000/svg"
                width="137"
                height="141"
                viewBox="0 0 137 141"
                fill="none"
              >
                <path
                  d="M64.2625 127.481C122.28 86.4923 69.2248 21.6405 69.2248 21.6405"
                  stroke="currentColor"
                  stroke-width="4"
                  stroke-linecap="round"
                />
                <path
                  d="M80.0877 21.1223L66.7164 18.6944L64.429 31.0156"
                  stroke="currentColor"
                  stroke-width="4"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M49.5673 96.3303C75.3626 78.1065 51.7735 49.2727 51.7735 49.2727"
                  stroke="currentColor"
                  stroke-width="1.77844"
                  stroke-linecap="round"
                />
                <path
                  d="M56.6033 49.0423L50.6583 47.9628L49.6412 53.441"
                  stroke="currentColor"
                  stroke-width="1.77844"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </span>
          </div>
          <div class="plans__bottom" data-aos="flip-up">
            <div class="plans__bottom-item">
              <span>
                <svg width="20" height="20">
                  <polyline
                    fill="none"
                    stroke="#fff"
                    stroke-width="2"
                    points="4.4, 10.7 8.65, 14.2 15.2, 6.9"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="tick"
                  />
                </svg>
              </span>
              <h5>Early Binance listing alert</h5>
            </div>
            <div class="plans__bottom-item">
              <span>
                <svg width="20" height="20">
                  <polyline
                    fill="none"
                    stroke="#fff"
                    stroke-width="2"
                    points="4.4, 10.7 8.65, 14.2 15.2, 6.9"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="tick"
                  />
                </svg>
              </span>
              <h5>Early alt movers baked by social AI engine</h5>
            </div>
            <div class="plans__bottom-item">
              <span>
                <svg width="20" height="20">
                  <polyline
                    fill="none"
                    stroke="#fff"
                    stroke-width="2"
                    points="4.4, 10.7 8.65, 14.2 15.2, 6.9"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="tick"
                  />
                </svg>
              </span>
              <h5>Meeting insiders for even more early bird torgue</h5>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Plans end
    ============================= -->
    <!-- Crypto start
    ============================= -->
    <section class="crypto">
      <div class="crypto__bg">
        <img src="/assets/svgs/crypto-bg-left.svg" alt="image" />
        <img src="/assets/svgs/crypto-bg-right.svg" alt="image" />
      </div>
      <div class="auto__container">
        <div class="crypto__inner">
          <div class="section__top" data-aos="fade-up">
            <h4>History proven <span>alerts</span></h4>
            {{-- <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
            </p> --}}
          </div>
          <div class="crypto__list">
            <div class="crypto__item" data-aos="flip-up">
              <div class="crypto__item-shadows">
                <span
                  ><img
                    src="/assets/svgs/top-right-shadow.svg"
                    alt="Top right shadow"
                /></span>
                <span
                  ><img
                    src="/assets/svgs/bottom-left-shadow.svg"
                    alt="Bottom left shadow"
                /></span>
              </div>
              <div class="crypto__item-chart">
                <img src="/assets/images/stock-chart.png" alt="Stock chart" />
              </div>
            </div>
            <div class="crypto__item" data-aos="flip-up">
              <div class="crypto__item-shadows">
                <span
                  ><img
                    src="/assets/svgs/top-right-shadow.svg"
                    alt="Top right shadow"
                /></span>
                <span
                  ><img
                    src="/assets/svgs/bottom-left-shadow.svg"
                    alt="Bottom left shadow"
                /></span>
              </div>
              <div class="crypto__item-chart">
                <img src="/assets/images/stock-chart.png" alt="Stock chart" />
              </div>
            </div>
            <div class="crypto__item" data-aos="flip-up">
              <div class="crypto__item-shadows">
                <span
                  ><img
                    src="/assets/svgs/top-right-shadow.svg"
                    alt="Top right shadow"
                /></span>
                <span
                  ><img
                    src="/assets/svgs/bottom-left-shadow.svg"
                    alt="Bottom left shadow"
                /></span>
              </div>
              <div class="crypto__item-chart">
                <img src="/assets/images/stock-chart.png" alt="Stock chart" />
              </div>
            </div>
            <div class="crypto__item" data-aos="flip-up">
              <div class="crypto__item-shadows">
                <span
                  ><img
                    src="/assets/svgs/top-right-shadow.svg"
                    alt="Top right shadow"
                /></span>
                <span
                  ><img
                    src="/assets/svgs/bottom-left-shadow.svg"
                    alt="Bottom left shadow"
                /></span>
              </div>
              <div class="crypto__item-chart">
                <img src="/assets/images/stock-chart.png" alt="Stock chart" />
              </div>
            </div>
            <div class="crypto__item" data-aos="flip-up">
              <div class="crypto__item-shadows">
                <span
                  ><img
                    src="/assets/svgs/top-right-shadow.svg"
                    alt="Top right shadow"
                /></span>
                <span
                  ><img
                    src="/assets/svgs/bottom-left-shadow.svg"
                    alt="Bottom left shadow"
                /></span>
              </div>
              <div class="crypto__item-chart">
                <img src="/assets/images/stock-chart.png" alt="Stock chart" />
              </div>
            </div>
            <div class="crypto__item" data-aos="flip-up">
              <div class="crypto__item-shadows">
                <span
                  ><img
                    src="/assets/svgs/top-right-shadow.svg"
                    alt="Top right shadow"
                /></span>
                <span
                  ><img
                    src="/assets/svgs/bottom-left-shadow.svg"
                    alt="Bottom left shadow"
                /></span>
              </div>
              <div class="crypto__item-chart">
                <img src="/assets/images/stock-chart.png" alt="Stock chart" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Crypto end
    ============================= -->
    <!-- Footer start
    ============================= -->
    <footer class="footer">
      <div class="auto__container">
        <div class="footer__inner">
          <div class="footer__block">
            <div class="footer__logo">
              <a href="/"><img src="/assets/svgs/logo.svg" alt="Logo" /></a>
            </div>
            <div class="footer__buttons">
              <button class="button link">Ready to get started?</button>
              <button class="button primary pilled">Get Started</button>
            </div>
          </div>
          <div class="footer__block">
            <div class="footer__newsletter">
              <h5>Subscribe to our newsletter</h5>
              <div class="input__box">
                <input type="email" placeholder="Email address" />
                <button>
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g id="ic-keyboard-arrow-right-48px">
                      <path
                        id="Path"
                        d="M5.48773 15.8818L11.3695 10L5.48773 4.11819L7.30295 2.30298L15 10L7.30295 17.697L5.48773 15.8818Z"
                        fill="currentColor"
                      />
                    </g>
                  </svg>
                </button>
              </div>
            </div>
            <nav class="footer__nav">
              <div class="footer__nav-col">
                <h6>Services</h6>
                <div class="footer__nav-links-container">
                  <a href="#" class="footer__nav-link">Email Marketing</a>
                  <a href="#" class="footer__nav-link">Campaigns</a>
                  <a href="#" class="footer__nav-link">Branding</a>
                  <a href="#" class="footer__nav-link">Offline</a>
                </div>
              </div>
              <div class="footer__nav-col">
                <h6>About</h6>
                <div class="footer__nav-links-container">
                  <a href="#" class="footer__nav-link">Our Story</a>
                  <a href="#" class="footer__nav-link">Benefits</a>
                  <a href="#" class="footer__nav-link">Team</a>
                  <a href="#" class="footer__nav-link">Careers</a>
                </div>
              </div>
              <div class="footer__nav-col">
                <h6>Help</h6>
                <div class="footer__nav-links-container">
                  <a href="#" class="footer__nav-link">FAQs</a>
                  <a href="#" class="footer__nav-link">Contact Us</a>
                </div>
              </div>
            </nav>
          </div>
          <div class="footer__block">
            <div class="footer__copyright">
              <a href="#">Terms & Conditions</a>
              <a href="#">Privacy Policy</a>
            </div>
            <div class="footer__social">
              <a href="#"
                ><img src="/assets/svgs/facebook.svg" alt="Facebook"
              /></a>
              <a href="#"
                ><img src="/assets/svgs/twitter.svg" alt="Twitter"
              /></a>
              <a href="#"
                ><img src="/assets/svgs/instagram.svg" alt="Instagram"
              /></a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer end
    ============================= -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/assets/js/main2.js"></script>
  </body>
</html>
