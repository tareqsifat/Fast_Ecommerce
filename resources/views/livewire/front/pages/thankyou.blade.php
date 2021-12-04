<main id="main" class="main-site">
    @section('title')
    {{'Thank you'}}
    @endsection
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul class="my-3">
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Thank You</span></li>
            </ul>
        </div>
    </div>

    <div class="container pb-60 bgffffff">
        <div class="row py-5">
            <div class="col-md-12 text-center">
                <h2 class="py-5">Thank you for your order</h2>
                <p>A confirmation email was sent after the order is complete.</p>
                <a class="my-1 btn border_redious btn-checkout btn-primary" href="{{route('user.orders')}}">Got to order page<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                <a class="my-1 btn border_redious btn-checkout btn-info" href="{{route('home')}}">Continue Shopping <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <!--end container-->
</main>