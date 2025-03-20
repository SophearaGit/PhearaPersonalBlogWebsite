<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\ParentCategory;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Posts extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $category_html;

    public $search = null;
    public $author = null;
    public $category = null;
    public $visibility = null;

    public $sortBy = 'desc';

    public $post_visibility;

    public $queryString = [
        'search' => ['except' => ''],
        'author' => ['except' => ''],
        'category' => ['except' => ''],
        'visibility' => ['except' => ''],
        'sortBy' => ['except' => ''],
    ];

    public $listeners = [
        'deletePostAction',
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedAuthor()
    {
        $this->resetPage();
    }

    public function updatedCategory()
    {
        $this->resetPage();
    }

    public function updatedVisibility()
    {
        $this->resetPage();
        $this->post_visibility = $this->visibility == 'public' ? 1 : 0;
    }
    // public function updatedSortBy()
    // {
    //     $this->resetPage();
    // }

    public function mount()
    {
        $this->author = Auth::user()->type == 'super_admin' ? Auth::user()->id : '';
        $this->post_visibility = $this->visibility == 'public' ? 1 : 0;
        $category_html = '';
        $pcategories = ParentCategory::whereHas('children', function ($q) {
            $q->whereHas('posts');
        })->orderBy('name', 'asc')->get();
        $categories = Category::whereHas('posts')->where('parent', 0)->orderBy('name', 'asc')->get();
        if (count($pcategories) > 0) {
            foreach ($pcategories as $item) {
                $category_html .= '<optgroup label="' . $item->name . '">';
                foreach ($item->children as $category) {
                    if ($category->posts->count() > 0) {
                        $category_html .= '<option value="' . $category->id . '">' . $category->name . '</option>';
                    }
                }
                $category_html .= '</optgroup>';
            }
        }
        if (count($categories) > 0) {
            foreach ($categories as $item) {
                if ($item->posts->count() > 0) {
                    $category_html .= '<option value="' . $item->id . '">' . $item->name . '</option>';
                }
            }
        }
        $this->category_html = $category_html;
    }

    public function deletePost($id)
    {
        $this->dispatch('deletePost', ['id' => $id]);
    }


    public function deletePostAction($id)
    {
        $post = Post::findOrFail($id);
        $path = "images/posts/";
        $resized_path = $path . 'resized/';
        $old_featured_image = $post->featured_image;

        // Delete featured image
        if ($old_featured_image != "" && File::exists(public_path($path . $old_featured_image))) {
            File::delete(public_path($path . $old_featured_image));
            // Delete resized image
            if (File::exists(public_path($resized_path . 'resized_' . $old_featured_image))) {
                File::delete(public_path($resized_path . 'resized_' . $old_featured_image));
            }
            // Delete thumbnail
            if (File::exists(public_path($resized_path . 'thumb_' . $old_featured_image))) {
                File::delete(public_path($resized_path . 'thumb_' . $old_featured_image));
            }
        }

        // Delete post form database
        $delete = $post->delete();

        if ($delete) {
            $this->dispatch('showToastr', [
                'type' => 'success',
                'message' => 'Post has been deleted successfully.'
            ]);
        } else {
            $this->dispatch('showToastr', [
                'type' => 'error',
                'message' => 'Failed to delete post.'
            ]);
        }


    }

    public function render()
    {
        return view('livewire.admin.posts', [
            'posts' => Auth::user()->type == "super_admin" ?
                Post::search(trim($this->search))
                    ->when($this->author, function ($query) {
                        return $query->where('author_id', $this->author);
                    })
                    ->when($this->category, function ($query) {
                        return $query->where('category', $this->category);
                    })
                    ->when($this->visibility, function ($query) {
                        return $query->where('visibility', $this->post_visibility);
                    })
                    ->when($this->sortBy, function ($query) {
                        return $query->orderBy('id', $this->sortBy);
                    })
                    ->paginate($this->perPage) :


                Post::search(trim($this->search))
                    ->when($this->author, function ($query) {
                        return $query->where('author_id', $this->author);
                    })
                    ->when($this->category, function ($query) {
                        return $query->where('category', $this->category);
                    })
                    ->when($this->visibility, function ($query) {
                        return $query->where('visibility', $this->post_visibility);
                    })
                    ->when($this->sortBy, function ($query) {
                        return $query->orderBy('id', $this->sortBy);
                    })
                    ->where('author_id', Auth::id())->paginate($this->perPage)
        ]);
    }







}
