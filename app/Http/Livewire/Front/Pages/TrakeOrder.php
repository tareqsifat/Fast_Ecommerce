<?php

namespace App\Http\Livewire\Front\Pages;

use App\Models\Order;
use Livewire\Component;

class TrakeOrder extends Component
{
    public $orderData;
    public $email;
    public $orderId;
    public $message;
    public function trake()
    {
        $this->validate([
            'orderId' => 'required',
            'email' => 'required|email',
        ]);
        $getdata = Order::where('orderId', $this->orderId)->where('email', $this->email)->first();
        if ($getdata) {
            $this->orderData = $getdata;
            $this->message = null;
        } else {
            $this->message = 'Not Found';
        }
    }
    public function render()
    {
        return view('livewire.front.pages.trake-order')->layout('layouts.web');
    }
}
