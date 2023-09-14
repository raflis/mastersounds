@extends('web.layout')

@section('content')
    <section class="sec1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 px-0">
                    <div class="carousel-header">
                        @foreach ($episode_sliders as $item)
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

    <section class="sec5_2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <div class="items_link">
                            @foreach ($category_episodes_all as $item)
                            <a href="{{ route('episodes', ['cat' => Str::slug(${'item'}->{'name' . Session::get('locale')}), 'id' => $item->id]) }}" class="botonFiltro {{ (Request::is('episodios/'.Str::slug(${'item'}->{'name' . Session::get('locale')}).'/'.$item->id)) ? 'active' : '' }}">{{ ${'item'}->{'name' . Session::get('locale')} }}</a>
                            @endforeach
                            <a href="{{ route('episodes') }}" class="botonFiltro {{ (Request::is('episodios')) ? 'active' : '' }}">{{ __('global.title.showall') }}</a>
                        </div>
                        <div class="items_ep">
                            @foreach ($category_episodes as $ite)
                                @foreach ($ite->item_episodes as $item)
                                <div class="item">
                                    <div class="image" style="background-image: url('{{ $item->image }}')">
                                        <a href="{{ route('episode', [Str::slug(${'item'}->{'category_episode'}->{'name' . Session::get('locale')}), $item->slug, $item->id]) }}"></a>
                                    </div>
                                    <div class="content">
                                        <div class="image">
                                            <img src="{{ $item->autor_image }}" alt="">
                                        </div>
                                        <div class="text">
                                            <a href="{{ route('episode', [Str::slug(${'item'}->{'category_episode'}->{'name' . Session::get('locale')}), $item->slug, $item->id]) }}">{{ $item->name }}</a>
                                            <p>{{ $item->autor_name }}</p>
                                            <p>{{ \Carbon\Carbon::parse(strtotime($item->date))->formatLocalized('%d de %B de %Y') }}</p>
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
