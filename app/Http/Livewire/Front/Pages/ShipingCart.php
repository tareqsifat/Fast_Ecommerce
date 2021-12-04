<?php

namespace App\Http\Livewire\Front\Pages;

use Livewire\Component;
use Cart;


class ShipingCart extends Component
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
        $productItem =  Cart::instance('cartForShipping')->get($this->rowId);
        $qtty = $productItem->qty + 1;
        Cart::instance('cartForShipping')->update($rowId, $qtty);
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
        $productItem =  Cart::instance('cartForShipping')->get($this->rowId);
        if ($productItem->qty > 1) {
            $qtty = $productItem->qty - 1;
            Cart::instance('cartForShipping')->update($rowId, $qtty);

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
        Cart::instance('cartForShipping')->get($this->rowId);
        Cart::instance('cartForShipping')->remove($this->rowId);
        $this->emit('refreshParent');
        $this->rowId = null;
    }


    public function render()
    {
        return view('livewire.front.pages.shiping-cart')->layout('layouts.web');
    }
}
