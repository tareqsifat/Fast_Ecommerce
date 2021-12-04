<?php

namespace App\Http\Livewire\Front;

use App\Models\Page;
use Livewire\Component;

class ReturnPolicy extends Component
{
    public function render()
    {
        $findpage = Page::where('title', 'returnPolicy')->first();
        return view('livewire.front.return-policy', compact('findpage'))->layout('layouts.web');
    }
}
