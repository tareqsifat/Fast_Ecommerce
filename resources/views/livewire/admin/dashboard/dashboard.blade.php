<div>
    @section('title')
    {{'Dashboard'}}
    @endsection
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Customers</h6>
                        <h4 class="mb-3 mt-0 float-right">{{$customers->count()}}</h4>
                    </div>
                </div>
                <div class="p-3">
                    <div class="float-right">
                        <a href="{{route('admin.user')}}" class="text-white-50"><i class="mdi mdi-cube-outline h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Total Customers</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Products</h6>
                        <h4 class="mb-3 mt-0 float-right">{{$products->count()}}</h4>
                    </div>
                </div>
                <div class="p-3">
                    <div class="float-right">
                        <a href="{{route('admin.products')}}" class="text-white-50"><i class="mdi mdi-cube-outline h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Total Products {{$products->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">New Orders</h6>
                        <h4 class="mb-3 mt-0 float-right">{{$newOrder->count()}}</h4>
                    </div>
                </div>
                <div class="p-3">
                    <div class="float-right">
                        <a href="{{route('admin.order')}}" class="text-white-50"><i class="dripicons-cart h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Total : {{$newOrder->count()}}</p>
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
                        <a href="{{route('admin.order')}}" class="text-white-50"><i class="dripicons-cart h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Total : {{$totalOrders->count()}}</p>
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
                        <a href="{{route('admin.category')}}" class="text-white-50"><i class="mdi mdi-tag-text-outline h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Total : {{$category->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-dark mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Brands</h6>
                        <h4 class="mb-3 mt-0 float-right">{{$brands->count()}}</h4>
                    </div>
                </div>
                <div class="p-3">
                    <div class="float-right">
                        <a href="{{route('admin.brands')}}" class="text-white-50"><i class="dripicons-view-list-large h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Total : {{$brands->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Merchant</h6>
                        <h4 class="mb-3 mt-0 float-right">{{$merchant->count()}}</h4>
                    </div>
                </div>
                <div class="p-3">
                    <div class="float-right">
                        <a href="{{route('admin.user.merchent_user')}}" class="text-white-50"><i class="mdi dripicons-store h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Total : {{$merchant->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Total Reviews</h6>
                        <h4 class="mb-3 mt-0 float-right">{{$totalReviews->count()}}</h4>
                    </div>
                </div>
                <div class="p-3">
                    <div class="float-right">
                        <a href="{{route('admin.reviews')}}" class="text-white-50"><i class="mdi dripicons-store h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Total : {{$totalReviews->count()}}</p>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        @if($newReviews->count() > 0)
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">New Reviews <span class="text-success">({{$newReviews->count()}})</span> <a class="float-right btn btn-sm btn-info" href="{{route('admin.reviews')}}">View All</a></h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Review</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($newReviews as $nReviews)
                                <tr>
                                    <th scope="row">{{$nReviews->product->title}}</th>
                                    <td>{{(!empty($nReviews->user->name)) ? $nReviews->user->name : "$nReviews->fast_name" ." "."$nReviews->last_name"}}</td>
                                    <td>
                                        <i class="fa fa-star @if($nReviews->review >= 1) {{'text-warning'}} @else {{'text-light'}} @endif"></i>
                                        <i class=" fa fa-star @if($nReviews->review >= 2) {{'text-warning'}} @else {{'text-light'}} @endif"></i>
                                        <i class="fa fa-star @if($nReviews->review >= 3) {{'text-warning'}} @else {{'text-light'}} @endif"></i>
                                        <i class=" fa fa-star @if($nReviews->review >= 4 ) {{'text-warning'}} @else {{'text-light'}} @endif"></i>
                                        <i class="fa fa-star @if($nReviews->review >= 5) {{'text-warning'}} @else {{'text-light'}} @endif"></i>
                                    </td>
                                    <td title="{{$nReviews->comment}}">{{ Str::limit($nReviews->comment, 15)}}</td>
                                    <td><span class="badge badge-info">New</span></td>
                                    <td> {{$nReviews->created_at->diffForHumans()}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        @endif
        @if($newQuestion->count()>0)
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">New Questions <span class="text-success">({{$newQuestion->count()}})</span></h4>
                    <table class="table table-striped mb-0">
                        <tbody>
                            @foreach($newQuestion as $nqItem)
                            <tr>
                                <td><i class="dripicons-question text-primary h2"></i></td>
                                <td>
                                    <p class="text-muted mb-0" title="{{$nqItem->description}}">{{Str::limit($nqItem->description,10)}}</p>
                                </td>
                                <td>
                                    <a href="{{route('admin.askQuestions')}}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>

</div>