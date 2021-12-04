<main id="main" class="main-site">
    @section('title')
    {{'return policy'}}
    @endsection
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul class="my-4">
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span class="text_success">@yield('title')</span></li>
            </ul>
        </div>
        @if(!empty($findpage->description))
        <div class="main-content-area bgffffff p-5">
            <div class="">
                {!! $findpage->description !!}
            </div>
        </div>
        @else
        <div class="py-5">
            <div class="text-align-center my-5 py-5">
                <h2 class="my-5 py-5">Empty</h2>
            </div>
        </div>
        @endif
    </div>
    <!--end container-->
</main>