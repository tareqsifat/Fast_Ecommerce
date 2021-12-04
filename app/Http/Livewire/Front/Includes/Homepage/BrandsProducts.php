<?php

namespace App\Http\Livewire\Front\Includes\Homepage;

use App\Models\Brand;
use Livewire\Component;

class BrandsProducts extends Component
{
    public function render()
    {
        $datas = Brand::where('status',0)->orderBy('id','desc')->paginate(15);
        return view('livewire.front.includes.homepage.brands-products',compact('datas'));
    }
}
