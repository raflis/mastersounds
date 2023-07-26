@extends('web.layout')

@section('content')


<section class="sec1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="carousel-header">
                    <div class="item" id="item_solution" style="background-image: url('/images/banner_contacto.jpg')">
                        <div class="text">
                           
                            <h2>{{ __("global.title.contactheader")  }}</h2>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec13">
    <div class="container">
        <div class="row">
            <div class="col-md-12 pt-5">
                <h2>{{ __("global.title.contacttitle")  }}</h2>
                <p>{{__("global.title.contactcontentthanks") }}</p>
            </div>
            
        </div>
    </div>
</section>

@endsection