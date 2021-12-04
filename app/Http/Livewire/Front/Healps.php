<?php

namespace App\Http\Livewire\Front;

use App\Models\Faq;
use App\Models\Page;
use Livewire\Component;

class Healps extends Component
{
    public function render()
    {
        $globalfaq = Faq::where('faq_for', 'global')->where('status', 0)->get();
        // dd($globalfaq);
        $findpage = Page::where('title', 'healps')->first();
        return view('livewire.front.healps', compact(['findpage', 'globalfaq']))->layout('layouts.web');
    }
}
