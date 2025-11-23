<!-- Start Header Section -->
@php
    $ifHaveBlog = \App\Models\Post::where('visibility', '1')->exists();
@endphp
<header class="cs_site_header cs_style_1 cs_sticky_header cs_color_2">
    <div class="cs_main_header">
        <div class="container">
            <div class="cs_main_header_in">
                <div class="cs_main_header_left">
                    <a class="cs_site_branding" href="{{ route('home') }}">
                        {{-- <img src="/images/site/{{ isset(settings()->site_logo) ? settings()->site_logo : 'Sopheara' }}"
                                alt="Logo"> --}}
                        <span class="cs_gradient_text">👨RADODEV</span>
                    </a>
                </div>
                <div class="cs_main_header_center">
                    <div class="cs_nav">
                        <ul class="cs_nav_list">
                            <li class="{{ Route::is(['home', '']) ? 'active' : '' }}"><a
                                    href="{{ route('home') }}">Home</a>
                            </li>
                            <li class=" {{ Route::is(['about', 'blog_author_posts', '']) ? 'active' : '' }}"><a
                                    href="{{ route('about') }}">About</a>
                            </li>
                            {{-- for the dynamic li --}}
                            @if ($ifHaveBlog)
                            {!! navigations() !!}
                            @endif
                            <li class=" {{ Route::is(['portfolio', 'blog_read_portfolio']) ? 'active' : '' }}">
                                <a href="{{ route('portfolio') }}">Portfolio</a>
                            </li>
                            {{-- <li class="menu-item-has-children"><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="testimonial.html">Testimonial</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="404.html">Error 404</a></li>
                                    </ul>
                                </li> --}}
                            {{-- @if ()
                            @endif --}}
                            @if ($ifHaveBlog)
                            <li
                                class="{{ Route::is(['blog', 'blog_read_post', 'blog_search_posts', 'blog_tag_posts', 'blog_category_posts']) ? 'active' : '' }}">
                                <a href="{{ route('blog') }}">Blog</a>
                            </li>
                            @endif
                            <li class="{{ Route::is(['contact']) ? 'active' : '' }}"> <a
                                    href="{{ route('contact') }}">Contact</a></li>
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
