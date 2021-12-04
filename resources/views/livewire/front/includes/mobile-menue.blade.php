<div class="w-100 bgf5 mobile-wraper-content visibility-hidden" wire:ignore.self>
    <div class="mobile-profile-wraper bgf5 border-f5f5" wire:ignore.self>
        <div class="row">
            <div class="col-sm-12 col-xsm-12">
                <button class="border_left border_bottom_eee float-right cartdismissabel border_none bgffffff" type="button"><span class="font-size-30 font-weight-bold" aria-hidden="true">&times;</span></button>
            </div>
        </div>
        <ul class="list-category mt-2 nav primary cart-scroll" style="overflow-y: scroll; height:80%; overflow-x: hidden;">
            @foreach($datas as $catItem)
            <li class="cat_item_sub_main has-child-cate p-3 position-relative">
                <div class="row border_bottom_eee bg_white">
                    <div class="col-md-10 col-sm-10 col-xs-10 col-xsm-10 pr-0 ">
                        <a href="{{route('parent-category.single', $catItem->slug)}}" class="cate-link text_dark font-size-16">{{ucfirst($catItem->name)}} @if($catItem->subcategories->count() > 0) <span class="text-info">({{$catItem->subcategories->count()}})</span> @endif</a>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2 col-xsm-2">
                        <span class="font-size-18 float-right"><i class="fa fa-angle-down"></i></span>
                    </div>
                </div>
                <ul class="cat_item_sub_sub">
                    @foreach($catItem->subcategories as $subItem)
                    <li class="has-child-cate p-3 bg_white position-relative">
                        <div class="row">
                            <div class="col-md-10 col-sm-10 col-xs-10 col-xsm-10 pr-0">
                                <a href="{{route('category.single', [$catItem->slug, $subItem->slug] )}}" class="cate-link text_dark">{{ucfirst($subItem->name)}} </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2 col-xsm-2 p-0">
                                <span class="font-size-10"> @if($subItem->product->count() > 0) <span class="text-info">({{$subItem->product->count()}})</span> @endif</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
        <!--end main content area-->
    </div>
    <!-- <div class="content_bg_opacity"></div> -->
</div>
@push('scripts')
<script>
    $('.cartdismissabel').click(function() {
        $(".mobile-wraper-content").hide()
    });
    $('.mobile-menue-control').click(function() {
        $(".mobile-wraper-content").show()
        $(".mobile-wraper-content").removeClass("visibility-hidden");
    });
</script>
@endpush