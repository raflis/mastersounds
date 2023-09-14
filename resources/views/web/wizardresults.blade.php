@extends('web.layout')

@section('content')

<section class="sec12_2">
    <div class="cover_bg"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="content">
                    <div class="text">
                        <h3>{!! htmlspecialchars_decode(${'pagefield'}->{'wizard_result_text' . Session::get('locale')}) !!}</h3>
                        <div class="buttons2 buttons">
                            <a target="_blank" href="{{ ${'pagefield'}->{'wizard_result_link' . Session::get('locale')} }}" class="btn btn-download mb-3" target="_blank">
                                {{ ${'pagefield'}->{'wizard_result_button' . Session::get('locale')} }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="sec12_3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="items carousel-wizard-thanks">
                    @foreach ($item_episodes as $item)
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection