<div class="container">
    @section('title')
    {{'Orders-History'}}
    @endsection
    <div class="row mt-3">
        <div class="col-sm-12 col-xsm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="p-2 m-0 font-size-16 font-weight-bold">Your Order</h2>
                </div>
                <div class="bgffffff card-body py-0">
                    @foreach($orders as $nOrders)
                    <div wire:click="selectItem({{$nOrders->id}})" class="@if($nOrders->id == $firstOrder->id) {{'order_items_active'}} @endif order_items row border_bottom_eee py-3">
                        <a href="javascript:void(0);">
                            <div class="col-sm-6 col-xsm-6 col-lg-6 col-md-6">
                                <ul class="list-unstyled">
                                    <li class="">
                                        <span class="coloraaa">{{$nOrders->created_at->format('d F Y h:i A')}}</span>
                                        <h2 class="p-0 m-0 font-size-15 font-weight-bold text_dark">{{$nOrders->orderId}}</h2>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-xsm-6 col-lg-6 col-md-6">
                                <div class="float-right pile bg_green px-2 border-radiue-25">
                                    @if($firstOrder->status == 0)
                                    Panding...
                                    @elseif($firstOrder->status == 1)
                                    Processing...
                                    @elseif($firstOrder->status == 2)
                                    Complete
                                    @elseif($firstOrder->status == 3)
                                    Cancel
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xsm-12 col-md-8 col-lg-8">
            <div class="row">
                <div class="card pl-3">
                    <h4 class="font-size-16"><strong>Invoice: {{$firstOrder->orderId}}</strong></h4>
                    <h4 class="mt-2 font-size-14 font-weight600">{{$firstOrder->created_at->format('d F Y h:i A')}}</h4>
                </div>
                <div class="card">
                    <div class="card-body bgffffff w-100 br-5 my-4">
                        <div class="row">


                            <div class="col-sm-12 co-xsm col-md-6 col-lg-6 border_right_eee">
                                <h2 class="font-size-16 font-weight600">Order Form</h2>
                                <div class="d-flex">
                                    <div>
                                        <img class="border_redious5" width="50px" src="{{asset('defaults/logo.png')}}" alt="img">
                                        <a class="font-size-15 text_dark font-weight600">Fast Deals</a>
                                        <ul class="ml-4 d-flex">
                                            <li><i class="fa fa-star text_warning"></i></li>
                                            <li><i class="fa fa-star text_warning"></i></li>
                                            <li><i class="fa fa-star text_warning"></i></li>
                                            <li><i class="fa fa-star text_warning"></i></li>
                                            <li><i class="fa fa-star text_warning"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 co-xsm col-md-6 col-lg-6 px-5 pb-3">
                                <h2 class="font-size-16 font-weight600">Bills To</h2>
                                <div class="d-flex">
                                    <div class="d-flex">
                                        <div class="bill_item">{{str_replace('...','', Str::limit($firstOrder->first_name, 1))}}</div>
                                        <div class="ml-2">
                                            <a class="font-size-15 text_dark font-weight600">{{$firstOrder->first_name}} {{$firstOrder->last_name}}</a>
                                            <br>
                                            <span>{{$firstOrder->district}}, {{$firstOrder->divisions}} Bangladesh</span><br>
                                            <span>Contact no - {{$firstOrder->phone}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h3 class="font-weight600 font-size-20 ml-2">Product Description</h3>
                    <div class="card-body bgffffff w-100 br-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="coloraaa font-weight500">Description</th>
                                    <th class="coloraaa font-weight500">Quantity</th>
                                    <th class="coloraaa font-weight500">Amount</th>
                                    <th class="coloraaa font-weight500">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($productByOrderId as $orderItem)
                                <tr>
                                    <?php $Itemproduct = DB::table('products')->where('id', $orderItem->product_id)->first(); ?>
                                    <td><img width="50px" src='{{asset("uploads/products/thumbnails/$Itemproduct->thumbnail")}}' alt="{{$Itemproduct->title}}"> {{Str::limit($Itemproduct->title, 40)}}</td>
                                    <td>৳{{$orderItem->price}} X {{$orderItem->quantity}}</td>
                                    <td>৳{{$orderItem->price * $orderItem->quantity}}</td>
                                    <td>
                                        @if($orderItem->status == 0)
                                        <span class="btn badge py-0 rounded-pill bg-warning">Panding...</span>
                                        @elseif($orderItem->status == 1)
                                        <span class="btn badge py-0 rounded-pill bg-info">Processing...</span>
                                        @elseif($orderItem->status == 2)
                                        <span class="btn badge py-0 rounded-pill bg-success">Complete</span>
                                        @elseif($orderItem->status == 3)
                                        <span class="btn badge py-0 rounded-pill bg_danger">Cancel</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        <strong>Status:</strong>
                                        @if($firstOrder->transaction_id == null)
                                        <button class="btn btn-dark btn-sm" id="sslczPayBtn" token="if you have any token validation" postdata="your javascript arrays or objects which requires in backend" order="If you already have the transaction generated for current order" endpoint="/pay-via-ajax">UNPAID
                                        </button>
                                        @else
                                        <button class="btn bg_green btn-sm font-weight-bold">Paid</button>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="font-size-15">Total price</span> <br>
                                        <strong class="font-size-15 color_dark"> ৳ {{$firstOrder->amount}}</strong>
                                    </td>
                                    <td>
                                        <span class="font-size-15"> Due</span><br>
                                        <strong class="font-size-15 color_dark">৳ {{$firstOrder->amount}}</strong>
                                    </td>
                                    <td>
                                        <span class="font-size-15">Total paid</span> <br>
                                        <strong class="font-size-15 color_dark"> ৳ 0.00</strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="card mt-4">
                    <h2 class="font-weight600 font-size-20 ml-2">Timeline</h2>
                    <div class="card-body bgffffff w-100 br-5 pt-5">
                        <div class="row">
                            <ul>
                                <li>
                                    <div class="timeline-menue-icon-active">
                                        <i class="fa fas fa-check float-left"></i>
                                        <div class="d-flex">
                                            <div class="ml-4 ">
                                                <span class="font-size-16 font-weight-bold">Processing ...</span> <br>
                                                <span class="coloraaa"> Ordered by - {{$firstOrder->first_name}} {{$firstOrder->last_name}} </span><br>
                                                <span class="coloraaa">{{$firstOrder->created_at->format('d F Y h:i A')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="doted"> </li>
                                <li class="">
                                    <div class="{{($firstOrder->status == 2 || $firstOrder->status == 2 ? 'timeline-menue-icon-active' : 'timeline-menue-icon')}}">
                                        <i class="fa fas fa-check float-left"></i>
                                        <div class="d-flex">
                                            <div class="ml-4 ">
                                                <span class="font-size-16 font-weight-bold">Panding</span> <br>
                                                <span class="coloraaa">Thank you for placing your order at fast deals. We will start processing your order after payment is complete</span><br>
                                                <span class="coloraaa">{{$firstOrder->updated_at->format('d F Y h:i A')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="doted"> </li>
                                <li class="">
                                    <div class="{{($firstOrder->status == 2 ? 'timeline-menue-icon-active' : 'timeline-menue-icon')}}">
                                        <i class="fa fas fa-check float-left"></i>
                                        <div class="d-flex">
                                            <div class="ml-4 ">
                                                <span class="font-size-16 font-weight-bold">Success</span> <br>
                                                <span class="coloraaa">{{$firstOrder->orderId}} has been marked as Success by - Fast Deals</span><br>
                                                <span class="coloraaa">{{$firstOrder->updated_at->format('d F Y h:i A')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @if($firstOrder->status == 3)
                                <li class="doted"> </li>
                                <li class="mb-5">
                                    <div class="{{($firstOrder->status == 3 ? 'timeline-menue-icon-active' : 'timeline-menue-icon')}}">
                                        <i class="fa fas fa-check float-left"></i>
                                        <div class="d-flex">
                                            <div class="ml-4 ">
                                                <span class="font-size-16 font-weight-bold">Canceled</span> <br>
                                                <span class="coloraaa">Cancel.{{$firstOrder->orderId}} by - Fast deals</span><br>
                                                <span class="coloraaa">{{$firstOrder->updated_at->format('d F Y h:i A')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>