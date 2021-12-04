<?php

namespace App\Http\Livewire\Merchent\Orders;

use App\Models\Customers;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class OrderDetails extends Component
{
    public $orderDatas;
    public $order;
    public $product;
    public $user;
    protected $listeners = [
        'getModalId',
    ];

    /* 
    get value of the input fild
    */
    public function getModalId($item)
    {
        $this->orderDatas = OrderItems::where('id', $item)->first();
        $this->order = Order::where('id', $this->orderDatas->order_id)->first();
        $this->product = Product::where('id', $this->orderDatas->product_id)->first();
        $this->user = Customers::where('id', $this->orderDatas->user_id)->first();
    }
    public function close()
    {
    }
    public function render()
    {
        return view('livewire.merchent.orders.order-details');
    }
}
