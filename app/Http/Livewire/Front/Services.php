<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class Services extends Component
{
    public function render()
    {
        return view('livewire.front.services')->layout('layouts.web');
    }
}
