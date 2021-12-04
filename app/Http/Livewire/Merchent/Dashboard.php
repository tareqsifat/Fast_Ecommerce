<?php

namespace App\Http\Livewire\Merchent;

use App\Models\AskQuestion;
use App\Models\Brand;
use App\Models\Category;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{


    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = OrderItems::find($data);
        if ($action == 'pending') { /* action where click status button */
            $newData->status = 1;
            $newData->save();
        } elseif ($action == 'processing') { /* action where click status button */
            $newData->status = 2;
            $newData->save();
        } elseif ($action == 'cancel') { /* action where click status button */
            $newData->status = 3;
            $newData->save();
        } elseif ($action == 'complete') {
            $newData->notification = 1;
            $newData->status = 0;
            $newData->save();
        }
    }

    public function render()
    {
        $products = Product::where('user_id', Auth::user()->id)->where('shop_for', 'Merchant')->get();
        $newOrderNotification = OrderItems::where('product_by_shopid', Auth::user()->id)->where('shop_for', 'merchant')->where('notification', 0)->get();
        $totalOrders = OrderItems::where('product_by_shopid', Auth::user()->id)->where('shop_for', 'merchant')->get();
        $newAskQuestions = AskQuestion::where('notification', 0)->where('shop_id', Auth::user()->id)->get();
        $category = Category::where('user_id', Auth::user()->id)->where('shop_as', 'merchant')->get();
        $brands = Brand::where('user_id', Auth::user()->id)->where('shop_as', 'merchant')->get();
        return view('livewire.merchent.dashboard', compact([
            'products',
            'category',
            'brands',
            'newOrderNotification',
            'totalOrders',
            'newAskQuestions',
        ]));
    }
}
