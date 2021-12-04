<?php

namespace App\Http\Livewire\Front\Includes\Cart;

use Livewire\Component;
use Cart;

class MyCart extends Component
{
    public $rowId;
    protected $listeners = ['refreshParent' => '$refresh'];


    /**
     *product incrimentQty to cart  
     * @param  $rowId;
     */

    public function incrimentQty($rowId)
    {
        $this->rowId = $rowId;
        $productItem =  Cart::instance('cartProduct')->get($this->rowId);
        $qtty = $productItem->qty + 1;
        Cart::instance('cartProduct')->update($rowId, $qtty);
        $this->emit('refreshParent');
        $this->rowId = null;
    }
    /**
     *product decrimentQty to cart  
     * @param  $rowId;
     */

    public function decrimentQty($rowId)
    {
        $this->rowId = $rowId;
        $productItem =  Cart::instance('cartProduct')->get($this->rowId);
        if ($productItem->qty > 1) {
            $qtty = $productItem->qty - 1;
            Cart::instance('cartProduct')->update($rowId, $qtty);
            $this->emit('refreshParent');
            $this->rowId = null;
        }
    }
    /**
     *product removeItem to cart  
     * @param  $rowId;
     */
    public function removeItem($rowId)
    {
        $this->rowId = $rowId;
        foreach (Cart::instance('cartProduct')->content() as $allItems) {
            if ($allItems->rowId == $rowId) {
                Cart::instance('cartProduct')->remove($this->rowId);
                break;
            }
        }
        $this->emit('refreshParent');
        $this->rowId = null;
    }

    /**
     *render method to view the component
     */
    public function render()
    {
        return view('livewire.front.includes.cart.my-cart');
    }
}
