<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Illuminate\Http\Request;
use Livewire\Component;

class PrivacyAndPolicy extends Component
{
    public function save(Request $request)
    {
        $data = Page::where('title', 'privacy_policy')->first();
        $data->description = $request->description;
        $data->save();
        return back();
    }
    public function render()
    {
        $findpage = Page::where('title', 'privacy_policy')->first();
        return view('livewire.admin.pages.privacy-and-policy', compact('findpage'));
    }
}
