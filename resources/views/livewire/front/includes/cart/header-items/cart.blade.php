<div class="wrap-icon-section minicart">
    <a href="#" class="link-direction cart_items_event">
        <div class="cart_item_style mr-2">
            <i class="dripicons-shopping-bag navicon" aria-hidden="true"></i>
            <div class="left-info">
                @if(Cart::instance('cartProduct')->count()>0)
                <span class="index ajax_totalqtty">{{Cart::instance('cartProduct')->count()}}</span>
                @endif
            </div>
        </div>
    </a>
</div>