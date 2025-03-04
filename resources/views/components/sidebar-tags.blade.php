<div class="cs_category cs_style_1 cs_white_bg cs_radius_10 overflow-hidden" style="padding: 20px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
    <h4 class="cs_category_title" style="font-size: 1.5em; color: #333; margin-bottom: 15px;">Tags</h4>
    <ul class="cs_mp_0" style="display: flex; flex-wrap: wrap; list-style-type: none; padding: 0;">
        @foreach (all_tags(15) as $tag)
            <li class="border-1" style="margin: 5px;">
                <a href="{{ route('blog_tag_posts', urlencode($tag)) }}" style="display: inline-block; padding: 10px 20px; border-radius: 25px; background-color: #f0f0f0; color: #333; text-decoration: none; transition: background-color 0.3s, transform 0.3s; font-size: 0.9em; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                    {{ $tag }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
