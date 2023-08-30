<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0, $search = '';

    public function increment()
    {
        $this->count++;
    }


    public function render()
    {
        $search = $this->search;
        return view('livewire.counter', compact('search'));
    }
}
