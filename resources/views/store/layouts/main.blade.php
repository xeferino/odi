<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="{{ asset('images/favicon.png') }}" rel="icon">
    <meta name="author" content="Touché IM">
    <meta name="keywords" content="Calzado Zapato Mayoreo">
    <meta name="description" content="Distribuidora de Calzado Pargi">
    <title>@yield('title') | {{ config('app.name') }}</title>
    @yield('styles')
    <!-- Fonts-->
    <link
        href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ps-icon/style.css') }}">
    <!-- CSS Library -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/Magnific-Popup/dist/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/revolution/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/revolution/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/revolution/css/navigation.css') }}">
    <!-- Custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MSD2WHV');</script>
    <!-- End Google Tag Manager -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159926452-4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-159926452-4');
      gtag('config', 'AW-951169299');
    </script>
    
    <!-- Event snippet for Registro conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
    <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-951169299/NsHjCPCFzskBEJPixsUD', 'event_callback': callback }); return false; } </script>
    
</head>

<body><!-----class="ps-loading"--->
    <div class="header--sidebar"></div>
    @include('store.layouts.header')
    <main class="ps-main">
        @yield('content')


        @include('store.layouts.subscribe')
        @include('store.layouts.footer')
    </main>
    <!-- JS Library-->
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plugins/imagesloaded.pkgd.js') }}"></script>
    <script src="{{ asset('plugins/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery.matchHeight-min.js') }}"></script>
    <script src="{{ asset('plugins/slick/slick/slick.min.js') }}"></script>
    <script src="{{ asset('plugins/elevatezoom/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <!-- Custom scripts-->
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('scripts')
    <a href="https://wa.me/528123544458" style="
    position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#0C9;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
    z-index: 100000;
    ">
        <i class="fa fa-whatsapp" aria-hidden="true" style="margin-top:16px; font-size: 24pt"></i>
    </a>
</body>

</html>
