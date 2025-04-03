@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('meta_tags')
    {!! SEO::generate() !!}
@endsection
@section('content')
    <main>
        <!-- Start Blog Section -->
        <div class="cs_height_115 cs_height_lg_70"></div>
        <!-- Start Blog Section -->
        <section>
            <div class="container">
                <div class="cs_title_search_wrap">
                    <h3 class="cs_title">Search for: <span class="cs_gradient_text">{{ $query }}</span></h3>
                    <x-sidebar-search></x-sidebar-search>
                </div>
                <div class="cs_height_60 cs_height_lg_30"></div>
                <div class="row">
                    <x-sidebar-categories></x-sidebar-categories>
                    <div class="col-lg-8 offset-lg-1">
                        <div class="cs_height_lg_40"></div>
                        <div class="cs_blog_wrap">
                            @forelse ($posts as $item)
                                <div class="cs_blog cs_style_1 cs_transition_4">
                                    <div class="flex-none">
                                        <a href="blog-details.html" class="cs_blog_thumbnail cs_zoom">
                                            <img class="cs_zoom_in "
                                                src="{{ $item->featured_image ? asset('images/posts/resized/thumb_' . $item->featured_image) : asset('/images/default/funntmr.jpg') }}"
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
                                        <div class="cs_blog_avater d-flex align-items-center">
                                            <a href="{{ route('blog_author_posts', $item->author->username) }}">
                                                <img src="{{ $item->author->picture }}" alt="avatar_img"
                                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%; border: 2px solid #d1d5db; box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1); transition: all 0.3s ease-in-out;"
                                                    onmouseover="this.style.boxShadow='4px 4px 12px rgba(0, 0, 0, 0.2)'"
                                                    onmouseout="this.style.boxShadow='2px 2px 8px rgba(0, 0, 0, 0.1)'">
                                            </a>
                                            <div class="cs_ml_20">
                                                <h2 class="cs_blog_name cs_font_20 cs_semi_bold mb-1">
                                                    <i class="fa-solid fa-user-tie"></i>
                                                    <a href="{{ route('blog_author_posts', $item->author->username) }}">
                                                        {{ $item->author->name }}
                                                    </a>
                                                </h2>
                                                <p class="cs_blog_designation cs_font_16 cs_bold mb-0"
                                                    style="font-size: 10px;">
                                                    <i class="fa-regular fa-calendar-days"></i>
                                                    {{ date_formatter($item->created_at) }} &nbsp;
                                                    Category:
                                                    <a
                                                        href="{{ route('blog_category_posts', $item->post_category->slug) }}">
                                                        <span
                                                            class="cs_gradient_text">{{ $item->post_category->slug }}</span>
                                                    </a>&nbsp;
                                                    <i class="fa-regular fa-clock"></i>
                                                    {{ readDuration($item->title, $item->content) }}
                                                    @choice('min|mins', readDuration($item->title, $item->content))
                                                </p>
                                            </div>
                                        </div>
                                        <a href="{{ route('blog_read_post', $item->slug) }}"
                                            class="cs_circle_btn cs_style_1 cs_type_1 cs_accent_color_2 cs_center rounded-circle"
                                            title="{!! Str::ucfirst(words($item->content, 20)) !!}">
                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 10L10 1" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 1H10V10" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 10L10 1" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 1H10V10" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <span class="text-danger">No posts found for: {{ $query }}</span>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="cs_height_60 cs_height_lg_40"></div>
                {{ $posts->appends(request()->input())->links('custom_pagination') }}
                <div class="cs_height_60 cs_height_lg_40"></div>
            </div>
        </section>
        <!-- End Blog Section -->

    </main>
@endsection
