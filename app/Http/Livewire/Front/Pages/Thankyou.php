<?php

namespace App\Http\Livewire\Front\Pages;

use Livewire\Component;

class Thankyou extends Component
{
    public function render()
    {
        return view('livewire.front.pages.thankyou')->layout('layouts.web');
    }
}
