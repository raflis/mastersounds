@extends('web.layout')

@section('content')
    <section class="sec7">
        <div class="container  py-5 mt-5" id="results">
            <div class="col-12 text-center text-light mb-5">
                <h3>{{ __('global.title.wizardresulttitle') }}</h3>
            </div>
            @if (!$solutions->isEmpty())
            <div class="col-12  col-md-8 offset-md-2 text-center">
                @foreach ($solutions as $solution)
                    

                        <div class="items">
                            <div class="row">

                                <div class="col-6 col-md-4">
                                    <div class="itemSolution">
                                        <div class="item">
                                            <div class="text">
                                                <h2>
                                                    {{ $solution->name }}
                                                </h2>
                                                <p>
                                                    {!! nl2br(htmlspecialchars_decode(${'solution'}->{'description' . Session::get('locale')})) !!}
                                                </p>
                                                <a href="{{ route('solution', [Str::slug($solution->category_solution->name1), $solution->slug, $solution->id]) }}"
                                                    class="btn-go"><img src="{{ asset('images/arrow.png') }}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                @endforeach
            </div>
            @else
                <div class="col-12  text-light text-center">
                    {{ __('global.title.nosolutions') }}
                </div>
                <div class="col-12  text-light text-center">
                    <section class="sec7">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content_all">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                            @foreach ($category_solutions as $item)
                                                <span class="botonFiltro" data-filter=".catsol-{{ $item->id }}">
                                                    {{ ${'item'}->{'name' . Session::get('locale')} }}
                                                </span>
                                                </li>
                                            @endforeach
                                            <li class="nav-item" role="presentation">
                                                <span class="botonFiltro active" data-filter="*">
                                                    {{ __('global.title.showall') }}
                                                </span>
                                            </li>
                                        </ul>
                                        <div class="contitems">
                                            <div class=" " id="pills-tabContent">
                                                <div
                                                    class="row row-cols-1 row-cols-md-4 g-4 d-flex align-items-stretch itemfilter">
                                                    @foreach ($category_solutions as $item)
                                                        @foreach ($item->item_solutions as $ite)
                                                            <div class="col    catsol-{{ $item->id }}">
                                                                <div
                                                                    class="card text-bg-light mb-3 rounded rounded-4 h-100 d-inline-block">

                                                                    <div class="card-body" style="height:160px">
                                                                        <h5 class="card-title text-bluebs">
                                                                            {{ $ite->name }}</h5>
                                                                        <p class="card-text"> {!! nl2br(htmlspecialchars_decode(${'ite'}->{'description' . Session::get('locale')})) !!}</p>
                                                                    </div>
                                                                    <div
                                                                        class="card-footer bg-transparent border-0 text-end">
                                                                        <a href="{{ route('solution', [Str::slug($ite->category_solution->name1), $ite->slug, $ite->id]) }}"
                                                                            class="btn-go"><img
                                                                                src="{{ asset('images/arrow.png') }}"
                                                                                style="width: 32px" alt=""></a>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                </div>
            @endif
        </div>
        </div>
        </div>
        </div>
    </section>
    @endsection

    @section('script')
        <script>
            @if ($solutions->isEmpty())
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
            @endif
        </script>
@endsection