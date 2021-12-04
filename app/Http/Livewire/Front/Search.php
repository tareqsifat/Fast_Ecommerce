<?php

namespace App\Http\Livewire\Front;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $shortBy = 'asc';
    public $orderBy = 'price';
    public $perPage = '16';
    public $category_id;
    public $brand_id;
    public $search_term = 'title';
    public $moreCategory = 5;
    public $moreBrand = 10;
    public $min_price = null;
    public $max_price = null;
    public $instock = 0;
    public function mount($search)
    {
        $this->search = $search;
        $this->category_id = (session('hScategory_id') ? session('hScategory_id') : $this->category_id);
        $this->brand_id = (session('hSbrand_id') ? session('hSbrand_id') : $this->brand_id);
        $this->min_price = (session('min_price') ? session('min_price') : $this->min_price);
        $this->max_price = (session('max_price') ? session('max_price') : $this->max_price);
        $this->instock = (session('instock') ? session('instock') : $this->instock);
        $this->shortBy = (session('short_by') ? session('short_by') : $this->shortBy);
        $this->perPage = (session('countby') ? session('countby') : $this->perPage);
    }
    // load more category 
    public function loadMoreCategory($data)
    {
        $this->moreCategory = $this->moreCategory + $data;
    }
    // load more brand 
    public function loadMoreBrand($data)
    {
        $this->moreBrand = $this->moreBrand + $data;
    }
    // render to view the component 
    public function render()
    {
        if (!empty($this->category_id) && !empty($this->brand_id)) {
            $product = Product::where($this->search_term, 'LIKE', "%{$this->search}%")->whereBetween('price', [$this->min_price, $this->max_price])->where('availability', $this->instock)->orwhere('product_code', 'LIKE', "%{$this->search}%")->orwhere('category_id', $this->category_id)->orwhere('brand_id', $this->brand_id)->orderBy($this->orderBy, $this->shortBy)->paginate($this->perPage);
        } elseif (!empty($this->category_id)) {
            $product = Product::where($this->search_term, 'LIKE', "%{$this->search}%")->whereBetween('price', [$this->min_price, $this->max_price])->where('availability', $this->instock)->orwhere('product_code', 'LIKE', "%{$this->search}%")->orwhere('category_id', $this->category_id)->orderBy($this->orderBy, $this->shortBy)->paginate($this->perPage);
        } elseif (!empty(!empty($this->brand_id))) {
            $product = Product::where($this->search_term, 'LIKE', "%{$this->search}%")->whereBetween('price', [$this->min_price, $this->max_price])->where('availability', $this->instock)->orwhere('product_code', 'LIKE', "%{$this->search}%")->where('brand_id', $this->brand_id)->orderBy($this->orderBy, $this->shortBy)->paginate($this->perPage);
        } else {
            $product = Product::where($this->search_term, 'LIKE', "%{$this->search}%")->whereBetween('price', [$this->min_price, $this->max_price])->where('availability', $this->instock)->orwhere('product_code', 'LIKE', "%{$this->search}%")->orderBy($this->orderBy, $this->shortBy)->paginate($this->perPage);
        }
        return view('livewire.front.search', [
            'allproduct' => Product::where('title', 'LIKE', "%{$this->search}%")->orwhere('product_code', 'LIKE', "%{$this->search}%")->get(),
            'product' => $product,
            'pCategory' => Category::where('status', 0)->get(),
            'category' => Subcategory::where('status', 0)->get(),
            'brands' => Brand::where('status', 0)->get(),
        ])->layout('layouts.web');
    }
}
