<?php

namespace App\Http\Livewire\Front\Pages;

use App\Models\BabyCategory as ModelsBabyCategory;
use App\Models\Product;
use App\Models\SubSubCategory;
use Livewire\Component;

class Babycategory extends Component
{

    // use WithPagination;
    public $slug;
    public $category_id;
    public $shortBy = 'asc';
    public $orderBy = 'price';
    public $min_price = 0;
    public $max_price = 5000000;
    public $product;
    public function mount($babyslug)
    {
        $this->slug = $babyslug;
        $cateData = ModelsBabyCategory::where('slug', $this->slug)->first();
        if ($cateData) {
            $this->category_id = $cateData->id;
        } else {
            return abort(404);
        }
    }




    public function render()
    {
        $cateData = ModelsBabyCategory::where('slug', $this->slug)->first();
        // dd($cateData->SubSubCategory->subcategory->categories);
        if ($cateData) {
            $uniquecategory = ModelsBabyCategory::where('sub_sub_category_id', $cateData->SubSubCategory->id)->get();
            $fProduct = Product::where('baby_category_id', $cateData->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy($this->orderBy, $this->shortBy)->paginate(12);
            return view('livewire.front.pages.babycategory', [
                'cateData' => $cateData,
                'fProduct' => $fProduct,
                'uniquecategory' => $uniquecategory,
            ])->layout('layouts.web');
        } else {
            return abort(404);
        }
    }
}
