<div class="wrap-main-slide">
    <p class="text-align-center bgf3 loader">
        <img class="w-50" class="" src='{{asset("defaults/lazyloader.gif")}}' alt="">
    </p>
    <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
        @if($datas)
        @foreach($datas as $sItem)
        <div class="item-slide">
            <a target="_blank" class="w-100" href="{{$sItem->url}}"><img class="img-slide w-100" src='@if(file_exists("uploads/sliders/homeslider/$sItem->image")){{asset("uploads/sliders/homeslider/$sItem->image")}} @else {{asset("defaults/default-blank-img.jpg")}} @endif'> </a>
        </div>
        @endforeach
        @else
        <div class="item-slide">
            <a target="_blank" class="w-100" href="{{$sItem->url}}"><img class="img-slide w-50" src='{{asset("defaults/default-blank-img.jpg")}}'> </a>
        </div>
        @endif
    </div>
</div>