<?php

namespace App\Http\Livewire\Front\Includes;

use App\Models\Slider;
use Livewire\Component;

class HomeBaner extends Component
{
    public function render()
    {
        $datas =  Slider::where('status', 0)->where('slider_for', 'banner_slider')->get();
        return view('livewire.front.includes.home-baner', compact('datas'));
    }
}
