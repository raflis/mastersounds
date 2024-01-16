@extends('web.layout')
@section('title', $pagefield->meta_title[5])
@section('description', $pagefield->meta_description[5])
@section('keywords', $pagefield->meta_keyword[5])
@section('image', $pagefield->meta_image)
@section('content')
    <section class="sec1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 px-0">
                    <div class="carousel-header">
                        <div class="item" id="item_solution" style="background-image: url('/images/banner_contacto.jpg')">
                            <div class="text">

                                <h2>{{ __('global.title.contactheader') }}</h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec13">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-6">
                    <h2>{{ __('global.title.contacttitle') }}</h2>
                    <p>{{ __('global.title.contactcontent') }}</p>
                </div>
                <div class="col-md-6">
                    <div class="content contactform mb-5">
                        <div class="content_left">

                            @if(Session::get('locale')==1)
                            <!-- SharpSpring Form for Master Sounds - Contacto CC  -->
                            <script type="text/javascript">
                                var ss_form = {'account': 'MzY0NDIwtbCwAAA', 'formID': 'BcGBCQAwCAOwiwripK7vWPf_C0uW5OMQ2lyUT2L6BkIy6ZKbHw'};
                                ss_form.width = '100%';
                                ss_form.domain = 'app-3RUFHXUHZO.marketingautomation.services';
                                ss_form.hidden = {'LocaleID': 1}; // Modify this for sending hidden variables, or overriding values
                                // ss_form.target_id = 'target'; // Optional parameter: forms will be placed inside the element with the specified id
                                // ss_form.polling = true; // Optional parameter: set to true ONLY if your page loads dynamically and the id needs to be polled continually.
                            </script>
                            <script type="text/javascript" src="https://koi-3RUFHXUHZO.marketingautomation.services/client/form.js?ver=2.0.1"></script>
                            @else
                            <!-- SharpSpring Form for Master Sounds - Contacto CC PT  -->
                            <script type="text/javascript">
                                var ss_form = {'account': 'MzY0NDIwtbCwAAA', 'formID': 'szQ2SLEwTEnRNU9JSdY1SUs00E1KMk_VTTM1SUk1NEkzMTFKAgA'};
                                ss_form.width = '100%';
                                ss_form.domain = 'app-3RUFHXUHZO.marketingautomation.services';
                                ss_form.hidden = {'LocaleID': 2}; // Modify this for sending hidden variables, or overriding values
                                // ss_form.target_id = 'target'; // Optional parameter: forms will be placed inside the element with the specified id
                                // ss_form.polling = true; // Optional parameter: set to true ONLY if your page loads dynamically and the id needs to be polled continually.
                            </script>
                            <script type="text/javascript" src="https://koi-3RUFHXUHZO.marketingautomation.services/client/form.js?ver=2.0.1"></script>
                            @endif
                    <p><a href="{{ $pagefield->file1 }}">{{ __('global.title.sendformtos') }}</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section("script")
<script>
jQuery(function() {
    console.log("ready");
    jQuery("#country_id").change(function(){
        jQuery("#countryname").val(jQuery("#country_id option:selected").text());
    })
});
</script>
@endsection