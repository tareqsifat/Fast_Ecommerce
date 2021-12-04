<main id="main" class="main-site mt-3">
    @section('title')
    {{"orders"}}
    @endsection
    <div class="container pb-60">
        <div class="row">
            @livewire('front.auth.customers.profile.layouts')
            <div class="col-sm-12 col-md-8 m-0 p-0">
                <div class="card wrap-profile-content">
                    <div class="card-header">
                        <strong class="text-gray-600">Orders Details</strong>
                    </div>
                    <div class="inner card-body pt-5 bgffffff">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $nOrders)
                                <tr>
                                    <td>{{$nOrders->orderId}}</td>
                                    <td>{{$nOrders->amount}}</td>
                                    <td>{{$nOrders->created_at->format('d, M, Y')}}</td>
                                    <td>
                                        @if ($nOrders->status == 0)
                                        <span class="btn badge py-0 rounded-pill bg-info">Pending </span>
                                        @elseif($nOrders->status == 1)
                                        <span class="btn badge py-0 rounded-pill bg-warning">Processing</span>
                                        @elseif($nOrders->status == 2)
                                        <span class="btn badge py-0 rounded-pill bg_green">Success</span>
                                        @elseif($nOrders->status == 3)
                                        <span class="btn badge py-0 rounded-pill bg_danger">Cancel</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($nOrders->status == 2)
                                        <div class="btn btn-success colorffffff btn-sm">Order Completed</div>
                                        @else
                                        @if($nOrders->customernotification == 0)
                                        <a href="{{route('user.order.cancel', $nOrders->id)}}" class="btn btn-danger btn-sm"> Cancel Order</a>
                                        @elseif($nOrders->customernotification == 2)
                                        <span class="btn btn-danger btn-sm">Canceled</span>
                                        @else
                                        <div class="btn btn-info btn-sm">Processing...</div>
                                        @endif
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card wrap-profile-content mt-4">
                    <div class="card-header">
                        <strong class="text-gray-600">Products</strong>
                    </div>
                    <div class="inner card-body pt-5 bgffffff">
                        <table class="table border-none">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Review</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ordersItem as $nOrdersItem)
                                <?php
                                $product = DB::table('products')->where('id', $nOrdersItem->product_id)->first();
                                if ($product) {
                                    $review = DB::table('productreviews')->where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();
                                }
                                ?>
                                @if($product)
                                <tr>
                                    <td>{{(isset($nOrdersItem->order->orderId)?$nOrdersItem->order->orderId:'Null')}}</td>
                                    <td>
                                        {{Str::limit($product->title,20)}}
                                    </td>
                                    <td>{{$nOrdersItem->price}}</td>
                                    <td>
                                        @if($review)
                                        <div class="comment-form-rating">
                                            <p class="stars">
                                                <label for="rated-1"></label>
                                                <input type="radio" @if($review->review == 1 ) {{'checked="checked"'}} @endif>
                                                <label for="rated-2"></label>
                                                <input type="radio" @if($review->review == 2 ) {{'checked="checked"'}} @endif>
                                                <label for="rated-3"></label>
                                                <input type="radio" @if($review->review == 3 ) {{'checked="checked"'}} @endif>
                                                <label for="rated-4"></label>
                                                <input type="radio" @if($review->review == 4 ) {{'checked="checked"'}} @endif>
                                                <label for="rated-5"></label>
                                                <input type="radio" @if($review->review == 5 ) {{'checked="checked"'}} @endif>
                                            </p>
                                        </div>
                                        @endif
                                        <a href="{{route('user.reviews.single', $product->id)}}" class="btn btn-sm btn-success">Review</a>
                                    </td>
                                    <td>{{$nOrdersItem->quantity}}</td>
                                    <td>@if($nOrdersItem->status == 0)
                                        <span class="btn badge py-0 rounded-pill badge-warning">Pending...</span>
                                        @elseif($nOrdersItem->status == 1)
                                        <span class="btn badge py-0 rounded-pill bg-info">Processing...</span>
                                        @elseif($nOrdersItem->status == 2)
                                        <span class="btn badge py-0 rounded-pill bg_green">Success</span>
                                        @elseif($nOrdersItem->status == 3)
                                        <span class="btn badge py-0 rounded-pill bg_danger">Cancel</span>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end container-->
</main>