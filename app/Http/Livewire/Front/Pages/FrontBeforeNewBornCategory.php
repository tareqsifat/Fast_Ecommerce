<?php

namespace App\Http\Livewire\Front\Pages;

use App\Models\BeforeBornCategory;
use App\Models\Product;
use Livewire\Component;

class FrontBeforeNewBornCategory extends Component
{


    // use WithPagination;
    public $slug;
    public $category_id;
    public $shortBy = 'asc';
    public $orderBy = 'price';
    public $min_price = 0;
    public $max_price = 5000000;
    public $product;
    public function mount($beforenewborn)
    {
        $this->slug = $beforenewborn;
        $cateData = BeforeBornCategory::where('slug', $this->slug)->first();
        if ($cateData) {
            $this->category_id = $cateData->id;
        } else {
            return abort(404);
        }
    }

    public function render()
    {
        $cateData = BeforeBornCategory::where('slug', $this->slug)->first();
        // dd($cateData->SubSubCategory->subcategory->categories);
        if ($cateData) {
            $uniquecategory = BeforeBornCategory::where('new_born_category_id', $cateData->newBornCategory->id)->get();
            $fProduct = Product::where('before_born_category_id', $cateData->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy($this->orderBy, $this->shortBy)->paginate(12);
            return view('livewire.front.pages.front-before-new-born-category', [
                'cateData' => $cateData,
                'fProduct' => $fProduct,
                'uniquecategory' => $uniquecategory,
            ])->layout('layouts.web');
        } else {
            return abort(404);
        }
    }
}
