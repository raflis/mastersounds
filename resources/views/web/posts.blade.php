@extends('web.layout')

@section('content')
    <section class="sec1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 px-0">
                    <div class="carousel-header">
                        @foreach ($post_sliders as $item)
                            <div class="item" id="item_solution" style="background-image: url('{{ $item->image_desktop }}')">
                                <div class="text">
                                    @if (${'item'}->{'title' . Session::get('locale')})
                                        <h2>{{ ${'item'}->{'title' . Session::get('locale')} }}</h2>
                                    @endif
                                    @if (${'item'}->{'description' . Session::get('locale')})
                                        <p>
                                            {!! htmlspecialchars_decode(${'item'}->{'description' . Session::get('locale')}) !!}
                                        </p>
                                    @endif
                                    @if (${'item'}->{'button_name' . Session::get('locale')} && ${'item'}->{'button_link' . Session::get('locale')})
                                        <a href="{{ ${'item'}->{'button_link' . Session::get('locale')} }}"
                                            class="btn btn1">{{ ${'item'}->{'button_name' . Session::get('locale')} }}</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $cat = Request::get('cat');
        $cat_get = $cat ? $cat : 1;
    @endphp

    <section class="sec5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_all">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach ($category_posts as $item)
                                <li class="nav-item mb-5" role="presentation">
                                    <span class="botonFiltro" data-filter=".catsol-{{ $item->id }}">
                                        {{ ${'item'}->{'name' . Session::get('locale')} }}
                                    </span>
                                </li>
                            @endforeach
                            <li class="nav-item mb-5" role="presentation">
                                <span class="botonFiltro active" data-filter="*">
                                    {{ __('global.title.showall') }}
                                </span>
                            </li>
                        </ul>
                        <div class="contitems">
                            <div class=" " id="pills-tabContent">
                                <div class="row row-cols-1 row-cols-md-4 g-4 d-flex align-items-stretch itemfilter">
                                    @foreach ($category_posts as $item)
                                        @foreach ($item->item_posts as $ite)
                                            @if (${'ite'}->{'name' . Session::get('locale')} != '#' && ${'ite'}->{'body' . Session::get('locale')} != '#')
                                                <div class="col    catsol-{{ $item->id }}">
                                                    <div
                                                        class="card bg-transparent  mb-3 rounded rounded-4 h-100 d-inline-block">
                                                        <a
                                                            href="{{ route('post', [Str::slug($ite->category_post->name1), $ite->slug, $ite->id]) }}"><img
                                                                src="{{ str_replace('/Noticias/','/Noticias/thumbs/',$ite->image0) }}" class="card-img-top"
                                                                alt="..."></a>
                                                        <div class="card-body" style="height:160px">
                                                            <h5 class="card-title text-light">
                                                                <a class="text-light text-decoration-none"
                                                                href="{{ route('post', [Str::slug($ite->category_post->name1), $ite->slug, $ite->id]) }}"> {{ ${'ite'}->{'name' . Session::get('locale')} }}</h5></a>
                                                            <p class="card-text">
                                                                {{ \Carbon\Carbon::parse(strtotime($ite->date))->formatLocalized('%d de %B de %Y') }}
                                                            </p>
                                                        </div>
                                                        <div class="card-footer bg-transparent border-0 text-end">
                                                            <a href="{{ route('post', [Str::slug($ite->category_post->name1), $ite->slug, $ite->id]) }}"
                                                                class="btn-go"><img src="{{ asset('images/arrow.png') }}"
                                                                    style="width: 32px" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section("script")
<script>
$(window).on('load', function() {
    var $container = $('.itemfilter');
    var $filter = $('#pills-tab');
    $container.isotope({
        filter: '*',
        layoutMode: 'fitRows',
        animationOptions: {
            duration: 750,
            easing: 'linear'
        }
    });
    $filter.find('span').click(function() {
        var selector = $(this).attr('data-filter');
        $filter.find('span').removeClass('active');
        $(this).addClass('active');
        $container.isotope({
            filter: selector,
            animationOptions: {
                animationDuration: 750,
                easing: 'linear',
                queue: false,
            }
        });
        return false;
    });
});
 
    </script>
@endsection
