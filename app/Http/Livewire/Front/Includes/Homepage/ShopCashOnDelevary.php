<?php

namespace App\Http\Livewire\Front\Includes\Homepage;

use App\Models\Merchant;
use Livewire\Component;

class ShopCashOnDelevary extends Component
{
    public function render()
    {
        $datas  = Merchant::where('delevery_system', 'cash_on')->paginate(10);
        return view('livewire.front.includes.homepage.shop-cash-on-delevary', compact('datas'));
    }
}
