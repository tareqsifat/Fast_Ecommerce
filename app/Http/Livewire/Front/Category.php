<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Product;
use App\Models\Subcategory;

class Category extends Component
{
    // use WithPagination;
    public $slug;
    public $category_id;
    public $shortBy = 'asc';
    public $orderBy = 'price';
    public $min_price = 0;
    public $max_price = 5000000;
    public $product;
    public function mount($slug)
    {
        $this->slug = $slug;
        $cateData = Subcategory::where('slug', $this->slug)->first();
        if ($cateData) {
            $this->category_id = $cateData->id;
        } else {
            return abort(404);
        }
    }

    public function render()
    {
        $cateData = Subcategory::where('slug', $this->slug)->first();
        if ($cateData) {
            $uniquebrads = Product::where('subcategory_id',  $cateData->id)->distinct('brand_id')->pluck('brand_id'); //take unique brand 
            $fProduct = Product::where('subcategory_id', $cateData->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy($this->orderBy, $this->shortBy)->paginate(12);
            return view('livewire.front.category', [
                'cateData' => $cateData,
                'fProduct' => $fProduct,
                'uniquebrads' => $uniquebrads,
            ])->layout('layouts.web');
        } else {
            return abort(404);
        }
    }
}
