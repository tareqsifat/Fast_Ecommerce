<div class="container">
    @section('cssStyles')
    <link rel="stylesheet" href="{{asset('front/css/shipping.css')}}">
    @endsection
    @section('title')
    {{'Shipping Products'}}
    @endsection
    <div class="wrap-breadcrumb">
        <ul class="my-4">
            <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
            <li class="item-link"><span class="text_success">@yield('title')</span></li>
        </ul>
    </div>
    <div class="row w-100 m-auto">
        @if($errors->has('shipping_search_query')) <span class="text_danger font-size-16">{{$errors->first('shipping_search_query')}}</span> <br>@endif
        <form action="{{route('search.shippingSearch')}}" method="POST">
            @csrf
            <div class="d-flex">
                <input value="{{session('shipping_search_query')}}" type="search" name="shipping_search_query" class="shipping-search" id="" placeholder="Search IMPA code">
                <input type="submit" class="btn btn-sm" value="Search" id="">
            </div>
        </form>
    </div>
    <div class="row w-100 m-auto pt-3">
        <div class="d-flex">
            <ul class="p-0">
                @foreach($parentCategory as $pCatItem)
                <li class="float-left mb-2 mr-1"><a class="badge" href="{{route('parent-category.single', $pCatItem->slug)}}">{{$pCatItem->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    @if($data->count() > 0)
    <div class="row w-100 m-auto">
        <div class="shipping_product_wrapper">
            @php $wishItem = Cart::instance(' wishlist')->content()->pluck('id') @endphp
            @foreach($data as $nedata)
            <div class="wrap-show-advance-info-box style-1 w-100">
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="product product-style-2 equal-elem w-100" style="height: 385px;">
                            <div class="product-thumnail card-item-product-image">
                                <a href="{{route('single', $nedata->slug)}}" title="{{$nedata->title}}">
                                    <figure><img src='@if(file_exists("uploads/products/thumbnails/$nedata->thumbnail")){{asset("uploads/products/thumbnails/$nedata->thumbnail")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif' width="150" height="150" alt="{{$nedata->title}}">
                                    </figure>
                                </a>
                                <div class="group-flash float-right">
                                    @if(date_diff(Illuminate\Support\Carbon::now(), $nedata->created_at)->format("%d days, %i munuts") < '1 days, 0 minuts' ) <span class="flash-item new-label">new</span>Illuminate\Support\Carbon::now() @endif
                                        <span class="flash-item new-label1">Shipping</span>
                                </div>
                                @if($nedata->sold)
                                <div class="group-flash-cpy float-right">
                                    <span class="flash-item new-label-copy">Sold {{$nedata->sold}}</span>
                                </div>
                                @endif
                            </div>
                            <div class="product-info px-2">
                                <h2 title="{{$nedata->title}}" class="product-title product_title_style2"><a href="{{route('single',$nedata->slug)}}">{{Str::limit($nedata->title,40)}} </a></h2>
                                <div class="w-100 m-auto pt-5">
                                    <div class="text-center wrap-price pt-2">
                                        @if(!empty($nedata->sale_price))
                                        <del>
                                            <p class="product-price mr-2 font-size-18">৳ {{$nedata->price}}</p>
                                        </del>
                                        <strong class="product-price font-size-18">৳ {{$nedata->sale_price}}</strong>
                                        @else
                                        <strong class="product-price font-size-18">৳ {{$nedata->price}}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="product-info px-2 my-2">
                                <div class="wrap-price text-justify">
                                    @livewire('front.includes.cart.add-to-cart-and-w-ishlist', ['pdata' => $nedata,'wishItem'=>$wishItem])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="row title_wrape px-2 m-auto">
        <div class="col-sm-12 col-lg-12 w-100 m-auto">
            <h2 class="text-align-center">Product Not Found</h2>
            <div class="text-align-center">
                <a href="{{route('front.shipping.back')}}" class="text-align-center"><i class="fa fa-arrow-left"></i> Go Back</a>
            </div>
        </div>
    </div>
    @endif
    <div class="row  pb-5">
        <div class="category_navigation">
            {!! $data->links() !!}
        </div>
    </div>
</div>