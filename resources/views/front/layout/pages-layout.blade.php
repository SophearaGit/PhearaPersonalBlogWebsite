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
    <div class="cs_preloader cs_center">
        <div class="cs_preloader_in"></div>
    </div>

    <!-- Start Header Section -->
    <header class="cs_site_header cs_style_1 cs_sticky_header cs_color_2">
        <div class="cs_main_header">
            <div class="container">
                <div class="cs_main_header_in">
                    <div class="cs_main_header_left">
                        <a class="cs_site_branding" href="home-v2.html">
                            {{-- <img src="/images/site/{{ isset(settings()->site_logo) ? settings()->site_logo : 'Sopheara' }}"
                                alt="Logo"> --}}
                            <span class="cs_gradient_text">👨RADODEV</span>
                        </a>
                    </div>
                    <div class="cs_main_header_center">
                        <div class="cs_nav">
                            <ul class="cs_nav_list">
                                <li class="{{ Route::is(['home', '']) ? 'active' : '' }} menu-item-has-children"><a
                                        href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="menu-item-has-children"><a href="about.html">About</a>
                                    <ul>
                                        <li><a href="about.html">Designer About</a></li>
                                        <li><a href="about-v2.html">Developer About</a></li>
                                    </ul>
                                </li>
                                {{-- for the dynamic li --}}
                                {!! navigations() !!}
                                <li class="menu-item-has-children"><a href="portfolio.html">Portfolio</a>
                                    <ul>
                                        <li><a href="portfolio.html">Portfolio</a></li>
                                        <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="testimonial.html">Testimonial</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="404.html">Error 404</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children {{ Route::is(['blog', '']) ? 'active' : '' }}"><a
                                        href="{{ route('blog') }}">Blog</a></li>
                                <li> <a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="cs_main_header_right">
                        <a href="{{ route('contact') }}" class="cs_btn cs_style_1 cs_primary_font"><span>Hire
                                Me</span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header Section -->

    <!-- Main content inside start-->
    @yield('content')
    <!-- Main content inside end-->

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
