<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class DefaultController extends Controller
{
    public function shippingGotoBack()
    {
        session()->forget('shipping_search_query');
        return redirect()->route('front.shipping');
    }
}
