<?php

namespace App\Http\Livewire\Front\Includes;

use App\Models\Category;
use Livewire\Component;

class MobileMenue extends Component
{
    public function render()
    {
        $datas = Category::where('status', 0)->paginate(11);
        return view('livewire.front.includes.mobile-menue', compact('datas'))->layout('layouts.web');
    }
}
