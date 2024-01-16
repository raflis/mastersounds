@extends('web.layout')

@section('content')

<section class="sec12">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <div class="text">
                        @if(Session::get('locale')==1)
                        <h2>GRACIAS POR DEJARNOS TUS DATOS</h2>
                        @else
                        <h2>AGRADECEMOS POR COMPARTILHAR SEUS DADOS</h2>
                        @endif
                        <p class="text-center">
                            @if(Session::get('locale')==1)
                            Pronto nos estaremos comunicando contigo.
                            @else
                            Em breve entraremos em contato com você
                            @endif
                        </p>
                        <div class="buttons">
                            <a href="{{ route("download",$item_solution->id)  }}" class="btn btn-download" target="_blank">{{ (Session::get('locale') == 1)?'Descargar infografía':'Baixar infográfico' }}</a>
                            <a href="{{ route('index') }}" class="btn btn-back">< {{ (Session::get('locale') == 1)?'Volver':'Voltar' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection