<?php

namespace App\Http\Livewire\Front\Includes\Headers;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;

class CategoryDropdownMenue extends Component
{
    public function render()
    {
        $datas = Category::where('status', 0)->get();
        return view('livewire.front.includes.headers.category-dropdown-menue', compact('datas'));
    }
}
