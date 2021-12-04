<main id="main" class="main-site">
    @section('title')
    {{'Cancel Order'}}
    @endsection
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul class="my-3">
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Cancel Order</span></li>
            </ul>
        </div>
    </div>

    <div class="container pb-60 bgffffff">
        <div class="row py-5 m-auto">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mt-0 pb-4 font-weight-bold text-align-center item-header">Cancel Order</h3>
                        <form class="form" wire:submit.prevent="submit">
                            <div class="form-group">
                                @if($errors->has('orderId')) <br> <span class="text-danger">{{$errors->first('orderId')}}</span> @endif
                                <input disabled wire:model.lazy="orderId" type="text" placeholder="Enter Your Order Id" class="form-control">
                            </div>
                            <div class="form-group">
                                @if($errors->has('message')) <br> <span class="text-danger">{{$errors->first('message')}}</span> @endif
                                <textarea rows="5" class="form-control" wire:model.lazy="message" placeholder="Reasons to cancel the order"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-sm btn-success">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--end container-->
</main>