@extends('web.layout')

@section('content')


<section class="sec1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="carousel-header">
                    <div class="item" id="item_solution" style="background-image: url('/images/banner_contacto.jpg')">
                        <div class="text">
                           
                            <h2>{{ __("global.title.newsletterheader")  }}</h2>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec13">
    <div class="container">
        <div class="row my-5">
            <div class="col-md-12 py-5">
                <h2>{{ __("global.title.newslettertitle")  }}</h2>
                <p>{{__("global.title.newslettercontentthanks") }}</p>
            </div>
            
        </div>
    </div>
</section>

@endsection