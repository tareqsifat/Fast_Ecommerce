<main id="main" class="main-site">
    @section('title')
    {{'Checkout'}}
    @endsection
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul class="my-3">
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span class="text_success">Checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <div class="row">
                <form name="frm-billing" wire:ignore.self>
                    <div class="col-sm-12 col-md-8">
                        <div class="wrap-address-billing bgffffff p-3">
                            <h3 class="box-title">Billing Address</h3>
                            <p class="row-in-form px-1">
                                <label for="fname">first name<span>*</span></label>
                                @if($errors->has('last_name')) <span class="text-danger">{{$errors->first('last_name')}}</span> @endif
                                <input wire:model.lazy="first_name" id="fname" type="text" name="fname" value="" placeholder="Your name">
                            </p>
                            <p class="row-in-form px-1">
                                <label for="lname">last name<span>*</span></label>
                                @if($errors->has('last_name')) <span class="text-danger">{{$errors->first('last_name')}}</span> @endif
                                <input wire:model.lazy="last_name" id="lname" type="text" name="lname" value="" placeholder="Your last name">
                            </p>
                            <p class="row-in-form px-1">
                                <label for="email">Email Addreess:</label>
                                @if($errors->has('email')) <span class="text-danger">{{$errors->first('email')}}</span> @endif
                                <input wire:model.lazy="email" id="email" type="email" name="email" value="" placeholder="Type your email">
                            </p>

                            <p class="row-in-form px-1">
                                <label for="add">Address:</label>
                                @if($errors->has('address')) <span class="text_danger">{{$errors->first('address')}}</span> @endif
                                <input wire:model.lazy="address" id="add" type="text" name="add" value='@if(session("delevary_location")) {{session("delevary_location")}} @endif' placeholder="Street at apartment number">
                            </p>
                            <p class="row-in-form px-1">
                                <label for="phone">Phone number<span>*</span></label>
                                @if($errors->has('phone')) <span class="text-danger">{{$errors->first('phone')}}</span> @endif
                                <input class="form-control" wire:model.lazy="phone" id="phone" type="tel" name="phone" value="" placeholder="10 digits format">
                            </p>

                            <p class="row-in-form">
                                <label for="country">Divisions<span>*</span></label>
                                @if($errors->has('divisions_id')) <span class="text_danger">{{$errors->first('divisions_id')}}</span> @endif
                                <select class="form-control border-f5f5" wire:model.lazy="divisions_id" style="display: block;">
                                    <option> --Select--</option>
                                    @foreach($divisionData as $d)
                                    <option value="{{$d->id}}">{{$d->name}}</option>
                                    @endforeach
                                </select>
                                <style>
                                    select {
                                        display: inline !important;
                                    }

                                    .chosen-container .chosen-container-single {
                                        display: none !important;
                                        visibility: hidden !important;
                                    }

                                    .chosen-container .chosen-single {
                                        display: none !important;
                                    }
                                </style>
                            </p>

                            <p class="row-in-form px-1">
                                <label for="city">Town / City<span>*</span></label>
                                @if($errors->has('district_id')) <span class="text_danger">{{$errors->first('district_id')}}</span> @endif
                                <select class="form-control border-f5f5" wire:model.lazy="district_id" style="display: block;">
                                    <option> --Select--</option>
                                    @foreach($districts as $ndistricts)
                                    <option value="{{$ndistricts->id}}">{{$ndistricts->name}}</option>
                                    @endforeach
                                </select>
                            </p>
                            <p class="row-in-form px-1">
                                <label for="city">Upazila<span>*</span></label>
                                @if($errors->has('upazila')) <span class="text_danger">{{$errors->first('upazila')}}</span> @endif
                                <select class="form-control border-f5f5" wire:model.lazy="upazila" style="display: block;">
                                    <option> --Select--</option>
                                    @foreach($upazilas as $nupazilas)
                                    <option value="{{$nupazilas->name}}">{{$nupazilas->name}}</option>
                                    @endforeach
                                </select>
                            </p>

                            <p class="row-in-form px-1">
                                <label for="zip-code">Postcode / ZIP:</label>
                                @if($errors->has('zipcode')) <span class="text_danger">{{$errors->first('zipcode')}}</span> @endif
                                <input wire:model.lazy="zipcode" id="zip-code" type="number" name="zip-code" value="" placeholder="Your postal code">
                            </p>
                            <p class="row-in-form px-1">
                                <label for="cuppon">Cuppon Code:</label>
                                @if($errors->has('cuppon')) <span class="text_danger">{{$errors->first('cuppon')}}</span> @endif
                                <input wire:model.lazy="cuppon" id="cuppon" type="number" name="cuppon" placeholder="Cuppon code">
                            </p>
                        </div>
                        <div class="bgffffff mt-2 p-3">
                            <div class="form-group">
                                <input type="radio" wire:model.lazy="payment" value="0" id="cashondelevary">
                                <label for="cashondelevary">Cash On Delivery</label>
                            </div>
                            <div class="form-group">
                                <input type="radio" wire:model.lazy="payment" value="1" id="onlinePayment">
                                <label for="onlinePayment"><img width="350" src="{{asset('defaults/paymentMethod.png')}}" alt="" srcset=""></label>
                            </div>
                            <div class="form-group">
                                @if($payment == 0)
                                <button wire:click.prevent="placeOrderCashOnDelevary" class="px-5 btn btn-info">Place Order</button>
                                @elseif($payment == 1)
                                <button wire:click.prevent="placeOrderByBkash" class="btn btn-success" id="bKash_button" onclick="BkashPayment()">
                                    Pay with bKash
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-sm-12 col-md-4">
                    <div class="card bgffffff p-2">
                        <div class="information-area">
                            <div class="p-3">
                                <h3 class="pt-0 mt-0 box-title font-size-16 font-weight-bold font-family-nunito">Billing Address</h3>
                                <div class="information-body">
                                    @foreach(Cart::instance('cartProduct')->content() as $cItem)
                                    <div class="row py-3 border_bottom_eee">
                                        <div class="font-weight-bold col-sm-10 col-md-9 col-sm-9 font-size-15"><a class="font-family-nunito" href="{{route('single', $cItem->model->slug)}}">{{$cItem->model->title}}</a></div>
                                        <div class="font-size-14 px-0 col-sm-3 col-md-2">৳ {{$cItem->price*$cItem->qty}}</div>
                                    </div>
                                    @endforeach
                                    <div class="row py-4 border_bottom_eee">
                                        <div class="font-weight-bold col-sm-10 col-md-9 col-sm-9 font-size-15 font-family-nunito">Subtotal:</div>
                                        <div class="font-size-14 px-0 col-sm-3 col-md-3">৳ {{ Cart::instance('cartProduct')->subtotal() }}</div>
                                    </div>
                                    <div class="row py-4">
                                        <div class="font-weight-bold col-sm-10 col-md-9 col-sm-9 font-size-15 font-family-nunito">Total Amount:</div>
                                        <div class="font-size-14 px-0 col-sm-3 col-md-3">৳ {{ Cart::instance('cartProduct')->subtotal() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end main content area-->
    </div>
    <!--end container-->
    @push('scripts')

    <script id="myScript" src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>

    <!-- This Commented Script for Live Production  -->
    <!-- <script id="myScript" -->
    <!-- src="https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js"></script> -->

    <!-- <script>
        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script> -->

    @include('bkash-script')
    @endpush
</main>