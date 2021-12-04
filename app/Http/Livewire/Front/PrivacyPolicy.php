<?php

namespace App\Http\Livewire\Front;

use App\Models\Page;
use Livewire\Component;

class PrivacyPolicy extends Component
{
    public function render()
    {
        $findpage = Page::where('title', 'privacy_policy')->first();
        return view('livewire.front.privacy-policy', compact('findpage'))->layout('layouts.web');
    }
}
