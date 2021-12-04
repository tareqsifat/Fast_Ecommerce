<div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 p-xsm-0 pl-0">
    <div class="widget mercado-widget categories-widget">
        <div class="widget-content display_none d-none d-md-none d-lg-block">
            <ul class="list-category mt-2 nav primary clone-main-menu" id="category" data-menuname="Category">
                @foreach($datas as $catItem)
                <li class="category-item has-child-cate border_bottom_eee p-0 bg_white position-relative categorymain-item">
                    <a href="{{route('parent-category.single', $catItem->slug)}}">
                        <div class="row">
                            <div class="col-md-10 col-sm-10 col-xs-10 col-xsm-10 pr-0">
                                <span class="cate-link">{{ucfirst(Str::limit($catItem->name, 30))}} @if($catItem->product->count() > 0) <span class="text-info">({{$catItem->product->count()}})</span> @endif</span>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2 col-xsm-2 pr-0">
                                <span class="font-size-18 float-right"><i class="fa fa-angle-right"></i></span>
                            </div>
                        </div>
                        <ul class="sub-menue">
                            @foreach($catItem->subcategories as $subItem)
                            <a href="{{route('category.single', [$catItem->slug,$subItem->slug])}}">
                                <li class="category-item has-child-cate border_bottom_eee p-3 bg_white position-relative category_subItem">
                                    <div class="row">
                                        <div class="col-md-10 col-sm-10 col-xs-10 col-xsm-10 pr-0">
                                            <span class="cate-link">{{ucfirst($subItem->name)}} </span>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-2 col-xsm-2 p-0">
                                            <span class="font-size-10">@if($subItem->product->count() > 0) <span class="text-info">({{$subItem->product->count()}})</span> @endif </span>
                                        </div>
                                        <ul class="child_category_menue">
                                            <?php $childItems = DB::table('sub_sub_categories')->where('subcategory_id', $subItem->id)->get(); ?>
                                            @foreach($childItems as $childItem)
                                            <li class="category-item has-child-cate border_bottom_eee p-3 bg_white position-relative category_child_item">
                                                <a href="{{route('childcategory.single', [$catItem->slug, $subItem->slug, $childItem->slug])}}">
                                                    <span class="cate-link">{{ucfirst($childItem->name)}} </span>
                                                    <ul class="baby_category_menue">
                                                        <?php $babycategory = DB::table('baby_categories')->where('sub_sub_category_id', $childItem->id)->get(); ?>
                                                        @foreach($babycategory as $babyItem)
                                                        <a href="{{route('baby_category.single', [$catItem->slug, $subItem->slug,$childItem->slug, $babyItem->slug])}}">
                                                            <li class="category-item has-child-cate border_bottom_eee p-3 bg_white position-relative">
                                                                <span class="cate-link">{{ucfirst($babyItem->name)}} </span>
                                                            </li>
                                                        </a>
                                                        @endforeach
                                                    </ul>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            </a>
                            @endforeach
                        </ul>
                    </a>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>