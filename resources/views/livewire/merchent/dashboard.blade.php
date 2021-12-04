<div>
    @section('title')
    {{'Dashboard'}}
    @endsection
    @if(Auth::user()->user_role == 1)
    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Warning!</strong> <i class="text-dark">Your Merchant shope is waiting for approve, After Approve By the admin you can add your shop products</i>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Products</h6>
                        <h4 class="mb-3 mt-0 float-right">{{$products->count()}}</h4>
                    </div>
                </div>
                <div class="p-3">
                    <div class="float-right">
                        <a href="{{ route('merchent.product')}}" class="text-white-50"><i class="mdi mdi-cube-outline h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Total Products: {{$products->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Total Orders</h6>
                        <h4 class="mb-3 mt-0 float-right">{{$totalOrders->count()}}</h4>
                    </div>
                </div>
                <div class="p-3">
                    <div class="float-right">
                        <a href="{{ route('merchent.orders')}}" class="text-white-50"><i class="mdi mdi-buffer h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Total : {{$totalOrders->count()}} </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-pink mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Category</h6>
                        <h4 class="mb-3 mt-0 float-right">{{$category->count()}}</h4>
                    </div>
                </div>
                <div class="p-3">
                    <div class="float-right">
                        <a href="{{route('merchent.product.category')}}" class="text-white-50"><i class="mdi mdi-tag-text-outline h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Total : {{$category->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Brands</h6>
                        <h4 class="mb-3 mt-0 float-right">{{$brands->count()}}</h4>
                    </div>
                </div>
                <div class="p-3">
                    <div class="float-right">
                        <a href="{{route('merchent.product.brand')}}" class="text-white-50"><i class="mdi mdi-briefcase-check h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Total {{$brands->count()}}:</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if($newOrderNotification->count() > 0)
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">New Orders <span class="text-success">({{$newOrderNotification->count()}})</span> <a class="float-right btn btn-sm btn-info" href="{{route('merchent.orders')}}">View All</a></h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($newOrderNotification as $nOrderNft)
                                <tr>
                                    <th scope="row">{{$nOrderNft->order_id}}</th>
                                    <th scope="row">{{$nOrderNft->product->title}}</th>
                                    <td>{{(!empty($nOrderNft->user->name)) ? $nOrderNft->user->name : "$nOrderNft->fast_name" ." "."$nOrderNft->last_name"}}</td>
                                    <td>{{$nOrderNft->price}} X {{$nOrderNft->quantity}} = {{$nOrderNft->price * $nOrderNft->quantity}}</td>
                                    <td>
                                        @if ($nOrderNft->status == 0)
                                        <span onclick="confirm('Are you sure to change processing ...?') || event.stopImmediatePropagation()" wire:click="selectItem({{$nOrderNft->id}}, 'pending')" class="btn badge py-0 rounded-pill bg-warning">Pending... </span>
                                        @elseif($nOrderNft->status == 1)
                                        <span onclick="confirm('Are you sure to make it order success?') || event.stopImmediatePropagation()" wire:click="selectItem({{$nOrderNft->id}}, 'processing')" class="btn badge py-0 rounded-pill bg-info">Processing..</span>
                                        @elseif($nOrderNft->status == 2)
                                        <span onclick="confirm('Are you sure to cancel it?') || event.stopImmediatePropagation()" wire:click="selectItem({{$nOrderNft->id}}, 'cancel')" class="btn badge py-0 rounded-pill bg-success">Success</span>
                                        @elseif($nOrderNft->status == 3)
                                        <span onclick="confirm('the order Item is already completd. Are you sure to make it processing ....?') || event.stopImmediatePropagation()" wire:click="selectItem({{$nOrderNft->id}}, 'complete')" class="btn badge py-0 rounded-pill bg-danger">Cancel</span>
                                        @endif
                                    </td>
                                    <td> {{$nOrderNft->created_at->diffForHumans()}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        @endif
    </div>
</div>