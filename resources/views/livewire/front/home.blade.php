<div class="container overflow_hidden p-0">
    @section('title')
    {{'Fast Deals'}}
    @endsection
    <!--MAIN SLIDE-->
    <div class="w-100 row m-auto">
        @livewire('front.includes.homepage.categorys-menue')
        <div class="col-lg-9 col-sm-12 col-md-9 col-xs-12 p-0 pr-0">
            <!-- main slider  -->
            @livewire('front.includes.homeslider')
            <!--BANNER-->
        </div>
    </div>
    <div class="w-100 row m-auto">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 p-0 mt-3 pr-0">
            @livewire('front.includes.home-baner')
        </div>
    </div>
    <!-- slider end  -->
    <!-- headline start -->
    @livewire('front.includes.homepage.marquee-headline')
    <!-- headline end -->
    <!-- on sells Product -->
    @livewire('front.includes.homepage.hot-deals-offer')

    <!-- banner By Category start  -->
    @livewire('front.includes.homepage.banner-by-category')
    <!-- banner By Category end  -->
    <!-- on sells Product -->
    @livewire('front.includes.homepage.onsels-products')
    <!-- on sells product end  -->

    <!-- express end -->
    <!-- shop-cash-on-delevary -->
    <!-- livewire('front.includes.homepage.shop-cash-on-delevary') -->
    <!-- shop-cash-on-delevaryend -->

    <!--Shop By Brands-->
    <!-- livewire('front.includes.homepage.brands-products') -->
    <!--Shop By Brands end-->

    <!--Shop By store -->
    <!-- livewire('front.includes.homepage.products-stores') -->
    <!--Shop By store end-->

    <!-- product-by-categories -->
    <!-- livewire('front.includes.homepage.product-by-categories') -->
    <!-- product-by-categories end -->
    <!-- payment , social   and our app section   -->

</div><!-- container  -->
<section class="mt-5 bgffffff">
    @if($services->count()>0)
    <!-- footer service area  -->
    <div class="container">
        <div class="wrap-function-info">
            @foreach($services as $nservices)
            <a href="{{route('service.single', base64_encode($nservices->id))}}">
                <div class="wrap-footer-item wrap-function-info-item">
                    <h3 class="item-header text-align-center pt-4 pb-1 mt-0">
                        <i class="fa fa-{{$nservices->icon}} mr-2 pt-3 color_green" aria-hidden="true"></i>
                    </h3>
                    <div class="pb-5">
                        <h4 class="color000 text-align-center mb-0 pb-0" style="font-family: sans-serif;">
                            {{$nservices->title}}
                        </h4>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <!--End function info-->
        @endif
</section>