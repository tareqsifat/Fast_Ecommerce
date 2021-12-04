<?php

namespace App\Http\Livewire\Front;

use App\Models\Page;
use Livewire\Component;

class TermsAndConditions extends Component
{
    public function render()
    {
        $findpage = Page::where('title', 'tarmsandcondition')->first();
        return view('livewire.front.terms-and-conditions', compact('findpage'))->layout('layouts.web');
    }
}
