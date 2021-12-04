<?php

namespace App\Http\Livewire\Front;

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

class Checkout extends Component
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
        if ($this->payment == 0) {
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
                'tax' => $this->tax,
                'amount' => Cart::instance('cartProduct')->subtotal(),
            ]);
            foreach (Cart::instance('cartProduct')->content() as $cItem) {
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
            }

            $url = "http://api.greenweb.com.bd/api.php?json";
            $send_smsdata = array(
                'to' => $this->phone,
                'message' => "Fast Deals. Thank you For Your Order. $orderId is Your Order Id",
                'token' => "9fe4dec45c593c4c77324743ca474868"
            ); // Add parameters in key value
            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_ENCODING, '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($send_smsdata));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);
            Cart::instance('cartProduct')->destroy();
            return redirect(route('front.thankyou'));
        }
    }
    public function placeOrderByBkash()
    {
        if ($this->payment == 1) {
        }
    }

    public function render()
    {
        $divisionData = DB::table('divisions')->get();
        $districts = DB::table('districts')->where('division_id', $this->divisions_id)->get();
        $upazilas = DB::table('upazilas')->where('district_id', $this->district_id)->get();
        return view('livewire.front.checkout', compact(['divisionData', 'districts', 'upazilas']))->layout('layouts.web');
    }
}
