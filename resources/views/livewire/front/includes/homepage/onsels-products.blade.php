<section class="mt-2">
    <div class="onsell_section w-100 row m-auto mt-3">
        @if($datas->count() > 0 && !empty($settings->onsellTime && $settings->onsellTime > Carbon\Carbon::now() ))
        <div class="row m-auto mt-5 w-100">
            <!-- heading  -->
            <div class="row title_wrape m-auto my-2 w-100 py-2 pl-2 d-flex">
                <!-- <div class="col-sm-10 col-md-8 col-xsm-10 col-lg-10 px-0">
                    <div class="text-gray-700 product_heading">Special Offers
                        <div class="wrap-show-advance-info-box">
                            <div class="wrap-countdown mercado-countdown" data-expire="{{Carbon\Carbon::parse($settings->onsellTime)->format('Y/m/d h:m:s')}}"></div>
                        </div>
                    </div>
                </div> -->
                <div class="col-sm-10 col-md-8 col-xsm-10 col-lg-10 px-0"></div>
                <div class="col-sm-2 col-md-4 col-xsm-2 col-lg-2 px-0">
                    <a class="category_product_view_button float_right font-size-14 btn bnt-sm btn-dark font-weight-bold" href="{{route('onsell')}}">View
                        All</a>
                </div>
            </div>
            <!-- heading end  -->
            <ul class="list-unstyled border_none product-carousel owl-carousel style-nav-1 equal-container owl-loaded owl-drag border_none mb-0 onsell-carosel">
                @php $wishItem = Cart::instance('wishlist')->content()->pluck('id') @endphp
                @foreach($datas as $nData)
                <li class="item_width slider_item onsell_item">
                    <div class="wrap-show-advance-info-box style-1 w-100">
                        <div class="wrap-products pt-0">
                            <div class="wrap-product-tab tab-style-1 bgffffff" style="height: 375px;">
                                <div class="product product-style-2 equal-elem w-100">
                                    <div class="product-thumnail card-item-product-image">
                                        <a href="{{route('single',$nData->slug)}}" title="{{$nData->title}}">
                                            <figure><img src='@if(file_exists("uploads/products/thumbnails/$nData->thumbnail")){{asset("uploads/products/thumbnails/$nData->thumbnail")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif' width="150" height="150" alt="{{$nData->title}}">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            @if(date_diff(Illuminate\Support\Carbon::now(), $nData->created_at)->format("%d days, %i munuts") < '1 days, 0 minuts' ) <span class="flash-item new-label">new</span>Illuminate\Support\Carbon::now() @endif
                                        </div>
                                        @if($nData->sold)
                                        <div class="group-flash-cpy float-right">
                                            <span class="flash-item new-label-copy">Sold {{$nData->sold}}</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="product-info px-2">
                                        <h2 title="{{$nData->title}}" class="product-title product_title_style1"><a href="{{route('single',$nData->slug)}}">{{Str::limit($nData->title,40)}}</a></h2>
                                        <div class="w-100 m-auto py-2">
                                            <div class="wrap-price pt-3">
                                                <strong class="product-price font-size-18 color_green">৳ {{$nData->sale_price}}</strong>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="product-info px-2 my-2">
                                        <div class="wrap-price text-justify">
                                            @livewire('front.includes.cart.add-to-cart-and-w-ishlist', ['pdata' => $nData,'wishItem'=>$wishItem])
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
        @endif
    </div>
</section>