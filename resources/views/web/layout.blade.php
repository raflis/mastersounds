<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5L2CBQN');</script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Master Sounds</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/png" />
    <meta property="og:title" content="Master Sounds" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{ asset('images/banner.jpg') }}" />
    <meta name="author" content="Marketlogic">
    
    
    <link href="{{ asset('css/web.css?v=1bs3') }}" rel="stylesheet">
    
    

    @yield('css')
    <script type="text/javascript">
        var _ss = _ss || [];
    _ss.push(['_setDomain', 'https://koi-3RUFHXUHZO.marketingautomation.services/net']);
    _ss.push(['_setAccount', 'KOI-4MTDAK8DK2']);
    _ss.push(['_trackPageView']);
    window._pa = window._pa || {};
(function() {
    var ss = document.createElement('script');
    ss.type = 'text/javascript'; ss.async = true;
    ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-3RUFHXUHZO.marketingautomation.services/client/ss.js?ver=2.4.0';
    var scr = document.getElementsByTagName('script')[0];
    scr.parentNode.insertBefore(ss, scr);
})();
</script>

</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5L2CBQN"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @include('web.partials.header')
    @yield('content')
    @include('web.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/vivus@0.4.6/dist/vivus.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script src="{{ asset('js/main.js?v=1bs23') }}"></script>
    
    @yield('script')
</body>
</html>