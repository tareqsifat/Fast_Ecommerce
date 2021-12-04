<?php

namespace App\Http\Livewire\Front;

use App\Models\Brand;
use Illuminate\Support\Carbon;
use Livewire\Component;

class AllBrands extends Component
{
    public function render()
    {
        $datas = Brand::where('status', 0)->get();
        return view('livewire.front.all-brands', compact('datas'))->layout('layouts.web');
    }
}
