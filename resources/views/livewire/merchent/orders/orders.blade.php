<div class="row">
    @section('title')
    {{'Merchant Orders'}}
    @endsection
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @livewire('merchent.orders.order-details')
                <div class="float-right form-group">
                    <input class="float-right form-control" type="text" wire:model="searchItem" placeholder="Search...">
                </div>
                <!-- /.float-right -->
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10%">Order Id</th>
                            <th width="10%">Customers Name</th>
                            <th width="10%">Phone</th>
                            <th width="10%">Amount</th>
                            <th width="10%">Status</th>
                            <th width="10%">Created at</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($pdatas as $item)
                        <tr>
                            <td>{{ $item->order->orderId }} @if ($item->notification == 0) <small class="text-info">new</small>@endif</td>
                            <td>{{ $item->order->first_name }} {{ $item->order->last_name }}</td>
                            <td>{{ $item->order->phone }}</td>
                            <td>{{$item->price }} X {{ $item->quantity}} = {{ $item->price *  $item->quantity}}</td>
                            <td>
                                @if ($item->status == 0) <!-- panding.. -->
                                <span onclick="confirm('Are you sure to change processing ...?') || event.stopImmediatePropagation()" wire:click="selectItem({{$item->id}}, 'pending')" class="btn badge py-0 rounded-pill bg-warning">Pending... </span>
                                @elseif($item->status == 1) <!-- processing -->
                                <span onclick="confirm('Are you sure to make it order success?') || event.stopImmediatePropagation()" wire:click="selectItem({{$item->id}}, 'processing')" class="btn badge py-0 rounded-pill bg-info">Processing..</span>
                                @elseif($item->status == 2) <!-- success -->
                                <span onclick="confirm('Are you sure to cancel it?') || event.stopImmediatePropagation()" wire:click="selectItem({{$item->id}}, 'cancel')" class="btn badge py-0 rounded-pill bg-success">Success</span>
                                @elseif($item->status == 3) <!-- cancel -->
                                <span onclick="confirm('the order Item is already completd. Are you sure to make it processing ....?') || event.stopImmediatePropagation()" wire:click="selectItem({{$item->id}}, 'complete')" class="btn badge py-0 rounded-pill bg-danger">Cancel</span>
                                @endif
                            </td>
                            <td>@if(!empty($item->created_at)){{ $item->created_at->diffForHumans() }}@endif</td>
                            <td>
                                <div class="d-flex">
                                    <button wire:click="selectItem({{$item->id}}, 'view')" data-toggle="modal" data-target="#merchantModalForm" class="badge badge-info border-info mr-1"><i class="fas fa-eye"></i></button>
                                    <button onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$item->id}})" class="badge badge-danger border-danger"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @php $i++ @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>