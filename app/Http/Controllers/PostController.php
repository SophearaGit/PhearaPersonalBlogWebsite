<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentCategory;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function addPost(Request $request)
    {
        $categories_html = '';
        $pcategories = ParentCategory::whereHas('children')->orderBy('name', 'asc')->get();
        $categories = Category::where('parent', 0)->orderBy('name', 'asc')->get();
        if (count($pcategories) > 0) {
            foreach ($pcategories as $item) {
                $categories_html .= '<optgroup label="' . $item->name . '">';
                foreach ($item->children as $child) {
                    $categories_html .= '<option value="' . $child->id . '">' . $child->name . '</option>';
                }
                $categories_html .= '</optgroup>';
            }
        }
        if (count($categories) > 0) {
            foreach ($categories as $item) {
                $categories_html .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            }

        }
        $data = [
            'pageTitle' => 'Add new post',
            'categories_html' => $categories_html,
        ];
        return view('back.page.add_post', $data);
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title',
            'content' => 'required',
            'category' => 'required|exists:categories,id',
            'featured_image' => 'required|mimes:png,jpg,jpeg|max:1024',
        ]);

        if ($request->hasFile('featured_image')) {
            $path = "images/posts/";
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $new_filename = time() . '_' . $filename;

            // Upload featured image
            $upload = $file->move(public_path($path), $new_filename);

            if ($upload) {

                $resized_path = $path . 'resized/';
                if (!File::isDirectory($resized_path)) {
                    File::makeDirectory($resized_path, 0777, true, true);
                }
                //Thumbnail (Aspect ratio: 1)
                Image::make($path . $new_filename)
                    ->fit(250, 250)
                    ->save($resized_path . 'thumb_' . $new_filename);
                //Resized Image (Aspect ratio: 1.6)
                Image::make($path . $new_filename)
                    ->fit(512, 320)
                    ->save($resized_path . 'resized_' . $new_filename);

                $post = new Post();
                $post->author_id = Auth::id();
                $post->category = $request->category;
                $post->title = $request->title;
                $post->content = $request->content;
                $post->featured_image = $new_filename;
                $post->tags = $request->tags;
                $post->meta_keywords = $request->meta_keywords;
                $post->meta_description = $request->meta_description; // Fixed assignment
                $post->visibility = $request->visibility; // Fixed assignment

                $saved = $post->save();

                if ($saved) {
                    return response()->json(['status' => 1, 'message' => 'Post created successfully.']);
                } else {
                    return response()->json(['status' => 0, 'message' => 'Something went wrong while saving the post.']);
                }
            } else {
                return response()->json(['status' => 0, 'message' => 'Something went wrong on uploading a featured image.']);
            }
        }


    }

    public function allPosts(Request $request)
    {
        $data = [
            'pageTitle' => 'Posts',
        ];
        return view('back.page.all_posts', $data);
    }

    public function editPost(Request $request, $id = null)
    {
        $post = Post::findOrFail($id);

        $categories_html = '';
        $pcategories = ParentCategory::whereHas('children')->orderBy('name', 'asc')->get();
        $categories = Category::where('parent', 0)->orderBy('name', 'asc')->get();
        if (count($pcategories) > 0) {
            foreach ($pcategories as $item) {
                $categories_html .= '<optgroup label="' . $item->name . '">';
                foreach ($item->children as $child) {
                    if ($child->id == $post->category) {
                        $categories_html .= '<option selected value="' . $child->id . '">' . $child->name . '</option>';
                    } else {
                        $categories_html .= '<option value="' . $child->id . '">' . $child->name . '</option>';
                    }
                }
                $categories_html .= '</optgroup>';
            }
        }
        if (count($categories) > 0) {
            foreach ($categories as $item) {
                if ($item->id == $post->category) {
                    $categories_html .= '<option selected value="' . $item->id . '">' . $item->name . '</option>';
                } else {
                    $categories_html .= '<option value="' . $item->id . '">' . $item->name . '</option>';
                }
            }

        }
        $data = [
            'pageTitle' => 'Edit post',
            'post' => $post,
            'categories_html' => $categories_html,
        ];
        return view('back.page.edit_post', $data);
    }

    public function updatePost(Request $request)
    {

        $post = Post::findOrFail($request->post_id);
        $featured_image_name = $post->featured_image;

        $request->validate([
            'title' => 'required|unique:posts,title,' . $post->id,
            'content' => 'required',
            'category' => 'required|exists:categories,id',
            'featured_image' => 'nullable|mimes:png,jpg,jpeg|max:1024',
        ]);

        if ($request->hasFile('featured_image')) {
            $old_featured_image = $post->featured_image;
            $path = "images/posts/";
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $new_filename = time() . '_' . $filename;
            // Upload featured image
            $upload = $file->move(public_path($path), $new_filename);
            if ($upload) {
                // generate resized image and thumbnail
                $resized_path = $path . 'resized/';
                if (!File::isDirectory($resized_path)) {
                    File::makeDirectory($resized_path, 0777, true, true);
                }
                //Thumbnail (Aspect ratio: 1)
                Image::make($path . $new_filename)
                    ->fit(250, 250)
                    ->save($resized_path . 'thumb_' . $new_filename);
                //Resized Image (Aspect ratio: 1.6)
                Image::make($path . $new_filename)
                    ->fit(512, 320)
                    ->save($resized_path . 'resized_' . $new_filename);

                if ($old_featured_image != null && File::exists(public_path($path . $old_featured_image))) {
                    File::delete(public_path($path . $old_featured_image));
                    if (File::exists(public_path($path . 'resized_' . $old_featured_image))) {
                        File::delete(public_path($path . 'resized_' . $old_featured_image));
                    }
                    if (File::exists(public_path($path . 'thumb_' . $old_featured_image))) {
                        File::delete(public_path($path . 'thumb_' . $old_featured_image));
                    }
                }
                $featured_image_name = $new_filename;
            } else {
                return response()->json(['status' => 0, 'message' => 'Something went wrong on uploading a featured image.']);
            }
        }

        // $post->author_id = Auth::id();
        $post->category = $request->category;
        $post->title = $request->title;
        $post->slug = null;
        $post->content = $request->content;
        $post->featured_image = $featured_image_name;
        $post->tags = $request->tags;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->visibility = $request->visibility;
        $saved = $post->save();

        if ($saved) {
            return response()->json(['status' => 1, 'message' => 'Post updated successfully.']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong while updating the post.']);
        }




    }






}
