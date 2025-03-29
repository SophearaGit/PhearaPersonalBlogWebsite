@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('meta_tags')
    {!! SEO::generate() !!}
@endsection
@section('content')
    <main>
        <!-- Start Hero Section -->
        <section class="cs_hero cs_style_3 cs_type_2 cs_filled_bg  text-center" data-src="/front/assets/img/bg/hero_bg_5.svg"
            style="background-image: url(&quot;/front/assets/img/bg/hero_bg_5.svg&quot;);">
            <div class="container">
                <div class="cs_height_150 cs_height_lg_150"></div>
                <div class="cs_height_60 cs_height_lg_30"></div>
                <h1 class="cs_hero_title cs_font_92 cs_extra_bold wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <span class="cs_gradient_text_2">
                        {{ $portfolio->title }}
                    </span>
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Portfolio Details</li>
                </ol>
            </div>
        </section>
        <!-- Start Hero Section -->

        <!--Start imagebox Section-->
        <div class="container">
            <div class="cs_image_box cs_style_5 cs_radius_15">
                <img class="cs_radius_10 w-100" src="/images/portfolios/resized/resized_{{ $portfolio->featured_image }}"
                    alt="project-details">
            </div>
            <div class="cs_height_45 cs_height_lg_30"></div>
        </div>
        <!--End imagebox Section-->
        @livewire('user.read-portfolio', ['slug' => $portfolio->slug])
    </main>
@endsection
