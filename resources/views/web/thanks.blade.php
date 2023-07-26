@extends('web.layout')

@section('content')

<section class="sec12">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <div class="text">
                        <h2>GRACIAS POR DEJARNOS TUS DATOS</h2>
                        <p class="text-center">
                            Pronto nos estaremos comunicando contigo.
                        </p>
                        <div class="buttons">
                            <a href="{{ route("download",$item_solution->id)  }}" class="btn btn-download" target="_blank">Descargar infografía</a>
                            <a href="{{ route('index') }}" class="btn btn-back">< Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection