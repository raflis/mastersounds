@extends('web.layout')
@section('title', ($cat && $id)?$category_solutions[0]->meta['1'.Session::get('locale').'']:$pagefield->meta_title[2])
@section('description', ($cat && $id)?$category_solutions[0]->meta['2'.Session::get('locale').'']:$pagefield->meta_description[2])
@section('keywords', ($cat && $id)?$category_solutions[0]->meta['3'.Session::get('locale').'']:$pagefield->meta_keyword[2])
@section('image', $pagefield->meta_image)
@section('content')

<section class="sec1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="carousel-header">
                
                    @foreach($solution_sliders as $item)
                    <div class="item" id="item_solution" style="background-image: url('{{ $item->image_desktop }}')">
                        <div class="text">
                            @if( ${'item'}->{'title' .Session::get('locale')})
                            <h2>{{  ${'item'}->{'title' .Session::get('locale')} }}</h2>
                            @endif
                            @if(${'item'}->{'description' .Session::get('locale')})
                            <p>
                                {!! htmlspecialchars_decode(${'item'}->{'description' .Session::get('locale')}) !!}
                            </p>
                            @endif
                            @if(${'item'}->{'button_name' .Session::get('locale')} && ${'item'}->{'button_link' .Session::get('locale')})
                            <a href="{{ ${'item'}->{'button_link' .Session::get('locale')} }}" class="btn btn1">{{ ${'item'}->{'button_name' .Session::get('locale')} }}</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec7_2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <div class="items_link">
                        @foreach ($category_solutions_all as $item)
                        <a href="{{ route('solutions', ['cat' => Str::slug(${'item'}->{'name' . Session::get('locale')}), 'id' => $item->id]) }}" class="botonFiltro {{ (Request::is('soluciones/'.Str::slug(${'item'}->{'name' . Session::get('locale')}).'/'.$item->id)) ? 'active' : '' }}">{{ ${'item'}->{'name' . Session::get('locale')} }}</a>
                        @endforeach
                        <a href="{{ route('solutions') }}" class="botonFiltro {{ (Request::is('soluciones')) ? 'active' : '' }}">{{ __('global.title.showall') }}</a>
                    </div>
                    <div class="items_ep">
                        @foreach ($category_solutions as $item)
                            @foreach ($item->item_solutions as $ite)
                                <div class="item">
                                    <div class="item_">
                                        <div class="item_text">
                                            <a href="{{ route('solution', [Str::slug(${'ite'}->{'category_solution'}->{'name' . Session::get('locale')}), $ite->slug, $ite->id]) }}">
                                                {{ $ite->name }}
                                            </a>
                                            <p>
                                                {!! nl2br(htmlspecialchars_decode(  ${'ite'}->{'description' .Session::get('locale')} )) !!}
                                            </p>
                                        </div>
                                        <div class="item_bottom">
                                            <a href="{{ route('solution', [Str::slug(${'ite'}->{'category_solution'}->{'name' . Session::get('locale')}), $ite->slug, $ite->id]) }}">
                                                <img src="{{ asset('images/arrow.png') }}" alt="">
                                            </a>
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
</section>

@endsection