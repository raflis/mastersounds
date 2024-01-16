@extends('web.layout')
@section('title', $pagefield->meta_title[4])
@section('description', $pagefield->meta_description[4])
@section('keywords', $pagefield->meta_keyword[4])
@section('image', $pagefield->meta_image)
@section('content')


<section class="sec9">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="carousel-header">
                    <div class="item" id="item_desktop" style="background-image: url({{ $pagefield->blog_slider }})">
                        <div class="image_mobile">
                            <img src="{{ $pagefield->blog_slider }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec14">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <div class="items">
                        @foreach ($posts as $item)
                        <div class="item @if($loop->iteration % 2 != 0) item1 @endif">
                            <div class="image">
                                <img src="{{ $item->image }}" alt="">
                            </div>
                            <div class="text">
                                <h1>{{ $item->name }}</h1>
                                <p>
                                    {!! Str::limit(htmlspecialchars_decode($item->body), 400) !!}
                                </p>
                                <a href="{{ route('post', [$item->slug, $item->id]) }}" class="btn btn-vermas">LEER MÁS</a>
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