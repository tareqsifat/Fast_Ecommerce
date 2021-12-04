<?php

namespace App\Http\Livewire\Front\Pages;

use App\Models\Brand;
use App\Models\Merchant;
use App\Models\Product;
use Livewire\Component;

class BrandSingle extends Component
{
    public $brandData;
    public $datas;
    public function mount($slug)
    {
        $brandData = Brand::where('slug', $slug)->first();
        if ($brandData) {
            $this->brandData = $brandData;
            $this->datas  = Product::where('brand_id', $brandData->id)->where('status', 0)->orderBy('id', 'desc')->get();
        } else {
            return abort(404);
        }
    }

    public function render()
    {
        return view('livewire.front.pages.brand-single', [
            'brands'  => Brand::where('status', 0)->orderBy('id', 'desc')->paginate(7),
        ])->layout('layouts.web');
    }
}
