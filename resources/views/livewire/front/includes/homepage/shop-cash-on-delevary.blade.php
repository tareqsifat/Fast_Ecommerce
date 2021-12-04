@if($datas->count()>0)
<div class="w-100 row m-auto">
    <!-- heading  -->
    <div class="row title_wrape">
        <div class="col-sm-6 col-md-6 col-xs-8">
            <h2 class="text-gray-700 product_heading">Shop Cash On Delivery </h2>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-4 pl-0">
            <h2> <a class="float_right category_product_view_button btn bnt-sm btn-dark font-weight-bold" href="{{route('shops.all')}}">View
                    All</a></h2>
        </div>
    </div>
    <!-- heading end  -->
    <ul class="list-unstyled border_none product-cashon-delevary owl-carousel">
        @foreach($datas as $cashOnItems)
        <li class="branditem_width w-100">
            <div class="wrap-show-advance-info-box style-1 w-100 mb-0">
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="product product-style-2 equal-elem w-100">
                            <div class="product-thumnail">
                                <a href="{{route('shope.single', base64_encode($cashOnItems->id))}}" title="{{$cashOnItems->name}}">
                                    <figure><img src='@if($cashOnItems->profile_photo_path !== NULL) {{asset("uploads/user/profile/$cashOnItems->profile_photo_path")}} @else {{asset("defaults/default-blank-img.jpg")}} @endif' width="100" height="200" alt="{{$cashOnItems->name}}">
                                    </figure>
                                </a>
                            </div>
                            <div class="product-info h-50px">
                                <h5 class="font-weight600 text-aligh-center mt-5 mb-5"> {{Str::of($cashOnItems->name)->words(2, '')}}</h5>
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