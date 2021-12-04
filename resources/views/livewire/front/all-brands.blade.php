<main id="main" class="main-site">
    @section('title')
    {{'Brands'}}
    @endsection
    <!--main area-->
    <div class="container mb-5">
        <div class="wrap-breadcrumb">
            <ul class="my-4">
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span class="text_success">Brands</span></li>
            </ul>
        </div>
        <div class="w-100 row m-auto">
            @if($datas->count()>0)
            <!-- heading  -->
            <div class="row title_wrape px-2 my-2">
                <div class="col-sm-6 col-md-6 col-xs-8">
                    <h2 class="title_box font-weight-bold">Shop By Brands </h2>
                </div>
            </div>
            <!-- heading end  -->
            <ul class="list-unstyled border_none style-nav-1">
                @foreach($datas as $nData)
                <li class="branditem_width">
                    <div class="wrap-show-advance-info-box style-1 w-100 mb-0 ">
                        <div class="wrap-products">
                            <div class="wrap-product-tab tab-style-1">
                                <div class="product product-style-2 equal-elem w-100 height170px">
                                    <div class="product-thumnail brand-product-thumnail">
                                        <a href="{{route('brand.single', $nData->slug)}}" title="{{$nData->name}}">
                                            <figure><img style="height: 100px;" src='@if($nData->brand_logo !== NULL) {{asset("uploads/brands/$nData->brand_logo")}} @else {{asset("defaults/default-blank-img.jpg")}} @endif' width="100" height="200" alt="{{$nData->brand_logo}}">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="font-weight600 text-aligh-center mt-5 mb-5"><a class="text-uppercase text_dark" href="{{route('brand.single',$nData->slug)}}">{{Str::of($nData->name)->words(2, '')}}</a> </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
            <div class="row title_wrape px-2 m-auto my-5 py-4">
                <div class="col-sm-12 col-lg-12 w-100 m-auto my-5 py-5">
                    <h2 class="text-align-center"><i>Product Not Found</i></h2>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!--end container-->
    <!--main area-->
</main>