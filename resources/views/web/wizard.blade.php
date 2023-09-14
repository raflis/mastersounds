@extends('web.layout')

@section('content')

<section class="sec1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="carousel-header">
                    <div class="item" id="item_wizard"
                        style="background-image: url('{{ $pagefield->wizard_banner }}')">
                        <div class="text2">
                            <p>
                                {!! htmlspecialchars_decode(${'pagefield'}->{'wizard_text' . Session::get('locale')}) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec7">
    <div class="contactform">
        <form id="wizard" method="post" action="{{ route('wizard.post') }}">
            {{ csrf_field() }}
            <input type="hidden" name="step2select" id="step2select" value="" />
            <div class="container mt-1">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center text-light mb-3">
                        <a name="comenzar"></a>
                        <h3>{{ __('global.title.filldata') }}</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="alert alert-warning d-none" id="step1selectError">
                            {{ __('global.title.youmustfilldata') }}
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="nombre"
                            class="form-label text-light">{{ __('global.title.yourname') }}</label>
                        <input type="text" class="form-control" id="name"
                            value="" name="name" required aria-describedby="name" placeholder="{{ __('global.title.yourname') }}">
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="lastname"
                            class="form-label text-light">{{ __('global.title.yourlastname') }}</label>
                        <input type="text" class="form-control" id="lastname"
                            value="" name="lastname" required aria-describedby="lastname" placeholder="{{ __('global.title.yourlastname') }}">
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="email"
                            class="form-label text-light">{{ __('global.title.youremail') }}</label>
                        <input type="email" class="form-control" id="email"
                            value="" name="email" required aria-describedby="email" placeholder="{{ __('global.title.youremail') }}">
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="phone"
                            class="form-label text-light">{{ __('global.title.yourphone') }}</label>
                        <div class="phone_contact d-flex">
                            <div class="dropdown drop_flags">
                                <button class="btn btn-flag dropdown-toggle" type="button" id="drop_flags" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="flag_user" src="{{ asset('images/flags/pe.png') }}" alt="">
                                    <input type="hidden" name="flag_dial_code" id="flag_dial_code" value="+51">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="drop_flags">
                                    @foreach ($flags as $flag)
                                    <li>
                                        <button id="flag_selec" class="dropdown-item" type="button" flag_dial_code="{{ $flag->dial_code }}" imagen_bandera="{{ asset('images/flags/'.$flag->image) }}" placeholder_bandera="{{ $flag->placeholder }}">
                                            <img src="{{ asset('images/flags/'.$flag->image) }}" alt="">
                                            <p>{{ $flag->name }} <span>({{ $flag->dial_code }})</span></p>
                                        </button>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <input type="text" class="form-control" id="phone" name="phone" required aria-describedby="phone" placeholder="+51999666333">
                        </div>
                    </div>
                    <div class="col-12 text-center mb-3 mt-3 text-light">
                        <h3>{{ __('global.title.choosecategory') }}</h3>
                    </div>
                    <div class="col-12  col-md-12">
                        <div class="alert alert-warning d-none" id="step2selectError">
                            {{ __('global.title.youmustchoosecategory') }}
                        </div>
                        <div class="row  d-flex justify-content-center">
                            @foreach ($catsol as $cat)
                                <div class="col-6 col-md-2 mb-2">
                                    <div class="card h-100 step2select" data-item="{{ $cat->id }}">
                                        <div
                                            class="rounded-3 text-bg-light card-body d-flex align-items-center justify-content-center p-md-3 text-center">
                                            <img width="96" src="{{ $cat->iconwizard }}" />
                                        </div>
                                        <div class="card-footer text-center">
                                            {{ ${'cat'}->{'name' . Session::get('locale')} }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="mb-3 text-center">
                            <span class="btn btn-vermasblue" id="wizNext">
                                {{ __('global.title.submit') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>
@endsection

@section('script')
    <script>

        function validateFields() {
            return true;
        }

        function ValidateEmail(value) {

            var input = document.createElement('input');

            input.type = 'email';
            input.required = true;
            input.value = value;

            if (typeof input.checkValidity === 'function' ? input.checkValidity() : /\S+@\S+\.\S+/.test(value)) {
                if (value.includes("gmail") || value.includes("hotmail")){
                    return false;
                }
                return true;
            } else {
                return false;
            }
        }

        jQuery(function() {

            var sigue = false;
            var sigue2 = false;

            jQuery("#wizNext").click(function() {

                if (jQuery("#name").val().trim() == "" || jQuery("#lastname").val().trim() == "" ||
                    jQuery("#email").val().trim() == "" || jQuery("#flag_dial_code").val().trim() == 0 || jQuery("#phone").val().trim() == 0 || !(
                        ValidateEmail(jQuery("#email").val().trim()))) {
                    sigue = false;
                    $("#wizard")[0].reportValidity();
                    jQuery("#step1selectError").removeClass("d-none");
                }
                else{
                    sigue = true;
                    jQuery("#step1selectError").addClass("d-none");
                    console.log($("#wizard")[0].reportValidity());
                }

                if (jQuery("#step2select").val().trim() == "") {
                    sigue2 = false;
                    jQuery("#step2selectError").removeClass("d-none");
                }
                else{
                    sigue2 = true;
                    jQuery("#step2selectError").addClass("d-none");
                }

                if(sigue == true && sigue2 == true){
                    jQuery("#wizard").submit();
                    jQuery("#wizNext").addClass("disabled");
                }else{
                    console.log('pending');
                }

            });

            jQuery(".step2select").click(function() {
                console.log("click");
                $("#step2select").val(jQuery(this).attr("data-item"));
                if (jQuery("#step2select").val().trim() == "") {
                    jQuery("#step2selectError").removeClass("d-none");
                } else {
                    jQuery("#step2selectError").addClass("d-none");
                }
                jQuery(".step2select .card-body").removeClass("text-bg-primary").addClass("text-bg-light");
                jQuery(this).find(".card-body", 0).addClass("text-bg-primary").removeClass("text-bg-light");
            });

            $('[id*=flag_selec]').on('click', function(){
                var imagen_bandera = $(this).attr('imagen_bandera');
                var placeholder_bandera = $(this).attr('placeholder_bandera');
                var flag_dial_code = $(this).attr('flag_dial_code');
                $('.flag_user').attr('src', imagen_bandera);
                $('#phone').attr('placeholder', placeholder_bandera);
                $('input[name=flag_dial_code]').val(flag_dial_code);
                console.log(imagen_bandera);
            })

        });
    </script>
@endsection
