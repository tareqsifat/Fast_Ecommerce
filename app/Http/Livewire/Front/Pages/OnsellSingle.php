<?php

namespace App\Http\Livewire\Front\Pages;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;

class OnsellSingle extends Component
{

    use WithPagination;
    public $shortBy = 'asc';
    public $orderBy = 'sale_price';
    public $perPage = 20;
    public $category_id = [];
    public $brand_id = [];
    public $search_term = 'title';
    public $moreCategory = 5;
    public $moreBrand = 10;
    public $min_price = 0;
    public $max_price = 5000;
    public function loadMoreCategory($data)
    {
        $this->moreCategory = $this->moreCategory + $data;
    }
    public function loadMoreBrand($data)
    {
        $this->moreBrand = $this->moreBrand + $data;
    }
    public function render()
    {
        if (!empty($this->category_id) && !empty($this->brand_id)) {
            $product = Product::whereNotNull('sale_price')
                ->whereBetween('sale_price', [$this->min_price, $this->max_price])
                ->orwhere('category_id', [$this->category_id])
                ->orwhere('brand_id', [$this->brand_id])
                ->orderBy($this->orderBy, $this->shortBy)
                ->paginate($this->perPage);
        } elseif (!empty($this->category_id)) {
            $product = Product::whereNotNull('sale_price')
                ->whereBetween('price', [$this->min_price, $this->max_price])
                ->orwhere('category_id', [$this->category_id])
                ->orderBy($this->orderBy, $this->shortBy)
                ->paginate($this->perPage);
        } elseif (!empty(!empty($this->brand_id))) {
            $product = Product::whereNotNull('sale_price')
                ->whereBetween('sale_price', [$this->min_price, $this->max_price])
                ->where('brand_id', [$this->brand_id])
                ->orderBy($this->orderBy, $this->shortBy)
                ->paginate($this->perPage);
        } else {
            $product = Product::whereNotNull('sale_price')
                ->whereBetween('sale_price', [$this->min_price, $this->max_price])
                ->orderBy('id', 'desc')
                ->paginate($this->perPage);
        }
        return view('livewire.front.pages.onsell-single', [
            'allproduct' => Product::whereNotNull('sale_price')->get(),
            'product' => $product,
            'pCategory' => Category::where('status', 0)->get(),
            'category' => Subcategory::where('status', 0)->get(),
            'brands' => Brand::where('status', 0)->get(),
        ])->layout('layouts.web');
    }
}
