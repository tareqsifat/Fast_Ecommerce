<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Illuminate\Http\Request;
use Livewire\Component;

class AboutUs extends Component
{

    public function save(Request $request)
    {
        $data = Page::where('title', 'aboutus')->first();
        $data->description = $request->description;
        $data->save();
        return back();
    }
    public function render()
    {
        $findpage = Page::where('title', 'aboutus')->first();
        return view('livewire.admin.pages.about-us', compact('findpage'));
    }
}
