@extends('web.layout')

@section('content')
    <section class="sec6_video">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 px-0">
                    <ul class="nav-bar">
                        <li><a href="/">{{ __('global.title.home') }}</a></li>
                        <li><a href="{{ route('episodes') }}">{{ __('global.title.episodes') }}</a></li>
                        <li><a
                                href="{{ route('episodes', ['cat' => $item_episode->category_episode_id]) }}">{{ ${'item_episode'}->{'category_episode'}->{'name' . Session::get('locale')} }}</a>
                        </li>
                        <li><a class="active">{{ $item_episode->name }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid bgmustlogin">
            <div class="row">
                <div class="col-md-12">
                    <div class="row my-5 py-5">
                        <div class="col-md-6 offset-md-3">
                            <div class="content_video text-light text-center">
                                <h1>{{ __('global.title.mustregistertitle') }}</h1>
                                <h3>{{ __('global.title.mustregistercontent') }}</h3>
                            </div>
                            <div class="col-md-6 offset-md-3 text-light text-center">
                                <div class="px-3">
                                    @include('web.partials.alert')
                                </div>
                                                        
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
<p><a href="{{ $pagefield->file1 }}">{{ __('global.title.sendformtos') }}</a></p>           
                            </div>
                        </div>
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
                            <div class="video_detail">
                                <div class="autor">
                                    <img src="{{ $item_episode->autor_image }}" alt="">
                                    <p>{{ $item_episode->autor_name }}</p>
                                </div>
                                <div class="share">
                                    <a class="btn btn-share"><img src="{{ asset('images/share.png') }}" alt="">
                                        {{ __('global.title.share') }}</a>
                                </div>
                            </div>
                            <div class="text_detail">
                                {!! htmlspecialchars_decode($item_episode->body) !!}
                            </div>
                        </div>
                        <div class="content_right">
                            <h2>{{ __('global.title.related') }}</h2>
                            @foreach ($related as $item)
                                <div class="video">
                                    <div class="image" style="background-image: url('{{ $item->image }}')">
                                    </div>
                                    <div class="text">
                                        <a
                                            href="{{ route('episode', [Str::slug(${'item'}->{'category_episode'}->{'name' .Session::get('locale')}), $item->slug, $item->id]) }}">{{ $item->name }}</a>
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
