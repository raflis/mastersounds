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
                <input type="hidden" name="step3select" id="step3select" value="" />
                <input type="hidden" name="step4select" id="step4select" value="" />
                <div class="container mt-1">
                    <div class="row">
                        <section id="step-0" class="step">
                            <div class="col-12 text-center mb-5 text-light">
                                <a name="comenzar"></a>
                                <h3>{{ __('global.title.filldata') }}</h3>
                            </div>
                            <div class="col-12  col-md-6 offset-md-3">
                                <div class="alert alert-warning d-none" id="step1selectError">
                                    {{ __('global.title.youmustfilldata') }}
                                </div>
                                <div class="mb-3">
                                    <label for="nombre"
                                        class="form-label  text-light">{{ __('global.title.yourname') }}</label>
                                    <input type="text" class="form-control bg-light text-primary" id="name"
                                        value="" name="name" required aria-describedby="name">
                                </div>
                                <div class="mb-3">
                                    <label for="lastname"
                                        class="form-label  text-light">{{ __('global.title.yourlastname') }}</label>
                                    <input type="text" class="form-control bg-light text-primary" id="lastname"
                                        value="" name="lastname" required aria-describedby="lastname">
                                </div>
                                <div class="mb-3">
                                    <label for="email"
                                        class="form-label  text-light">{{ __('global.title.youremail') }}</label>
                                    <input type="email" class="form-control bg-light text-primary" id="email"
                                        value="" name="email" required aria-describedby="email">
                                </div>
                                <div class="mb-3">
                                    <label for="pais"
                                        class="form-label  text-light">{{ __('global.title.yourcountry') }}</label>
                                    <select class="form-select bg-light text-primary" aria-label="Default select example"
                                        id="pais" name="pais" required>
                                        <option selected value="0">{{ __('global.title.selectyourcountry') }}</option>
                                      @foreach($countries as $country)
                                        <option value="{{$country->name}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </section>
                        <section id="step-1" class="step d-none ">
                            <div class="col-12 text-center mb-5 text-light">
                                <h3>{{ __('global.title.choosecategory') }}</h3>
                            </div>
                            <div class="col-12  col-md-12">
                                <div class="alert alert-warning d-none" id="step2selectError">
                                    {{ __('global.title.youmustchoosecategory') }}
                                </div>
                                <div class="row  d-flex justify-content-center">
                                    @foreach ($catsol as $cat)
                                        <div class="col-6 col-md-2">
                                            <div class="card  h-100 step2select" data-item="{{ $cat->id }}">
                                                <div
                                                    class="rounded-3 text-bg-light card-body d-flex align-items-center justify-content-center p-md-5 text-center">
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
                        </section>
                        <section id="step-2" class="step d-none">
                            <div class="col-12 text-center mb-5 text-light">
                                <h3>{{ __('global.title.yourindustry') }}</h3>
                            </div>
                            <div class="col-12  col-md-8 offset-md-2">
                                <div class="alert alert-warning d-none" id="step3selectError">
                                    {{ __('global.title.yourmustindustry') }}
                                </div>
                                <div class="row">
                                    @foreach ($industry as $ind)
                                        <div class="col-6 col-md-2 mb-3">
                                            <div class="card h-100  step3select" data-item="{{ $ind->id }}">
                                                <div
                                                    class="rounded-3 text-bg-light card-body d-flex align-items-center justify-content-center p-3 text-center">
                                                    <img class="img-fluid" width="72"
                                                        src="/assets/png/{{ $ind->imagewizard }}.png" />
                                                </div>
                                                <div class="card-footer text-center">
                                                    {{ ${'ind'}->{'name' . Session::get('locale')} }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center d-none" id="otherIndustry">
                                        <div class="mb-3">
                                            <label for="industry"
                                                class="form-label  text-light">{{ __('global.title.fillindustry') }}</label>
                                            <input type="text" class="form-control bg-light text-primary"
                                                id="industry" value="" name="industry" required
                                                aria-describedby="industry">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="step-3" class="step d-none">
                            <div class="col-12 text-center mb-5 text-light">
                                <h3>{{ __('global.title.usernumberrequired') }}</h3>
                            </div>
                            <div class="col-12  col-md-8 offset-md-2 text-center">
                                <div class="alert alert-warning d-none" id="step4selectError">
                                    {{ __('global.title.yourmustusernumberrequired') }}
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-4">
                                        <div class="card h-100 step4select" data-item="10">
                                            <div
                                                class="rounded-3 text-bg-light card-body d-flex align-items-center justify-content-center p-3 text-center">
                                                <img height="71" src="/assets/png/p10.png" />
                                            </div>
                                            <div class="card-footer text-center">1 a 10</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="card h-100 step4select" data-item="100">
                                            <div
                                                class="rounded-3 text-bg-light card-body d-flex align-items-center justify-content-center p-3 text-center">
                                                <img height="71" width="72" src="/assets/png/p50.png" />
                                            </div>
                                            <div class="card-footer text-center">11 a 100</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="card h-100 step4select" data-item="101">
                                            <div
                                                class="rounded-3 text-bg-light card-body d-flex align-items-center justify-content-center p-3 text-center">
                                                <img height="71" width="72" src="/assets/png/pplus.png" />
                                            </div>
                                            <div class="card-footer text-center">+101</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12  col-md-6 offset-md-3">
                            <div class="mb-3 text-center">
                                <span class="btn btn-sm  btn-enviar btn-primary disabled"
                                    id="wizPrev">{{ __('global.title.previous') }}</span>
                                <span class="btn btn-sm btn-enviar btn-primary"
                                    id="wizNext">{{ __('global.title.next') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="container pt-5">
            <div class="row">
                <div class="col-6 offset-3 col-md-4 offset-md-4">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100">
                        <div class="progress-bar" id="progressValue"></div>
                    </div>
                </div>
                <div class="col-6 offset-3 col-md-4 offset-md-4 text-center">
                    <p class="text-light" id="progressStep"></p>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            var globaltitle = "{{ __('global.title.search') }}";
            var currentStep = 0;
            var totalStep = 0;


            function moveTo(step) {
                console.log("moveto");
                jQuery("#progressStep").html((1 + step) + "/" + (1 + totalStep));
                jQuery(".step").addClass("d-none");
                jQuery("#step-" + step).removeClass("d-none").addClass("d-block");
                console.log(jQuery("#step-" + step));
                var width = Math.round(((step + 1) * 100) / (totalStep + 1));
                console.log(step + " of " + totalStep);
                console.log(width);
                jQuery("#progressValue").css({
                    "width": width + "%"
                });

                if (step > 0) {
                    jQuery("#wizPrev").removeClass("disabled");
                } else {
                    jQuery("#wizPrev").addClass("disabled");
                }
                if (step < totalStep) {
                    jQuery("#wizNext").html("{{ __('global.title.next') }}")
                } else {
                    jQuery("#wizNext").html("{{ __('global.title.search') }}")
                }


            }

            function validateFields() {
                return true;
            }

            function ValidateEmail(value) {

                var input = document.createElement('input');

                input.type = 'email';
                input.required = true;
                input.value = value;

                if (typeof input.checkValidity === 'function' ? input.checkValidity() : /\S+@\S+\.\S+/.test(value)) {
                    if (value.includes("gmail") || value.includes("hotmail"))
                        return false;
                    return true;
                } else {
                    return false;
                }
            }
            jQuery(function() {
                totalStep = jQuery(".step").length - 1;
                jQuery(".step");
                console.log("length");
                console.log(jQuery(".step").length);
                moveTo(currentStep);

                jQuery("#wizPrev").click(function() {

                    if (currentStep != 0)
                        currentStep--;
                    moveTo(currentStep);
                });
                jQuery("#wizNext").click(function() {

                    var sigue = true;
                    console.log(currentStep);
                    if (currentStep == 0) {
                        console.log(ValidateEmail(jQuery("#email").val().trim()));
                        if (jQuery("#name").val().trim() == "" || jQuery("#lastname").val().trim() == "" ||
                            jQuery("#email").val().trim() == "" || jQuery("#pais").val().trim() == 0 || !(
                                ValidateEmail(jQuery("#email").val().trim()))) {
                            sigue = false;
                            $("#wizard")[0].reportValidity();
                            jQuery("#step1selectError").removeClass("d-none");
                        } else {
                            jQuery("#step1selectError").addClass("d-none");
                        }
                    } else if (currentStep == 1) {
                        console.log('jQuery("#step2select").val().trim()');
                        console.log(jQuery("#step2select").val().trim());
                        console.log('!jQuery("#step2select").val().trim()');
                        if (jQuery("#step2select").val().trim() == "") {
                            sigue = false;
                            jQuery("#step2selectError").removeClass("d-none");
                        } else {
                            jQuery("#step2selectError").addClass("d-none");
                        }
                    } else if (currentStep == 2) {
                        if (jQuery("#step3select").val().trim() == "") {
                            sigue = false;
                            jQuery("#step3selectError").removeClass("d-none");
                        } else {
                            jQuery("#step4selectError").addClass("d-none");
                        }
                    } else if (currentStep == 3) {
                        if (jQuery("#step4select").val().trim() == "") {
                            sigue = false;
                            jQuery("#step4selectError").removeClass("d-none");
                        } else {
                            jQuery("#step4selectError").addClass("d-none");
                        }
                    }

                    if (sigue) {
                        if (jQuery("#wizNext").html() == globaltitle) {
                            //jQuery("#wizard").addClass("d-none");
                            //jQuery("#results").removeClass("d-none");
                            jQuery("#wizard").submit();
                        } else {
                            if (validateFields() && currentStep < totalStep) {
                                currentStep++;
                            }
                            moveTo(currentStep);
                        }
                    }
                });
                jQuery(".step2select").click(function() {
                    console.log("click");
                    $("#step2select").val(jQuery(this).attr("data-item"));
                    if (jQuery("#step2select").val().trim() == "") {
                        jQuery("#step2selectError").removeClass("d-none");
                    } else {

                    }
                    jQuery(".step2select .card-body").removeClass("text-bg-primary").addClass("text-bg-light");
                    jQuery(this).find(".card-body", 0).addClass("text-bg-primary").removeClass("text-bg-light");

                });
                jQuery(".step3select").click(function() {
                    $("#step3select").val(jQuery(this).attr("data-item"));
                    if (jQuery("#step3select").val().trim() == "") {
                        jQuery("#step3selectError").removeClass("d-none");
                    } else {
                        if (jQuery("#step3select").val().trim() == 12)
                            jQuery("#otherIndustry").removeClass("d-none");
                        else
                            jQuery("#otherIndustry").addClass("d-none");

                        jQuery("#step3selectError").addClass("d-none");
                    }
                    jQuery(".step3select .card-body").removeClass("text-bg-primary").addClass("text-bg-light");
                    jQuery(this).find(".card-body", 0).addClass("text-bg-primary").removeClass("text-bg-light");
                });
                jQuery(".step4select").click(function() {
                    $("#step4select").val(jQuery(this).attr("data-item"));
                    if (jQuery("#step4select").val().trim() == "") {
                        jQuery("#step4selectError").removeClass("d-none");
                    } else {
                        jQuery("#step4selectError").addClass("d-none");
                    }
                    jQuery(".step4select .card-body").removeClass("text-bg-primary").addClass("text-bg-light");
                    jQuery(this).find(".card-body", 0).addClass("text-bg-primary").removeClass("text-bg-light");
                });

            });
        </script>
    @endsection
