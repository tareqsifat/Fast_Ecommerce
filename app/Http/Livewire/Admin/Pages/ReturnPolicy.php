<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Illuminate\Http\Request;
use Livewire\Component;

class ReturnPolicy extends Component
{
    public function save(Request $request)
    {
        $data = Page::where('title', 'returnPolicy')->first();
        $data->description = $request->description;
        $data->save();
        return back();
    }
    public function render()
    {
        $findpage = Page::where('title', 'returnPolicy')->first();
        return view('livewire.admin.pages.return-policy', compact('findpage'));
    }
}
