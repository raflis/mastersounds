@extends('web.layout')

@section('content')

<section class="sec15">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <div class="image">
                        <img src="{{ $post->image }}" alt="">
                    </div>
                    <div class="text">
                        <h1>{{ $post->name }}</h1>
                        <p>
                            {!! htmlspecialchars_decode($post->body) !!}
                        </p>
                        <a href="{{ route('blog') }}" class="btn btn-back">< Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection