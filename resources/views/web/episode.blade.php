@extends('web.layout')

@section('content')

<section class="sec6_video">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                <ul class="nav-bar">
                    <li><a href="/">{{ __('global.title.home') }}</a></li>
                    <li><a href="{{ route('episodes') }}">{{ __('global.title.episodes') }}</a></li>
                    <li><a href="{{ route('episodes', ['cat' => $item_episode->category_episode_id]) }}">{{${'item_episode'}->{'category_episode'}->{'name' .Session::get('locale')}  }}</a></li>
                    <li><a class="active">{{ $item_episode->name }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content_video">
                    <iframe id="iframe_vimeo" src="https://player.vimeo.com/video/{{ $item_episode->link0 }}?autoplay=1&title=0&byline=0&portrait=0"
                    style=""
                    frameborder="0"
                    allow="autoplay; fullscreen; picture-in-picture"
                    allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec6">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content_all">
                    <div class="content_left">
                        <h2>
                            {{ $item_episode->name }}
                        </h2>
                        <hr>
                        <div class="video_detail2">
                            <p>{{ __("global.title.listenon") }}:</p>
                            <div class="share">
                                <a class="redes" href="{{ $item_episode->link1 }}" target="_blank"><img src="{{ asset('images/listen1.png') }}" alt=""></a>
                                <a class="redes" href="{{ $item_episode->link2 }}" target="_blank"><img src="{{ asset('images/listen2.png') }}" alt=""></a>
                                <a class="redes" href="{{ $item_episode->link3 }}" target="_blank"><img src="{{ asset('images/listen3.png') }}" alt=""></a>
                                <a class="redes" href="{{ $item_episode->link4 }}" target="_blank"><img src="{{ asset('images/listen4.png') }}" alt=""></a>
                            </div>
                        </div>
                        <hr>
                        <div class="video_detail">
                            <div class="autor">
                                <img src="{{ $item_episode->autor_image }}" alt="">
                                <p>{{ $item_episode->autor_name }}</p>
                            </div>
                            <div class="share">
                                <a class="btn btn-share"><img src="{{ asset('images/share.png') }}" alt=""> {{ __("global.title.share") }}</a>
                            </div>
                        </div>
                        <div class="text_detail">
                            {!! htmlspecialchars_decode($item_episode->body) !!}
                        </div>
                    </div>
                    <div class="content_right">
                        <h2>{{ __("global.title.related") }}</h2>
                        @foreach ($related as $item)
                        <div class="video">
                            <div class="image" style="background-image: url('{{ $item->image }}')">
                            </div>
                            <div class="text">
                                
                                <a href="{{ route('episode', [Str::slug(${'item'}->{'category_episode'}->{'name' .Session::get('locale')}), $item->slug, $item->id]) }}">{{ $item->name }}</a>
                                <p class="name">{{ $item->autor_name }}</p>
                                <!--<p class="new">Nuevo</p>-->
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection