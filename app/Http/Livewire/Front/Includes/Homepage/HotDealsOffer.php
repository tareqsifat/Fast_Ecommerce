<?php

namespace App\Http\Livewire\Front\Includes\Homepage;

use App\Models\Cart as ModelsCart;
use App\Models\Merchant;
use App\Models\Product;
use Livewire\Component;
use Cart;

class HotDealsOffer extends Component
{

    public function buyNow($a, $b, $c)
    {
        if (Cart::instance('cartProduct')->count() > 0) {
            foreach (Cart::instance('cartProduct')->content() as $allItems) {
                if ($allItems->id == $a) {
                    Cart::instance('cartProduct')->remove($allItems->rowId);
                    $data = Cart::instance('cartProduct')->add($a, $b, 1, $c)->associate('App\Models\Product');
                    $this->dispatchBrowserEvent('successalert', ['success' => 'Add to cart suceess']);
                    $this->emit('refreshParent');
                }
            }
        } else {
            $data = Cart::instance('cartProduct')->add($a, $b, 1, $c)->associate('App\Models\Product');
            $this->dispatchBrowserEvent('successalert', ['success' => 'Add to cart suceess']);
            $this->emit('refreshParent');
        }
        return redirect()->route('user.checkout');
    }

    public function render()
    {
        $datas  = Product::whereNotNull('offer_time')->paginate(5);
        return view('livewire.front.includes.homepage.hot-deals-offer', compact('datas'))->layout('layouts.web');
    }
}
