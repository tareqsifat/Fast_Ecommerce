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










<div class="w-100 m-auto">
    <div class="text-align-center ajax_cart_parent">
        <?php if (!empty($pdata->sale_price)) {
            $price = str_replace(',', '', $pdata->sale_price);
        } else {
            $price = str_replace(',', '', $pdata->price);
        } ?>
        <input class="product_id" type="hidden" name="product_id" value="{{$pdata->id}}">
        <input class="title" type="hidden" name="title" value="{{$pdata->title}}">
        <input class="price" type="hidden" name="price" value="{{$price}}">
        <input class="isshipping" type="hidden" name="price" value="{{!is_null($pdata->impacode)?'isshipping':null}}">
        @if(!is_null($pdata->impacode))
        <span style="color:{{$product_styles->card_button_text_color}}; background: {{$product_styles->card_button_background}} !important; border-color: {{$product_styles->card_button_border}} !important; transition: {{$product_styles->card_button_transition}}s; font-style: {{$product_styles->card_button_font_style}} !important; font-weight: {{$product_styles->card_button_font_weight}};" onMouseOver='this.style.background="{{$product_styles->card_button_hover_background}}", this.style.color="{{$product_styles->card_button_text_hover_color}}", this.style.borderColor="{{$product_styles->card_button_hover_border}}", this.style.fontStyle="{{$product_styles->card_button_hover_font_style}}", this.style.fontWeight="{{$product_styles->card_button_hover_font_weight}}"' onMouseOut='this.style.background="{{$product_styles->card_button_background}}", this.style.color="{{$product_styles->card_button_text_color}}", this.style.borderColor="{{$product_styles->card_button_border}}", this.style.transition="{{$product_styles->card_button_transition}}s", this.style.fontStyle="{{$product_styles->card_button_font_style}}", this.style.fontWeight="{{$product_styles->card_button_font_weight}}"' class="btn px-5 add_to_cart_ajax">{{$product_styles->card_text}}</span>
        @else
        <span style="color:{{$product_styles->card_button_text_color}}; background: {{$product_styles->card_button_background}} !important; border-color: {{$product_styles->card_button_border}} !important; transition: {{$product_styles->card_button_transition}}s; font-style: {{$product_styles->card_button_font_style}} !important; font-weight: {{$product_styles->card_button_font_weight}};" onMouseOver='this.style.background="{{$product_styles->card_button_hover_background}}", this.style.color="{{$product_styles->card_button_text_hover_color}}", this.style.borderColor="{{$product_styles->card_button_hover_border}}", this.style.fontStyle="{{$product_styles->card_button_hover_font_style}}", this.style.fontWeight="{{$product_styles->card_button_hover_font_weight}}"' onMouseOut='this.style.background="{{$product_styles->card_button_background}}", this.style.color="{{$product_styles->card_button_text_color}}", this.style.borderColor="{{$product_styles->card_button_border}}", this.style.transition="{{$product_styles->card_button_transition}}s", this.style.fontStyle="{{$product_styles->card_button_font_style}}", this.style.fontWeight="{{$product_styles->card_button_font_weight}}"' class="btn px-5 add_to_cart_ajax">{{$product_styles->card_text}}
        </span>
        @endif
    </div>
    <div class="text-align-center">
        <?php
        $wishData = $wishItem->contains($pdata->id);
        $dbCheckData = DB::table('wishlists')->where('product_id', '$pdata->id')->first();
        if ($dbCheckData) {
            $chkIdDataexists = $dbCheckData->product_id;
        } else {
            $chkIdDataexists = null;
        }
        ?>
        <span id="{{$rDiv}}" class="btn px-5 mt-2 wishlist_item" wire:click.prevent='addToWishlist({{$pdata->id}},"{{$pdata->title}}", {{$price}})'>
            <i class="fa fa-plus-square"></i> Add to wislist
        </span>
    </div>
</div>









<div class="w-100 m-auto">
    <div class="text-align-center ajax_cart_parent">
        <?php if (!empty($pdata->sale_price)) {
            $price = str_replace(',', '', $pdata->sale_price);
        } else {
            $price = str_replace(',', '', $pdata->price);
        } ?>
        <input class="product_id" type="hidden" name="product_id" value="{{$pdata->id}}">
        <input class="title" type="hidden" name="title" value="{{$pdata->title}}">
        <input class="price" type="hidden" name="price" value="{{$price}}">
        <input class="isshipping" type="hidden" name="price" value="{{!is_null($pdata->impacode)?'isshipping':null}}">
        @if(!is_null($pdata->impacode))
        <span wire:click.prevent='addToShipping( {{$pdata->id}}, "{{$pdata->title}}", {{$price}} )' style="color:{{$product_styles->card_button_text_color}}; background: {{$product_styles->card_button_background}} !important; border-color: {{$product_styles->card_button_border}} !important; transition: {{$product_styles->card_button_transition}}s; font-style: {{$product_styles->card_button_font_style}} !important; font-weight: {{$product_styles->card_button_font_weight}};" onMouseOver='this.style.background="{{$product_styles->card_button_hover_background}}", this.style.color="{{$product_styles->card_button_text_hover_color}}", this.style.borderColor="{{$product_styles->card_button_hover_border}}", this.style.fontStyle="{{$product_styles->card_button_hover_font_style}}", this.style.fontWeight="{{$product_styles->card_button_hover_font_weight}}"' onMouseOut='this.style.background="{{$product_styles->card_button_background}}", this.style.color="{{$product_styles->card_button_text_color}}", this.style.borderColor="{{$product_styles->card_button_border}}", this.style.transition="{{$product_styles->card_button_transition}}s", this.style.fontStyle="{{$product_styles->card_button_font_style}}", this.style.fontWeight="{{$product_styles->card_button_font_weight}}"' class="btn px-5">{{$product_styles->card_text}}</span>
        @else
        <span style="color:{{$product_styles->card_button_text_color}}; background: {{$product_styles->card_button_background}} !important; border-color: {{$product_styles->card_button_border}} !important; transition: {{$product_styles->card_button_transition}}s; font-style: {{$product_styles->card_button_font_style}} !important; font-weight: {{$product_styles->card_button_font_weight}};" onMouseOver='this.style.background="{{$product_styles->card_button_hover_background}}", this.style.color="{{$product_styles->card_button_text_hover_color}}", this.style.borderColor="{{$product_styles->card_button_hover_border}}", this.style.fontStyle="{{$product_styles->card_button_hover_font_style}}", this.style.fontWeight="{{$product_styles->card_button_hover_font_weight}}"' onMouseOut='this.style.background="{{$product_styles->card_button_background}}", this.style.color="{{$product_styles->card_button_text_color}}", this.style.borderColor="{{$product_styles->card_button_border}}", this.style.transition="{{$product_styles->card_button_transition}}s", this.style.fontStyle="{{$product_styles->card_button_font_style}}", this.style.fontWeight="{{$product_styles->card_button_font_weight}}"' class="btn px-5 add_to_cart_ajax">{{$product_styles->card_text}}
        </span>
        @endif
    </div>
    <div class="text-align-center">
        <?php
        $wishData = $wishItem->contains($pdata->id);
        $dbCheckData = DB::table('wishlists')->where('product_id', '$pdata->id')->first();
        if ($dbCheckData) {
            $chkIdDataexists = $dbCheckData->product_id;
        } else {
            $chkIdDataexists = null;
        }
        ?>
        <span id="{{$rDiv}}" class="btn px-5 mt-2 wishlist_item" wire:click.prevent='addToWishlist({{$pdata->id}},"{{$pdata->title}}", {{$price}})'>
            <i class="fa fa-plus-square"></i> Add to wislist
        </span>
    </div>
</div>



@push('scripts')
<script>
    document.addEventListener("livewire:load", function(event) {
        $(document).ready(function() {
            $('.add_to_cart_ajax').click(function(e) {
                e.preventDefault();
                var product_id = $(this).parents('.ajax_cart_parent').find('.product_id').val();
                var title = $(this).parents('.ajax_cart_parent').find('.title').val();
                var price = $(this).parents('.ajax_cart_parent').find('.price').val();
                var price = $(this).parents('.ajax_cart_parent').find('.isshipping').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                var data = {
                    'product_id': product_id,
                    'title': title,
                    'price': price,
                }
                $.ajax({
                    url: '/ajax-add-to-cart',
                    type: 'POST',
                    data: data,
                    success: function(res) {
                        alert(res.isshipping);
                        $('.totalCart').html(res.total);
                        $('.ajax_totalqtty').html(res.totalqtty);
                    }
                });


            });
        });
    });
</script>
@endpush