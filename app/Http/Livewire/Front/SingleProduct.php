<?php

namespace App\Http\Livewire\Front;

use App\Models\AskQuestion;
use App\Models\Product;
use App\Models\Productimage;
use App\Models\Productreview;
use App\Models\ProductSpecification;
use App\Models\Service;
use Livewire\Component;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SingleProduct extends Component
{
    public $divisions_id;
    public $district_id;
    public $upazilla;
    public $findData;
    public $slug;
    public $like;
    public $qtty = 1;


    function mount($slug)
    {
        $this->slug = $slug;
        $findData = Product::where('slug', $slug)->where('status', 0)->first();
        if ($findData) {
            $udata = $findData->mostview + 1;
            $findData->update(['mostview' => $udata]);
        } else {
            return abort(404);
        }
    }


    // add to cart 
    //request and res
    public function addToCart(Request $request)
    {
        $id    = $request->pId;
        $title = $request->title;
        $qtty  = $request->qtty;
        $price = $request->price;
        if ($request->button == 'addtocart') {
            Cart::instance('cartProduct')->add($id, $title, $qtty, $price)->associate('App\Models\Product');
            return back()->with('successMessage', 'Cart added suceess');
        } elseif ($request->button == 'buynow') {
            Cart::instance('cartProduct')->add($id, $title, $qtty, $price)->associate('App\Models\Product');
            return redirect()->route('user.checkout');
        } elseif ($request->button == 'shipping') {
            Cart::instance('cartForShipping')->add($id, $title, $qtty, $price)->associate('App\Models\Product');
            return redirect()->route('user.shipping.checkout');
        } elseif ($request->button == 'shippingCart') {
            Cart::instance('cartForShipping')->add($id, $title, $qtty, $price)->associate('App\Models\Product');
            return back()->with('successMessage', 'Cart added suceess');
        } else {
            return back()->with('warningAlert', 'Oppes something went wrong :)');
        }
    }

    // addToWishlist
    public function addToWishlist($id, $title, $price)
    {
        if (Cart::instance('wishlist')->count() > 0) {
            foreach (Cart::instance('wishlist')->content() as $allItems) {
                if ($allItems->id == $id) {
                    Cart::instance('wishlist')->remove($allItems->rowId);
                    $this->dispatchBrowserEvent('successalert', ['success' => 'Product Delete From wishlist']);
                    $this->emit('refreshParent');
                }
            }
        } else {
            $data = Cart::instance('wishlist')->add($id, $title, 1, $price)->associate('App\Models\Product');
            $this->dispatchBrowserEvent('successalert', ['success' => 'Wishlist Added suceess']);
            $this->emit('refreshParent');
        }
    }

    // like action 
    public function Like($id)
    {
        if (session($id . 'like') !== $id) {
            $findreview  = Productreview::find($id);
            $likedata  = $findreview->like + 1;
            $findreview->update(['like' => $likedata]);
            session([$id . 'like' => $id]);
        }
    }

    // remove single page alert 
    public function removeAlert()
    {
        if (session('successMessage')) {
            session()->forget('successMessage');
        }
        if (session('warningAlert')) {
            session()->forget('warningAlert');
        }
    }
    // rander method 
    public function render()
    {
        $data = Product::where('slug', $this->slug)->first();
        if ($data) {
            $productImage = Productimage::where('product_id', $data->id)->get();
            $relatedProduct = product::where('subcategory_id', $data->subcategory_id)->paginate(5);
            $populerProduct = product::orderBy('mostview', 'desc')->paginate(5);
            $services = Service::paginate(3);
            $reviewsdata = Productreview::where('product_id', $data->id)->where('status', 1)->orderBy('review', 'desc')->get();
            $questionData = AskQuestion::where('product_id', $data->id)->where('status', 1)->orderBy('id', 'desc')->get();
            $productspecification = ProductSpecification::where('product_id', $data->id)->get();

            return view('livewire.front.single-product', compact(
                [
                    'data',
                    'productImage',
                    'relatedProduct',
                    'populerProduct',
                    'services',
                    'questionData',
                    'reviewsdata',
                    'productspecification',
                ]
            ))->layout('layouts.web');
        } else {
            return abort(404);
        }
    }
}
