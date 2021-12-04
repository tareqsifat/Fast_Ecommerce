<?php

namespace App\Http\Livewire\Front\Includes\Homepage;

use App\Models\Merchant;
use Livewire\Component;

class ProductsStores extends Component
{
    public function render()
    {
        $datas  = Merchant::where('user_role', 1)->paginate(15);
        return view('livewire.front.includes.homepage.products-stores', compact('datas'));
    }
}
