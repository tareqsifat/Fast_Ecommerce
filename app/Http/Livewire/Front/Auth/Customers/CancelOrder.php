<?php

namespace App\Http\Livewire\Front\Auth\Customers;

use Livewire\Component;

use App\Models\AdminNotification;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CancelOrder extends Component
{


    public $orderId;
    public $message;
    function mount($data)
    {
        $orderData = Order::where('id', $data)->first();
        $this->orderId = $orderData->orderId;
    }

    public function submit()
    {
        $this->validate([
            'orderId' => 'required',
            'message' => 'required:min:50|max:500',
        ]);
        $getdata = Order::where('orderId', $this->orderId)->where('user_id', Auth::user()->id)->first();
        if ($getdata) {
            $getdata->customernotification = 1;
            $getdata->save();
            AdminNotification::create([
                'user_id' => Auth::user()->id,
                'order_id' => $getdata->id,
                'message' => $this->message,
                'message_for' => 'orders_cancel',
            ]);
            $this->message = null;
            return redirect()->route('user.orders');
        } else {
            return abort(404);
        }
    }

    public function render()
    {
        return view('livewire.front.auth.customers.cancel-order')->layout('layouts.web');
    }
}
