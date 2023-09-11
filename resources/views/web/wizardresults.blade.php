@extends('web.layout')

@section('content')

<section class="sec12">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="content py-4">
                    <div class="text">
                        <h3>{!! htmlspecialchars_decode(${'pagefield'}->{'wizard_result_text' . Session::get('locale')}) !!}</h3>
                        <div class="buttons2 buttons">
                            <a target="_blank" href="{{ ${'pagefield'}->{'wizard_result_link' . Session::get('locale')} }}" class="btn btn-download mb-3" target="_blank">
                                {{ ${'pagefield'}->{'wizard_result_button' . Session::get('locale')} }}
                            </a>
                            <a href="{{ route('index') }}" class="btn btn-back">
                                < {{ __('global.title.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection