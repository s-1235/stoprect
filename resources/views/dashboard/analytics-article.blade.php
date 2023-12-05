@include('header')


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

     .fit-text {
         position: relative;
         /*top: 50%;*/
         /*left: 1%;*/
         /*right: 1%;*/
     }
</style>
<div class="container">

    @include('dashboard.header-tabs')
    @if ($user && ($user->isPremiumPlan() || $user->isAdmin()))
        <div>
            <div>
                <hr style="margin-top: 3em">
                <h4 class="cta text-left"></h4>
                <div class="article">
                    <div class="article__item">
                        <div class="article__header">
                            <h5 class="article__title">{{$article->id}}</h5>
                            <div class="article__author">By  Article Author</div>
                            <div class="article__date">Month 11</div>
                        </div>
                        <div class="article__image">
                            @if($article->media_type === 'youtube')
                                <div class="article__image-ibg">
                                    <iframe  src="https://www.youtube-nocookie.com/embed/{{$article->media_path}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                    </iframe>
                                </div>
                            @endif

                            @if($article->media_type === 'image')
                                <img  src="{{ $article->media_path }}" alt="Unable Access" style="">
                            @endif
                        </div>
                        <div class="article__descr">{{ $article->text ?? '' }}</div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="cls cls-2 active" >
            <div class="row">
                <div class="col-6 offset-3 align-content-center">
                    <h6 class="cta"> Subscribe Premium Pakage to see "EARLY ALERTS"</h6>
                    <div class="row align-content-center">
                        @include('forms.upgrade-subscriptions-button')
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
