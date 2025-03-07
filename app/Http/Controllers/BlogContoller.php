<?php

namespace App\Http\Controllers;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Helpers\CMail;

use Illuminate\Http\Request;

class BlogContoller extends Controller
{

    /** KLENG NIH FOR HOME BLOG */
    public function index(Request $request)
    {
        $title = isset(settings()->site_title) ? settings()->site_title : '';
        $description = isset(settings()->site_mete_description) ? settings()->site_meta_description : '';
        $imageUrl = isset(settings()->site_logo) ? asset('/images/site/' . settings()->site_logo) : '';
        $keywords = isset(settings()->site_meta_keywords) ? settings()->site_meta_keywords : '';
        $currentUrl = url()->current();

        /** META SEO */
        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);
        SEOMeta::setKeywords($keywords);

        /** OPEN GRAPH */
        SEOTools::openGraph()
            ->setUrl($currentUrl)
            // ->addImage($imageUrl, ['height' => 600, 'width' => 315])
            ->addImage($imageUrl)
            ->addProperty('type', 'articles');


        /** TWITTER */
        SEOTools::twitter()
            ->setUrl($currentUrl)
            ->addImage($imageUrl)
            ->setSite('@RaaBlog');

        $data = [
            'pageTitle' => $title,
        ];
        return view('front.pages.index', $data);
    }


    /** KLENG NIH FOR BLOG PAGE MG */
    public function blog(Request $request)
    {
        $posts = paginated_latest_posts();
        $title = isset(settings()->site_title) ? settings()->site_title : '';
        $description = isset(settings()->site_mete_description) ? settings()->site_meta_description : '';
        $imageUrl = isset(settings()->site_logo) ? asset('/images/site/' . settings()->site_logo) : '';
        $keywords = isset(settings()->site_meta_keywords) ? settings()->site_meta_keywords : '';
        $currentUrl = url()->current();

        /** META SEO */
        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);
        SEOMeta::setKeywords($keywords);

        /** OPEN GRAPH */
        SEOTools::openGraph()
            ->setUrl($currentUrl)
            // ->addImage($imageUrl, ['height' => 600, 'width' => 315])
            ->addImage($imageUrl)
            ->addProperty('type', 'articles');


        /** TWITTER */
        SEOTools::twitter()
            ->setUrl($currentUrl)
            ->addImage($imageUrl)
            ->setSite('@RaaBlog');

        $data = [
            'pageTitle' => $title,
        ];
        return view('front.pages.blog', $data, compact('posts'));
    }

    public function categoryPosts(Request $request, $slug = null)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = Post::where('category', $category->id)
            ->where('visibility', 1)
            ->paginate(8);

        $title = 'Posts in category: ' . $category->name;
        $description = 'Browse the latest posts in the ' . $category->name . ' category. Stay udated with articles, insights, and tutorials.';

        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl(url()->current());

        $data = [
            'pageTitle' => $title,
            'posts' => $posts,
            'description' => $description,
        ];
        return view('front.pages.category_posts', $data);
    }

    public function authorPosts(Request $request, $username = null)
    {

        $author = User::where('username', $username)->firstOrFail();

        $posts = Post::where('author_id', $author->id)
            ->where('visibility', 1)
            ->orderBy('created_at', 'asc')
            ->paginate(8);

        $title = $author->name . ' - Blog Posts';
        $description = 'Check out ' . $author->name . "'s blog posts. Stay updated with articles, insights, and tutorials by " . $author->name . ".";

        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(route('blog_author_posts', ['username' => $author->username]));
        SEOTools::opengraph()->setUrl(route('blog_author_posts', ['username' => $author->username]));
        SEOTools::opengraph()->addProperty('type', 'profile');
        SEOTools::opengraph()->setProfile([
            'first_name' => $author->name,
            'username' => $author->username,
        ]);

        $data = [
            'pageTitle' => $title,
            'author' => $author,
            'posts' => $posts,
            'description' => $description,
        ];

        return view('front.pages.author_posts', $data);

    }

    public function tagPosts(Request $request, $tag = null)
    {
        $posts = Post::where('tags', 'LIKE', "%{$tag}%")->where('visibility', 1)->paginate(8);
        $title = 'Posts tagged: ' . $tag;
        $description = 'View and read posts tagged with ' . $tag . '. Stay updated with articles, insights, and tutorials.';

        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('type', 'article');

        $data = [
            'pageTitle' => $title,
            'tag' => $tag,
            'posts' => $posts,
            'description' => $description,

        ];
        return view('front.pages.tag_posts', $data);
    }

    public function searchPosts(Request $request)
    {
        // get search query from the input
        $query = $request->input('q');
        // if query is not empty, process the search
        if ($query) {
            $keywords = explode(' ', $query);
            $postQuery = Post::query();
            foreach ($keywords as $keyword) {
                $postQuery->orWhere('title', 'LIKE', "%{$keyword}%")
                    ->orWhere('tags', 'LIKE', "%{$keyword}%");
            }
            $posts = $postQuery
                ->where('visibility', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            // for meta tags
            $title = "Search results for {$query}";
            $description = "Search results for {$query}. Find articles, insights, and tutorials related to your query.";

        } else {
            $posts = collect();

            // for meta tags
            $title = 'Search';
            $description = ' Search for blog posts on our website.';
        }
        ;

        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);

        $data = [
            'pageTitle' => $title,
            'query' => $query,
            'posts' => $posts,
        ];

        return view('front.pages.search_posts', $data);
    }

    public function readPost(Request $request, $slug = null)
    {
        // fetch single post by slug
        $post = Post::where('slug', $slug)
            // ->where('visibility', 1)
            ->firstOrFail();

        // fetch related posts
        $relatedPosts = Post::where('category', $post->category)
            ->where('id', '!=', $post->id)
            ->where('visibility', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // fetch the next post
        $nextPost = Post::where('id', '>', $post->id)
            ->where('visibility', 1)
            ->orderBy('id', 'asc')
            ->first();

        // fetch the previous post
        $prevPost = Post::where('id', '<', $post->id)
            ->where('visibility', 1)
            ->orderBy('id', 'desc')
            ->first();

        // for meta tags
        $title = $post->title;
        $description = ($post->meta_description != '') ? $post->meta_description : words($post->content, 35);

        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl(route('blog_read_post', ['slug' => $post->slug]));
        SEOTools::opengraph()->addProperty('type', 'article');
        SEOTools::opengraph()->addImage(asset('images/posts/' . $post->featured_image));
        SEOTools::twitter()->setImage(asset('images/posts/' . $post->featured_image));

        $data = [
            'pageTitle' => $title,
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'nextPost' => $nextPost,
            'prevPost' => $prevPost,
        ];

        return view('front.pages.read_post', $data);
    }

    public function contactPage(Request $request)
    {
        $title = 'Contact Me';
        $description = 'Contact me for any questions, suggestions, or inquiries about our blog. I am here to help.';
        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);

        return view('front.pages.contact');
    }

    public function aboutPage(Request $request)
    {
        $title = 'About Me';
        $description = 'About me, my background, and my passion for technology. I am always eager to learn and share knowledge.';
        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);

        return view('front.pages.about');
    }

    public function portfolioPage(Request $request)
    {
        $title = 'Portfolio';
        $description = 'View my portfolio of projects, including web, mobile, and software development. I am always looking for new opportunities to showcase my skills.';
        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);

        return view('front.pages.portfolio');
    }

    public function sendEmail(Request $request)
    {
        // validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // tv mer kleng admin profile ler front end vinh
        $siteInfo = settings();

        // dd($siteInfo);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        $mail_body = view('email-template.contact-message-template', $data);

        $mail_config = [
            'from_address' => $request->email,
            'from_name' => $request->name,
            'recipient_address' => $siteInfo->site_email,
            'recipient_name' => $siteInfo->site_title,
            'subject' => $request->subject,
            'body' => $mail_body,
        ];

        if (CMail::send($mail_config)) {
            return redirect()
                ->back()
                ->with('success', 'Your message has been sent successfully!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Failed to send your message. Please try again later.');
        }
    }   // End Method


}
