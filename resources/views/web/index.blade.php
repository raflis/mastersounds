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
                    </div>
                    <div class="col-12  justify-content-center">
                        <div class="card-group g-0 bg_carousel text-light p-5">
                            
                                @if (!empty($pagefield->details))
                                    @foreach ($pagefield->details as $item)

                                    <div class="card bg-transparent text-center h-100">
                                        <div class="card-header ">
                                        <img src="{{ $item['image'] }}" alt="" class="mb-4 mx-auto" style="max-height: 64px">
                                        </div>
                                        <div class="card-body">
                                          <h6 class="card-title">{{ $item['name'] }}</h6>
                                          
                                        </div>
                                      </div>
                                      
                                    @endforeach
                                @endif
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
                        </div>
                        </div>
                        </div>
                        
                        
                        <div class="row speakerlist">
                            <div class="col-6 col-md-4 text-light text-center">
                                <div class="item">
                                    <div class="image">
                                        <img src="{{ asset('images/speaker1.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="text">
                                        <img src="{{ asset('images/pe.png') }}" alt="" width="32">
                                        <h6>Jaime Sotomayor</h6>
                                        <p>{{ __('global.title.jaimesotomayor') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 text-light text-center">
                                <div class="item">
                                    <div class="image">
                                        <img src="{{ asset('images/speaker2.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="text">
                                        <img src="{{ asset('images/co.png') }}" alt="" width="32">
                                        
                                            <h6>Ana María Quintero</h6>
                                            <p>
                                            {{ __('global.title.anamariaquintero') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 text-light text-center">
                                <div class="item">
                                    <div class="image">
                                        <img src="{{ asset('images/speaker3.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="text">
                                        <img src="{{ asset('images/mx.png') }}" alt="" width="32">
                                            <h6>Jose Antonio Lanzguerrero</h6>
                                            <p>
                                            {{ __('global.title.joseantonio') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 text-light text-center">
                                <div class="item">
                                    <div class="image">
                                        <img src="{{ asset('images/speaker4.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="text">
                                        <img src="{{ asset('images/pe.png') }}" alt="" width="32">
                                        
                                            <h6>Nicolás Valcarcel</h6>
                                            <p>
                                            {{ __('global.title.nicolas') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 text-light text-center">
                                <div class="item">
                                    <div class="image">
                                        <img src="{{ asset('images/speaker5.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="text">
                                        <img src="{{ asset('images/co.png') }}" alt="" width="32">
                                    
                                            <h6>Camila Navarro</h6>
                                            <p>
                                            {{ __('global.title.camila') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                <div class="row">
                    <div class="col-md-12">
                        <div class="content_all">
                        <p>
                            {!! nl2br(htmlspecialchars_decode($pagefield->description3)) !!}
                        </p>
                        <a href="{{ route('episodes') }}" class="btn btn4">{{ __('global.title.volumeupdo') }}</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
    @endif
@endsection
