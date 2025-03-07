@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('meta_tags')
    {{-- <meta http-equiv="x-ua-compatible" content="ie=edge"> --}}
    {!! SEO::generate() !!}
@endsection
@section('content')
    <main>
        <!-- Start Hero Section -->
        <x-start-hero-section></x-start-hero-section>
        <!-- Start Hero Section -->
        <!-- Start Porfolio Section -->
        <section>
            <div class="cs_height_150 cs_height_lg_80"></div>
            <div class="container">
                <div class="cs_isotop cs_isotop_col_3">
                    <div class="cs_grid_sizer"></div>
                    <div class="cs_isotop_item cs_zoom">
                        <a href="portfolio-details.html" class="cs_portfolio cs_style_1">
                            <div class="cs_portfolio_thumbnail">
                                <img class="cs_zoom_in w-100" src="/front/assets/img/portfolio/p3.jpg" alt="">
                            </div>
                            <div class="cs_portfolio_info cs_white_color cs_medium position-absolute">
                                <h2 class="cs_font_28 cs_white_color cs_medium mb-0">Fitst Project</h2>
                                <div class="cs_font_16 cs_gap_15 d-inline-flex cs_medium align-items-center">
                                    <span class="cs_text_btn cs_secondary_font cs_type_1 text-uppercase">View work</span>
                                    <svg width="5" height="9" viewBox="0 0 5 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0L5 4.5L0 9L0 0Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cs_isotop_item cs_zoom">
                        <a href="portfolio-details.html" class="cs_portfolio cs_style_1">
                            <div class="cs_portfolio_thumbnail">
                                <img class="cs_zoom_in w-100" src="/front/assets/img/portfolio/p2.jpg" alt="">
                            </div>
                            <div class="cs_portfolio_info cs_white_color cs_medium position-absolute">
                                <h2 class="cs_font_28 cs_white_color cs_medium mb-0">Second Project</h2>
                                <div class="cs_font_16 cs_gap_15 d-inline-flex cs_medium align-items-center">
                                    <span class="cs_text_btn cs_secondary_font cs_type_1 text-uppercase">View work</span>
                                    <svg width="5" height="9" viewBox="0 0 5 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0L5 4.5L0 9L0 0Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cs_isotop_item cs_zoom">
                        <a href="portfolio-details.html" class="cs_portfolio cs_style_1">
                            <div class="cs_portfolio_thumbnail">
                                <img class="cs_zoom_in w-100" src="/front/assets/img/portfolio/p8.jpg" alt="">
                            </div>
                            <div class="cs_portfolio_info cs_white_color cs_medium position-absolute">
                                <h2 class="cs_font_28 cs_white_color cs_medium mb-0">Third Project</h2>
                                <div class="cs_font_16 cs_gap_15 d-inline-flex cs_medium align-items-center">
                                    <span class="cs_text_btn cs_secondary_font cs_type_1 text-uppercase">View work</span>
                                    <svg width="5" height="9" viewBox="0 0 5 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0L5 4.5L0 9L0 0Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cs_isotop_item cs_zoom">
                        <a href="portfolio-details.html" class="cs_portfolio cs_style_1">
                            <div class="cs_portfolio_thumbnail">
                                <img class="cs_zoom_in w-100" src="/front/assets/img/portfolio/p4.jpg" alt="">
                            </div>
                            <div class="cs_portfolio_info cs_white_color cs_medium position-absolute">
                                <h2 class="cs_font_28 cs_white_color cs_medium mb-0">Sixth Project</h2>
                                <div class="cs_font_16 cs_gap_15 d-inline-flex cs_medium align-items-center">
                                    <span class="cs_text_btn cs_secondary_font cs_type_1 text-uppercase">View work</span>
                                    <svg width="5" height="9" viewBox="0 0 5 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0L5 4.5L0 9L0 0Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cs_isotop_item cs_zoom">
                        <a href="portfolio-details.html" class="cs_portfolio cs_style_1">
                            <div class="cs_portfolio_thumbnail">
                                <img class="cs_zoom_in w-100" src="/front/assets/img/portfolio/p7.jpg" alt="">
                            </div>
                            <div class="cs_portfolio_info cs_white_color cs_medium position-absolute">
                                <h2 class="cs_font_28 cs_white_color cs_medium mb-0">Fourth Project</h2>
                                <div class="cs_font_16 cs_gap_15 d-inline-flex cs_medium align-items-center">
                                    <span class="cs_text_btn cs_secondary_font cs_type_1 text-uppercase">View work</span>
                                    <svg width="5" height="9" viewBox="0 0 5 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0L5 4.5L0 9L0 0Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cs_isotop_item cs_zoom">
                        <a href="portfolio-details.html" class="cs_portfolio cs_style_1">
                            <div class="cs_portfolio_thumbnail">
                                <img class="cs_zoom_in w-100" src="/front/assets/img/portfolio/p9.jpg" alt="">
                            </div>
                            <div class="cs_portfolio_info cs_white_color cs_medium position-absolute">
                                <h2 class="cs_font_28 cs_white_color cs_medium mb-0">Fifth Project</h2>
                                <div class="cs_font_16 cs_gap_15 d-inline-flex cs_medium align-items-center">
                                    <span class="cs_text_btn cs_secondary_font cs_type_1 text-uppercase">View work</span>
                                    <svg width="5" height="9" viewBox="0 0 5 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0L5 4.5L0 9L0 0Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cs_isotop_item cs_zoom">
                        <a href="portfolio-details.html" class="cs_portfolio cs_style_1">
                            <div class="cs_portfolio_thumbnail">
                                <img class="cs_zoom_in w-100" src="/front/assets/img/portfolio/p11.jpg" alt="">
                            </div>
                            <div class="cs_portfolio_info cs_white_color cs_medium position-absolute">
                                <h2 class="cs_font_28 cs_white_color cs_medium mb-0">Eighth Project</h2>
                                <div class="cs_font_16 cs_gap_15 d-inline-flex cs_medium align-items-center">
                                    <span class="cs_text_btn cs_secondary_font cs_type_1 text-uppercase">View work</span>
                                    <svg width="5" height="9" viewBox="0 0 5 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0L5 4.5L0 9L0 0Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cs_isotop_item cs_zoom">
                        <a href="portfolio-details.html" class="cs_portfolio cs_style_1">
                            <div class="cs_portfolio_thumbnail">
                                <img class="cs_zoom_in w-100" src="/front/assets/img/portfolio/p10.jpg" alt="">
                            </div>
                            <div class="cs_portfolio_info cs_white_color cs_medium position-absolute">
                                <h2 class="cs_font_28 cs_white_color cs_medium mb-0">Seven Project</h2>
                                <div class="cs_font_16 cs_gap_15 d-inline-flex cs_medium align-items-center">
                                    <span class="cs_text_btn cs_secondary_font cs_type_1 text-uppercase">View work</span>
                                    <svg width="5" height="9" viewBox="0 0 5 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0L5 4.5L0 9L0 0Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cs_isotop_item cs_zoom">
                        <a href="portfolio-details.html" class="cs_portfolio cs_style_1">
                            <div class="cs_portfolio_thumbnail">
                                <img class="cs_zoom_in w-100" src="/front/assets/img/portfolio/pp9.jpg" alt="">
                            </div>
                            <div class="cs_portfolio_info cs_white_color cs_medium position-absolute">
                                <h2 class="cs_font_28 cs_white_color cs_medium mb-0">Eight Project</h2>
                                <div class="cs_font_16 cs_gap_15 d-inline-flex cs_medium align-items-center">
                                    <span class="cs_text_btn cs_secondary_font cs_type_1 text-uppercase">View work</span>
                                    <svg width="5" height="9" viewBox="0 0 5 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0L5 4.5L0 9L0 0Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="cs_height_60 cs_height_lg_40"></div>
                <div class="cs_center">
                    <a href="#" class="cs_btn cs_style_1"><span>Load More</span></a>
                </div>
            </div>
            <div class="cs_height_150 cs_height_lg_80"></div>
        </section>
        <!-- End Porfolio Section -->
    </main>
@endsection
