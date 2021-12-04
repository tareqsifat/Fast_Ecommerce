<div class="w-100 row m-auto">
    @if($datas->count()>0)
    @foreach($datas as $nedata)
    <div class="row mt-5 pb-3 m-auto">
        <!-- heading  -->
        <div class="row title_wrape px-2 m-auto">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-8 px-0">
                <h2 class="text-gray-700 product_heading">{{$nedata->name}}</h2>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-4 px-0 mt-4">
                <a class="float_right category_product_view_button btn bnt-sm btn-dark font-weight-bold" href="{{route('parent-category.single', $nedata->slug)}}">View
                    All</a>
            </div>
        </div>
        <ul class="list-unstyled">
            @php $wishItem = Cart::instance('wishlist')->content()->pluck('id') @endphp
            @foreach($nedata->product->slice(0, 12) as $pOnCat)
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
    @endforeach
    @endif
</div>