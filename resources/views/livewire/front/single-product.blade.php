<main id="main" class="main-site">
    @section('og_meta')
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{URL::current()}}">
    <meta property="og:title" content="{{$data->title}}">
    <meta property="og:site_name" content="@if(isset($settings->title)) {{$settings->title}} @else {{config('app.name')}} @endif" />
    <meta property="og:image" content='{{asset("uploads/products/thumbnails/$data->thumbnail")}}'>
    <meta property="og:description" content="{{strip_tags($data->description)}}">
    <meta property="og:author" content="{{config('app.name')}}">
    <meta property="name" content="{{$data->title}}" />
    <div itemprop="reviewRating" itemtype="http://schema.org/Rating" itemscope>
        <meta itemprop="ratingValue" content="5" />
        <meta itemprop="bestRating" content="5" />
    </div>
    <div itemprop="offers" itemtype="http://schema.org/AggregateOffer" itemscope>
        <meta itemprop="lowPrice" content="{{$data->sale_price}}" />
        <meta itemprop="highPrice" content="{{$data->price}}" />
        <meta itemprop="offerCount" content="6" />
        <meta itemprop="priceCurrency" content="৳" />
    </div>
    @endsection
    @section('title'){{$data->title}}@endsection
    @section('description') {{strip_tags($data->description)}} @endsection
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/magnific-popup/magnific-popup.css')}}">
    @endpush
    <div class="container p-0">
        @if(Session::has('successMessage'))
        <div class="notification">
            <div class="alert alert-primary mb-0" role="alert">
                {{Session::get('successMessage')}}
                <button wire:click="removeAlert" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        </div>
        @endif
        @if(Session::has('warningAlert'))
        <div class="notification">
            <div class="alert alert-warning mb-0" role="alert">
                {{Session::get('warningAlert')}}
                <button wire:click="removeAlert" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        </div>
        @endif
        <div class="main-content-area bgffffff border_bottom_eee">
            <div class="row w-100 m-auto">
                <div class="wrap-breadcrumb">
                    <ul class="my-4 ml-2">
                        <li class="item-link"><a href="{{route('home')}}" class="link"><i class="fa fa-home"></i></a></li>
                        <li class="item-link"><a href="{{route('parent-category.single',$data->parentcategory->slug)}}" class="link">{{$data->parentcategory->name}} </a></li>
                        <li class="item-link"><a href='{{route("category.single", [$data->parentcategory->slug, $data->subcategories->slug])}}' class="link">{{$data->subcategories->name}}</a></li>
                        @if(isset($data->childCategory->slug))
                            <li class="item-link"><a href='{{route("childcategory.single", [$data->parentcategory->slug,$data->subcategories->slug, $data->childCategory->slug])}}' class="link">{{$data->childCategory->name}}</a></li>
                            @if(isset($data->babycategory))
                                <li class="item-link"><a href='{{route("baby_category.single", [$data->parentcategory->slug,$data->subcategories->slug, $data->childCategory->slug, $data->babycategory->slug])}}' class="link">{{$data->babycategory->name}}</a></li>
                                @if(isset($data->newBornCategory))
                                    <li class="item-link"><a href='{{route("newborn_category.single", [$data->parentcategory->slug,$data->subcategories->slug, $data->childCategory->slug, $data->babycategory->slug, $data->newBornCategory->slug])}}' class="link">{{$data->newBornCategory->name}}</a></li>
                                    @if(isset($data->beforeBornCategory))
                                        <li class="item-link"><a href='{{route("beforenewborn_category.single", [$data->parentcategory->slug,$data->subcategories->slug, $data->childCategory->slug, $data->babycategory->slug, $data->newBornCategory->slug,$data->beforeBornCategory->slug])}}' class="link">{{$data->beforeBornCategory->name}}</a></li>
                                    @endif
                                @endif
                            @endif
                        @endif
                        <li class="item-link"><span class="text_success">{{$data->title}}</span></li>
                    </ul>
                </div>
            </div>
            <div class="row m-0 font-family-nunito w-100 d-flex single-heading-section my-3">
                <div class="col-sm-12 col-xsm-12 col-md-6 col-lg-6 d-flex">
                    <div class="section-item pt-3 mr-5">
                        <p>
                            {{ $reviewsdata->count() }}
                            Reviews
                        </p>
                    </div>
                    <div class="section-item-border section-item pt-3 mr-5">
                        <p>
                            {{ $questionData->count() }} Answered question
                        </p>
                    </div>
                    <div class="d-flex section-item-border section-item pt-3 mr-5">
                        <p>Share:</p>
                        <div class="ml-4">
                            <!-- facebook share -->
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            {{-- <div class="addthis_inline_share_toolbox"></div> --}}
                            <div class="share_icon">
                                <span class="icon_wrapper mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </span>
                                <span class="icon_wrapper mx-1">
                                    <i class="fab fa-twitter"></i>
                                </span>
                                <span class="icon_wrapper mx-1">
                                    <i class="fab fa-pinterest"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xsm-6 col-md-6 col-lg-6 d-none d-sm-block">
                    <div class="float-right mt-1">
                        <?php if (!empty($data->sale_price)) {
                            $price = str_replace(',', '', $data->sale_price);
                        } else {
                            $price = str_replace(',', '', $data->price);
                        } ?>
                        {{-- <form action="{{route('addToCart.post')}}" method="POST"> --}}
                        {{-- <a wire:click.prevent='addToWishlist({{$data->id}}, "{{$data->title}}", {{$price}})' href="javascript:void(0)" class="btn btn-light"> <i class="far fa-bookmark mx-2"></i>Save</a> --}}
                        <a class="mx-2" href="" style="color: black"> <i class="far fa-bookmark mx-2"></i><span class="font-weight-bold text-dark">Save</span></a>
                        {{-- @csrf
                            <input type="hidden" name="qtty" value="1" id="input-buynowqtty">
                            <input type="hidden" name="price" value="{{$price}}">
                        <input type="hidden" name="title" value="{{$data->title}}">
                        <input type="hidden" name="pId" value="{{$data->id}}"> --}}
                        {{-- <button value="@if($data->impacode){{'shipping'}}@else{{'buynow'}}@endif" name="button" ><i class="fas fa-plus-square"></i> Buy Now</button> --}}
                        <a class="mx-2" href="" style="color: black"><i class="fas fa-plus-square mx-2"></i><span class="font-weight-bold text-dark">Add to Compare</span></a>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
            <div class="row w-100 m-0">
                <div class="col-xsm-12 col-sm-12 col-md-4 col-lg-4  popup-gallery zoom-gallery">
                    <div class="row">
                        <a title="{{$data->thumbnail}}" href='@if(file_exists("uploads/products/thumbnails/$data->thumbnail")){{asset("uploads/products/thumbnails/$data->thumbnail")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif'>
                            <img src='@if(file_exists("uploads/products/thumbnails/$data->thumbnail")){{asset("uploads/products/thumbnails/$data->thumbnail")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif' alt="{{$data->thumbnail}}">
                        </a>
                    </div>
                    <div class="row mb-5">
                        <div class="d-flex justify-content-center px-5">
                            @foreach($productImage as $imgItem)
                            <a title="{{$imgItem->image}}" href='@if(file_exists("uploads/products/images/$imgItem->image")){{asset("uploads/products/images/$imgItem->image")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif' class="pop_image_items border-f5f5">
                                <img class="" width="80px" src='@if(file_exists("uploads/products/images/$imgItem->image")){{asset("uploads/products/images/$imgItem->image")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif' alt='{{asset("uploads/products/images/$imgItem->image")}}'>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xsm-12 col-sm-12 col-md-8 col-lg-8 p-0 ">
                    <div class="row w-100 m-0">
                        <div class="col-xsm-12 col-sm-12 col-md-7 col-lg-7">
                            <div class="title-heading">
                                <h2 class="font-size-18 m-0 font-family-nunito text-info">{{$data->title}}</h2>
                                <div class="clearfix">
                                    @if(isset($data->sale_price))
                                    @if(!is_null($data->impacode))
                                    <p class="subItem-pill"> Sell Price: <strong>৳ {{$data->sale_price}}</strong> </p>
                                    <p class="subItem-pill"> Regular: <strong>৳ {{$data->price}} </strong> </p>
                                    @else
                                    <p class="subItem-pill"> Price: <strong>৳ {{$data->price}}</strong> </p>
                                    @endif
                                    @endif
                                    <p class="subItem-pill {{($data->availability == 0)?'subItem-pill-info':'subItem-pill-warning'}}"> Status: <strong> {{($data->availability == 0)?'In stock':'Out of stoke'}} </strong> </p>
                                    <p class="subItem-pill"> Product Code: <strong>{{$data->product_code}}</strong> </p>
                                    <p class="subItem-pill"> Brand: <strong>{{$data->brands->name}} </strong> </p>
                                    @if($data->impacode)
                                    <p class="subItem-pill"> IMPA Code: <strong>{{$data->impacode}} </strong> </p>
                                    @endif
                                </div>
                            </div>
                            <div class="subcontent d-inline font-size-14">
                                <br>
                                {!! $data->description !!}
                                <br>
                                <a class="mt-3 viewmoreLink" href="#view-more-smooth-scroll">View More info</a>
                                <div class="mt-3">
                                    @if($data->color)
                                    <strong>Color:</strong>
                                    <?php $expData = explode('|', $data->color) ?>
                                    @foreach($expData as $im)
                                    <span class="badge badge-warning btn">{{$im}}</span>
                                    @endforeach
                                    @endif

                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-md-8">
                                    <div class="color_product row">
                                        <div class="col-sm-2 mr-2 pr-2"><span class="display-1 h5">Color:</span></div>
                                        <div class="col-sm-1 mx-0 px-0 ">
                                            <div class="color_single rounded-circle" style="width: 17px; height: 17px; background: #F10000;"></div>
                                        </div>
                                        <div class="col-sm-1 mx-0 px-0">
                                            <div class="color_single rounded-circle" style="width: 17px; height: 17px; background: #000000;"></div>
                                        </div>
                                        <div class="col-sm-1 mx-0 px-0">
                                            <div class="color_single rounded-circle" style="width: 17px; height: 17px; background: #D0D403;"></div>
                                        </div>
                                        <div class="col-sm-1 mx-0 px-0">
                                            <div class="color_single rounded-circle" style="width: 17px; height: 17px; background: #0035F1;"></div>
                                        </div>
                                        <div class="col-sm-1 mx-0 px-0">
                                            <div class="color_single rounded-circle" style="width: 17px; height: 17px; background: #4AB70A;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-4">
                                <div class="col-md-6">
                                    <div class="color_product row d-flex justify-content-between">
                                        <div class="col-sm-3">
                                            <span class="display-1 h5">Size:</span>
                                        </div>
                                        <div class="col-sm-1 px-0 mx-2 text-center" style="border:2px solid #818181">
                                            <div class="color_single px-1">S</div>
                                        </div>
                                        <div class="col-sm-1 mx-2 px-0 text-center" style="border:2px solid #818181">
                                            <div class="color_single px-1">M</div>
                                        </div>
                                        <div class="col-sm-1 mx-2 px-0 text-center" style="border:2px solid #818181">
                                            <div class="color_single px-1">L</div>
                                        </div>
                                        <div class="col-sm-6 mx-0 px-0 text-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <form action="{{route('addToCart.post')}}" method="POST">
                                @csrf
                                <div class="row d-flex mt-5 ml-0 quentity_input">
                                    <div class="mr-2 s_qtty_area d-flex">
                                        <div onclick="decrement()" class="btn border_redious0"><i class="fa fa-minus font-size-15"></i></div>
                                        <div id="output-area" desabled class="btn border_redious0 btn-desabled font-size-15"></div>
                                        <input type="hidden" name="qtty" value="1" id="input-qtty">
                                        <div class="btn border_redious0" onclick="increment()"><i class="fa fa-plus font-size-15"></i></div>
                                    </div>
                                </div>

                                <div class="row d-flex mt-5 ml-0" id="view-more-smooth-scroll">
                                    <input type="hidden" name="price" value="{{$price}}">
                                    <input type="hidden" name="title" value="{{$data->title}}">
                                    <input type="hidden" name="pId" value="{{$data->id}}">
                                    <button value="@if($data->impacode){{'shippingCart'}}@else{{'addtocart'}}@endif" name="button" type="submit" class="btn btn-success px-5 py-2">
                                        <i class="dripicons-cart mr-2"></i> Add to Cart
                                    </button type="submit">
                                    <button value="@if($data->impacode){{'shipping'}}@else{{'buynow'}}@endif" name="button" class="btn btn-info px-5 ml-1">
                                        <i class="dripicons-shopping-bag mr-2"></i>Buy Now
                                    </button>
                                </div>
                                @if($data->impacode)
                                <button value="shipping" name="button" class="btn btn-secondary mt-2 btn-xl pl-4 pr-4">
                                    <i class="mdi mdi-truck-fast navicon mr-2"></i>
                                    <span class="mr-2"> Ask The Shipping Price and quotation</span>
                                </button>
                                @endif
                            </form>
                        </div>
                        <div class="col-xsm-12 col-sm-12 col-md-5 col-lg-5 p-0 single-product-info-section m-0">
                            @livewire('front.includes.single-product-info')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4 w-100 mt-5 pt-5">
                @if($productspecification->count()>0)
                <div class="col-sm-3 col-xsm-3 col-md-2 col-lg-2 spItem">
                    <strong class="specificatio-items pb-4 font-size-15"><a class="text3749BB" href="#Specification">Specification</a> </strong>
                </div>
                @endif
                <div class="col-sm-3 col-xsm-3 col-md-2 col-lg-2 spItem">
                    <strong class="pb-4 {{($productspecification->count()>0 ? '':'specificatio-items') }} b-4 font-size-15"><a class="{{($productspecification->count()>0 ? 'text_dark':'text3749BB') }}" href="#Description">Description</a> </strong>
                </div>
                <div class="col-sm-3 col-xsm-3 col-md-2 col-lg-2 spItem">
                    <strong class="b-4 font-size-15"><a class="text_dark" href="#Questions">Questions</a> </strong>
                </div>
                <div class="col-sm-3 col-xsm-3 col-md-2 col-lg-2 spItem">
                    <strong class="b-4 font-size-15"><a class="text_dark" href="#Reviews">Reviews({{$reviewsdata->count()}})</a> </strong>
                </div>
            </div>
        </div>
        <div class="main-content-area mt-4">
            <div class="row m-0">
                <div class="col-xsm-12 col-sm-12 col-md-9 col-lg-9">
                    @if($productspecification->count()>0)
                    <div class="bgffffff row px-3 mb-4">
                        @foreach($productspecification as $spItem)
                        <div class="bg-success sub-subinfo-title">
                            <h2 class="font-weight-bold font-size-14 p-3 text3749BB font-size-14">{{$spItem->title}}</h2>
                        </div>

                        <table class="w-100">
                            @foreach($spItem->ProductSpecificationOptions as $spSubItem)
                            <tr class="border_bottom_eee">
                                <th width="25%" class="py-4">{{$spSubItem->name}}</th>
                                <td>{{$spSubItem->description}}</td>
                            </tr>
                            @endforeach
                        </table>
                        @endforeach
                    </div>
                    @endif
                    @if($data->description2)
                    <div class="row px-3 bgffffff mb-4 border_bottom_eee">
                        <div class="mt-5 pb-3">
                            <h2 id="Description" class="text_dark font-size-16 font-weight-bold pb-4">Description</h2>
                            {!! $data->description2 !!}
                        </div>
                    </div>
                    @endif
                    <div class="row px-3 bgffffff mb-4 border_bottom_eee mb-2">
                        <!-- review header content -->
                        <div class="row border_bottom_eee p-2 m-0">
                            <div class="col-sm-12 col-xsm-12 col-md-10 col-lg-10">
                                <div class="mt-2">
                                    <h2 id="Reviews" class="text_dark font-size-16 font-weight-bold">Reviews ({{$reviewsdata->count()}})</h2>
                                    <p>Get specific details about this product from customers who own it.</p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xsm-12 col-md-2 col-lg-2">
                                <div class="mt-3">
                                    <a href="{{route('user.reviews.single', $data->id)}}" class="btn btn-outline-success">Write a Review</a>
                                </div>
                            </div>
                        </div>
                        @if($reviewsdata->count()>0)
                        <?php
                        $count = 0;
                        ?>
                        @foreach($reviewsdata as $treviews)
                        <?php $count += $treviews->review ?>
                        @endforeach
                        <!-- review calculation contant  -->
                        <div class="row my-5 border_bottom_eee p-2 m-0">
                            <div class="col-sm-12 col-xsm-12 col-md-6 col-lg-6">
                                <div class="p-3">
                                    <h1 class="font-weight-bold"><span class="text_dark">{{number_format($count/$reviewsdata->count(),1)}}</span><small>/5</small></h1>
                                    <h4>
                                        @if($count > 0) <i class="fa fa-star @if($count/$reviewsdata->count() >= 1 ) {{'text_warning'}} @else {{'coloraaa'}} @endif" aria-hidden="true"></i> @endif
                                        @if($count > 0) <i class="fa fa-star @if($count/$reviewsdata->count() >= 2 ) {{'text_warning'}} @else {{'coloraaa'}} @endif" aria-hidden="true"></i> @endif
                                        @if($count > 0) <i class="fa fa-star @if($count/$reviewsdata->count() >= 3 ) {{'text_warning'}} @else {{'coloraaa'}} @endif" aria-hidden="true"></i> @endif
                                        @if($count > 0) <i class="fa fa-star @if($count/$reviewsdata->count() >= 4 ) {{'text_warning'}} @else {{'coloraaa'}} @endif" aria-hidden="true"></i> @endif
                                        @if($count > 0) <i class="fa fa-star @if($count/$reviewsdata->count() >= 5 ) {{'text_warning'}} @else {{'coloraaa'}} @endif" aria-hidden="true"></i> @endif
                                    </h4>
                                    <h6><small class="font-weight-bold">{{$reviewsdata->count()}} Reviews</small></h6>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xsm-12 col-md-6 col-lg-6">
                                <table class="table">
                                    <tbody>
                                        <?php
                                        $oneStarCount   = DB::table('productreviews')->where('product_id', $data->id)->where('status', 1)->where('review', '1')->get();
                                        $twoStarCount   = DB::table('productreviews')->where('product_id', $data->id)->where('status', 1)->where('review', '2')->get();
                                        $threeStarCount = DB::table('productreviews')->where('product_id', $data->id)->where('status', 1)->where('review', '3')->get();
                                        $fourstarCount  = DB::table('productreviews')->where('product_id', $data->id)->where('status', 1)->where('review', '4')->get();
                                        $fivestarCount  = DB::table('productreviews')->where('product_id', $data->id)->where('status', 1)->where('review', '5')->get();

                                        $oneSc = $oneStarCount->count() * 100 /  $reviewsdata->count();
                                        $twoSc = $twoStarCount->count() * 100 /  $reviewsdata->count();
                                        $threeSc = $threeStarCount->count() * 100 /  $reviewsdata->count();
                                        $foursc = $fourstarCount->count() * 100 /  $reviewsdata->count();
                                        $fivesc = $fivestarCount->count() * 100 /  $reviewsdata->count();
                                        ?>
                                        <tr>
                                            <td width="40%" class="border-none">
                                                <i class="fas fa-star text_warning"></i>
                                                <i class="fas fa-star text_warning"></i>
                                                <i class="fas fa-star text_warning"></i>
                                                <i class="fas fa-star text_warning"></i>
                                                <i class="fas fa-star text_warning"></i>
                                            </td>
                                            <td width="50%" class="border-none">
                                                <div class="review-info-bar bg-info">
                                                    <div style="width:{{$fivesc}}%" class="review-info-bar-prograce"></div>
                                                </div>
                                            </td>
                                            <td class="border-none">{{$fivestarCount->count()}}</span></td>
                                        </tr>
                                        <tr>
                                            <td width="40%" class="border-none">
                                                <i class="fas fa-star text_warning"></i>
                                                <i class="fas fa-star text_warning"></i>
                                                <i class="fas fa-star text_warning"></i>
                                                <i class="fas fa-star text_warning"></i>
                                                <i class="fas fa-star coloraaa"></i>
                                            </td>
                                            <td width="50%" class="border-none">
                                                <div class="review-info-bar bg-info">
                                                    <div style="width:{{$foursc}}%" class="review-info-bar-prograce"></div>
                                                </div>
                                            </td>
                                            <td class="border-none">{{$fourstarCount->count()}}</span></td>
                                        </tr>
                                        <tr>
                                            <td width="40%" class="border-none">
                                                <i class="fas fa-star text_warning"></i>
                                                <i class="fas fa-star text_warning"></i>
                                                <i class="fas fa-star text_warning"></i>
                                                <i class="fas fa-star coloraaa"></i>
                                                <i class="fas fa-star coloraaa"></i>
                                            </td>
                                            <td width="50%" class="border-none">
                                                <div class="review-info-bar bg-info">
                                                    <div style="width: {{$threeSc}}%;" class="review-info-bar-prograce"></div>
                                                </div>
                                            </td>
                                            <td class="border-none">{{$threeStarCount->count()}}</span></td>
                                        </tr>
                                        <tr>
                                            <td width="40%" class="border-none">
                                                <i class="fas fa-star text_warning"></i>
                                                <i class="fas fa-star text_warning"></i>
                                                <i class="fas fa-star coloraaa"></i>
                                                <i class="fas fa-star coloraaa"></i>
                                                <i class="fas fa-star coloraaa"></i>
                                            </td>
                                            <td width="50%" class="border-none">
                                                <div class="review-info-bar bg-info">
                                                    <div style="width: {{$twoSc}}%;" class="review-info-bar-prograce"></div>
                                                </div>
                                            </td>
                                            <td class="border-none">{{$twoStarCount->count()}}</span></td>
                                        </tr>
                                        <tr>
                                            <td width="40%" class="border-none">
                                                <i class="fas fa-star text_warning"></i>
                                                <i class="fas fa-star coloraaa"></i>
                                                <i class="fas fa-star coloraaa"></i>
                                                <i class="fas fa-star coloraaa"></i>
                                                <i class="fas fa-star coloraaa"></i>
                                            </td>
                                            <td width="50%" class="border-none">
                                                <div class="review-info-bar bg-info">
                                                    <div style="width: {{$oneSc}}%;" class="review-info-bar-prograce"></div>
                                                </div>
                                            </td>
                                            <td class="border-none">{{$oneStarCount->count()}}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- review comment and like option -->
                        @foreach($reviewsdata as $reviewContent )
                        <div class="row mt-4 border_bottom_eee p-2 m-0">
                            <div class="review-top d-flex">
                                <div class="w-75">
                                    <h6> <i class="fa fa-star @if($reviewContent->review >= 1) {{'text_warning'}} @else {{'coloraaa'}} @endif"></i>
                                        <i class=" fa fa-star @if($reviewContent->review >= 2) {{'text_warning'}} @else {{'coloraaa'}} @endif"></i>
                                        <i class="fa fa-star @if($reviewContent->review >= 3) {{'text_warning'}} @else {{'coloraaa'}} @endif"></i>
                                        <i class=" fa fa-star @if($reviewContent->review >= 4 ) {{'text_warning'}} @else {{'coloraaa'}} @endif"></i>
                                        <i class="fa fa-star @if($reviewContent->review >= 5) {{'text_warning'}} @else {{'coloraaa'}} @endif"></i>
                                    </h6>
                                    <div>
                                        <span class=" color75 font-weight600">by {{(!empty($reviewContent->user->name)) ? $reviewContent->user->name : "$reviewContent->fast_name" ." "."$reviewContent->last_name"}}</span>
                                    </div>
                                </div>
                                <div class="w-25">
                                    <span class="float-right review-top-date color75 font-weight600">{{ $reviewContent->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div class="product-review-content py-2">
                                <span>
                                    {{$reviewContent->comment}}
                                </span>
                                <br>
                                @if($reviewContent->reviewImage->count() > 0)
                                <div class="d-flex mt-4 ">
                                    @foreach($reviewContent->reviewImage as $nRimg)
                                    <a class="image-popup-vertical-fit mr-2" title="{{$nRimg->image}}" href='@if(file_exists("uploads/reviews/$nRimg->image")){{asset("uploads/reviews/$nRimg->image")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif'>
                                        <img class="img-thumbnail" width="100px" src='@if(file_exists("uploads/reviews/$nRimg->image")){{asset("uploads/reviews/$nRimg->image")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif' alt="image">
                                    </a>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <div class="product-review-footer my-2">
                                <span class="font-size-16 m-2"><i wire:click.prevent="Like({{$reviewContent->id}})" class="fas fa-thumbs-up cursor_pointer text-info"></i> <small>{{$reviewContent->like}}</small></span>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <!-- review empty content   -->
                        <div class="row px-4 my-5">
                            <div class="text-align-center">
                                <i class="mdi mdi-clipboard-text ask_question_icon"></i>
                                <p class="mt-3">This product has no reviews yet. Be the first one to write a review.</p>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row px-3 bgffffff mb-4 border_bottom_eee">
                        <div class="row border_bottom_eee p-2 m-0">
                            <div class="col-sm-12 col-xsm-12 col-md-10 col-lg-10">
                                <div class="mt-2">
                                    <p id="Questions" class="text_dark font-size-16 font-weight-bold">Questions ({{$questionData->count()}})</p>
                                    <p>Have question about this product? Get specific details about this product from expert.</p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xsm-12 col-md-2 col-lg-2">
                                <div class="mt-3">
                                    <a href="{{route('user.askQuestion', $data->slug)}}" class="btn btn-outline-success">Ask Question</a>
                                </div>
                            </div>
                        </div>
                        <div class="row px-4">
                            @if($questionData->count()>0)
                            <table class="table">
                                <tbody>
                                    @foreach($questionData as $qitem)
                                    <tr class="mb-5">
                                        <td width="5%" title="Question" class="pt-3 border-none" colspan="0"><i class="dripicons-question p-2 bg-info"></i></td>
                                        <td class="pt-3 border-none" colspan="2">
                                            <p class="p-0 m-0">{{$qitem->description}}</p>
                                            <i class="color75"> {{(!empty($qitem->user->name)) ? $qitem->user->name : "$qitem->fast_name" ." "."$qitem->last_name"}} - Ask Question Within {{$qitem->created_at->diffForHumans()}}</i>
                                        </td>
                                    </tr>

                                    @php $n = 0 @endphp
                                    @foreach($qitem->ansQuestion as $ans)
                                    <tr class="py-2 {{($qitem->ansQuestion->last()->id == $ans->id) ? 'border_bottom_eee mb-4' : ''}}">
                                        <td class="border-none pr-0" colspan="0"></td>
                                        <td title="Answere" class="pr-0 border-none" width="5%"><i class="dripicons-information p-2 bg-success"></i></td>
                                        <td class="pl-0 border-none">
                                            <p class="p-0 m-0"> {{$ans->answer}}</p>
                                            <i class="color75"> {{$ans->user->name}} - answered within {{$ans->created_at->diffForHumans()}}</i>
                                        </td>
                                    </tr>
                                    @php $n++ @endphp
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="text-align-center py-5">
                                <i class="mdi mdi-comment-processing ask_question_icon"></i>
                                <p class="mt-3">There are no questions asked yet. Be the first one to ask a question.</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xsm-12 col-sm-12 col-md-3 col-lg-3 pr-0 p-xsm-0">
                    <div class="widget mercado-widget widget-product card-body bgffffff pb-0">
                        <h2 class="widget-title">Related Products</h2>
                        @foreach($relatedProduct as $rProduct)
                        <div class="widget-content border_bottom_eee">
                            <ul class="products w-100 h-100">
                                <li class="product-item w-100 h-100">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail border-none">
                                            <a href="{{route('single', $rProduct->slug)}}" title="{{$rProduct->title}}">
                                                <figure><img class="border-none" src='@if(file_exists("uploads/products/thumbnails/$rProduct->thumbnail")){{asset("uploads/products/thumbnails/$rProduct->thumbnail")}} @else {{asset("defaults/default-blank-img.jpg")}} @endif' alt="{{$rProduct->thumbnail}}">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('single', $rProduct->slug)}}" class="product-name"><span>{{Str::limit($rProduct->title,30)}}</span></a>
                                            <div class="wrap-price mt-2">
                                                @if(isset($rProduct->sale_price))
                                                <del>
                                                    <p class="product-price mr-2">৳ {{$rProduct->price}}</p>
                                                </del>
                                                <strong class="product-price">৳ {{$rProduct->sale_price}}</strong>
                                                @else
                                                <strong class="product-price">৳ {{$rProduct->price}}</strong>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        @endforeach
                    </div>
                    <div class="widget mercado-widget widget-product card-body bgffffff mt-3 pb-0">
                        <h2 class="widget-title">Popular Products</h2>
                        @foreach($populerProduct as $pProduct)
                        <div class="widget-content border_bottom_eee">
                            <ul class="products">
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail border-none">
                                            <a href="{{route('single', $pProduct->slug)}}" title="{{$pProduct->title}}">
                                                <figure><img class="border-none" src='@if(file_exists("uploads/products/thumbnails/$pProduct->thumbnail")){{asset("uploads/products/thumbnails/$pProduct->thumbnail")}} @else {{asset("defaults/default-blank-img.jpg")}} @endif' alt="{{$pProduct->thumbnail}}">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('single', $pProduct->slug)}}" class="product-name"><span>{{Str::limit($pProduct->title,30)}}</span></a>
                                            <div class="wrap-price mt-2">
                                                @if(isset($pProduct->sale_price))
                                                <del>
                                                    <p class="product-price mr-2">৳ {{$pProduct->price}}</p>
                                                </del>
                                                <strong class="product-price">৳ {{$pProduct->sale_price}}</strong>
                                                @else
                                                <strong class="product-price">৳ {{$pProduct->price}}</strong>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end container-->
</main>
@push('scripts')
<script>
    var x = 1;
    document.getElementById('output-area').innerHTML = x;

    function increment() {
        var a = ++x;
        document.getElementById('output-area').innerHTML = a;
        document.getElementById('input-qtty').value = a;
        document.getElementById('input-buynowqtty').value = a;

    }

    function decrement() {
        if (x > 1) {
            var a = --x;
            document.getElementById('output-area').innerHTML = a;
            document.getElementById('input-qtty').value = a;
            document.getElementById('input-buynowqtty').value = a;
        }
    }

</script>
<script src="{{asset('admin/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('admin/plugins/magnific-popup/lightbox.js')}}"></script>
@endpush
