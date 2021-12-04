<div class="w-100 m-auto">
    <div class="text-align-center">
        <?php if (!empty($pdata->sale_price)) {
            $price = str_replace(',', '', $pdata->sale_price);
        } else {
            $price = str_replace(',', '', $pdata->price);
        } ?>
        @if(!is_null($pdata->impacode))
        <span wire:click.prevent='addToShipping( {{$pdata->id}}, "{{$pdata->title}}", {{$price}} )' style="color:{{$product_styles->card_button_text_color}}; background: {{$product_styles->card_button_background}} !important; border-color: {{$product_styles->card_button_border}} !important; transition: {{$product_styles->card_button_transition}}s; font-style: {{$product_styles->card_button_font_style}} !important; font-weight: {{$product_styles->card_button_font_weight}};" onMouseOver='this.style.background="{{$product_styles->card_button_hover_background}}", this.style.color="{{$product_styles->card_button_text_hover_color}}", this.style.borderColor="{{$product_styles->card_button_hover_border}}", this.style.fontStyle="{{$product_styles->card_button_hover_font_style}}", this.style.fontWeight="{{$product_styles->card_button_hover_font_weight}}"' onMouseOut='this.style.background="{{$product_styles->card_button_background}}", this.style.color="{{$product_styles->card_button_text_color}}", this.style.borderColor="{{$product_styles->card_button_border}}", this.style.transition="{{$product_styles->card_button_transition}}s", this.style.fontStyle="{{$product_styles->card_button_font_style}}", this.style.fontWeight="{{$product_styles->card_button_font_weight}}"' class="btn px-5">{{$product_styles->card_text}}</span>
        @else
        <span wire:click.prevent='addToCart( {{$pdata->id}}, "{{$pdata->title}}", {{$price}} )' style="color:{{$product_styles->card_button_text_color}}; background: {{$product_styles->card_button_background}} !important; border-color: {{$product_styles->card_button_border}} !important; transition: {{$product_styles->card_button_transition}}s; font-style: {{$product_styles->card_button_font_style}} !important; font-weight: {{$product_styles->card_button_font_weight}};" onMouseOver='this.style.background="{{$product_styles->card_button_hover_background}}", this.style.color="{{$product_styles->card_button_text_hover_color}}", this.style.borderColor="{{$product_styles->card_button_hover_border}}", this.style.fontStyle="{{$product_styles->card_button_hover_font_style}}", this.style.fontWeight="{{$product_styles->card_button_hover_font_weight}}"' onMouseOut='this.style.background="{{$product_styles->card_button_background}}", this.style.color="{{$product_styles->card_button_text_color}}", this.style.borderColor="{{$product_styles->card_button_border}}", this.style.transition="{{$product_styles->card_button_transition}}s", this.style.fontStyle="{{$product_styles->card_button_font_style}}", this.style.fontWeight="{{$product_styles->card_button_font_weight}}"' class="btn px-5">{{$product_styles->card_text}}</span>
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