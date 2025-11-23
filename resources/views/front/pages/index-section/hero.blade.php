        <!-- Start Hero Section -->
        <section class="cs_hero cs_style_2 cs_filled_bg" data-src="/front/assets/img/bg/hero_bg_2.svg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="cs_hero_info cs_pr_20">
                            <h4 class="cs_hero_meta cs_font_48 cs_white_blue_text_2 cs_semi_bold cs_primary_font mb-0">
                                Hi! I’m<br>
                            </h4>
                            <h1 class="cs_hero_title cs_font_92 cs_black wow fadeInLeft" data-wow-duration="0.8s"
                                data-wow-delay="0.2s">
                                <span class="cs_gradient_text">
                                    {{ isset(user()->name) ? user()->name : 'Seth Sopheara' }}
                                </span>
                                {{-- <span class="cs_gradient_border_text">{{ isset(user()->name) ? explode(' ', user()->name)[1] : '' }}
                                </span> --}}
                            </h1>
                            <h4 class="cs_hero_subtitle cs_font_36 cs_semi_bold cs_primary_font cs_white_blue_text_2">
                                Full-stack
                                <span class="cs_accent_color_2">Web Developer</span>
                            </h4>
                            <p class="cs_hero_text">
                                {{ isset(user()->bio) ? user()->bio : 'I am a passionate web developer specializing in Laravel, with expertise in both front-end and back-end development.' }}
                            </p>
                            <div class="cs_social_btns d-flex">
                                {{-- START DISPLAY USER SOCIAL LINK BY ID --}}
                                @php
                                    if (!empty(user())) {
                                        # code...
                                        $socialLinks = social_links(user()->id);
                                    } else {
                                        # code...
                                        $socialLinks = social_links(1);
                                    }
                                @endphp
                                @if ($socialLinks)
                                    <a class="cs_accent_color_2" href="{{ $socialLinks->facebook_url }}">
                                        <svg width="13" height="22" viewBox="0 0 13 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 1H9C7.67392 1 6.40215 1.52678 5.46447 2.46447C4.52678 3.40215 4 4.67392 4 6V9H1V13H4V21H8V13H11L12 9H8V6C8 5.73478 8.10536 5.48043 8.29289 5.29289C8.48043 5.10536 8.73478 5 9 5H12V1Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <a class="cs_accent_color_2" href="{{ $socialLinks->github_url }}">
                                        <svg width="22" height="24" viewBox="0 0 22 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.3002 23V18.6C15.4532 17.222 15.0581 15.8391 14.2002 14.75C17.5002 14.75 20.8002 12.55 20.8002 8.7C20.8882 7.325 20.5032 5.972 19.7002 4.85C20.0082 3.585 20.0082 2.265 19.7002 1C19.7002 1 18.6002 1 16.4002 2.65C13.4962 2.1 10.5042 2.1 7.60016 2.65C5.40016 1 4.30016 1 4.30016 1C3.97016 2.265 3.97016 3.585 4.30016 4.85C3.49922 5.96747 3.11048 7.32807 3.20016 8.7C3.20016 12.55 6.50016 14.75 9.80016 14.75C9.37116 15.289 9.05216 15.905 8.86516 16.565C8.67816 17.225 8.62316 17.918 8.70016 18.6V23"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M8.7 18.5999C3.739 20.7999 3.2 16.3999 1 16.3999"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <a class="cs_accent_color_2" href="{{ $socialLinks->linkedin_url }}">
                                        <svg width="24" height="22" viewBox="0 0 24 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.7367 7.3158C17.4117 7.3158 19.0182 7.98121 20.2026 9.16565C21.3871 10.3501 22.0525 11.9565 22.0525 13.6316V21H17.842V13.6316C17.842 13.0732 17.6201 12.5378 17.2253 12.1429C16.8305 11.7481 16.295 11.5263 15.7367 11.5263C15.1783 11.5263 14.6429 11.7481 14.248 12.1429C13.8532 12.5378 13.6314 13.0732 13.6314 13.6316V21H9.4209V13.6316C9.4209 11.9565 10.0863 10.3501 11.2708 9.16565C12.4552 7.98121 14.0616 7.3158 15.7367 7.3158Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M5.21053 8.36841H1V21H5.21053V8.36841Z" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M3.10526 5.21053C4.26797 5.21053 5.21053 4.26797 5.21053 3.10526C5.21053 1.94256 4.26797 1 3.10526 1C1.94256 1 1 1.94256 1 3.10526C1 4.26797 1.94256 5.21053 3.10526 5.21053Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                @else
                                @endif {{-- END DISPLAY USER SOCIAL LINK BY ID --}}
                            </div>
                            <div class="cs_btns">
                                <a href="#" class="cs_btn cs_style_1" download><span>Download CV</span></a>
                                <a class="cs_font_24 cs_accent_color_2 cs_accent_color_2_hover cs_text_btn cs_type_2 cs_semi_bold"
                                    href="{{ route('contact') }}">Let’s Talk</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="cs_hero_image_box cs_filled_bg" data-src="/front/assets/img/bg/hero_bg_3.svg">
                            <div class="cs_imagebox_img w-100">
                                {{-- <img src="{{ auth()->check() && user()->picture ? user()->picture : '/images/users/default.jpg' }}"
                                    alt="heroImg" width="607" height="769" style="object-fit: cover;"> --}}
                                <img src="/images/users/default.jpg" alt="heroImg" width="607" height="769"
                                    style="object-fit: cover;">
                            </div>
                            <div
                                class="cs_happy_client position-absolute cs_white_bg d-flex align-items-center cs_radius_20 cs_gap_15">
                                {{-- <div class="cs_font_36 cs_semi_bold cs_accent_color_2"><span class="odometer"
                                        data-count-to=""></span><span>+</span></div> --}}
                                <div>
                                    <h5 class="mb-0 cs_normal">Apology on any error,</h5>
                                    <p class="mb-0 cs_font_16">Website is under development.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Start Hero Section -->
