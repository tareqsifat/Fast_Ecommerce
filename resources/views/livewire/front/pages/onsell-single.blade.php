<main id="main" class="main-site left-sidebar">
    @section('title')
    {{'On Sale'}}
    @endsection
    <div class="container mb-5">
        <div class="wrap-breadcrumb">
            <ul class="my-4">
                <li class="item-link"><a href="{{route('home')}}" class="link">Home</a></li>
                <li class="item-link"><span class="text_success">Offer Products</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <style>
                    @media (min-width: 768px) {
                        .item_width {
                            width: 50% !important;
                        }

                        .floating_footerv {
                            display: none;
                        }
                    }

                    @media (min-width: 992px) {
                        .item_width {
                            width: 25% !important;
                        }


                    }

                    @media (min-width: 1200px) {
                        .item_width {
                            width: 20% !important;
                        }
                    }
                </style>
                <!--end wrap shop control-->
                <div class="row w-100 m-auto pt-3">
                    @if($product->count() > 0)
                    <ul class="list-unstyled">
                        @php $wishItem = Cart::instance('wishlist')->content()->pluck('id') @endphp
                        @foreach($product as $nedata )
                        <li class="item_width">
                            <div class="wrap-show-advance-info-box style-1 w-100">
                                <div class="wrap-products">
                                    <div class="wrap-product-tab tab-style-1 bgffffff" style="height: 375px;">
                                        <div class="product product-style-2 equal-elem w-100">
                                            <div class="product-thumnail card-item-product-image">
                                                <a href="{{route('single',$nedata->slug)}}" title="{{$nedata->title}}">
                                                    <figure><img src='@if(file_exists("uploads/products/thumbnails/$nedata->thumbnail")) {{asset("uploads/products/thumbnails/$nedata->thumbnail")}} @else {{asset("defaults/default-blank-img.jpg")}} @endif' width="150" height="150" alt="{{$nedata->thumbnail}}">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    @if(date_diff(Illuminate\Support\Carbon::now(), $nedata->created_at)->format("%d days, %i munuts") < '1 days, 0 minuts' ) <span class="flash-item new-label">new</span>Illuminate\Support\Carbon::now() @endif
                                                </div>
                                            </div>
                                            <div class="product-info px-2">
                                                <h2 class="product-title"><a href="{{route('single',$nedata->slug)}}">{{Str::limit($nedata->title,40)}} </a></h2>
                                                <div class="w-100 m-auto p-2">
                                                    <div class="wrap-price text-center pt-2">
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
                                            <div class="product-info px-2 my-2" wire:ignore>
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
                    @else
                    <div class="wrap-shop-control mt-4 box-shadow1 bg_white mr-2">
                        <h1 class="shop-title font-weight600"><i class="text-align-center"> Not found</i> </h1>
                    </div>
                    @endif
                </div>
            </div>
            <!--end main products area-->
            <!--sitebar area start-->
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-4">
                <div class="widget mercado-widget filter-widget price-filter box-shadow1 bg_white m-0 p-3">
                    <h2 class="widget-title">Price</h2>
                    <div class="widget-content" wire:ignore>
                        <div id="slider-range"></div>
                        <p>
                            <label for="amount">Price:</label>
                            <input type="text" id="amount" readonly>
                            <input type="hidden" value="" id="min_price" wire:model="min_price">
                            <input type="hidden" value="" id="max_price" wire:model="max_price">
                        </p>
                    </div>
                </div><!-- Price-->
                @if($pCategory->count()>0)
                <div class="widget mercado-widget categories-widget box-shadow1 bg_white m-0 mt-3 px-3">
                    <h2 class="widget-title py-3">Categories</h2>
                    <div class="widget-content">
                        <ul class="list-category mt-2">
                            @php $cnt = 1 @endphp
                            @foreach($pCategory as $ncategory)
                            @if($moreCategory > $cnt )
                            <li class="py-2">
                                <div class="row d-flex">
                                    <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                                        <input type="checkbox" value="{{$ncategory->id}}" wire:model="category_id" id="{{$ncategory->id}}" class="mr-2">
                                        <label class="font-weight600" for="{{$ncategory->id}}">{{$ncategory->name}}</label>
                                    </div>
                                    <div class="col-md-2 col-sm-9 col-xs-2 col-xsm-2">
                                        <small class="">@if($ncategory->product->count()>0) ({{$ncategory->product->count()}}) @endif</small>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @php $cnt++ @endphp
                            @endforeach
                            @if($moreCategory < $cnt) <li><span wire:click="loadMoreCategory({{$cnt}})" class="cursor_pointer pb-3 text_success"><i>+ Load More</i></span></li>
                                @endif
                        </ul>
                    </div>
                </div>
                @endif
                @if($brands->count()>0)
                <div class="widget mercado-widget categories-widget box-shadow1 bg_white m-0 mt-3 px-3">
                    <h2 class="widget-title py-3">Brands</h2>
                    <div class="widget-content">
                        <ul class="list-category mt-2">
                            @php $brandCcnt = 1 @endphp
                            @foreach($brands as $nbrands)
                            @if($moreBrand > $brandCcnt )
                            <li class="py-2">
                                <div class="row d-flex">
                                    <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                                        <input type="checkbox" value="{{$nbrands->id}}" wire:model="brand_id" id="brand{{$nbrands->id}}" class="mr-2">
                                        <label class="font-weight600" for="brand{{$nbrands->id}}">{{$nbrands->name}}</label>
                                    </div>
                                    <div class="col-md-2 col-sm-9 col-xs-2 col-xsm-2">
                                        <small class="">@if($nbrands->product->count()>0) ({{$nbrands->product->count()}}) @endif</small>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @php $brandCcnt++ @endphp
                            @endforeach
                            @if($moreBrand < $brandCcnt) <li><span wire:click="loadMoreBrand({{$brandCcnt}})" class="cursor_pointer pb-3 text_success"><i>+ Load More</i></span></li>
                                @endif
                        </ul>
                    </div>
                </div>
                @endif

            </div>
            <!--end sitebar-->
        </div>
    </div>
    @push('scripts')
    </script>
    <script>
        var slider = document.getElementById('slider-range');
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 10000,
            values: [0, 5000],
            slide: function(event, ui) {
                $("#amount").val("৳" + ui.values[0] + " - ৳" + ui.values[1]);
                @this.set('min_price', ui.values[0]);
                @this.set('max_price', ui.values[1]);
            },
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));
    </script>
    @endpush
</main>