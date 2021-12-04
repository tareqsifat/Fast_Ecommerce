<?php

namespace App\Http\Livewire\Front\Includes\Homepage;

use App\Models\Category;
use Livewire\Component;

class ProductByCategories extends Component
{
    public function render()
    {
        $datas =  Category::whereNotNull('index_no')->orderBy('index_no', 'asc')->get();
        return view('livewire.front.includes.homepage.product-by-categories', compact('datas'));
    }
}
