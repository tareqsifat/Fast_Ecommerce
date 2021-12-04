<div class="row w-100 m-auto">
    <div class="mt-2 mb-4">
        <p class="text-align-center bgf3 loader">
            <img class="" src='{{asset("defaults/lazyloader.gif")}}' alt="">
        </p>
        @foreach($category as $bannerItem)
        <div class="my-3">
            <a href="{{route('parent-category.single',$bannerItem->slug)}}" class="link-banner banner-effect-1">
                <figure class="display_block">
                    <img style="width: 100%;" src='@if($bannerItem->image) @if(file_exists("uploads/category/$bannerItem->image")){{asset("uploads/category/$bannerItem->image")}} @else {{asset("defaults/slider.jpg")}}  @endif  @else {{asset("defaults/slider.jpg")}} @endif' alt="{{$bannerItem->image}}">
                </figure>
            </a>
            <p class="text-align-center bgf3 loader">
                <img class="" src='{{asset("defaults/lazyloader.gif")}}' alt="">
            </p>
            <ul class="bgffffff wrap-banner style-twin-default home-category-carousel d-none owl-carousel">
                @foreach($bannerItem->subcategories as $subCatItem)
                <li class="category_banner_content" title="{{$subCatItem->name}}">
                    <a href="{{route('category.single', [$bannerItem->slug, $subCatItem->slug])}}">
                        <div class="">
                            <p class="text-align-center mt-5"><span class="category_banner_link text_dark">{{ucfirst(Str::limit($subCatItem->name,20))}}</span></p>
                            <img class="h-w-150" src='@if($subCatItem->image) @if(file_exists("uploads/category/$subCatItem->image")){{asset("uploads/category/$subCatItem->image")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif  @else {{asset("defaults/default-blank-img.jpg")}} @endif' alt="{{$subCatItem->image}}">
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="row m-0">
                <ul class="list-unstyled">
                    @php $wishItem = Cart::instance('wishlist')->content()->pluck('id') @endphp
                    @foreach($bannerItem->product->slice(0, 6) as $pOnCat)
                    @if($pOnCat->product_for !== 'shipping')
                    <li class="item_width list_child">
                        <div class="wrap-show-advance-info-box style-1 w-100">
                            <div class="wrap-products">
                                <div class="wrap-product-tab tab-style-1 mt-2">
                                    <div class="product product-style-2 equal-elem w-100" style="height: 385px;">
                                        <div class="product-thumnail card-item-product-image">
                                            <a href="{{route('single',$pOnCat->slug)}}" title="{{$pOnCat->title}}">
                                                <figure><img src='@if(file_exists("uploads/products/thumbnails/$pOnCat->thumbnail")){{asset("uploads/products/thumbnails/$pOnCat->thumbnail")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif' width="150" height="150" alt="{{$pOnCat->title}}">
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                @if(date_diff(Illuminate\Support\Carbon::now(), $pOnCat->created_at)->format("%d days, %i munuts") < '1 days, 0 minuts' ) <span class="flash-item new-label">new</span>Illuminate\Support\Carbon::now() @endif
                                            </div>
                                            @if($pOnCat->sold)
                                            <div class="group-flash-cpy float-right">
                                                <span class="flash-item new-label-copy">Sold {{$pOnCat->sold}}</span>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="product-info px-2">
                                            <h2 title="{{$pOnCat->title}}" class="product-title product_title_style2"><a href="{{route('single',$pOnCat->slug)}}">{{Str::limit($pOnCat->title,40)}} </a></h2>
                                            <div class="w-100 m-auto pt-5">
                                                <div class="wrap-price pt-2">
                                                    @if(!empty($pOnCat->sale_price))
                                                    <del>
                                                        <p class="product-price  font-size-18 mr-2">৳ {{$pOnCat->price}}</p>
                                                    </del>
                                                    <strong class="product-price font-size-18 ">৳ {{$pOnCat->sale_price}}</strong>
                                                    @else
                                                    <strong class="product-price font-size-18 ">
                                                        ৳ {{$pOnCat->price}}</strong>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info px-2 my-2">
                                            <div class="wrap-price text-justify">
                                                @livewire('front.includes.cart.add-to-cart-and-w-ishlist', ['pdata' => $pOnCat,'wishItem'=>$wishItem])
                                            </div>
                                            @if($pOnCat->sold)
                                            <div class="group-flash-cpy float-right">
                                                <span class="flash-item new-label-copy">Sold {{$pOnCat->sold}}</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
    </div>

</div>