<?php

namespace App\Livewire;

use App\Models\Kabupaten;
use Livewire\Component;

class SearchKabupaten extends Component
{
    public $search = '';

    public function render()
    {
        $kabupatens = Kabupaten::where('nama', 'like', '%' . $this->search . '%')->orderBy('nama', 'asc')->get();
        $search = $this->search;

        return view('livewire.search-kabupaten', compact('kabupatens', 'search'));
    }
}
