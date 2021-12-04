<?php

namespace App\Http\Livewire\Front\Auth\Customers;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Orders extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $ordersItem = OrderItems::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('livewire.front.auth.customers.orders', compact(['orders', 'ordersItem']))->layout('layouts.web');
    }
}
