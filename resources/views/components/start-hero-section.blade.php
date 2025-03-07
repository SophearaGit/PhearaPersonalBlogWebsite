<section class="cs_hero cs_style_3 cs_type_1 cs_filled_bg cs_center text-center"
    data-src="/front/assets/img/bg/hero_bg_5.svg"
    style="background-image: url(&quot;/front/assets/img/bg/hero_bg_5.svg&quot;);">
    <div class="container">
        <div class="cs_height_45 cs_height_lg_45"></div>
        @if (Request::routeIs('about'))
            <p class="cs_white_color text-uppercase cs_mb_10">Hi, I am</p>
        @endif
        @if (Request::routeIs('about'))
            <h1 class="cs_hero_title cs_font_92 cs_extra_bold wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"
                style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInUp;">
                <span class="cs_gradient_text_2">{{ isset(user()->name) ? user()->name : 'Seth Sopheara' }}</span>
            </h1>
        @else
            <h1 class="cs_hero_title cs_font_92 cs_extra_bold wow fadeInUp" data-wow-duration="0.8s"
                data-wow-delay="0.2s"
                style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInUp;">
                <span class="cs_gradient_text_2">
                    @if (Request::routeIs('contact'))
                        Contact Us
                    @elseif (Request::routeIs('portfolio'))
                        Portfolio
                    @endif
                </span>
            </h1>
        @endif
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">
                @if (Request::routeIs('about'))
                    About
                @elseif(Request::routeIs('contact'))
                    Contact
                @elseif(Request::routeIs('portfolio'))
                    Portfolio
                @endif
            </li>
        </ol>
    </div>
</section>
