@extends('web.layout')

@section('content')

<section class="sec1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="carousel-header">
                    <div class="item" id="item_solution" style="background-image: url('{{ $item_solution->slider }}')">
                        <div class="text">
                            <h2>{{ $item_solution->name }}</h2>
                            <p>
                                {!! nl2br(htmlspecialchars_decode(  ${'item_solution'}->{'description' .Session::get('locale')} )) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec9">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content_all">
                    <div class="content_left">
                        <h2>{{ $item_solution->name }}</h2>
                        <div class="text">
                            {!! htmlspecialchars_decode(${'item_solution'}->{'body' .Session::get('locale')}) !!}
                        </div>
                        <div class="items">
                            @if (!empty($item_solution->details))
                            @foreach ($item_solution->details as $item)
                            <div class="item">
                                <div class="image">
                                    <img src="{{ $item['image'] }}" alt="">
                                </div>
                                <p>
                                    
                                    {{ $item['name'.Session::get('locale')] }}
                                </p>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="items mt-5">
                        <b>{{__("global.title.applycountry")}}:
                            {{$item_solution->countries->pluck("name")->implode(', ')}}

                        </b>
                    </div>
                    </div>
                    <div class="content_right">
                        @if($hasValid)
                        <div class="text-center">
                        <a href="{{ route("download",$item_solution->id) }}"  target="_blank" class="h2 link-light"><img src="{{ asset('images/download.png') }}" alt=""></a>
                        <h2 class="mt-5"><a href="{{ route("download",$item_solution->id)  }}"   target="_blank" class="link-light text-decoration-none">{{ __("global.title.infografiadescarga") }}</a></h2>
                        </div>
                        @else
                        <h2>{{ __("global.title.descubremas") }}</h2>


                        <a name="contacto"></a>
<!-- SharpSpring Form for Master Sounds - Solución CC  -->
<script type="text/javascript">
    var ss_form = {'account': 'MzY0NDIwtbCwAAA', 'formID': 'SzVNSzIztjDSNU1JtNA1MUxO1k00MTDRNUhONko0MU1JS0s0BAA'};
    ss_form.width = '100%';
    ss_form.domain = 'app-3RUFHXUHZO.marketingautomation.services';
     ss_form.hidden = {'solutionname': '{{ $item_solution->name }}','solutionid': '{{ $item_solution->id }}','_token':'{{csrf_token()}}'}; // Modify this for sending hidden variables, or overriding values
    // ss_form.target_id = 'target'; // Optional parameter: forms will be placed inside the element with the specified id
    // ss_form.polling = true; // Optional parameter: set to true ONLY if your page loads dynamically and the id needs to be polled continually.
</script>
<script type="text/javascript" src="https://koi-3RUFHXUHZO.marketingautomation.services/client/form.js?ver=2.0.1"></script>
<p><a href="{{ $pagefield->file1 }}">{{ __('global.title.sendformtos') }}</a></p>           

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec10">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
            
                <div class="infografia">
                    @if($hasValid)
                    <a href="{{ ${'item_solution'}->{'pdf' .Session::get('locale')} }}" id="btn-infografia">{{ __("global.title.infografia") }} <img src="{{ asset('images/download.png') }}" alt=""></a>
                    @else
                    <a href="#contacto" id="btn-infografia">{{ __("global.title.infografia") }} <img src="{{ asset('images/download.png') }}" alt=""></a>
                    @endif
                </div>
                <div class="podcast text-light text-center">
                    <img src="{{ asset('images/podcast.png') }}" alt="">
                    <div class="row">
                        <div class="col-md-8 offset-md-2 px-0">
                    <h3>{{ 'Podcast' }}</h3>
                    <h5><a href="{{ ${'item_solution'}->{'podcastlink' .Session::get('locale')} }}" class="link-light text-decoration-none">
                        {!! nl2br(htmlspecialchars_decode(${'item_solution'}->{'podcast' .Session::get('locale')})) !!}
                        </a>
                    </h5>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</section>

@endsection