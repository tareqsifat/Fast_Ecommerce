<?php

namespace App\Http\Livewire\Front\Includes\Search;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Merchant;

class HeaderSearch extends Component
{
    public $query;
    public $product;
    public $brand;
    public $shops;
    public $activeColor = 'product';

    public function mount()
    {
        $this->query = '';
        $this->product = [];
        $this->brand = [];
        $this->shops = [];
    }


    public function search()
    {
        return redirect(route('search', $this->query));
    }
    // updatedQuery
    public function updatedQuery()
    {
        $this->product = Product::where('product_code', 'LIKE', "%{$this->query}%")->orwhere('title', 'LIKE', "%{$this->query}%")->where('status', 0)->get()->toArray();
    }

    // brand button click CTION   
    public function brandCA()
    {
        $this->activeColor = 'brand';
        $this->product = [];
        $this->shops = [];
        $this->brand = Brand::where('name', 'LIKE', "%{$this->query}%")->where('status', 0)->get()->toArray();
    }
    // product button click CTION   
    public function productCA()
    {
        $this->activeColor = 'product';
        $this->brand = [];
        $this->shops = [];
        $this->product = Product::where('title', 'LIKE', "%{$this->query}%")->orwhere('product_code', 'LIKE', "%{$this->query}%")->where('status', 0)->get()->toArray();
    }
    // product button click CTION   

    public function shopCA()
    {
        $this->activeColor = 'shop';
        $this->brand = [];
        $this->product = [];
        $this->shops = Merchant::where('name', 'LIKE', "%{$this->query}%")->where('user_as', 'merchent')->get()->toArray();
    }
    // rander method 
    public function render()
    {
        return view('livewire.front.includes.search.header-search');
    }
}
