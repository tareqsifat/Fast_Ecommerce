<main id="main" class="main-site">
    @section('title')
    {{$cateData->name}}
    @endsection
    @section('description')
    {{$cateData->description}}
    @endsection
    <!--main area-->
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul class="my-4">
                <li class="item-link"><a href="{{route('home')}}" class="link">Home</a></li>
                <li class="item-link"><a href="{{route('parent-category.single', $cateData->categories->slug)}}" class="link">{{$cateData->categories->name}}</a></li>
                <li class="item-link"><span class="text_success">{{$cateData->name}}</span></li>
            </ul>
        </div>
        <div class="w-100 row m-auto">
            @if($cateData->childCategory->count()>0)
            <ul class="list-unstyled border_none style-nav-1 categoryImage-slider owl-carousel">
                @foreach($cateData->childCategory as $key=>$uItem)
                <li class="">
                    <div class="wrap-show-advance-info-box style-1 w-100 mb-0 ">
                        <div class="wrap-products">
                            <a href='{{route("childcategory.single", [$cateData->categories->slug,$cateData->slug, $uItem->slug])}}' title="{{$uItem->name}}">
                                <figure><img style="border: 1px solid #e2e2e2;border-radius: 50%;height: 100px;width: 100px; margin:auto;" src='@if($uItem->image) @if(file_exists("uploads/category/$uItem->image")){{asset("uploads/category/$uItem->image")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif  @else {{asset("defaults/default-blank-img.jpg")}} @endif' width="100" height="200" alt="{{$uItem->brand_logo}}">
                                </figure>
                            </a>
                            <div class="product-info">
                                <h5 class="font-weight600 text-alig-center mt-5 mb-5 text-uppercase">
                                    <a class="text_dark" href='{{route("childcategory.single", [$cateData->categories->slug,$cateData->slug, $uItem->slug])}}'> {{Str::of($uItem->name)->words(2, '')}}</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="w-100 row m-auto pb-5 pt-4">
            <div class="row m-auto">
                <!--sitebar area start-->
                <form action="{{route('filter.post', $cateData->slug)}}" class="autoSubmit" method="POST">
                    @csrf
                    <input type="hidden" name="slug" value="{{$cateData->slug}}">
                    <input type="hidden" name="search_by" value="sub_category">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pl-0 ">
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
                                    <input type="radio" name="instock" id="instock" value="0">
                                    <label class="ml-2" for="instock">In Stock</label>
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="instock" value="1" id="outofstock">
                                    <label class="ml-2" for="outofstock"> Out Of Stock</label>
                                </div>
                            </div>
                        </div><!-- Price-->
                    </div>
                    @if($fProduct->count()>0)
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 main-content-area px-0">
                        <div class="bgffffff p-3 border_redious5 border_bottom_eee mb-2">
                            <div class="row">
                                <div class="col-sm-4 col-md-6 col-lg-6">
                                    <h2 class="font-size-18 product_heading p-0 m-0">{{$cateData->name}}</h2>
                                </div>
                                <div class="col-sm-8 col-md-6 col-lg-6">
                                    <div class="form-group searchBox_select mb-0">
                                        <div class="float-right">
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
                                                <option value="12">12</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                <option value="All">All</option>
                                            </Select>
                                        </div>

                                    </div>
                                    <div class="form-group searchBox_select mb-0">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-unstyled product_items_wrapper_withsidebar">
                            @php $wishItem = Cart::instance(' wishlist')->content()->pluck('id') @endphp
                            @foreach($fProduct as $nedata)
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
                        <div class="category_navigation">
                            {!! $fProduct->links() !!}
                        </div>
                        @else
                        <div class="row title_wrape px-2 m-auto">
                            <div class="col-sm-12 col-lg-12 w-100 m-auto">
                                <h2 class="text-align-center">Product Not Found</h2>
                            </div>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <!--end row-->
    </div>
    <!--end container-->
    <!--main area-->
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