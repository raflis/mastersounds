@extends('web.layout')

@section('content')


<section class="sec1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="carousel-header">
                    <div class="item" id="item_solution" style="background-image: url('/images/banner_contacto.jpg')">
                        <div class="text">
                           
                            <h2>
                                @if(Session::get('locale')==1)
                                Mantente en sintonía con Master Sounds
                                @else
                                Fique em sintonia com a Master Sounds
                                @endif
                            </h2>
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
                <h2>
                    @if(Session::get('locale')==1)
                    ¡Suscríbete!
                    @else
                    Cadastre-se!
                    @endif
                </h2>
                <p>
                    @if(Session::get('locale')==1)
                    Gracias por comunicarte con nosotros, en breve nuestros especialistas se pondrán en contacto contigo
                    @else
                    Obrigado por nos contatar, em breve nossos especialistas entrarão em contato com você
                    @endif
                </p>
            </div>
            
        </div>
    </div>
</section>

@endsection