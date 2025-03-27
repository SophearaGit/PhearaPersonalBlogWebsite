<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Portfolio;

class Portfolios extends Component
{
    use WithPagination;

    public $perPage = 9; // Number of items per load

    public function loadMore()
    {
        $this->perPage += 5;
    }

    public function render()
    {
        return view('livewire.user.portfolios', [
            'portfolios' => Portfolio::latest()->paginate($this->perPage)
        ]);
    }
}
