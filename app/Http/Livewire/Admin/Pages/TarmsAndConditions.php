<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Illuminate\Http\Request;
use Livewire\Component;

class TarmsAndConditions extends Component
{
    public function save(Request $request)
    {
        $data = Page::where('title', 'tarmsandcondition')->first();
        $data->description = $request->description;
        $data->save();
        return back();
    }
    public function render()
    {
        $findpage = Page::where('title', 'tarmsandcondition')->first();
        return view('livewire.admin.pages.tarms-and-conditions', compact('findpage'));
    }
}
