<div class="wrap-banner style-twin-default home-main-carousel owl-carousel">
    @foreach($datas as $bannerItem)
    <div class="banner-item slider_item">
        <a target="_blank" href="{{$bannerItem->url}}" class="link-banner banner-effect-1">
            <figure class="display_block">
                <img style="height: 250px;" src='{{asset("uploads/sliders/bannerslider/$bannerItem->image")}}' alt="">
            </figure>
        </a>
    </div>
    @endforeach
</div>