<main id="main" class="main-site">
    @section('title')
    {{'wishlist'}}
    @endsection
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span class="text_success">wishlist</span></li>
            </ul>
        </div>
        @if(Cart::instance('wishlist')->count()>0)
        <div class=" main-content-area bgffffff p-5">
            <div class="wrap-iten-in-cart">
                <h3 class="box-title">Products</h3>
                <ul class="products-cart">
                    @foreach(Cart::instance('wishlist')->content() as $wItem)
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src='{{asset("uploads/products/thumbnails/")}}/{{$wItem->model->thumbnail}}' alt="{{$wItem->model->thumbnail}}"></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="{{route('single',$wItem->model->slug)}}">{{$wItem->model->title}}</a>
                        </div>
                        @if(!empty($wItem->model->sale_price))
                        <div class="price-field produtc-price">
                            <del>
                                <p class="price">৳{{$wItem->model->price}}</p>
                            </del>
                        </div>
                        <div class="price-field sub-total">
                            <p class="price">৳ {{$wItem->model->sale_price}}</p>
                        </div>
                        @else
                        <div class="price-field sub-total">
                            <p class="price">৳ {{$wItem->model->price}}</p>
                        </div>
                        @endif
                        <div class="quantity">
                            <div wire:click.prevent="addToCart('{{$wItem->rowId}}')" class="btn bg_green">Add To cart</div>
                        </div>
                        <div class="delete">
                            <a href="#" wire:click.prevent="removeItem('{{$wItem->rowId}}')" class="btn btn-delete" title="Remove {{$wItem->model->title}}">
                                <span>Delete from your cart</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!--end main content area-->
        @else
        <div class="my-5 py-5">
            <h2 class="text-align-center my-5 py-5"><i>Empty</i></h2>
        </div>
        @endif
    </div>
    <!--end container-->
</main>