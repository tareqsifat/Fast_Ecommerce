<?php

namespace App\Http\Livewire\Front;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart as pcart;

class Cart extends Component
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
        $productItem =  pcart::instance('cartProduct')->get($this->rowId);
        $qtty = $productItem->qty + 1;
        pcart::instance('cartProduct')->update($rowId, $qtty);
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
        $productItem =  pcart::instance('cartProduct')->get($this->rowId);
        if ($productItem->qty > 1) {
            $qtty = $productItem->qty - 1;
            pcart::instance('cartProduct')->update($rowId, $qtty);

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
        pcart::instance('cartProduct')->get($this->rowId);
        pcart::instance('cartProduct')->remove($this->rowId);
        $this->emit('refreshParent');
        $this->rowId = null;
    }

    public function render()
    {
        if (Auth::user()->id) {
            return view('livewire.front.cart')->layout('layouts.web');
        } else {
            return abort(404);
        }
    }
}
