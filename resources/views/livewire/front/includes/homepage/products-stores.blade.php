@if($datas->count()>0)
<div class="w-100 row m-auto py-5">
    <div class="row mt-5 m-auto">
        <!-- heading  -->
        <div class="row title_wrape px-2 m-auto">
            <div class="col-sm-6 col-md-6 col-xs-8 px-0">
                <h2 class="title_box font-weight-bold">Shop By Store</h2>
            </div>
        </div>
        <ul class="list-unstyled border_none style-nav-1">
            @foreach($datas as $items)
            <li class="branditem_width">
                <div class="wrap-show-advance-info-box style-1 w-100 mb-0">
                    <div class="wrap-products">
                        <div class="wrap-product-tab tab-style-1">
                            <div class="product product-style-2 equal-elem w-100">
                                <div class="product-thumnail">
                                    <a href="{{route('shope.single', base64_encode($items->id))}}" title="{{$items->name}}">
                                        <figure><img src='@if($items->profile_photo_path !== NULL) {{asset("uploads/user/profile/$items->profile_photo_path")}} @else {{asset("defaults/default-blank-img.jpg")}} @endif' width="100" height="200" alt="{{$items->name}}">
                                        </figure>
                                    </a>
                                </div>
                                <div class="product-info h-50px">
                                    <h5 class="font-weight600 text-aligh-center mt-5 mb-5">{{Str::of($items->name)->words(2, '')}}</h5>
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
                            <div class="product product-style-2 equal-elem w-100">
                                <div class="product-thumnail">
                                    <h5 class="mt-5 font-weight600">View all Brands <br>
                                        Available in <br> First Deals</h5>
                                </div>
                                <div class="product-info pb-2">
                                    <a href="{{route('shops.all')}}" class="btn btn-sm text-aligh-center mt-5 mb-5 font-weight-bold all_view_btn" style="color:{{$product_styles->card_button_text_color}};background: {{$product_styles->card_button_background}} !important; border-color: {{$product_styles->card_button_border}} !important; transition: {{$product_styles->card_button_transition}}; font-style: {{$product_styles->card_button_font_style}} !important; font-weight: {{$product_styles->card_button_font_weight}};" onMouseOver='this.style.background="{{$product_styles->card_button_hover_background}}", this.style.color="{{$product_styles->card_button_text_hover_color}}", this.style.border="{{$product_styles->card_button_hover_border}}", this.style.fontStyle="{{$product_styles->card_button_hover_font_style}}", this.style.fontWeight="{{$product_styles->card_button_hover_font_weight}}"' onMouseOut='this.style.background="{{$product_styles->card_button_background}}", this.style.color="{{$product_styles->card_button_text_color}}", this.style.border="{{$product_styles->card_button_border}}", this.style.transition="{{$product_styles->card_button_transition}}", this.style.fontStyle="{{$product_styles->card_button_font_style}}", this.style.fontWeight="{{$product_styles->card_button_font_weight}}"'>View All <i class="fa fa-arrow-right ml-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
@endif