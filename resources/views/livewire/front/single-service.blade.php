<main id="main" class="main-site">
    @section('title')
    {{"Service | $data->title"}}
    @endsection
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul class="my-4">
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link">Service</li>
                <li class="item-link"><span class="text_success">{{$data->title}}</span></li>
            </ul>
        </div>
        <div class="main-content-area bgffffff pt-3">
            <h3 class="mb-3 text-align-center font-weight-bold">{{$data->title}}</h3>
            <h5 class="text-align-center pb-3">{{$data->subtitle}}</h5>
            @foreach($data->service_image as $serviceImage)
            <div class="text-align-center">
                <img src='{{asset("uploads/services/$serviceImage->image")}}' alt="">
            </div>
            <br>
            @endforeach
            <div class="font-family-nunito text-align-center p-3">
                <p class="text-justify">{!! $data->description !!}</p>
            </div>
        </div>
    </div>
    <!--end container-->
</main>