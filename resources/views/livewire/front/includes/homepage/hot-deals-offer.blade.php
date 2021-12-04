<div class="w-100 row m-auto">
    @if($datas->count()>0)
    <!-- heading  -->
    <div class="row title_wrape">
        <div class="col-sm-6 col-md-6 col-xs-8">
            <h2 class="text-gray-700 product_heading">Hot Deals </h2>
        </div>
    </div>
    <!-- heading end  -->
    <ul class="list-unstyled style-nav-1 product-hot-deals owl-carousel">
        @foreach($datas as $nData)
        @if(Carbon\Carbon::parse($nData->offer_time)->format('Y/m/d h:m:s') > Carbon\Carbon::now()->format('Y/m/d h:m:s'))
        <li class="">
            <div class="card border-f5f m-1">
                <div class="card-header bg_white p-2">
                    <div class="border_bottom_f5f5 px-2">
                        <div class="row py-3 d-flex">
                            <div class="col-sm-8 col-md-8 col-lg-8 col-xsm-8">Deals of the Shop</div>
                            <div class="col-sm-4 col-md-4 col-lg-4 cpol-xsm-4">
                                <div class="float-right"><i style="color: #ff6d00;" class="fas fa-fire font-size-20"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body bg_white">
                    <div class="border_bottom_f5f5">
                        <img src='@if(isset($nData->thumbnail)) {{asset("uploads/products/thumbnails/$nData->thumbnail")}} @else {{asset("defaults/default-blank-img.jpg")}} @endif' width="100%" height="100%" alt="{{$nData->name}}">
                    </div>
                    <div class="pt-3">
                        <p class="text-align-center"><a href="{{route('single',$nData->slug)}}">{{Str::limit($nData->title,18)}}</a></p>
                        <h6 class="text-align-center">{{($nData->availability == 0)?'In stock':'Out of stoke'}} </h6>
                    </div>
                    <div class="d-flex row mx-2 py-3 border_bottom_f5f5">
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xsm-4">
                            <?php
                            $count = 0;
                            $reviews = DB::table('productreviews')->where('product_id', $nData->id)->get();
                            ?>
                            @foreach($reviews as $treviews)
                            <?php $count += $treviews->review ?>
                            @endforeach
                            <div class="product-rating text-right float-right">
                                @if($count > 0) <i class="fa fa-star @if($count/$reviews->count() >= 1 ) {{'text_warning'}} @endif" aria-hidden="true"></i> @endif
                                @if($count > 0) <i class="fa fa-star @if($count/$reviews->count() >= 2 ) {{'text_warning'}} @endif" aria-hidden="true"></i> @endif
                                @if($count > 0) <i class="fa fa-star @if($count/$reviews->count() >= 3 ) {{'text_warning'}} @endif" aria-hidden="true"></i> @endif
                                @if($count > 0) <i class="fa fa-star @if($count/$reviews->count() >= 4 ) {{'text_warning'}} @endif" aria-hidden="true"></i> @endif
                                @if($count > 0) <i class="fa fa-star @if($count/$reviews->count() >= 5 ) {{'text_warning'}} @endif" aria-hidden="true"></i> @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 px-4 py-2  tex-align-center">
                        <div class="mb-2 ml-5 pl-5">
                            @if(!empty($nData->sale_price))
                            <del class="ml-5 mr-2 float-left color_danger">৳ {{$nData->sale_price}}</del>
                            <p class="float-left ">৳ {{$nData->price}}</p>
                            @else
                            <p class="text-align-center">৳ {{$nData->price}}</p>
                            @endif
                        </div>
                        <br>
                        <h5 class="text-align-center">Don't Miss, Deal Expires in</h5>
                        <?php if (!empty($nData->sale_price)) {
                            $price = $nData->sale_price;
                        } else {
                            $price = $nData->price;
                        } ?>
                        <div class="wrap-countdown mercado-hote-deals-countdown" data-expire="{{Carbon\Carbon::parse($nData->offer_time)->format('Y/m/d h:m:s')}}"></div>
                        <div wire:click.prevent='buyNow({{$nData->id}}, "{{$nData->title}}", {{$price}})' class="hot-deals-buynow-btn">Buy Now</div>
                    </div>
                </div>
            </div>
        </li>
        @endif
        @endforeach
    </ul>
    @endif
</div>