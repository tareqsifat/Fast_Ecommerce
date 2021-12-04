<?php

namespace App\Http\Livewire\Front\Includes;

use App\Models\Slider;
use Livewire\Component;

class Homeslider extends Component
{
    public function render()
    {
        $datas = Slider::where('status', 0)->where('slider_for', 'home_main_slider')->get();
        return view('livewire.front.includes.homeslider', compact('datas'));
    }
}
