<?php

namespace App\Http\Livewire\Front\Includes\Homepage;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;

class CategorysMenue extends Component
{
    public function render()
    {
        $datas = Category::where('status', 0)->paginate(10);
        $subcategory = Subcategory::where('status', 0)->paginate(10);
        return view('livewire.front.includes.homepage.categorys-menue', compact(['datas', 'subcategory']));
    }
}
