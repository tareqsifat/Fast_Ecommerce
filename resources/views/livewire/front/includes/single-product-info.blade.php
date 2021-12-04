<ul class="p-0 widget-our-services-area position-relative">
    @if($is_open)
        <div class="delevary_location_option">
            <div style="height: 3%;"><Strong>{{$divisions_name}} {{$district_name}} {{$upazilla}}</Strong>
                @if($errors->has('divisions_id'))<span class="text-danger">{{$errors->first('divisions_id')}}</span> @endif
                @if($errors->has('district_id'))<span class="text-danger">{{$errors->first('district_id')}}</span> @endif
                @if($errors->has('upazilla'))<span class="text-danger">{{$errors->first('upazilla')}}</span> @endif
            </div>
            <h4>Select @if($stape == 1){{' Division'}} @elseif($stape==2){{'District'}} @elseif($stape==3){{'Upazila'}}@endif</h4>
            <ul class="m-0 p-0 cart-scroll" style="overflow-y: scroll; height:75%; overflow-x: hidden;">
                @if($stape==1)
                    @foreach($divisionData as $divisionItem)
                        <li class="py-2 border_bottom_e7 cursor_pointer">
                            <input type="radio" wire:model="divisions_id" value="{{$divisionItem->id}}" id="{{$divisionItem->name}}">
                            <label for="{{$divisionItem->name}}">{{$divisionItem->name}}</label>
                        </li>
                    @endforeach
                @elseif($stape==2)
                    @foreach($districts as $districtsItem)
                        <li class="py-2 border_bottom_e7 cursor_pointer">
                            <input type="radio" wire:model="district_id" value="{{$districtsItem->id}}" id="{{$districtsItem->name}}">
                            <label for="{{$districtsItem->name}}">{{$districtsItem->name}}</label>
                        </li>
                    @endforeach
                @elseif($stape==3)
                    @foreach($upazilas as $upazilasItem)
                        <li class="py-2 border_bottom_e7 cursor_pointer">
                            <input type="radio" wire:model="upazilla" value="{{$upazilasItem->name}}" id="{{$upazilasItem->name}}">
                            <label for="{{$upazilasItem->name}}">{{$upazilasItem->name}}</label>
                        </li>
                    @endforeach
                @endif
            </ul>
            <div class="pt-2">
                <button class="btn btn-sm btn-info" wire:click.prevent="toggleIsOpen">Close</button>
                <button class="btn btn-sm btn-info float-right" wire:click.prevent="@if($stape == 1){{'stap1'}} @elseif($stape==2){{'stap2'}}@elseif($stape==3){{'stap3'}}@endif">@if($stape==3) {{'Change'}}@else {{"Next"}} @endif</button>
            </div>
        </div>
    @endif
    <li class="p-3 seperation clearfix">
        <div class="w-75 float-left">
            <span class="text-secondary font-size-14 font-weight-bold">Delivery Option</span>
        </div>
    </li>
    <li class="p-3 mt-4 pb-2 clearfix">
        <div class="width10 float-left">
            {{-- <span class="font-size-20"><i class="dripicons-location coloraaa"></i></span> --}}
            <img src="{{ asset('uploads/payment/placeholder_1.png') }}" alt="place_holder">
        </div>
        <div class="width90 float-left">
            <div class="w-75 float-left">
                <span class="text-dark font-size-16">@if(session('delevary_location')) {{session('delevary_location')}} @else {{ "Dhaka Chattagram Bangladesh" }} @endif</span>
            </div>
            <div class="w-25 float-right">
                <a wire:click.prevent="toggleIsOpen" href="" class="color_green font-size-15"><span class="p-1" style="border: 2px solid #4AB70A">CHANGE</span><span wire:loading wire:target="toggleIsOpen">...</span> </a>
            </div>
        </div>
    </li>

    <li class="p-3 mt-4 clearfix pb-2">
        <div class="width10 float-left">
            {{-- <span class="font-size-20"><i class="mdi mdi-truck-fast coloraaa"></i></span> --}}
            <img src="{{ asset('uploads/payment/fast_delivery_1.png') }}" alt="delivery_icon">
        </div>
        <div class="width80 float-left">
            <span class="text-dark font-size-16">Delivery Info</span> <br>
            <small class="coloraaa">Delivery Time : Same day delivery if ordered by 7.00 PM</small>
            <small class="coloraaa">Shipping Charge :Tk 50</small>
            <small class="coloraaa"> Free Shipping Over Order Amount :Tk 499</small>
        </div>
    </li>
    <li class="p-3 clearfix pb-2">
        <div class="width10 float-left">
            {{-- <span class="font-size-20"><i class="mdi mdi-cash-usd coloraaa"></i></span> --}}
            <img src="{{ asset('/uploads/payment/payment_method_1.png') }}" alt="">
        </div>
        <div class="width90 float-left">
            <span class=" text-dark font-size-16">Cash on Delivery Available</span>
            <img src="{{ asset('uploads/payment/payment-partners.png') }}" width="296px" height="25px" alt="payment_partners">
        </div>
    </li>
    <li class="p-3 clearfix pb-2">
        <div class="width10 float-left">
            {{-- <span class="font-size-20"><i class="mdi mdi-cash-usd coloraaa"></i></span> --}}
            <img src="{{ asset('/uploads/payment/return_box_1.png') }}" alt="return icon img">
        </div>
        <div class="width90 float-left">
            <span class=" text-dark font-size-16">Return</span><br>
            <small class="coloraaa">Return Not Available</small>
        </div>
    </li>
    <li class="p-3 clearfix pb-2">
        <div class="width10 float-left">
            {{-- <span class="font-size-20"><i class="mdi mdi-cash-usd coloraaa"></i></span> --}}
            <img src="{{ asset('/uploads/payment/guarantee_1.png') }}" alt="return icon img">
        </div>
        <div class="width90 float-left">
            <span class=" text-dark font-size-16">Warranty</span><br>
            <small class="coloraaa">Warranty Not Available</small>
        </div>
    </li>
    <li class="p-3 clearfix">
        <div class="w-50 float-left">
            <span class="font-weight-bold text-dark font-size-16" >Sold by Fast Deals</span><br>
        </div>
    </li>
    <li class="border_bottom_e7 border_top_e7 px-3 clearfix">
        <div class="w-33 float-left">
            <div class="shop_info_text_area pt-3">
                <span  class="text-dark" style="font-size: 10px">Positive Seller Ratings</span>
            </div>
            <h2 class="mb-0 text-align-center">93%</h2>
        </div>
        <div class="w-33 float-left border_x_e7">
            <div class="text-align-center shop_info_text_area pt-3">
                <span>Ship on Time</span>
            </div>
            <h2 class="mb-0 text-align-center">74%</h2>
        </div>
        <div class="w-33 float-right">
            <div class="shop_info_text_area pt-3 text-align-center">
                <span>Seller Size</span>
            </div>
            <span class="mb-0 text-align-center">
                <div class="progress progress-bar-vertical">
                    <div class="progress-bar progress-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: 60%;"> </div>
                </div>
            </span>
        </div>
    </li>
    <li class="p-3 clearfix text-align-center">
        <strong><a class="color_green" href="{{route('home')}}">GO TO STORE</a></strong>
    </li>
</ul>
<style>
    .progress-bar-vertical {
        width: 20px;
        min-height: 200px;
        margin-right: 20px;
        background: #d0cece;
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        align-items: flex-end;
        -webkit-align-items: flex-end
    }
    .progress-bar-vertical .progress-bar {
        width: 100%;
        height: 0;
        -webkit-transition: height 0.6s ease;
        -o-transition: height 0.6s ease;
        transition: height 0.6s ease
    }

    .progress-striped {
        background-color: #ee5f5b;
        background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
        background-image: -webkit-linear-gradient(0deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: -moz-linear-gradient(0deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: -o-linear-gradient(0deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(0deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent)
    }
</style>