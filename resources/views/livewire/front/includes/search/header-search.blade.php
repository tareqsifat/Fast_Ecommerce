<div class="wrap-search center-section">
    <div class="position-relative wrap-search-form">
        <form id="form-search-top" wire:submit.prevent="search" name="form-search-top">
            <input type="search" wire:model="query" name="search" value="" placeholder="Search here...">
            <button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        @if(!empty($query))
        <div class="search-dropdown card position-absolute">
            <div class="card-header">
                <ul class="list-unstyled d-flex">
                    <li><span wire:click="productCA" class="btn btn-sm mr-2 font-size-15 font-weight600 color000 {{($activeColor=='product'?'dropdown_active_item':'')}}"> Products </span></li>
                    <li><span wire:click="brandCA" class="btn btn-sm mr-2 font-size-15 font-weight600 color000  {{($activeColor=='brand'?'dropdown_active_item':'')}}"> Brands </span></li>
                    <li><span wire:click="shopCA" class="btn btn-sm mr-2 font-size-15 font-weight600 color000 {{($activeColor=='shop'?'dropdown_active_item':'')}}"> Shops </span></li>
                </ul>
            </div>
            <div class="card-body p-0 bgffffff">
                @if(!empty($product) || !empty($brand) || !empty($shops))
                @foreach($product as $pItem)
                <div class="py-2 border_bottom_eee search_dropdown_item">
                    <a class="font-size-14 color000" href="{{route('single', $pItem['slug'])}}">
                        <img class="px-2" width="50px" src='@if(file_exists(("uploads/products/thumbnails/")."/".$pItem["thumbnail"])){{asset("uploads/products/thumbnails/")."/".$pItem["thumbnail"]}} @else {{asset("defaults/default-blank-img.jpg")}} @endif' alt='{{$pItem["thumbnail"]}}'>{{$pItem['title']}}
                    </a>
                </div>
                @endforeach
                @foreach($brand as $bItem)
                <div class="py-2 border_bottom_eee search_dropdown_item">
                    <a class="font-size-14 color000" href="{{route('brand.single', $bItem['slug'])}}">
                        <img class="px-2" width="50px" src='@if(file_exists(("uploads/brands/")."/".$bItem["brand_logo"])) {{asset("uploads/brands/")."/".$bItem["brand_logo"]}} @else {{asset("defaults/default-blank-img.jpg")}} @endif' alt="{{$bItem['brand_logo']}}">{{$bItem['name']}}</a>
                </div>
                @endforeach
                @foreach($shops as $shopItem)
                <div class="py-2 border_bottom_eee search_dropdown_item">
                    <a class="font-size-14 color000" href="{{route('shope.single', base64_encode($shopItem['id']))}}" title="{{$shopItem['name']}}">
                        <img class="px-2" width="50px" @if($shopItem["profile_photo_path"] !==NULL) src="{{asset('uploads/user/profile'.'/'.$shopItem['profile_photo_path'])}}" @else src=' {{asset("defaults/default-blank-img.jpg")}}' @endif alt="{{$shopItem['profile_photo_path']}}">{{$shopItem['name']}}</a>
                </div>
                @endforeach
                @else
                <div class="py-2 border_bottom_eee search_dropdown_item">
                    <i class="ml-3">Not found</i>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>