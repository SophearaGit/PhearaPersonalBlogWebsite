
<form action="{{ route('blog_search_posts') }}" method="GET"
    class="cs_search_form cs_style_1 position-relative overflow-hidden cs_radius_10 cs_white_bg">
    <input class="form-control h-100 w-100 cs_white_bg" type="search" name="q" id="search-blog" required=""
        placeholder="Type to discover articles, guide & tutorials..."
        value="{{ request('q') ? request('q') : '' }}">
    <button type="submit" class="cs_center position-absolute h-100 top-0 end-0">
        <img src="/front/assets/img/icon/search_icon.svg" alt="search">
    </button>
</form>
