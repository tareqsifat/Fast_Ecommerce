<main id="main" class="main-site left-sidebar">
    @section('title')
    {{'Search'}}
    @endsection
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul class="my-4">
                <li class="item-link"><a href="{{route('home')}}" class="link">Home</a></li>
                <li class="item-link"><span class="text_success">Search</span></li>
            </ul>
        </div>
        <form action="{{route('search.header', $search)}}" class="autoSubmit" method="post">
            @csrf
            <div class="row mb-5">
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    <div class="row w-100 m-auto">
                        @if($allproduct->count()>0)
                        <div class="wrap-shop-control mt-4 box-shadow1 bg_white mr-2">
                            <h1 class="shop-title font-weight600">{{$search}}</h1>
                            <div class="wrap-right searchBox_select">
                                <div class="float-right mr-2">
                                    <label for="">Sort By </label>
                                    <Select name="short_by" class="auto-submit-item">
                                        <option value="asc">Default</option>
                                        <option value="desc">Price(high > low)</option>
                                        <option value="asc">Price(low > high)</option>
                                    </Select>
                                </div>
                                <div class="float-right mx-3">
                                    <label for="">Show</label>
                                    <Select name="countby" class="" class="auto-submit-item">
                                        <option @if(session('countby')==12) {{'selected' }} @endif value="12">12</option>
                                        <option @if(session('countby')==25) {{'selected' }} @endif value="25">25</option>
                                        <option @if(session('countby')==50) {{'selected'}} @endif value="50">50</option>
                                        <option @if(session('countby')==100) {{'selected'}} @endif value="100">100</option>
                                    </Select>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="wrap-shop-control mt-4 box-shadow1 bg_white mr-2">
                            <h1 class="shop-title font-weight600"><i>Not found</i> </h1>
                        </div>
                        @endif
                    </div>
                    <!--end wrap shop control-->
                    <div class="row w-100 m-auto">
                        @if($product->count() > 0)
                        <ul class="list-unstyled product_items_wrapper_withsidebar">
                            @php $wishItem = Cart::instance('wishlist')->content()->pluck('id') @endphp
                            @foreach($product as $nedata )
                            <li class="product_items" wire:ignore>
                                <div class="wrap-show-advance-info-box style-1 w-100">
                                    <div class="wrap-products">
                                        <div class="wrap-product-tab tab-style-1">
                                            <div class="product product-style-2 equal-elem w-100" style="height: 385px;">
                                                <div class="product-thumnail card-item-product-image">
                                                    <a href="{{route('single', $nedata->slug)}}" title="{{$nedata->title}}">
                                                        <figure><img src='@if(file_exists("uploads/products/thumbnails/$nedata->thumbnail")){{asset("uploads/products/thumbnails/$nedata->thumbnail")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif' width="150" height="150" alt="{{$nedata->title}}">
                                                        </figure>
                                                    </a>
                                                    <div class="group-flash">
                                                        @if(date_diff(Illuminate\Support\Carbon::now(), $nedata->created_at)->format("%d days, %i munuts") < '1 days, 0 minuts' ) <span class="flash-item new-label">new</span>Illuminate\Support\Carbon::now() @endif
                                                    </div>
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
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <div class="wrap-shop-control mt-4 box-shadow1 bg_white mr-2">
                            <h1 class="shop-title font-weight600"><i class="text-align-center"> Not found</i> </h1>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="category_navigation">
                            {!! $product->links() !!}
                        </div>
                    </div>
                </div>
                <!--end main products area-->
                <!--sitebar area start-->
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-4 pr-2">
                    <div class="widget mercado-widget filter-widget price-filter box-shadow1 bg_white m-0 p-3 pricefilter_input">
                        <h2 class="widget-title">Filter</h2>
                        <div class="widget-content">
                            <div class="w-100">
                                <label for="">Price </label>
                                <div class="m-2 pb-3" wire:ignore>
                                    <div id="slider-range"></div>
                                </div>
                                <div class="d-flex">
                                    <input name="min_price" value="{{session('min_price')}}" placeholder="Min" inputmode="numeric" class="w-100" type="number" name="min_price" id="min_price">
                                    <button desabled class="border_none bg-none"><i class="fa fa-minus fa-sm"></i></button>
                                    <input name="max_price" value="{{session('max_price')}}" placeholder="Max" inputmode="numeric" class="w-100" type="number" name="max_price" id="max_price">
                                    <button class="ml-1 btn btn-success" type="submit"><i class="fa fa-caret-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div><!-- Price-->
                    <div class="widget mercado-widget filter-widget price-filter box-shadow1 bg_white m-0 p-3 mt-5">
                        <h2 class="widget-title">Availability</h2>
                        <div class="widget-content">
                            <div class="form-group">
                                <input type="radio" @if(session('instock')=='0' ) checked }} @endif name="instock" id="instock" value="0">
                                <label class="ml-2" for="instock">In Stock</label>
                            </div>
                            <div class="form-group">
                                <input type="radio" @if(session('instock')=='1' ) checked @endif name="instock" value="1" id="outofstock">
                                <label class="ml-2" for="outofstock"> Out Of Stock</label>
                            </div>
                        </div>
                    </div><!-- Price-->
                    @if($pCategory->count()>0)
                    <div class="widget mercado-widget categories-widget box-shadow1 bg_white m-0 mt-3 px-3">
                        <h2 class="widget-title py-3">Categories</h2>
                        <div class="widget-content">
                            <ul class="list-category mt-2">
                                <li class="py-2">
                                    <div class="row d-flex">
                                        <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                                            <input value='all' type="radio" @if(!session('hScategory_id')) checked }} @endif name="hScategory_id" id="all" class="mr-2">
                                            <label class="font-weight600" for="all">All</label>
                                        </div>
                                    </div>
                                </li>
                                @php $cnt = 1 @endphp
                                @foreach($pCategory as $ncategory)
                                @if($moreCategory > $cnt )
                                <li class="py-2">
                                    <div class="row d-flex">
                                        <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                                            <input type="radio" value="{{$ncategory->id}}" @if(session('hScategory_id')==$ncategory->id ) checked }} @endif name="hScategory_id" id="{{$ncategory->id}}" class="mr-2">
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
                                <li class="py-2">
                                    <div class="row d-flex">
                                        <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                                            <input value='all' type="radio" @if(!session('hSbrand_id')) checked }} @endif name="hSbrand_id" id="ball" class="mr-2">
                                            <label class="font-weight600" for="ball">All</label>
                                        </div>
                                    </div>
                                </li>
                                @php $brandCcnt = 1 @endphp
                                @foreach($brands as $nbrands)
                                @if($moreBrand > $brandCcnt )
                                <li class="py-2">
                                    <div class="row d-flex">
                                        <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                                            <input type="radio" value="{{$nbrands->id}}" @if(session('hSbrand_id')==$nbrands->id ) checked }} @endif name="hSbrand_id" id="brand{{$nbrands->id}}" class="mr-2">
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
        </form>
    </div>
    @push('scripts')
    <script>
        var slider = document.getElementById('slider-range');
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 100000,
            values: [0, 50000],
            slide: function(event, ui) {
                $("#min_price").val(ui.values[0]);
                $("#max_price").val(ui.values[1]);
            },
        });
    </script>
    <script>
        $('.autoSubmit, .autoSubmit select, .autoSubmit input, .autoSubmit textarea').change(function() {
            const el = $(this);
            let form;

            if (el.is('form')) {
                form = el;
            } else {
                form = el.closest('form');
            }

            form.submit();
        });
    </script>
    @endpush
</main>