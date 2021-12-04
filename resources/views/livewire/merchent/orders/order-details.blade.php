<div wire:ignore.self class="modal fade" id="merchantModalForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Order @if(!empty($order)) {{$order->orderId }} @endif</h5>
                <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if($orderDatas)
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="invoice-title">
                                <h4 class="float-right font-16"><strong>Product Code {{$product->product_code}} </strong></h4>
                                <h3 class="m-t-0">
                                    <img src='@if(isset($user->profile_photo_path)){{asset("uploads/user/profile/$user->profile_photo_path")}} @else{{asset("defaults/user.png")}} @endif' alt="{{$user->name}}" height="28">
                                </h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <address>
                                        <strong>Billing Address:</strong><br>
                                        {{$user->first_name}} {{$user->last_name}}<br>
                                        {{$user->adress}}<br>
                                        {{$user->gander}}<br>
                                    </address>
                                    <address>
                                        <strong>Contact Info:</strong><br>
                                        {{$user->phone}}<br>
                                        {{$user->email}}<br>
                                    </address>
                                </div>
                                <div class="col-6 text-right">
                                    <address>
                                        <strong>Shipping Address:</strong><br>
                                        {{$order->first_name}}{{$order->last_name}}<br>
                                        {{$order->address}}<br>
                                        {{$order->divisions ." " .$order->district ." ". $order->upazila}}
                                    </address>
                                    <address>
                                        <strong>Contact Info:</strong><br>
                                        {{$order->phone}}<br>
                                        {{$order->email}}<br>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 m-t-30">
                                    <address>
                                        <strong>Payment Method:</strong><br>
                                        {{$order->payment_by}}<br>
                                    </address>
                                    <address>
                                        <strong>Transection Id:</strong><br>
                                        {{$order->transaction_id}}<br>
                                    </address>
                                </div>
                                <div class="col-6 m-t-30 text-right">
                                    <address>
                                        <strong>Order Date:</strong><br>
                                        {{$order->created_at->format('F d, Y')}}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="panel panel-default">
                                <div class="p-2">
                                    <h3 class="panel-title font-20"><strong>Order summary</strong></h3>
                                </div>
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td><strong>product Name </strong></td>
                                                    <td><strong>Image</strong></td>
                                                    <td class="text-center"><strong>Price</strong></td>
                                                    <td class="text-center"><strong>Quantity</strong></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                                <tr>
                                                    <td>{{$product->title}}</td>
                                                    <td class="text-center"><img width="50px" src='{{asset("uploads/products/thumbnails/$product->thumbnail")}}' alt=""></td>
                                                    <td class="text-center">৳{{$orderDatas->price}}</td>
                                                    <td class="text-center">{{$orderDatas->quantity}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center">
                                                        <strong>Total</strong>
                                                    </td>
                                                    <td class="no-line text-right">
                                                        <h4 class="m-0">৳{{$orderDatas->price * $orderDatas->quantity}}</h4>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-print-none mo-mt-2">
                                        <div class="float-right">
                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end row -->

                </div>
            </div>
            @endif
            <div class="modal-footer">
                <button wire:click="close" type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>