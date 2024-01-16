@extends('web.layout')
@section('title', $item_post->meta['1'.Session::get('locale').''])
@section('keywords', $item_post->meta['2'.Session::get('locale').''])
@section('description', $item_post->meta['3'.Session::get('locale').''])
@section('image', $item_post->meta['4'.Session::get('locale').''])
@section('content')

<section class="sec6_video">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                <ul class="nav-bar">
                    <li><a href="">{{ __('global.title.home') }}</a></li>
                    <li><a href="{{ route('posts') }}">{{ __("global.title.news") }}</a></li>
                    <li><a href="{{ route('posts', ['cat' => $item_post->category_post_id]) }}">{{ ${'item_post'}->{'category_post'}->{'name' .Session::get('locale')} }}</a></li>
                    <li><a class="active">{{ ${'item_post'}->{'name'.Session::get('locale')} }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="carousel-header">
                    <div class="item" id="item_solution" style="background-image: url('{{ $item_post->image }}')">
                        <div class="text">
                            <h2>{{ ${'item_post'}->{'name' .Session::get('locale')} }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec11">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content_all">
                    <div class="content_left">
                        <h2>
                            {{ ${'item_post'}->{'name' .Session::get('locale')} }}
                        </h2>
                        <div class="text_detail">
                            {!! htmlspecialchars_decode(${'item_post'}->{'body' .Session::get('locale')}) !!}
                        </div>
                    </div>
                    <div class="content_right">
                        <div class="content contactform mb-5">
                            
                        <h2>{{ __("global.title.newsletter") }}</h2>
                                                      
<!-- SharpSpring Form for newsletter  -->
<script type="text/javascript">
    var ss_form = {'account': 'MzY0NDIwtbCwAAA', 'formID': 'M7EwTzYzTTHXTbRMs9Q1MTZJ000yMk3WtTBJMjY1T7FMMjU1AQA'};
    ss_form.width = '100%';
    ss_form.domain = 'app-3RUFHXUHZO.marketingautomation.services';
    // ss_form.hidden = {'field_id': 'value'}; // Modify this for sending hidden variables, or overriding values
    // ss_form.target_id = 'target'; // Optional parameter: forms will be placed inside the element with the specified id
    // ss_form.polling = true; // Optional parameter: set to true ONLY if your page loads dynamically and the id needs to be polled continually.
</script>
<script type="text/javascript" src="https://koi-3RUFHXUHZO.marketingautomation.services/client/form.js?ver=2.0.1"></script>
<p><a href="{{ $pagefield->file1 }}">{{ __('global.title.sendformtos') }}</a></p>          
                            </div>
                            
<hr/>
@if(!$related->isempty())
                        <h2>{{ __("global.title.related") }}</h2>
                        @foreach ($related as $item)
                        
                        <div class="video">
                            <div class="image" style="background-image: url('{{ $item->image0 }}')">
                            </div>
                            <div class="text">
                                <p class="date">{{ \Carbon\Carbon::parse(strtotime($item->date))->formatLocalized('%d de %B de %Y') }}</p>
                                <a href="{{ route('post', [Str::slug($item->category_post->name1), $item->slug, $item->id]) }}">{{ ${'item'}->{'name' .Session::get('locale') } }}</a>
                            </div>
                        </div>
                        
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection