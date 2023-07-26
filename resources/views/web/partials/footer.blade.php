<div class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="content_left">
                    <img src="{{ $pagefield->logo_footer }}" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="content_right">
                    <div class="links">
                        <a href="{{ $pagefield->file1 }}" target="_blank">{{ __("global.title.legales") }}</a>
                        <div class="separator">|</div>
                        <a href="{{ $pagefield->file2 }}" target="_blank">{{ __("global.title.personaldata") }}</a>
                        <div class="separator">|</div>
                        <a href="{{ $pagefield->file3 }}" target="_blank">{{ __("global.title.cookies") }}</a>
                        <div class="separator">|</div>
                        <a href="{{ route('newsletter') }}">{{ __("global.title.newsletter") }}</a>
                        <div class="separator">|</div>
                        <!--<a href="{{ $pagefield->file5 }}" target="_blank">{{ __("global.title.seguridad") }}</a>
                        <div class="separator">|</div>-->
                        <a href="{{ route('contact') }}" >{{ __("global.title.contact") }}</a>
                        <hr>
                    </div>
                    <div class="social">
                        @if($pagefield->link1)<a href="{{ $pagefield->link1 }}" target="_blank"><img src="{{ asset('images/ico1.png') }}" alt=""></a>@endif
                        @if($pagefield->link2)<a href="{{ $pagefield->link2 }}" target="_blank"><img src="{{ asset('images/ico2.png') }}" alt=""></a>@endif
                        @if($pagefield->link3)<a href="{{ $pagefield->link3 }}" target="_blank"><img src="{{ asset('images/ico3.png') }}" alt=""></a>@endif
                        @if($pagefield->link4)<a href="{{ $pagefield->link4 }}" target="_blank"><img src="{{ asset('images/ico4.png') }}" alt=""></a>@endif
                        @if($pagefield->link5)<a href="{{ $pagefield->link5 }}" target="_blank"><img src="{{ asset('images/ico5.png') }}" alt=""></a>@endif
                        @if($pagefield->link6)<a href="{{ $pagefield->link6 }}" target="_blank"><img src="{{ asset('images/ico6.png') }}" alt=""></a>@endif
                        @if($pagefield->link7)<a href="{{ $pagefield->link7 }}" target="_blank"><img src="{{ asset('images/ico7.png') }}" alt=""></a>@endif
                        @if($pagefield->link8)<a href="{{ $pagefield->link8 }}" target="_blank"><img src="{{ asset('images/ico8.png') }}" alt=""></a>@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>