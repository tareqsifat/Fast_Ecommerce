<?php

namespace App\Http\Livewire\Front\Includes\Homepage;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OnselsProducts extends Component
{

    public function render()
    {
        $datas = Product::whereNotNull('sale_price')->where('status', 0)->where('product_for', 'fast_deals')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.front.includes.homepage.onsels-products', compact('datas'));
    }
}
