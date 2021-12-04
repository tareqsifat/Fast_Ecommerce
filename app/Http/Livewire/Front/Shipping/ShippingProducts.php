<?php

namespace App\Http\Livewire\Front\Shipping;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ShippingProducts extends Component
{
    public function render()
    {
        if (session('shipping_search_query')) {
            $search_Query = session('shipping_search_query');
            $data = Product::whereNotNull('impacode')->where('impacode', 'LIKE', "%{$search_Query}%")->orderBy('id', 'desc')->where('status', 0)->paginate(15);
        } else {
            $data = Product::whereNotNull('impacode')->where('status', 0)->orderBy('id', 'desc')->paginate(15);
        }
        $parentCategory = Category::where('status', 0)->get();
        return view('livewire.front.shipping.shipping-products', compact(['data', 'parentCategory']))->layout('layouts.web');
    }
}
