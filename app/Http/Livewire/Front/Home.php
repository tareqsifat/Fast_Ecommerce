<?php

namespace App\Http\Livewire\Front;

use App\Models\Service;
use Livewire\Component;
use  Cart;
class Home extends Component
{
    public function render()
    {
        // Cart::instance('cartForShipping')->destroy();
        return view('livewire.front.home', [
            'services' => Service::where('status', 0)->paginate(4)
        ])->layout('layouts.web');  
    }
}
