<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta_tags')
    <!-- Favicon Icon -->
    <link rel="icon" href="/images/site/{{ isset(settings()->site_favicon) ? settings()->site_favicon : '' }}">
    <!-- Site Title -->
    <link rel="stylesheet" href="/front/assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="/front/assets/css/plugins/fontawesome.min.css">
    <link rel="stylesheet" href="/front/assets/css/plugins/odometer-theme-default.css">
    <link rel="stylesheet" href="/front/assets/css/plugins/select2.min.css">
    <link rel="stylesheet" href="/front/assets/css/plugins/animate.css">
    <link rel="stylesheet" href="/front/assets/css/style.css">
    <link rel="stylesheet" href="/extra-assets/css/ijabo.min.css">
    @stack('stylesheets')
</head>

<body>
    {{-- @include('front.layout.partials.preloader') --}}
    @include('front.layout.partials.header')
    <main>
        @yield('content')
    </main>
    {{-- @include(view: 'front.layout.partials.footer') --}}
    <!-- Start Footer -->
    <footer class="cs_footer cs_style_1 cs_filled_bg position-relative" data-src="/front/assets/img/bg/footer_bg.svg">
        <div class="position-absolute cs_footer_shape_1">
            <img src="/front/assets/img/footer_shape.svg" alt="">
        </div>
        <div class="container">
            <div class="cs_footer_cta">
                <h2 class="cs_font_92 cs_gradient_text_2 cs_semi_bold">Have a project?</h2>
                <a href="{{ route('contact') }}" class="cs_btn cs_style_1 cs_primary_font"><span>Let’s
                        Talk</span></a>
            </div>
            <div class="cs_copyright">© 2023 <a href="#">Laralink</a>. All rights reserved</div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Script -->
    <script src="/front/assets/js/plugins/jquery-3.6.0.min.js"></script>
    <script src="/front/assets/js/plugins/gsap.min.js"></script>
    <script src="/front/assets/js/plugins/isotope.pkg.min.js"></script>
    <script src="/front/assets/js/plugins/odometer.min.js"></script>
    <script src="/front/assets/js/plugins/wow.min.js"></script>
    <script src="/front/assets/js/main.js"></script>
    <script src="/extra-assets/js/ijabo.min.js"></script>
    @stack('scripts')
</body>

</html>
