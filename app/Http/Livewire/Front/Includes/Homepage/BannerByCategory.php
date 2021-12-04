<?php

namespace App\Http\Livewire\Front\Includes\Homepage;

use App\Models\Category;
use Livewire\Component;

class BannerByCategory extends Component
{
    public function render()
    {
        return view('livewire.front.includes.homepage.banner-by-category', [
            'category' => Category::where('banner_status', 1)->where('status', 0)->whereNotNull('index_no')->orderBy('index_no', 'asc')->get(),
        ]);
    }
}
