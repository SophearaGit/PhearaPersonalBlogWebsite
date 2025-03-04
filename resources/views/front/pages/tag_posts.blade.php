@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('meta_tags')
    {{-- <meta http-equiv="x-ua-compatible" content="ie=edge"> --}}
    {!! SEO::generate() !!}
@endsection
@section('content')
    <section class="cs_filled_bg" data-src="/front/assets/img/bg/brands_bg_1.svg"
        style="background-image: url(&quot;/front/assets/img/bg/brands_bg_1.svg&quot;);">
        <div class="cs_height_145 cs_height_lg_80"></div>
        <div class="container">
            <div class="cs_section_heading cs_style_1 text-center">
                <p class="cs_section_subtitle cs_center cs_accent_color_2 cs_font_16 wow fadeInUp" data-wow-duration="0.8s"
                    data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <span>Checkout my post</span>
                    <svg width="23" height="20" viewBox="0 0 23 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.63864 4.46024C5.74235 4.77137 5.82303 5.07098 5.82303 5.12859C5.82303 5.17469 5.43122 5.22079 4.94724 5.22079C4.20975 5.22079 2.4006 5.42821 1.50178 5.6241C1.19065 5.69324 0.418574 6.30397 0.165061 6.69576C-0.249779 7.31802 0.176573 9.39223 0.787309 9.71488C0.983206 9.81859 0.994774 9.85315 0.833448 10.1643C0.418608 10.9594 0.718203 12.1578 1.57093 13.0797C1.98577 13.5291 2.0434 13.6559 2.0434 14.1283C2.0434 14.8428 2.36603 15.4305 3.11504 16.1103C3.48379 16.4445 3.77188 16.8132 3.81798 17.0091C4.30196 18.9912 7.36716 19.7056 12.23 18.9681C14.8458 18.5763 14.8804 18.5648 15.1108 18.7953C15.4796 19.141 15.929 19.2677 16.7586 19.2677C17.4501 19.2677 17.5538 19.3023 17.7612 19.5673C18.0608 19.9476 18.8444 20.0859 19.8354 19.9476C20.2157 19.89 20.7342 19.8439 20.9993 19.8439C21.7368 19.8439 21.9903 19.5904 21.6331 19.2216C21.3795 18.9566 21.2643 18.922 20.4807 18.922C19.1671 18.922 19.2592 19.3138 18.9712 12.6994C18.902 11.2129 18.8213 9.27699 18.7752 8.40122C18.683 6.44226 18.5563 6.56902 20.6074 6.6612C22.382 6.74187 22.7277 6.6612 22.3359 6.22331C21.8519 5.68171 20.3309 5.33602 18.4756 5.33602H18.0838C17.9225 5.33602 17.7727 5.40516 17.669 5.52039C17.5653 5.63562 17.5077 5.78542 17.5077 5.94675C17.5192 6.20026 17.5307 6.41921 17.5307 6.38464L16.1479 6.40768C14.7882 6.43073 14.7651 6.43073 14.7767 6.68424C14.7882 7.02994 14.6845 7.01841 13.8894 6.53443C13.1634 6.09655 12.8523 5.65867 11.2505 2.82393C10.7089 1.85597 10.248 1.18762 9.83312 0.73821C8.18528 -1.05943 4.40565 0.519258 5.63864 4.46024ZM8.32361 0.807347C8.65779 1.07238 9.02653 1.83292 9.41833 3.07744C10.225 5.63562 12.0341 7.47936 14.5347 8.28599L14.8804 8.40122C14.9034 9.12719 15.0187 14.9349 15.0532 17.0437L13.9239 17.1129C12.7716 17.1935 9.56813 17.6545 8.55408 17.8964C7.02147 18.2537 5.25839 17.4355 5.25839 16.3754C5.25839 16.191 5.20078 16.0412 5.14316 16.0412C4.38262 16.0412 3.21878 14.0822 3.65666 13.5521C3.7258 13.4715 3.58751 13.2756 3.29943 12.9875C2.56194 12.2846 2.45821 11.9965 2.53888 10.8326C2.60802 9.86468 2.59652 9.83011 2.33148 9.64573C1.55942 9.13871 1.4096 7.53697 2.08948 7.09908C2.26233 6.98385 3.13807 6.85709 4.70524 6.70728C7.88568 6.40768 7.68978 6.63815 7.18276 3.81493C6.74487 1.55636 7.3326 0.0122374 8.32361 0.807347ZM17.6114 18.0001C17.5998 18.0001 16.5628 18.0001 16.5973 18.0001L16.1709 7.62915C16.194 7.62915 17.3579 7.62915 17.3118 7.62915C17.4616 13.2641 17.2657 11.0285 17.6114 18.0001Z"
                            fill="#342EAD"></path>
                    </svg>
                </p>
                <h2 class="cs_section_title cs_font_48 cs_semi_bold">{{ $pageTitle }}
                </h2>
                <div class="cs_height_10 cs_height_lg_10"></div>
                <h6 class="cs_accent_color"> {{ $description }} </h6>
                <div class="cs_height_50 cs_height_lg_20"></div>
            </div>
            {{-- card part --}}
            <div class="cs_brands cs_style_1 cs_type_2">
                @if ($posts->count())
                    @foreach ($posts as $item)
                        <div class="cs_brand overflow-hidden cs_radius_10 text-center">
                            <div class="cs_brand_logo_wrap cs_center cs_brand_bg_1"
                                style="overflow: hidden; position: relative;">
                                <img class="cs_brand_logo" src="/images/posts/resized/resized_{{ $item->featured_image }}"
                                    alt="" style="width: 100%; height: auto; object-fit: contain; display: block;">
                            </div>
                            <p class="m-0 cs_white_bg cs_font_10 cs_semi_bold"> {{ $item->title }} </p>
                            <p class="m-0 cs_white_bg"><i class="fa-solid fa-calendar-days"></i>
                                {{ date_formatter($item->created_at) }} </p>
                            <p class="m-0 cs_white_bg">
                                <a href="{{ route('blog_author_posts', $item->author->username) }}">Author:
                                    {{ $item->author->name }}</a>
                            </p>
                        </div>
                    @endforeach
                @else
                    <span class="text-danger">No posts found in this tag.</span>
                @endif
            </div>
        </div>
        {{-- paginate part --}}
        <div class="cs_height_60 cs_height_lg_40"></div>
        {{ $posts->appends(request()->input())->links('custom_pagination') }}
        <div class="cs_height_60 cs_height_lg_40"></div>
    </section>
@endsection
