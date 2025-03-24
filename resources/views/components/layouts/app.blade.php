<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="google-site-verification" content="zYfwKdmrCEkdvAZnSCwDApHZaSOeumxORzrX9IO4fjk" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png">
    
        <!-- CSS
        ============================================ -->
        <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/vendor/slick.css">
        <link rel="stylesheet" href="/assets/css/vendor/slick-theme.css">
        <link rel="stylesheet" href="/assets/css/plugins/sal.css">
        <link rel="stylesheet" href="/assets/css/plugins/feather.css">
        <link rel="stylesheet" href="/assets/css/plugins/fontawesome.min.css">
        <link rel="stylesheet" href="/assets/css/plugins/euclid-circulara.css">
        <link rel="stylesheet" href="/assets/css/plugins/swiper.css">
        <link rel="stylesheet" href="/assets/css/plugins/odometer.css">
        <link rel="stylesheet" href="/assets/css/plugins/animation.css">
        <link rel="stylesheet" href="/assets/css/plugins/bootstrap-select.min.css">
        <link rel="stylesheet" href="/assets/css/plugins/jquery-ui.css">
        <link rel="stylesheet" href="/assets/css/plugins/magnigy-popup.min.css">
        <link rel="stylesheet" href="/assets/css/plugins/plyr.css">
        <link rel="stylesheet" href="/assets/css/plugins/jodit.min.css">
    
        <link rel="stylesheet" href="/assets/css/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        
        <!-- Swiper CSS -->
        
        <!-- AOS CSS -->
        <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <style>
            * , h1, h2, h3, h4, h5, h6, h7, span, p, a{
                font-family: "Roboto", sans-serif;
                font-optical-sizing: auto;
                font-weight: <weight>;
                font-style: normal;
                font-variation-settings:
                    "wdth" 100;
            }
            .rbt-header .logo a img {
                max-height: 75px !important;
                object-fit: cover;
            }
        </style>
        @livewireStyles
        @stack('styles')
    </head>
    <body class="active-dark-mode">
        @livewire('header')
        {{ $slot }}
        @livewire('footer')

        <!-- JS
        ============================================ -->
        <!-- Modernizer JS -->
        <script src="/assets/js/vendor/modernizr.min.js"></script>
        <!-- jQuery JS -->
        <script src="/assets/js/vendor/jquery.js"></script>
        <!-- Bootstrap JS -->
        <script src="/assets/js/vendor/bootstrap.min.js"></script>
        <!-- sal.js -->
        <script src="/assets/js/vendor/sal.js"></script>
        <!-- Dark Mode Switcher -->
        <script src="/assets/js/vendor/js.cookie.js"></script>
        <script src="/assets/js/vendor/jquery.style.switcher.js"></script>
        <script src="/assets/js/vendor/swiper.js"></script>
        <script src="/assets/js/vendor/jquery-appear.js"></script>
        <script src="/assets/js/vendor/odometer.js"></script>
        <script src="/assets/js/vendor/backtotop.js"></script>
        <script src="/assets/js/vendor/isotop.js"></script>
        <script src="/assets/js/vendor/imageloaded.js"></script>
    
        <script src="/assets/js/vendor/wow.js"></script>
        <script src="/assets/js/vendor/waypoint.min.js"></script>
        <script src="/assets/js/vendor/easypie.js"></script>
        <script src="/assets/js/vendor/text-type.js"></script>
        <script src="/assets/js/vendor/jquery-one-page-nav.js"></script>
        <script src="/assets/js/vendor/bootstrap-select.min.js"></script>
        <script src="/assets/js/vendor/jquery-ui.js"></script>
        <script src="/assets/js/vendor/magnify-popup.min.js"></script>
        <script src="/assets/js/vendor/paralax-scroll.js"></script>
        <script src="/assets/js/vendor/paralax.min.js"></script>
        <script src="/assets/js/vendor/countdown.js"></script>
        <script src="/assets/js/vendor/plyr.js"></script>
        <script src="/assets/js/vendor/jodit.min.js"></script>
        <script src="/assets/js/vendor/Sortable.min.js"></script>
    
        <!-- Main JS -->
        <script src="/assets/js/main.js"></script>
        
        <!-- Swiper JS -->
        
        <!-- AOS JS -->
        
        @livewireScripts
        @stack('scripts')
    </body>
</html>
