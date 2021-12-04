<?php

namespace App\Http\Livewire\Front\Includes\Homepage;

use App\Models\Headline;
use Livewire\Component;

class MarqueeHeadline extends Component
{
    public function render()
    {
        $data = Headline::where('status', 0)->first();
        return view('livewire.front.includes.homepage.marquee-headline', compact('data'));
    }
}
