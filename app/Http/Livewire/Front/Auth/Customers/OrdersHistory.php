<?php

namespace App\Http\Livewire\Front\Auth\Customers;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrdersHistory extends Component
{
    public $orders_s_item = 1;
    public $firstOrder;
    public $productByOrderId;

    public function mount()
    {
        $this->firstOrder = Order::where('user_id', Auth::user()->id)->first();
        $this->productByOrderId = OrderItems::where('order_id', $this->firstOrder->id)->get();
    }

    public function selectItem($orderId)
    {
        $this->firstOrder = Order::where('id', $orderId)->first();
        $this->productByOrderId = OrderItems::where('order_id', $this->firstOrder->id)->get();
    }
    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('livewire.front.auth.customers.orders-history', compact('orders'))->layout('layouts.web');
    }
}
