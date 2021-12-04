<main id="main" class="main-site">
    @section('title')
    {{'Trake Order'}}
    @endsection
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul class="my-3">
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Trake order</span></li>
            </ul>
        </div>
    </div>

    <div class="container pb-60 bgffffff">
        <div class="row py-5 m-auto">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mt-0 pb-4 font-weight-bold text-align-center item-header">Trake Order</h3>
                        <div class="alert alert-info">
                            <ul class="m-0 p-0">
                                <li>1. For traking your order you have to use your order id With #
                                    and your Fast deals account Email address</li>
                                <li>2. For Order Id Example #12356789</li>
                                <li>3. For Email Example example@gmail.com</li>
                            </ul>
                        </div>
                        <form class="form" wire:submit.prevent="trake">
                            @if (!is_null($message))
                            <div class="mx-2 alert alert-danger">
                                {{ $message }}
                            </div>
                            @endif
                            <div class="form-group">
                                @if($errors->has('orderId')) <br> <span class="text-danger">{{$errors->first('orderId')}}</span> @endif
                                <input wire:model.lazy="orderId" type="text" placeholder="Enter Your Order Id" class="form-control">
                            </div>
                            <div class="form-group">
                                @if($errors->has('email')) <br> <span class="text-danger">{{$errors->first('email')}}</span> @endif
                                <input wire:model.lazy="email" type="email" placeholder="Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Trake My Order" class="btn btn-sm btn-success">
                            </div>
                        </form>
                        @if($orderData)
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th class="border-none">Order Id</th>
                                    <td class="border-none"> {{$orderData->orderId}}</td>
                                </tr>
                                <tr>
                                    <th class="border-none">Status</th>
                                    <td class="border-none">
                                        @if($orderData->status == 0)
                                        <span class="btn py-0 bg-warning">Pending...</span>
                                        @elseif($orderData->status == 1)
                                        <span class="btn py-0 bg-info">Processing...</span>
                                        @elseif($orderData->status == 2)
                                        <span class="btn py-0 bg_green">Complete</span>
                                        @elseif($orderData->status == 3)
                                        <span class="btn py-0 bg-danger">Cancel</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--end container-->
</main>