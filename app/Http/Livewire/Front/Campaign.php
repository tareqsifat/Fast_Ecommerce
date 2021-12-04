<?php

namespace App\Http\Livewire\Front;

use App\Models\Product;
use App\Models\Slider;
use Livewire\Component;

class Campaign extends Component
{
    public function render()
    {
        $datas = Product::where('status', 0)->where('product_for', 'campaign')->get();
        $slider = Slider::where('status', 0)->where('slider_for', 'campaign')->get();
        return view('livewire.front.campaign', compact(['datas', 'slider']))->layout('layouts.web');
    }
}
