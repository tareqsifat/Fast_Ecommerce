<main id="main" class="main-site">
    @section('title')
    {{$merchent->name}}
    @endsection
    @section('description')
    {{$merchent->description}}
    @endsection
    <!--main area-->
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul class="my-4">
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><a href="{{route('shops.all')}}" class="link">Shops</a></li>
                <li class="item-link"><span class="text_success">{{$merchent->name}}</span></li>
            </ul>
        </div>
        <div class="row pt-3">
            <div class="col-sm-3 col-xm-3 col-md-3">
                <img class="img-fluid" src='{{asset("uploads/user/profile/$merchent->profile_photo_path")}}' alt="{{$merchent->name}}">
            </div>
            <div class="col-sm-9 col-xm-9 col-md-9">
                <div class="font-family-nunito">
                    <h3 class="font-weight-bold font-family-nunito">{{$merchent->name}}</h3>
                    <address class="font-family-popins">{{$merchent->address}}</address><br>
                    <strong> Delevary Service Type</strong> <span class="badge bg_green color_white">{{ ucwords(str_replace('_', ' ', $merchent->delevery_system)) }}</span>
                </div>
            </div>
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
                                    <div class="product-thumnail">
                                        <a href="{{route('brand.single', $nData->slug)}}" title="{{$nData->name}}">
                                            <figure><img style="height: 100px;" src='{{asset("uploads/brands/$nData->brand_logo")}}' width="100" height="200" alt="{{$nData->brand_logo}}">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="font-weight600 text-aligh-center mt-5 mb-5 text-uppercase">
                                            <a class="text_dark" href="{{route('brand.single', $nData->slug)}}"> {{Str::of($nData->name)->words(2, '')}}</a>
                                        </h5>
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
            @if($merchentProducts->count()>0)
            <div class="row mt-5 m-auto">
                @if($category->count()>0)
                <!--sitebar area start-->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pl-0 mt-4">
                    <h2 class="mt-2 text-gray-700 product_heading">Categorys</h2>
                    <div class="widget mercado-widget categories-widget box-shadow1 bg_white m-0 mt-3 px-3">
                        <div class="widget-content">
                            <ul class="list-category mt-2">
                                <li class="py-3">
                                    <div class="row d-flex">
                                        <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                                            <strong>All</strong>
                                        </div>
                                        <div class="col-md-2 col-sm-9 col-xs-2 col-xsm-2">
                                            <small class="">({{$category->count()}})</small>
                                        </div>
                                    </div>
                                </li>
                                @foreach($category as $ncategory)
                                <li class="py-3">
                                    <div class="row d-flex">
                                        <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                                            <a href="{{route('parent-category.single', $ncategory->slug)}}" class="font-weight600" for="{{$ncategory->id}}">{{$ncategory->name}}</a>
                                        </div>
                                        <div class="col-md-2 col-sm-9 col-xs-2 col-xsm-2">
                                            <small class="">@if($ncategory->product->count()>0) ({{$ncategory->product->count()}}) @endif</small>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 main-content-area">
                    <!-- heading  -->
                    <div class="row title_wrape px-2 m-auto">
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-8 px-0">
                            <h2 class="text-gray-700 product_heading">Products</h2>
                        </div>
                    </div>
                    <ul class="list-unstyled product_items_wrapper">
                        @php $wishItem = Cart::instance('wishlist')->content()->pluck('id') @endphp
                        @foreach($merchentProducts as $nedata)
                        <li class="product_items" wire:ignore>
                            <div class="wrap-show-advance-info-box style-1 w-100">
                                <div class="wrap-products">
                                    <div class="wrap-product-tab tab-style-1">
                                        <div class="product product-style-2 equal-elem w-100">
                                            <div class="product-thumnail">
                                                <a href="{{route('single',$nedata->slug)}}" title="{{$nedata->title}}">
                                                    <figure><img src='{{asset("uploads/products/thumbnails/$nedata->thumbnail")}}' width="150" height="150" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    @if(date_diff(Illuminate\Support\Carbon::now(), $nedata->created_at)->format("%d days, %i munuts") < '1 days, 0 minuts' ) <span class="flash-item new-label">new</span>Illuminate\Support\Carbon::now() @endif
                                                </div>
                                            </div>
                                            <div class="product-info px-2">
                                                <h2 class="product-title"><a href="{{route('single',$nedata->slug)}}">{{Str::limit($nedata->title,18)}} </a></h2>
                                                <div class="w-100 m-auto d-flex row py-2">
                                                    <div class="col-sm-6 p-0">
                                                        <div class="wrap-price">
                                                            @if(!empty($nedata->sale_price))
                                                            <del>
                                                                <p class="product-price mr-2">৳ {{$nedata->price}}</p>
                                                            </del>
                                                            <strong class="product-price">৳ {{$nedata->sale_price}}</strong>
                                                            @else
                                                            <strong class="product-price">৳ {{$nedata->price}}</strong>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 px-0">
                                                        <?php
                                                        $count = 0;
                                                        $reviews = DB::table('productreviews')->where('product_id', $nedata->id)->get();
                                                        ?>
                                                        @foreach($reviews as $treviews)
                                                        <?php $count += $treviews->review ?>
                                                        @endforeach
                                                        <div class="product-rating text-right float-right">
                                                            @if($count > 0) <i class="fa fa-star @if($count/$reviews->count() >= 1 ) {{'text_warning'}} @endif" aria-hidden=" true"></i> @endif
                                                            @if($count > 0) <i class="fa fa-star @if($count/$reviews->count() >= 2 ) {{'text_warning'}} @endif" aria-hidden=" true"></i> @endif
                                                            @if($count > 0) <i class="fa fa-star @if($count/$reviews->count() >= 3 ) {{'text_warning'}} @endif" aria-hidden=" true"></i> @endif
                                                            @if($count > 0) <i class="fa fa-star @if($count/$reviews->count() >= 4 ) {{'text_warning'}} @endif" aria-hidden=" true"></i> @endif
                                                            @if($count > 0) <i class="fa fa-star @if($count/$reviews->count() >= 5 ) {{'text_warning'}} @endif" aria-hidden=" true"></i> @endif
                                                        </div>
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

                    @if($merchentAlldatas->count() > $merchentProducts->count())
                    <div class="row mt-3">
                        <div class="text-align-center">
                            <div wire:click.prevent="loadMore" class="btn btn-dark">View More</div>
                        </div>
                    </div>
                    @endif
                    @else
                    <div class="row title_wrape px-2 m-auto">
                        <div class="col-sm-12 col-lg-12 w-100 m-auto">
                            <h2 class="text-align-center"><i>Product Not Found</i></h2>
                        </div>
                    </div>
                    @endif
                </div>
            </div>


        </div>
        <!--end row-->
    </div>
    <!--end container-->
    <!--main area-->
</main>