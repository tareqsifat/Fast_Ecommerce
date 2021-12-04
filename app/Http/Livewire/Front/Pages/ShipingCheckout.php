<?php

namespace App\Http\Livewire\Front\Pages;

use App\Models\Customers;
use App\Models\District;
use App\Models\Division;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Cart;

class ShipingCheckout extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $zipcode;
    public $cuppon;
    public $address;
    public $divisions_id;
    public $district_id;
    public $upazila;
    public $discount;
    public $subtotal;
    public $tax;
    public $amount;
    public $cashondelevary;
    public $payment = [];

    public function mount()
    {
        $uData = Customers::where('id', Auth::user()->id)->first();
        if ($uData) {
            $this->first_name = $uData->first_name;
            $this->last_name = $uData->last_name;
            $this->email = $uData->email;
            $this->phone = $uData->phone;
            $this->address = $uData->address;
        } else {
            return abort(404);
        }
    }

    public function placeOrderCashOnDelevary()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
            'divisions_id' => 'required',
            'district_id' => 'required',
            'upazila' => 'required',
        ]);

        $divisions = Division::where('id', $this->divisions_id)->first();
        $district = District::where('id', $this->district_id)->first();
        $orderId = '#FD' . rand(100000000000, 9999999999999);
        $order =  Order::create([
            'orderId' => $orderId,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'user_id' => Auth::user()->id,
            'phone' => $this->phone,
            'address' => $this->address,
            'zipcode' => $this->zipcode,
            'divisions' => $divisions->name,
            'district' => $district->name,
            'upazila' => $this->upazila,
            'discount' => $this->discount,
            'subtotal' => $this->subtotal,
            'orderfor' => 'shipping',
            'tax' => $this->tax,
            'amount' => Cart::instance('cartForShipping')->subtotal(),
        ]);
        foreach (Cart::instance('cartForShipping')->content() as $cItem) {
            OrderItems::create([
                'user_id' => Auth::user()->id,
                'product_id' => $cItem->id,
                'order_id' => $order->id,
                'shop_for' => $cItem->model->shop_for,
                'product_by_shopid' => $cItem->model->user_id,
                'price' => $cItem->price,
                'quantity' => $cItem->qty,
            ]);
            $findData = Product::where('id', $cItem->id)->first();
            if ($findData) {
                $udata = $findData->sold + 1;
                $findData->update(['sold' => $udata]);
            }
            Cart::instance('cartForShipping')->destroy();
            return redirect(route('front.thankyou'));
        }
    }


    public function render()
    {
        $divisionData = DB::table('divisions')->get();
        $districts = DB::table('districts')->where('division_id', $this->divisions_id)->get();
        $upazilas = DB::table('upazilas')->where('district_id', $this->district_id)->get();
        return view('livewire.front.pages.shiping-checkout', compact(['divisionData', 'districts', 'upazilas']))->layout('layouts.web');
    }
}
