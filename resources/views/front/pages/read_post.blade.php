@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('meta_tags')
    {!! SEO::generate() !!}
@endsection
@section('content')
    <!--Start Blog Details Section-->
    <section>
        {{-- <div class="cs_height_90 cs_height_lg_90"></div> --}}
        <div class="cs_height_140 cs_height_lg_70"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cs_blog_details cs_style_1">
                        <h1 class="cs_blog_title cs_font_48 cs_semi_bold text-center">
                            {{ $post->title }}
                        </h1>
                        <div class="cs_center cs_blog_meta_items">
                            <span>
                                <a class="cs_text_btn cs_type_2 cs_accent_color_2 cs_accent_color_2_hover"
                                    href="{{ route('blog_author_posts', $post->author->username) }}">
                                    {{ $post->author->name }}
                                </a>
                            </span>
                            <span>
                                {{ date_formatter($post->created_at) }}
                            </span>
                            <span>
                                <i class="fa-solid fa-eye"></i>
                                {{ readDuration($post->title, $post->content) }}
                                @choice('min|mins', readDuration($post->title, $post->content))
                                read
                            </span>
                        </div>
                        <div class="cs_image_box cs_style_5 cs_radius_15">
                            <img class="cs_radius_10 w-100"
                                src="{{ $post->featured_image ? asset('images/posts/resized/resized_' . $post->featured_image) : asset('/images/default/defaultBlogTumbnailCover.jpg') }}"
                                alt="project-details">
                        </div>
                        <div class="row">
                            <div class="col-xl-1 col-lg-2">
                                <!-- Social Share Section -->
                                <div class="cs_social cs_style_2 cs_white_bg">
                                    <div class="cs_social_title cs_accent_color_2">Share</div>
                                    <div class="cs_social_wrap share-buttons">
                                        <a
                                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog_read_post', $post->slug)) }}">
                                            <svg width="10" height="18" viewBox="0 0 10 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.00879 10.125L9.50871 6.86742H6.38297V4.75348C6.38297 3.86227 6.81961 2.99355 8.21953 2.99355H9.64055V0.220078C9.64055 0.220078 8.35102 0 7.11809 0C4.54395 0 2.86137 1.56023 2.86137 4.38469V6.86742H0V10.125H2.86137V18H6.38297V10.125H9.00879Z"
                                                    fill="#1B74E4"></path>
                                            </svg>
                                        </a>
                                        <a
                                            href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog_read_post', $post->slug)) }}&amp;text={{ urlencode($post->title) }}">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M23.643 4.937a9.573 9.573 0 0 1-2.827.797 4.934 4.934 0 0 0 2.165-2.725 9.557 9.557 0 0 1-3.127 1.221 4.86 4.86 0 0 0-8.29 4.429A13.785 13.785 0 0 1 1.671 3.15a4.86 4.86 0 0 0 1.505 6.482 4.811 4.811 0 0 1-2.206-.616v.062a4.875 4.875 0 0 0 3.897 4.776 4.92 4.92 0 0 1-2.2.083 4.867 4.867 0 0 0 4.54 3.388A9.753 9.753 0 0 1 .96 19.54a13.705 13.705 0 0 0 7.557 2.212c9.057 0 14.01-7.514 14.01-14.04 0-.214-.005-.426-.014-.636a9.89 9.89 0 0 0 2.43-2.556z"
                                                    fill="#1DA1F2" />
                                            </svg>
                                        </a>
                                        <a
                                            href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog_read_post', $post->slug)) }}&amp;text={{ urlencode($post->title) }}">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M22.23 0H1.77C.79 0 0 .775 0 1.727v20.546C0 23.225.79 24 1.77 24h20.46c.98 0 1.77-.775 1.77-1.727V1.727C24 .775 23.21 0 22.23 0zM7.12 20.452H3.56V9h3.56v11.452zM5.34 7.43c-1.14 0-2.07-.94-2.07-2.09 0-1.15.93-2.09 2.07-2.09s2.07.94 2.07 2.09c0 1.15-.93 2.09-2.07 2.09zM20.45 20.452h-3.56v-5.64c0-1.35-.03-3.08-1.88-3.08-1.88 0-2.17 1.47-2.17 2.99v5.73H9.28V9h3.42v1.56h.05c.48-.91 1.66-1.88 3.41-1.88 3.65 0 4.33 2.4 4.33 5.52v6.25z"
                                                    fill="#0077B5" />
                                            </svg>
                                        </a>
                                        <a
                                            href="https://www.pinterest.com/pin/create/button?url={{ urlencode(route('blog_read_post', $post->slug)) }}&amp;text={{ urlencode($post->title) }}">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 0C5.37 0 0 5.37 0 12c0 4.92 2.87 9.16 7 11.15-.1-.95-.2-2.42.04-3.47.22-.95 1.44-6.07 1.44-6.07s-.37-.74-.37-1.84c0-1.72 1-3.01 2.24-3.01 1.06 0 1.57.8 1.57 1.76 0 1.07-.68 2.67-1.04 4.16-.3 1.24.64 2.26 1.88 2.26 2.26 0 3.99-2.39 3.99-5.84 0-3.06-2.2-5.2-5.33-5.2-3.63 0-5.76 2.72-5.76 5.54 0 1.07.41 2.21.93 2.83.1.12.12.23.09.35-.1.39-.3 1.24-.35 1.41-.05.22-.18.27-.41.16-1.52-.71-2.47-2.92-2.47-4.7 0-3.82 2.78-7.33 8.02-7.33 4.21 0 7.48 3 7.48 7.01 0 4.18-2.64 7.54-6.32 7.54-1.23 0-2.38-.64-2.77-1.39 0 0-.6 2.28-.75 2.82-.27 1.03-1.01 2.33-1.5 3.13 1.14.35 2.35.55 3.61.55 6.63 0 12-5.37 12-12S18.63 0 12 0z"
                                                    fill="#E60023" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-11 col-lg-10">
                                <div class="cs_pl_50">
                                    <p class="cs_blog_text">
                                        {!! $post->content !!}
                                    </p>
                                    <div class="cs_height_90 cs_height_lg_90"></div>
                                    <div class="d-flex justify-content-between mt-4">
                                        @if ($prevPost)
                                            <div>
                                                <a href="{{ route('blog_read_post', $prevPost->slug) }}"
                                                    class="cs_btn cs_style_1 cs_primary_font">
                                                    <span>
                                                        <i class="fa-solid fa-backward"></i>&nbsp;Previous
                                                    </span>
                                                </a>
                                                <div class="cs_height_20 cs_height_lg_20"></div>
                                                <p>
                                                    <a href="{{ route('blog_read_post', $prevPost->slug) }}">
                                                        <span class="cs_gradient_text">
                                                            {{ $prevPost->title }}
                                                        </span>
                                                    </a>
                                                </p>
                                            </div>
                                        @endif
                                        @if ($nextPost)
                                            <div>
                                                <a href="{{ route('blog_read_post', $nextPost->slug) }}"
                                                    class="cs_btn cs_style_1 cs_primary_font">
                                                    <span>
                                                        <i class="fa-solid fa-forward"></i>&nbsp;Next
                                                    </span>
                                                </a>
                                                <div class="cs_height_20 cs_height_lg_20"></div>
                                                <p>
                                                    <a href="{{ route('blog_read_post', $nextPost->slug) }}">
                                                        <span class="cs_gradient_text">
                                                            {{ $nextPost->title }}
                                                        </span>
                                                    </a>
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="cs_height_90 cs_height_lg_90"></div>
                                    {{-- COMMENT SECTION START --}}
                                    <div id="disqus_thread"></div>
                                    <script>
                                        /**
                                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                                        var disqus_config = function() {
                                            this.page.url =
                                                "{{ route('blog_read_post', $post->id) }}"; // Replace PAGE_URL with your page's canonical URL variable
                                            this.page.identifier = "PID_" + "{{ $post->id }}"
                                            PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                        };
                                        (function() { // DON'T EDIT BELOW THIS LINE
                                            var d = document,
                                                s = d.createElement('script');
                                            s.src = 'https://ralablogapp.disqus.com/embed.js';
                                            s.setAttribute('data-timestamp', +new Date());
                                            (d.head || d.body).appendChild(s);
                                        })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a
                                            href="https://disqus.com/?ref_noscript">comments powered by
                                            Disqus.</a></noscript>
                                    {{-- COMMENT SECTION END --}}


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cs_height_90 cs_height_lg_20"></div>
    </section>
    <!--End Blog Details Section-->
@endsection

@push('scripts')
    <script>
        $(document).on('click', '.share-buttons > a', function(e) {
            e.preventDefault();
            window.open($(this).attr('href'), '', 'height=450,width=450, top=' + ($(window).height() / 2 - 275) +
                ', left=' + ($(window).width() / 2 - 275) +
                ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
            return false;
        });
    </script>
@endpush
