<div class="container">
    @section('title')
    {{'Campaign'}}
    @endsection
    @section('description')
    {{'campaign'}}
    @endsection
    <!--MAIN SLIDE-->
    <div class="row w-100 m-0">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 p-0 pr-0">
            <div id="comparison-main-slide" class="wrap-main-slide">
                <div class="compaign_slider owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                    @foreach($slider as $nslider)
                    <div class="item-slide">
                        <a href="{{$ndata->url}}"><img src='{{asset("uploads/sliders/campaignslider/$nslider->image")}}' alt="{{$ndata->name}}" class="img-slide"> </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="row m-0 py-5">
        @if($datas->count()>0)
        <ul class="list-unstyled">
            @foreach($datas as $ndata)
            <li class="item_width pb-2 ">
                <div class="wrap-show-advance-info-box style-1 w-100">
                    <div class="wrap-products">
                        <div class="wrap-product-tab tab-style-1">
                            <div class="product product-style-2 equal-elem w-100">
                                <div class="product-thumnail">
                                    <a href="{{route('single',$ndata->slug)}}" title="{{$ndata->title}}">
                                        <figure><img src='@if(file_exists("uploads/products/thumbnails/$ndata->thumbnail")){{asset("uploads/products/thumbnails/$ndata->thumbnail")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif' width="150" height="150" alt="{{$ndata->title}}">
                                        </figure>
                                    </a>
                                </div>
                                <div class="product-info px-2 mt-5">
                                    <p class="product-title font-weight600 font-family-nunito">
                                        <a class="px-1 font-size-13" href="{{route('single', $ndata->slug)}}">{{ Str::limit($ndata->title,55) }} @if(!empty($ndata->sale_price)) | <span class="color_danger">
                                                <?php
                                                $deffr = $ndata->price - $ndata->sale_price;
                                                echo $deffr / 100; ?>
                                            </span>
                                            % Discount @endif</a>
                                    </p>
                                    <div class="py-2 my-3">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        @else
        <div class="py-5">
            <div class="text-align-center my-5 py-5">
                <h2 class="my-5 py-5">Empty</h2>
            </div>
        </div>
        @endif
    </div>

</div>