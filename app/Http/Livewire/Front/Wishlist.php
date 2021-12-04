<?php

namespace App\Http\Livewire\Front;

use App\Models\Cart as ModelsCart;
use App\Models\Wishlist as ModelsWishlist;
use Livewire\Component;
use Cart;

class Wishlist extends Component
{

    public $rowId;
    public function mount()
    {
        $checlDb = ModelsCart::all();
    }
    /**
     *product add to cart method 
     * @param  $productid 
     * @param  $title
     * @param  $price 
     */
    public function addToCart($rowId)
    {
        $productItem =  Cart::instance('wishlist')->get($rowId);
        if (!is_null($productItem->model->impacode)) {
            $data = Cart::instance('cartForShipping')->add($productItem->id, $productItem->model->title, 1, $productItem->price)->associate('App\Models\Product');
        } else {
            $data = Cart::instance('cartProduct')->add($productItem->id, $productItem->model->title, 1, $productItem->price)->associate('App\Models\Product');
        }
        $this->dispatchBrowserEvent('successalert', ['success' => 'Add to cart suceess']);
        Cart::instance('wishlist')->remove($rowId);
        $this->rowId = null;
        $this->emit('refreshParent');
    }

    /**
     *product removeItem to wishlist  
     * @param  $rowId;
     */
    public function removeItem($rowId)
    {
        $this->rowId = $rowId;
        $productItem =  Cart::instance('wishlist')->get($this->rowId);
        // if (isset(Auth::user()->id)) {
        $checkProduct = ModelsWishlist::where('product_id', $productItem->model->id)->first();
        if ($checkProduct) {
            $checkProduct->delete();
        }
        // }
        Cart::instance('wishlist')->remove($this->rowId);
        $this->emit('refreshParent');
        $this->rowId = null;
    }
    /**
     *render method to view the component
     */
    public function render()
    {
        return view('livewire.front.wishlist')->layout('layouts.web');
    }
}
