<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Product;
use Livewire\Component;

class SearchByProductCode extends Component
{
    public $search;
    function mount($search)
    {
        $this->search = '#'.$search;
    }
    public function render()
    {
        return view('livewire.admin.pages.search-by-product-code', [
            'data' => Product::where('product_code', $this->search)->first(),
        ]);
    }
}
