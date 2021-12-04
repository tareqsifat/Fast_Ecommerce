<main id="main" class="main-site">
    @section('title')
    {{$brandData->name}}
    @endsection
    @section('description')
    {{$brandData->description}}
    @endsection
    <!--main area-->
    <div class="container mb-5">
        <div class="wrap-breadcrumb">
            <ul class="my-4">
                <li class="item-link"><a href="{{route('home')}}" class="link">Home</a></li>
                <li class="item-link"><span class="text_success">{{$brandData->name}}</span></li>
            </ul>
        </div>
        <div class="w-100 row m-auto">
            @if($brands->count()>0)
            <!-- heading  -->
            <div class="row title_wrape px-2 my-2">
                <div class="col-sm-6 col-md-6 col-xs-8">
                    <h2 class="title_box font-weight-bold">Brands </h2>
                </div>
            </div>
            <!-- heading end -->
            <ul class="list-unstyled border_none style-nav-1">
                @foreach($brands as $nData)
                <li class="branditem_width">
                    <div class="wrap-show-advance-info-box style-1 w-100 mb-0 ">
                        <div class="wrap-products">
                            <div class="wrap-product-tab tab-style-1">
                                <div class="product product-style-2 equal-elem w-100 height170px">
                                    <div class="product-thumnail brand-product-thumnail">
                                        <a href="{{route('brand.single', $nData->slug)}}" title="{{$nData->name}}">
                                            <figure><img style="height: 100px;" src='@if(file_exists("uploads/brands/$nData->brand_logo")){{asset("uploads/brands/$nData->brand_logo")}} @else {{asset("defaults/default-blank-img.jpg")}} @endif' width="100" height="200" alt="{{$nData->brand_logo}}">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="font-weight600 text-aligh-center mt-5 mb-5 text-uppercase"><a class="text_dark" href="{{route('brand.single', $nData->slug)}}"> {{Str::of($nData->name)->words(2, '')}}</a> </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
                <li class="branditem_width">
                    <div class="wrap-show-advance-info-box style-1 w-100 mb-0">
                        <div class="wrap-products">
                            <div class="wrap-product-tab tab-style-1">
                                <div class="product product-style-2 equal-elem w-100 height170px">
                                    <div class="product-thumnail">
                                        <h5 class="mt-5 font-weight600">View all Brands <br>
                                            Available in <br> {{config('app.name')}}</h5>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('brands')}}" class="btn btn-sm text-aligh-center mt-5 mb-5 font-weight-bold all_view_btn" style="color:{{$product_styles->card_button_text_color}};background: {{$product_styles->card_button_background}} !important; border-color: {{$product_styles->card_button_border}} !important; transition: {{$product_styles->card_button_transition}}; font-style: {{$product_styles->card_button_font_style}} !important; font-weight: {{$product_styles->card_button_font_weight}};" onMouseOver='this.style.background="{{$product_styles->card_button_hover_background}}", this.style.color="{{$product_styles->card_button_text_hover_color}}", this.style.border="{{$product_styles->card_button_hover_border}}", this.style.fontStyle="{{$product_styles->card_button_hover_font_style}}", this.style.fontWeight="{{$product_styles->card_button_hover_font_weight}}"' onMouseOut='this.style.background="{{$product_styles->card_button_background}}", this.style.color="{{$product_styles->card_button_text_color}}", this.style.border="{{$product_styles->card_button_border}}", this.style.transition="{{$product_styles->card_button_transition}}", this.style.fontStyle="{{$product_styles->card_button_font_style}}", this.style.fontWeight="{{$product_styles->card_button_font_weight}}"'>View All <i class="fa fa-arrow-right ml-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            @endif
        </div>
        <div class="w-100 row m-auto">
            @if($datas->count()>0)
            <div class="row mt-5 m-auto">
                <!-- heading  -->
                <div class="row title_wrape px-2 m-auto">
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-8 px-0">
                        <h2 class="text-gray-700 product_heading">{{$brandData->name}}</h2>
                    </div>
                </div>
                <ul class="list-unstyled">
                    @php $wishItem = Cart::instance('wishlist')->content()->pluck('id') @endphp
                    @foreach($datas as $nedata)
                    <li class="item_width">
                        <div class="wrap-show-advance-info-box style-1 w-100">
                            <div class="wrap-products">
                                <div class="wrap-product-tab tab-style-1">
                                    <div class="product product-style-2 equal-elem w-100" style="height: 385px;">
                                        <div class="product-thumnail">
                                            <a href="{{route('single',$nedata->slug)}}" title="{{$nedata->title}}">
                                                <figure><img src='@if(file_exists("uploads/products/thumbnails/$nedata->thumbnail")){{asset("uploads/products/thumbnails/$nedata->thumbnail")}} @else {{asset("defaults/default-blank-img.jpg")}} @endif' width="150" height="150" alt="{{$nedata->thumbnail}}">
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                @if(date_diff(Illuminate\Support\Carbon::now(), $nedata->created_at)->format("%d days, %i munuts") < '1 days, 0 minuts' ) <span class="flash-item new-label">new</span>Illuminate\Support\Carbon::now() @endif
                                            </div>
                                        </div>
                                        <div class="product-info px-2">
                                            <h2 title="{{$nedata->title}}" class="product-title product_title_style2"><a href="{{route('single',$nedata->slug)}}">{{Str::limit($nedata->title,40)}} </a></h2>
                                            <div class="w-100 m-auto pt-5">
                                                <div class="wrap-price pt-2">
                                                    @if(!empty($nedata->sale_price))
                                                    <del>
                                                        <p class="font-size-18 product-price mr-2">৳ {{$nedata->price}}</p>
                                                    </del>
                                                    <strong class="font-size-18 product-price">৳ {{$nedata->sale_price}}</strong>
                                                    @else
                                                    <strong class="font-size-18 product-price">৳ {{$nedata->price}}</strong>
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
                    </li>
                    @endforeach
                </ul>
            </div>
            @else
            <div class="row title_wrape px-2 m-auto">
                <div class="col-sm-12 col-lg-12 w-100 m-auto">
                    <div class="my-5 py-5">
                        <div class="py-4">
                            <h2 class="text-align-center"><i>Product Not Found</i></h2>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!--end row-->
    </div>
    <!--end container-->
    <!--main area-->
</main>