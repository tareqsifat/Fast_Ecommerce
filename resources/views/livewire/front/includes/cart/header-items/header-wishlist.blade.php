<div class="wrap-icon-section wishlist">
    <a href="{{route('page.wishlist')}}" class="link-direction">
        <div class="cart_item_style">
            <i class="dripicons-heart navicon" aria-hidden="true"></i>
            <div class="left-info">
                @if(Cart::instance('wishlist')->count()>0)
                <span class="index">{{Cart::instance('wishlist')->count()}}</span>
                @endif
            </div>
        </div>
    </a>
</div>