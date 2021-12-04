<div wire:ignore.self class="modal fade" id="modalOrderForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Order Details</h5>
                <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if($orderDatas)
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="invoice-title">
                                    <h4 class="float-right font-16"><strong>Order {{$orderDatas->orderId}}</strong></h4>
                                    <h3 class="m-t-0">
                                        <img src='@if(isset($setting->logo)){{asset("uploads/logo/$setting->logo")}} @else{{asset("defaults/logo.png")}} @endif' alt="logo" height="28">
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <address>
                                            <strong>Billed To:</strong><br>
                                            {{$orderDatas->first_name}}{{$orderDatas->last_name}}<br>
                                            {{$orderDatas->address}}<br>
                                            {{$orderDatas->divisions ." " .$orderDatas->district ." ". $orderDatas->upazila}}
                                        </address>
                                    </div>
                                    <div class="col-6 text-right">
                                        <address>
                                            <strong>Shipped To:</strong><br>
                                            {{$orderDatas->first_name}}{{$orderDatas->last_name}}<br>
                                            {{$orderDatas->address}}<br>
                                            {{$orderDatas->divisions ." " .$orderDatas->district ." ". $orderDatas->upazila}}
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 m-t-30">
                                        <address>
                                            <strong>Contact Info:</strong><br>
                                            {{$orderDatas->phone}} <br>
                                            {{$orderDatas->email}}
                                        </address>
                                        <address>
                                            <strong>Payment Method:</strong><br>
                                            {{$orderDatas->payment_by}}<br>
                                        </address>
                                        <address>
                                            <strong>Transection Id:</strong><br>
                                            {{$orderDatas->transaction_id}}<br>
                                        </address>
                                    </div>
                                    <div class="col-6 m-t-30 text-right">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                            {{$orderDatas->created_at->format('F d, Y')}}<br><br>
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
                                                        <td><strong>Product ID</strong></td>
                                                        <td class="text-center"><strong>Quantity</strong></td>
                                                        <td class="text-center"><strong>Total</strong></td>
                                                        <td class="text-center"><strong>Shop</strong></td>
                                                        <td class="text-center"><strong>Status</strong></td>
                                                        <td class="text-right"><strong>Action</strong></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $order_items = DB::table('order_items')->where('order_id', $orderDatas->id)->get(); ?>
                                                    @foreach($order_items as $order_item)
                                                    <tr>
                                                        <?php
                                                        $shopOne = DB::table('users')->where('id', $order_item->product_by_shopid)->first();
                                                        $shopTwo = DB::table('merchants')->where('id', $order_item->product_by_shopid)->first();
                                                        $Itemproduct = DB::table('products')->where('id', $order_item->product_id)->first(); ?>
                                                        <td>{{$Itemproduct->product_code}}</td>
                                                        <td class="text-center">৳{{$Itemproduct->price}} X {{$order_item->quantity}}</td>
                                                        <td class="text-right">৳{{$order_item->price * $order_item->quantity}}</td>
                                                        <td class="text-center">@if($shopOne) {{$shopOne->name}} @elseif($shopTwo) {{$shopTwo->name}} @else {{'Undefined'}} @endif</td>
                                                        <td class="text-center">
                                                            <select class="@if($order_item->status == 0) {{'bg-warning'}} @elseif($order_item->status == 1) {{'bg-info'}} @elseif($order_item->status == 2) {{'bg-success'}} @elseif($order_item->status == 3) {{'bg-danger'}}  @endif" wire:change="changeStatusEvent($event.target.value,{{$order_item->id}})">
                                                                <option {{$order_item->status == 0 ? 'selected' : null}} value="0">Pending..</option>
                                                                <option {{$order_item->status == 1 ? 'selected' : null}} value="1">Processing..</option>
                                                                <option {{$order_item->status == 2 ? 'selected' : null}} value="2">Success</option>
                                                                <option {{$order_item->status == 3 ? 'selected' : null}} value="3">Cancel</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <button onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$order_item->id}})" class="btn"><i class="fas fa-trash text-danger"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line text-center">
                                                            <strong>Subtotal</strong>
                                                        </td>
                                                        <td class="thick-line text-right">৳{{$orderDatas->amount}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line text-center">
                                                            <strong>Total</strong>
                                                        </td>
                                                        <td class="thick-line text-right">
                                                            <h4 class="m-0">৳{{$orderDatas->amount}}</h4>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="modal-footer">
                <button wire:click="close" type="button" class="btn btn-sm btn-warning" aria-label="Close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>