<?php

namespace App\Http\Livewire\Front;

use App\Models\Page;
use Livewire\Component;

class AboutUs extends Component
{
    public function render()
    {
        $findpage = Page::where('title', 'aboutus')->first();
        return view('livewire.front.about-us', compact('findpage'))->layout('layouts.web');
    }
}
