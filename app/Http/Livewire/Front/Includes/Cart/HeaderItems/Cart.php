<?php

namespace App\Http\Livewire\Front\Includes\Cart\HeaderItems;

use Livewire\Component;

class Cart extends Component
{
    protected $listeners = ['refreshParent' => '$refresh'];
    public function render()
    {
        return view('livewire.front.includes.cart.header-items.cart');
    }
}
