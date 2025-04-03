<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Portfolio;

class ReadPortfolio extends Component
{
    public $slug = null;
    public $tab = null;
    public $tabname = 'overview';
    protected $queryString = ['tab' => ['keep' => true]];

    public function selecttab($tab)
    {
        $this->tab = $tab;
    }

    public function mount($slug)
    {
        $this->tab = Request('tab') ? Request('tab') : $this->tabname;
        $this->slug = $slug;
    }

    public function render()
    {
        return view('livewire.user.read-portfolio', [
            'portfolio' => Portfolio::where('slug', $this->slug)->firstOrFail(),
        ]);
    }
}
