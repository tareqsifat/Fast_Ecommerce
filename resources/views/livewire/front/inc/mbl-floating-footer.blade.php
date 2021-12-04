<div id="mbl_floating_footer" class="d-block d-lg-none">
    <div class="d-flex w-100 m-auto row">
        <div class="cart_items_event width-18 position-relative">
            <i class="dripicons-shopping-bag"></i>
            @if(Cart::instance('cartProduct')->count()>0)
            <div class="mbl-shopping-item left-info position-absolute">
                <span class="index">{{Cart::instance('cartProduct')->count()}}</span>
            </div>
            @endif
        </div>
        <div class="width-18  userInfo_event"><i class="dripicons-user"></i></div>
        <div class="w-25 text-align-center"><a href="{{route('home')}}"><img class="brand-logo-icon" src="{{asset('defaults/logo.png')}}" width="30px" alt=""> </a></div>
        <div class="width-18 position-relative">
            <a href="{{route('page.wishlist')}}"> <i class="dripicons-heart float-right"></i>
                @if(Cart::instance('wishlist')->count()>0)
                <div class="mbl-shopping-item left-info position-absolute" style="left: 100%;">
                    <span class="index">{{Cart::instance('wishlist')->count()}}</span>
                </div>
                @endif
            </a>
        </div>
        <div class="width-18"><a href="{{route('user.cart.shipping')}}"><i class="mdi mdi-truck-fast float-right"></i></a></div>
    </div>
    <style>
        .brand-logo-icon {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            position: absolute;
            transform: translate(-19px, 2px);
            bottom: 10px;
            text-align: center;
        }

        #mbl_floating_footer i {
            font-size: 25px;
            padding: 8px;
            color: #000;
        }
    </style>
</div>