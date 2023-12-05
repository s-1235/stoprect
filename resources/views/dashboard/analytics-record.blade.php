
@foreach($analytics as $key => $analyticMonth)
        @foreach($analyticMonth as $analytic)
                    @if($analytic->media_type === 'youtube')
                        <a  href="{{route('analytic-article',['id' => $analytic->id])}}" class="card-article">
                            <h6 class="card-article__title">{{$analytic->title ?? ''}}</h6>
                            <div class="card-article__image-ibg_contain">
                                <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/{{$analytic->media_path}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="card-article__content">
                                <div class="card-article__descr">{{$analytic->text ?? ''}}</div>
                                <div class="card-article__wrapper">
                                    <div class="card-article__author">{{$analytic->author ?? ''}}</div>
                                    @if($user->isAdmin())
                                        <span class="share-link" onclick="copyFunction(event);" data-share-link="{{route('share-analytic-article',['id'=>$analytic->share_link] )}}">Share</span>
                                        <span class="del-link" onclick="deleteAnalyticRecord(event);" >
                                            <i class="fas fa-trash" data-id={{$analytic->id}} data-target="#exampleModal" title="Delete Analytic"></i>
                                        </span>
                                    @endif
                                </div>
                                <div class="card-article__date">{{$analytic->create_at}}</div>
                            </div>
                        </a>
                    @endif
                    @if($analytic->media_type === 'image')
                        <a href="{{route('analytic-article',['id' => $analytic->id])}}" class="card-article">
                            <h6 class="card-article__title">{{$analytic->title ?? ''}}</h6>
                            <div class="card-article__image-ibg_contain">
                                <img  src="{{ $analytic->media_path }}" alt="Unable Access" style="width:560px;display:flex;">
                            </div>
                            <div class="card-article__content">
                                <div class="card-article__descr">{{$analytic->text ?? ''}}</div>
                                <div class="card-article__wrapper">
                                    <div class="card-article__author">{{$analytic->author ?? ''}}</div>
                                    @if($user->isAdmin())
                                        <span class="share-link" onclick="copyFunction(event);" data-share-link="{{route('share-analytic-article',['id'=>$analytic->share_link] )}}">Share</span>
                                        <span class="del-link" onclick="deleteAnalyticRecord(event);" >
                                            <i class="fas fa-trash" data-id={{$analytic->id}} data-target="#exampleModal" title="Delete Analytic"></i>
                                        </span>
                                    @endif
                                </div>
                                <div class="card-article__date">{{$analytic->create_at}}</div>
                            </div>
                        </a>
                    @endif

{{--            </div>--}}
{{--        </div>--}}
        @endforeach
@endforeach
                </div>
