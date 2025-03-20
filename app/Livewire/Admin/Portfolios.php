<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Portfolio;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;


class Portfolios extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $search = null;
    public $author = null;
    public $sortBy = 'desc';

    public $queryString = [
        'search' => ['except' => ''],
        'author' => ['except' => ''],
        // 'category' => ['except' => ''],
        // 'visibility' => ['except' => ''],
        'sortBy' => ['except' => ''],
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedAuthor()
    {
        $this->resetPage();
    }

    public $listeners = [
        'deletePortfolioAction',
    ];

    public function mount()
    {
        $this->author = Auth::user()->type == 'super_admin' ? Auth::user()->id : '';
    }

    public function deletePortfolio($id)
    {
        $this->dispatch('deletePortfolio', ['id' => $id]);
    }


    public function deletePortfolioAction($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $path = "images/portfolios/";
        $resized_path = $path . 'resized/';
        $old_featured_image = $portfolio->featured_image;

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

        // Delete porfolio form database
        $delete = $portfolio->delete();

        if ($delete) {
            $this->dispatch('showToastr', [
                'type' => 'success',
                'message' => 'Portfolio has been deleted successfully.'
            ]);
        } else {
            $this->dispatch('showToastr', [
                'type' => 'error',
                'message' => 'Failed to delete portfolio.'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.portfolios', [
            'portfolios' => AUTH::user()->type == 'super_admin' ? Portfolio::search(trim($this->search))
                ->when($this->author, function ($query) {
                    return $query->where('author_id', $this->author);
                })
                ->when($this->sortBy, function ($query) {
                    return $query->orderBy('id', $this->sortBy);
                })
                ->paginate($this->perPage) :

                Portfolio::search(trim($this->search))
                    ->when($this->author, function ($query) {
                        return $query->where('author_id', $this->author);
                    })
                    ->when($this->sortBy, function ($query) {
                        return $query->orderBy('id', $this->sortBy);
                    })
                    ->where('author_id', Auth::id())->paginate($this->perPage)
        ]);
    }
}
