<?php

namespace App\Http\Livewire\Front\Pages;

use App\Models\NewBornCategory;
use App\Models\Product;
use Livewire\Component;

class FrontNewBornCategory extends Component
{

    // use WithPagination;
    public $slug;
    public $category_id;
    public $shortBy = 'asc';
    public $orderBy = 'price';
    public $min_price = 0;
    public $max_price = 5000000;
    public $product;
    public function mount($newborn)
    {
        $this->slug = $newborn;
        $cateData = NewBornCategory::where('slug', $this->slug)->first();
        if ($cateData) {
            $this->category_id = $cateData->id;
        } else {
            return abort(404);
        }
    }




    public function render()
    {
        $cateData = NewBornCategory::where('slug', $this->slug)->first();
        // dd($cateData->babyCategory->SubSubCategory->subcategory->categories->slug);
        if ($cateData) {
            $fProduct = Product::where('new_born_category_id', $cateData->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy($this->orderBy, $this->shortBy)->paginate(12);
            return view('livewire.front.pages.front-new-born-category', [
                'cateData' => $cateData,
                'fProduct' => $fProduct,
            ])->layout('layouts.web');
        } else {
            return abort(404);
        }
    }
}
