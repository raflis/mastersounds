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

<div class="modal fade" id="newsletter_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="content">
                    <h1>{{ __('global.title.mustregistertitle') }}</h1>
                    <h3>{{ __('global.title.mustregistercontent') }}</h3>
                    
                    <!-- SharpSpring Form for Master Sounds - Newsletter Episodio  -->
                    <script type="text/javascript">
                        var ss_form = {'account': 'MzY0NDIwtbCwAAA', 'formID': 'MzEyTjFJNrTUNU1MNNM1STUw0U1KNk3WTTY2NDU3Mrc0MTRNAgA'};
                        ss_form.width = '100%';
                        ss_form.domain = 'app-3RUFHXUHZO.marketingautomation.services';
                        ss_form.hidden = {'category': '{{$item_episode->category_episode->name1}}','idepisode': '{{$item_episode->id}}'}; // Modify this for sending hidden variables, or overriding values
                        // ss_form.target_id = 'target'; // Optional parameter: forms will be placed inside the element with the specified id
                        // ss_form.polling = true; // Optional parameter: set to true ONLY if your page loads dynamically and the id needs to be polled continually.
                    </script>
                    <script type="text/javascript" src="https://koi-3RUFHXUHZO.marketingautomation.services/client/form.js?ver=2.0.1"></script>

                    <p>
                        <a target="_blank" href="{{ $pagefield->file1 }}">{{ __('global.title.sendformtos') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="https://player.vimeo.com/api/player.js"></script>
<script>

$(function($){

    var current_url = $(location).attr('href');
    var session_email = "{{ request()->session()->get('email') }}";
    var base = location.protocol+'//'+location.host;
    var iframe = $('#iframe_vimeo');
    var player = new Vimeo.Player(iframe);
    var segundos;
    var duracion;
    
    player.getDuration().then(function(duration) {
        duracion = duration;
        console.log(duracion); // `duration` indicates the duration of the video in seconds
    });

    setInterval(() => {
        var newsletter_modal_storage = JSON.parse(window.localStorage.getItem('newsletter_modal'));

        player.getCurrentTime().then(function(seconds) {
            segundos = seconds;
            //console.log(segundos); // `seconds` indicates the current playback position of the video
            if(!session_email)
            {
                if(segundos >= 60)
                {
                    //console.log('mas de 1m');
                    if(newsletter_modal_storage)
                    {
                        if(newsletter_modal_storage.url == current_url && newsletter_modal_storage.close == true)
                        {
                            $('#newsletter_modal').modal('hide');
                        }else{
                            $('#newsletter_modal').modal('show');
                            player.pause();
                        }
                    }else{
                        $('#newsletter_modal').modal('show');
                        player.pause();
                    }
                }
            }
        });
    }, 1000);

    $('.btn-close').on('click', function(){
        item = 
            {
                'url' : current_url,
                'close' : true
            }
        
        item = JSON.stringify(item);
        localStorage.setItem('newsletter_modal', item);
        player.play();
    });


    function onVisibilityChange() {
    if (document.visibilityState === 'visible') {
        console.log("user is focused on the page")
    } else {
        console.log("user left the page")
    }
    }

    document.addEventListener('visibilitychange', onVisibilityChange);

    window.addEventListener("beforeunload", function (e) {
        console.log('saliendo');
        localStorage.removeItem('newsletter_modal');
        /*
        var confirmationMessage = "Esta seguro?";

        e.returnValue = confirmationMessage;     // Gecko, Trident, Chrome 34+
        return confirmationMessage;              // Gecko, WebKit, Chrome <34
        */
    });

})



</script>

@endsection