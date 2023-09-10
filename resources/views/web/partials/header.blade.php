<header class="bd-header bg-dark py-3 d-flex align-items-stretch border-bottom border-dark">
    <div class="container-fluid d-flex align-items-center">
        <h1 class="d-flex align-items-center fs-4 text-white mb-0">

        </h1>
    </div>
</header>


<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark text-bg-darkmenu">
    <div class="container-fluid">
        <a href="{{ route('index') }}" class="navbar-brand">
            <img src="{{ $pagefield->logo_header }}" alt="" style="height:17px" class="img-fluid d-none d-md-block">
            <img src="{{ $pagefield->logo_header_mobile }}" alt="" style="width:75%" class="img-fluid d-inline-block d-md-none">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
            <ul class="navbar-nav me-0 mb-2 mb-md-0">

                <li class="nav-item"><a href="{{ route('index') }}"
                        class=" nav-link @if (in_array(Route::currentRouteName(), ['index'])) active @endif">{{ __('global.title.home') }}</a>
                </li>
                <li class="nav-item"><a href="{{ route('solutions') }}"
                        class=" nav-link @if (in_array(Route::currentRouteName(), ['solutions', 'solution'])) active @endif">{{ __('global.title.solutions') }}</a>
                </li>
                <li class="nav-item"><a href="{{ route('episodes') }}"
                        class=" nav-link @if (in_array(Route::currentRouteName(), ['episodes', 'episode'])) active @endif">{{ __('global.title.episodes') }}</a>
                </li>
                <li class="nav-item"><a href="{{ route('posts') }}"
                        class=" nav-link @if (in_array(Route::currentRouteName(), ['posts', 'post'])) active @endif">{{ __('global.title.news') }}</a>
                </li>
                <li class="nav-item"><a href="{{ route('contact') }}"
                        class=" nav-link @if (in_array(Route::currentRouteName(), ['contact'])) active @endif">{{ __('global.title.contact') }}</a>
                </li>


            </ul>
            <div class="d-flex">
                <a class="btn btn-link btnbandera text-center @if(Session::get('locale')==1) active @endif" href="{{ route('changeLanguage', 'es') }}"><img src="/images/es.svg" width="32"
                        class="img-fluid"></a>
                <a class="btn btn-link btnbandera me-2 text-center  @if(Session::get('locale')==2) active @endif" href="{{ route('changeLanguage', 'pt') }}"><img src="/images/pt.svg" width="32"
                        class="img-fluid"></a>
            </div>
        </div>
    </div>
</nav>


<section class="header_mobile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <div class="content-left">
                        <div class="logo">
                            <a href="{{ route('index') }}">
                                <img src="{{ $pagefield->logo_header_mobile }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="content-right">
                        <div class="burger burgergg">
                            <div class="linea1"></div>
                            <div class="linea2"></div>
                            <div class="linea3"></div>
                        </div>
                    </div>
                    <div class="content-list">
                        <div class="burger0 burgergg">
                            <div class="linea1"></div>
                            <div class="linea2"></div>
                            <div class="linea3"></div>
                        </div>
                        <ul>
                            <li class="li_item">
                                <a href="{{ route('index') }}"
                                    class="@if (in_array(Route::currentRouteName(), ['index'])) active @endif">{{ __('global.title.home') }}</a>
                            </li>
                            <li class="li_item">
                                <a href="{{ route('solutions') }}"
                                    class="@if (in_array(Route::currentRouteName(), ['solutions', 'solution'])) active @endif">{{ __('global.title.solutions') }}</a>
                            </li>
                            <li class="li_item">
                                <a href="{{ route('episodes') }}"
                                    class="@if (in_array(Route::currentRouteName(), ['episodes', 'episode'])) active @endif">{{ __('global.title.episodes') }}</a>
                            </li>
                            <li class="li_item">
                                <a href="{{ route('posts') }}"
                                    class="@if (in_array(Route::currentRouteName(), ['posts', 'post'])) active @endif">{{ __('global.title.news') }}</a>
                            </li>
                            <!--<li class="li_item">
                                <a href="">ES</a> <span>|</span> <a href="">PR</a>
                            </li>-->
                        </ul>
                        <div class="bottom_">
                            <button class="btn btn-back burgergg">
                                Regresar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
