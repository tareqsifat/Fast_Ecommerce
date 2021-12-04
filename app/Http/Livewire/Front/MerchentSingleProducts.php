<?php

namespace App\Http\Livewire\Front;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class MerchentSingleProducts extends Component
{

    public $pId;
    public $perPage = 18;
    public function mount($pId)
    {
        $this->pId = base64_decode($pId);
        $this->perPage;
    }

    public function loadMore()
    {
        $this->perPage = $this->perPage + 10;
    }

    public function render()
    {
        $mcdata = User::where('id', $this->pId)->first();
        if ($mcdata) {
            return view('livewire.front.merchent-single-products', [
                'merchent' => $mcdata,
                'merchentProducts' => Product::where('user_id', $this->pId)->where('status', 0)->paginate($this->perPage),
                'brands'  => Brand::where('status', 0)->where('user_id', $this->pId)->get(),
                'category'  => Category::where('status', 0)->where('user_id', $this->pId)->get(),
                'merchentAlldatas' => Product::where('user_id', $this->pId)->where('status', 0)->get(),
            ])->layout('layouts.web');;
        } else {
            return abort(404);
        }
    }
}
