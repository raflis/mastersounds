@extends('web.layout')

@section('content')

    <section class="sec1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 px-0">
                    <div class="carousel-header">
                        @if (!empty($home_sliders))
                            @foreach ($home_sliders as $item)
                                <div class="item" id="item_desktop"
                                    style="background-image: url('{{ $item->image_desktop }}')">
                                    <div class="text">

                                        @if (${'item'}->{'title' . Session::get('locale')})
                                            <h2>{{ ${'item'}->{'title' . Session::get('locale')} }}</h2>
                                        @endif
                                        @if (${'item'}->{'description' . Session::get('locale')})
                                            <p>
                                                {!! htmlspecialchars_decode(${'item'}->{'description' . Session::get('locale')}) !!}
                                            </p>
                                        @endif
                                        @if (
                                            ${'item'}->{'button_link' . Session::get('locale')} != '' &&
                                                ${'item'}->{'button_name' . Session::get('locale')} != '')
                                            <a href="{{ ${'item'}->{'button_link' . Session::get('locale')} }}"
                                                class="btn btn1">{{ ${'item'}->{'button_name' . Session::get('locale')} }}</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (isset($pagefield->title1))
        <section class="sec2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content_all">
                            <h2>
                                {{ $pagefield->title1 }}
                            </h2>
                            <p class="p1">
                                {!! nl2br(htmlspecialchars_decode($pagefield->description1)) !!}
                            </p>
                            <div class="items">
                                @foreach ($category_solutions as $item)
                                    <div class="item">
                                        <div class="content">
                                            <div class="cara">
                                                <div class="image">
                                                    <img src="{{ $item->icon }}" alt="">
                                                </div>
                                                <p>

                                                    {{ ${'item'}->{'name' . Session::get('locale')} }}
                                                </p>
                                            </div>
                                            <div class="detras">
                                                <p>
                                                    {!! nl2br(htmlspecialchars_decode(${'item'}->{'description' . Session::get('locale')})) !!}
                                                </p>
                                                <a href="{{ route('solutions', ['cat' => $item->id]) }}"
                                                    class="btn btnvermas">{{ __('global.title.vermas') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if (isset($pagefield->title2))
        <section class="sec3">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <h2>
                            {{ $pagefield->title2 }}
                        </h2>
                        <div class="bg_carousel">
                            <div class="carousel-sec3">
                                @foreach ($pagefield->details as $item)
                                <div class="item">
                                    <div class="item_">
                                        <div class="image">
                                            <a href="{{ $item['link'] }}">
                                                <img src="{{ $item['image'] }}" alt="">
                                            </a>
                                        </div>
                                        <p>
                                            {{ $item['name'] }}
                                        </p>
                                    </div>
                                    <div class="link">
                                        <a href="{{ $item['link'] }}" class="btn-vermasblue">{{ __('global.title.vermas') }}</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <p class="text">
                            {!! nl2br(htmlspecialchars_decode($pagefield->description2)) !!}
                            <br><br>
                            <strong>{{ __('global.title.volumeup') }}</strong>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if (isset($pagefield->title3))
        <section class="sec4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content_all">
                            <h2>
                                {{ $pagefield->title3 }}
                            </h2>
                            <div class="carousel-sec4">
                                @foreach ($speakers as $item)
                                <div class="item">
                                    <div class="image">
                                        <a href="{{ ${'item'}->{'button_link'.Session::get('locale')} }}">
                                            <img src="{{ $item->image }}" alt="">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <img src="{{ $item->flag }}" alt="">
                                        <p class="p1">
                                            {{ $item->name }}
                                        </p>
                                        <p class="p2">
                                            {{ ${'item'}->{'position'.Session::get('locale')} }}
                                        </p>
                                    </div>
                                    <div class="link">
                                        <a href="{{ ${'item'}->{'button_link'.Session::get('locale')} }}" class="btn-vermasblue">{{ ${'item'}->{'button_name'.Session::get('locale')} }}</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <p>
                                {!! nl2br(htmlspecialchars_decode($pagefield->description3)) !!}
                            </p>
                            <a href="{{ route('episodes') }}" class="btn btn4">{{ __('global.title.volumeupdo') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
