<main id="main" class="main-site">
    @section('title')
    {{"Shipping Cart"}}
    @endsection

    <div class="container">
        <div class="wrap-breadcrumb">
            <ul class="my-4">
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span class="text_success">Cart</span></li>
            </ul>
        </div>
        @if(Cart::instance('cartForShipping')->count()>0)
        <div class="main-content-area bgffffff p-3">
            <div class="wrap-iten-in-cart">
                <h3 class="box-title">Products</h3>
                <ul class="products-cart">
                    @foreach(Cart::instance('cartForShipping')->content() as $cItem)
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src='{{asset("uploads/products/thumbnails/")}}/{{$cItem->model->thumbnail}}' alt="{{$cItem->model->thumbnail}}"></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="{{route('single', $cItem->model->slug)}}">{{$cItem->model->title}}</a>
                        </div>

                        <div class="price-field produtc-price">
                            <p class="price">৳ {{$cItem->price}}</p>
                        </div>
                        <div class="quantity">
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="{{$cItem->qty}}" data-max="120" pattern="[0-9]*">
                                <a wire:click.prevent="incrimentQty('{{$cItem->rowId}}')" class="btn btn-increase" href="#"></a>
                                <a wire:click.prevent="decrimentQty('{{$cItem->rowId}}')" class="btn btn-reduce" href="#"></a>
                            </div>
                        </div>
                        <div class="price-field sub-total">
                            <p class="price">৳ {{$cItem->price*$cItem->qty}}</p>
                        </div>
                        <div class="delete">
                            <a wire:click.prevent="removeItem('{{$cItem->rowId}}')" href="#" class="btn btn-delete" title="">
                                <span>Delete from your cart</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="summary">
                <div class="order-summary">
                    <!-- <h4 class="title-box">Order Details</h4> -->
                    <!-- <p class="summary-info"><span class="title">Subtotal</span><b class="index">৳ {{Cart::subtotal()}}</b></p> -->
                    <!-- <p class="summary-info"><span class="title">Vat</span><b class="index">6%</b></p>
                    <p class="summary-info"><span class="title">Dalivary Charge</span><b class="index">৳ 100.00</b></p> -->
                    <!-- <p class="summary-info total-info "><span class="title">Total</span><b class="index">৳ {{Cart::subtotal()}}</b></p> -->
                </div>
                <div class="checkout-info">
                    <a class="px-5 py-3 btn border_redious btn-checkout" href="{{route('user.shipping.checkout')}}"><i class="fa fa-shopping-cart"></i> Confirm Order</a>
                    <a class="px-5 py-3 btn border_redious btn-checkout bg333333" href="{{route('home')}}">Continue Shopping <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>

                </div>
            </div>
        </div>
        @else
        <div class="py-5">
            <div class="text-align-center my-5 py-5">
                <h2 class="my-5 py-5"><i>Empty</i></h2>
            </div>
        </div>
        @endif
    </div>
    <!--end container-->
</main>