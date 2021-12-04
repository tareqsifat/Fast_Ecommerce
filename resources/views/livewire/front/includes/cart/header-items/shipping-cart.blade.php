<div class="wrap-icon-section wishlist">
    <a href="{{route('user.cart.shipping')}}" class="link-direction">
        <div class="cart_item_style">
            <i class="mdi mdi-truck-fast navicon" aria-hidden="true"></i>
            <div class="left-info">
                @if(Cart::instance('cartForShipping')->count()>0)
                <span class="index">{{Cart::instance('cartForShipping')->count()}}</span>
                @endif
            </div>
        </div>
    </a>
</div>