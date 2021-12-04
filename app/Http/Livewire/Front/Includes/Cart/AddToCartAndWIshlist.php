<?php

namespace App\Http\Livewire\Front\Includes\Cart;

use App\Models\Cart as ModelsCart;
use App\Models\Wishlist;
use Livewire\Component;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddToCartAndWIshlist extends Component
{
    public $pdata;
    public $title;
    public $price;
    public $wishItem;
    public $rDiv;
    public function mount($pdata, $wishItem)
    {
        $this->pdata = $pdata;
        $this->wishItem = $wishItem;
    }

    /**
     *product add to cart method 
     * @param  $a = $productid
     * @param  $title = $product title
     * @param  $c = $product price 
     */
    public function ajax_add_to_cart(Request $request)
    {
        $data = Cart::instance('cartProduct')->add($request->product_id, $request->title, 1, 100)->associate('App\Models\Product');
        $total = Cart::subtotal();
        $totalqtty = Cart::instance('cartProduct')->count();
        return response()->json(['status' => true, 'isshipping' => $request->isshipping, 'data' => $data, 'total' => $total, 'totalqtty' => $totalqtty]);
    }
    /**
     *product add to cart method 
     * @param  $a = $productid
     * @param  $title = $product title
     * @param  $c = $product price 
     */
    public function addToShipping($product_id, $title, $price)
    {
        $data = Cart::instance('cartForShipping')->add($product_id, $title, 1, $price)->associate('App\Models\Product');
        $this->dispatchBrowserEvent('successalert', ['success' => 'Add to cart suceess for shipping']);
        $this->emit('refreshParent');
    }



    /**
     *product add to cart method 
     * @param  $a = $productid
     * @param  $title = $product title
     * @param  $c = $product price 
     */
    public function addToCart($product_id, $title, $price)
    {
        $data = Cart::instance('cartProduct')->add($product_id, $title, 1, $price)->associate('App\Models\Product');
        $this->dispatchBrowserEvent('successalert', ['success' => 'Add to cart suceess']);
        $this->emit('refreshParent');
    }
    /**
     *product add to cart method 
     * @param  $a = $productid
     * @param  $title = $product title
     * @param  $c = $product price 
     */

    public function addToWishlist($pId, $title, $price)
    {
        if (Cart::instance('wishlist')->count() > 0) {
            foreach (Cart::instance('wishlist')->content() as $allItems) {
                if ($allItems->id == $pId) {
                    $this->dispatchBrowserEvent('warningalert', ['success' => 'Already added to Wishlist']);
                    break;
                } else {
                    // dd($pId);
                    Cart::instance('wishlist')->add($pId, $title, 1, $price)->associate('App\Models\Product');
                    $this->dispatchBrowserEvent('successalert', ['success' => 'Wishlist added suceess']);
                }
            }
        } else {
            Cart::instance('wishlist')->add($pId, $title, 1, $price)->associate('App\Models\Product');
            $this->dispatchBrowserEvent('successalert', ['success' => 'Wishlist added suceess']);
        }
        $this->emit('refreshParent');
    }

    public function removeToWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $allItems) {
            if ($allItems->id == $product_id) {
                Cart::instance('wishlist')->remove($allItems->rowId);
                $this->emit('refreshParent');
                $this->rDiv = 'rf' . rand('10', '100');
                $this->dispatchBrowserEvent('warningalert', ['success' => 'Product delete to Wishlist']);
            }
        }
    }
    public function render()
    {
        return view('livewire.front.includes.cart.add-to-cart-and-w-ishlist');
    }
}
