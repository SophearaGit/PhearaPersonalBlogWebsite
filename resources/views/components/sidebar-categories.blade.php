<div class="col-lg-3">
    <div class="cs_category cs_style_1 cs_white_bg cs_radius_10 overflow-hidden mb-4">
        <h4 class="cs_category_title">Categories</h4>
        <ul class="cs_mp_0">
            @foreach (sidebar_categories() as $item)
                <li class="">
                    <a href="{{ route('blog_category_posts', $item->slug) }}"
                        class="d-flex justify-content-between align-items-center">
                        <span>{{ $item->name }}</span>
                        <span>
                            ({{ $item->posts->count() }})
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>


    {{-- <div class="cs_category cs_style_1 cs_white_bg cs_radius_10 overflow-hidden mb-4">
        <h4 class="cs_category_title">Latest Article</h4>
        <ul class="cs_mp_0">
            @foreach (sidebar_latest_posts() as $item)
                <li class="">
                    <a href="{{ route('blog_read_post', $item->slug) }}"
                        class="d-flex justify-content-between align-items-center">
                        <img src="/images/posts/resized/thumb_{{ $item->featured_image }}" alt="" loading="lazy"
                            class="mr-3">
                    </a>
                    <div class="media-body">
                        <h6 class="mb-0">
                            <a href="{{ route('blog_read_post', $item->slug) }}">
                                {{ $item->title }}
                            </a>
                        </h6>
                        <small class="text-muted">
                            {{ date_formatter($item->created_at) }}
                        </small>
                    </div>
                </li>
            @endforeach
        </ul>
    </div> --}}


    <x-sidebar-tags></x-sidebar-tags>
</div>
