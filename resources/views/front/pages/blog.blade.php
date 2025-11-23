@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('meta_tags')
    {!! SEO::generate() !!}
@endsection
@section('content')

        <!-- Start Blog Section -->
        <div class="cs_height_90 cs_height_lg_90"></div>
        <div class="cs_height_120 cs_height_lg_80"></div>
        @if (!empty(latest_posts($skip = 0, $limit = 1)))
            @foreach (latest_posts($skip = 0, $limit = 1) as $item)
                <section>
                    <div class="container">
                        <div class="cs_blog cs_style_4">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <a href="{{ route('blog_read_post', $item->slug) }}"
                                        class="cs_image_box cs_style_4 cs_radius_10 overflow-hidden">
                                        {{-- <img class="w-100" src="/images/posts/resized/resized_{{ $item->featured_image }}"
                                            alt="blog_details_img"> --}}
                                        <img src="{{ $item->featured_image ? asset('images/posts/resized/resized_' . $item->featured_image) : asset('/images/default/defaultBlogTumbnailCover.jpg') }}"
                                            alt="Post Image">

                                    </a>
                                    <div class="cs_height_lg_40"></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="cs_pl_50">
                                        <span class="cs_blog_meta cs_radius_10 cs_font_16 cs_accent_color">Featured</span>
                                        <h3 class="cs_blog_title cs_font_36 cs_semi_bold">
                                            <a class="cs_accent_color_2_hover"
                                                href="{{ route('blog_read_post', $item->slug) }}">
                                                {{ $item->title }}
                                            </a>
                                        </h3>
                                        <p class="cs_blog_text">
                                            {!! Str::ucfirst(words($item->content, 45)) !!}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="cs_font_16">{{ date_formatter($item->created_at) }}</span>
                                                <a href="{{ route('blog_author_posts', $item->author->username) }}"
                                                    class="cs_blog_author_name cs_accent_color_2 cs_accent_color_2_hover cs_text_btn cs_type_2 cs_font_16">
                                                    {{ $item->author->name }}</a>
                                            </div>
                                            <a href="{{ route('blog_read_post', $item->slug) }}"
                                                class="cs_circle_btn cs_style_1 cs_accent_color cs_center rounded-circle">
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 10L10 1" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M1 1H10V10" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 10L10 1" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M1 1H10V10" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
        @endif
        <!-- End Blog Section -->

        <!-- Start Blog Section -->
        <section>
            <div class="cs_height_115 cs_height_lg_70"></div>
            <div class="container">
                <div class="cs_title_search_wrap">
                    <h3 class="cs_title">Recent Articles</h3>
                    <x-sidebar-search></x-sidebar-search>
                </div>
                <div class="cs_height_60 cs_height_lg_30"></div>
                <div class="row">
                    <x-sidebar-categories></x-sidebar-categories>
                    <div class="col-lg-8 offset-lg-1">
                        <div class="cs_height_lg_40"></div>
                        <div class="cs_blog_wrap">
                            @if (!empty(latest_posts(0, 5)))
                                @foreach (latest_posts(0, 5) as $item)
                                    <div class="cs_blog cs_style_2 cs_transition_4">
                                        <div class="flex-none">
                                            <a href="{{ route('blog_read_post', $item->slug) }}"
                                                class="cs_blog_thumbnail cs_zoom">
                                                <img class="cs_zoom_in"
                                                    src="{{ $item->featured_image ? asset('images/posts/resized/resized_' . $item->featured_image) : asset('/images/default/funntmr.jpg') }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="cs_blog_info">
                                            <div class="cs_blog_date text-nowrap cs_secondary_color">
                                                <div class="cs_font_36 cs_semi_bold cs_primary_font">
                                                    {{ day_of_date($item->created_at) }}
                                                </div>
                                                <span class="cs_font_16 d-inline-block">
                                                    {{ month_and_year_short($item->created_at) }}
                                                </span>
                                            </div>
                                            <h2 class="cs_blog_title cs_font_20 cs_semi_bold">
                                                <a class="cs_accent_color_2_hover"
                                                    href="{{ route('blog_read_post', $item->slug) }}">
                                                    {{ $item->title }}
                                                </a>
                                            </h2>
                                            <p class="cs_gradient_text">{!! Str::ucfirst(words($item->content, 40)) !!}</p>
                                            <span class="cs_secondary_color">
                                                {{-- <i class="fa-regular fa-clock"></i> --}}
                                                <i class="fa-solid fa-eye"></i>
                                                {{ readDuration($item->title, $item->content) }}
                                                @choice('min|mins', readDuration($item->title, $item->content))
                                                read
                                            </span>
                                            <a href="{{ route('blog_read_post', $item->slug) }}"
                                                class="cs_circle_btn cs_style_1 cs_type_1 cs_accent_color_2 cs_center rounded-circle">
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 10L10 1" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M1 1H10V10" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 10L10 1" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M1 1H10V10" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="cs_height_150 cs_height_lg_80"></div>
        </section>
        <!-- End Blog Section -->

@endsection
