<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\AskQuestion;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Customers;
use App\Models\Merchant;
use App\Models\Order;
use App\Models\Product;
use App\Models\Productreview;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{

    public function render()
    {
        // dd(Auth::user());
        $customers = Customers::all();
        $merchant = Merchant::all();
        $category = Category::all();
        $brands = Brand::all();
        $products = Product::all();
        $totalOrders = Order::all();
        $newOrder = Order::where('notification', 0)->get();
        $totalReviews = Productreview::all();
        $newReviews = Productreview::where('notification', 0)->get();
        $totalQuestion = AskQuestion::all();
        $newQuestion = AskQuestion::where('notification', 0)->paginate(5);
        return view('livewire.admin.dashboard.dashboard', compact([
            'customers',
            'merchant',
            'category',
            'brands',
            'products',
            'totalOrders',
            'newOrder',
            'totalReviews',
            'newReviews',
            'totalQuestion',
            'newQuestion',
        ]));
    }
}
