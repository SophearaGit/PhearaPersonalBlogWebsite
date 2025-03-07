<?php
use App\Models\User;
use App\Models\GeneralSetting;
use App\Models\ParentCategory;
use App\Models\Category;
use App\Models\Post;
use App\Models\UserSocialLink;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


/**
 * Fetch user information
 */
if (!function_exists('user')) {
    function user()
    {
        return AUTH::user();
    }
}

/**
 * Fetch user social links
 */
if (!function_exists('social_links')) {
    function social_links($user_id)
    {
        return UserSocialLink::where('user_id', $user_id)->first();
    }
}


/**
 * Site Information
 */
if (!function_exists('settings')) {
    function settings()
    {
        $settings = GeneralSetting::take(1)->first();
        if (!is_null($settings)) {
            return $settings;
        }
    }
}


/**
 * Dynamic Navigation Menu
 */
if (!function_exists('navigations')) {
    function navigations()
    {
        $navigation_html = '';

        // With dropdown
        $pcategories = ParentCategory::whereHas('children', function ($q) {
            $q->whereHas('posts');
        })->orderBy('name', 'asc')->get();

        // Without dropdown
        $categories = Category::whereHas('posts')->where('parent', 0)->orderBy('name', 'asc')->get();

        if (count($pcategories) > 0) {
            $navigation_html .= '
                    <li class="menu-item-has-children"><a href="#!">Post</a>
                        <ul>
            ';
            foreach ($pcategories as $item) {
                $navigation_html .= '
                            <li><a href="' . route('blog_category_posts', $item->slug) . '">' . $item->name . '</a>
                                <ul>
                                    <li>
                ';
                foreach ($item->children as $category) {
                    $navigation_html .= '<a href=" ' . route('blog_category_posts', $category->slug) . ' ">' . $category->name . '</a>';
                }
                $navigation_html .= '
                                    </li>
                                </ul>
                            </li>
                            ';
            }
            $navigation_html .= '
                        </ul>
                    </li>
            ';
        }

        if (count($categories) > 0) {
            foreach ($categories as $item) {
                $navigation_html .= '
                    <li> <a href="#!">' . $item->name . '</a></li>
                ';
            }
        }
        return $navigation_html;
    }
}


/**
 * Format a given date-time string into a human-readable date format.
 *
 * This function converts a datetime string (Y-m-d H:i:s) into a more readable
 * format like "January 12, 2024" using Carbon's `isoFormat('LL')`.
 *
 * @param string $value The datetime string to format (expected format: Y-m-d H:i:s).
 * @return string Formatted date (e.g., "January 12, 2024").
 */
if (!function_exists('date_formatter')) {
    function date_formatter($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->isoFormat('LL');
    }
}

/**
 * Make function that get only day of the date eg. 1-31
 */
if (!function_exists('day_of_date')) {
    function day_of_date($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d');
    }
}

/**
 * Make function that get only month and year of the date(get only 3 letter of the date) eg. Feb 2025
 */
if (!function_exists('month_and_year_short')) {
    function month_and_year_short($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('M Y');
    }
}

/**
 * Truncate a string to a specified number of words.
 *
 * This function removes HTML tags from the given string and then limits
 * it to a specific number of words. An optional ending string can be added.
 *
 * @param string $value The input string to truncate.
 * @param int $words The number of words to keep (default: 15).
 * @param string $end The string to append at the end (default: '...').
 * @return string The truncated string.
 */
if (!function_exists('words')) {
    function words($value, $words = 15, $end = '...')
    {
        return Str::words(strip_tags($value), $words, $end);
    }
}

/**
 * Calculate the estimated reading duration of a post.
 *
 * This function calculates the time required to read a given text
 * based on an average reading speed of 200 words per minute.
 *
 * @param string ...$text One or more text strings to analyze.
 * @return int Estimated reading duration in minutes (minimum of 1 minute).
 */
if (!function_exists('readDuration')) {
    function readDuration(...$text)
    {
        // Count total words in the provided text
        $totalWords = str_word_count(implode(' ', $text));

        // Calculate minutes to read (average reading speed: 200 words per minute)
        $minutesToRead = round($totalWords / 200);

        // Ensure minimum reading time is 1 minute
        return (int) max(1, $minutesToRead);
    }
}

/**
 * Retrieve the latest published posts for the homepage.
 *
 * This function fetches the most recent posts with visibility set to 1.
 * You can optionally skip a number of posts and limit the results.
 *
 * @param int $skip Number of posts to skip (default: 0).
 * @param int $limit Number of posts to retrieve (default: 5).
 * @return \Illuminate\Database\Eloquent\Collection Collection of latest posts.
 */
if (!function_exists('latest_posts')) {
    function latest_posts($skip = 0, $limit = 5)
    {
        return Post::where('visibility', 1)
            ->orderBy('created_at', 'desc')
            ->skip($skip)
            ->limit($limit)
            ->get();
    }
}

if (!function_exists('paginated_latest_posts')) {
    function paginated_latest_posts($perPage = 5)
    {
        return Post::where('visibility', 1)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
}


/**
 * LISTING CATEGORIES WITH NUMBER OF POSTS ON SIDEBAR param value of $limit = 8
 */
if (!function_exists('sidebar_categories')) {
    function sidebar_categories($limit = 8)
    {
        return Category::withCount('posts')
            ->having('posts_count', '>', 0)
            ->limit($limit)
            ->orderBy('posts_count', 'desc')
            ->get();
    }
}


/**
 * FETCH ALL TAGS FROM THE 'posts' TABLE
 */
if (!function_exists('all_tags')) {
    function all_tags($limit = null)
    {
        $tags = Post::WHERE('tags', '!=', '')
            ->pluck('tags');
        // split the tags into an array and remove duplicate
        $uniqueTags = $tags->flatMap(function ($tagsString) {
            return explode(',', $tagsString);
        })->map(fn($tag) => trim($tag))
            ->unique()
            ->sort()
            ->values();
        if ($limit) {
            $uniqueTags = $uniqueTags->take($limit);
        }
        return $uniqueTags->all();
    }
}


/**
 * listing sidebar latest posts
 */
if (!function_exists('sidebar_latest_posts')) {
    function sidebar_latest_posts($limit = 5, $except = null)
    {
        $post = Post::limit($limit);
        if ($except) {
            $post->where('id', '!=', $except);
        }
        return $post
            ->where('visibility', 1)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}














?>
