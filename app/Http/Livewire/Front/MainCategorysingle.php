<?php

namespace App\Http\Livewire\Front;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class MainCategorysingle extends Component
{
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
        $cateData = Category::where('slug', $this->slug)->first();
        if ($cateData) {
            $this->category_id = $cateData->id;
        } else {
            return abort(404);
        }
    }


    public function render()
    {
        $cateData = Category::where('slug', $this->slug)->first();
        if ($cateData) {
            $fProduct = Product::where('category_id', $cateData->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy($this->orderBy, $this->shortBy)->paginate(12);
            return view('livewire.front.main-categorysingle', [
                'cateData' => $cateData,
                'fProduct' => $fProduct,
            ])->layout('layouts.web');
        } else {
            return abort(404);
        }
    }
}
