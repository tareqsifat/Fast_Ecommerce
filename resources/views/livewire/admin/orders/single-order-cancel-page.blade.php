<div class="row">
    @section('title')
    {{'Notification'}}
    @endsection
    <!-- Main content -->
    @livewire('admin.orders.send-custom-message')
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header border-0">
                <div class="float-right form-group">
                    <input class="float-right form-control" type="text" wire:model="searchItem" placeholder="Search...">
                </div>
                <!-- /.float-right -->
            </div>
            <div class="card-body p-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Name</th>
                                    <th>Reasons</th>
                                    <th>Order status</th>
                                    <th>Notification</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                <tr>
                                    <td>{{($data->order->orderId)}}</td>
                                    <td>{{ $data->order->first_name }}{{$data->last_name}}</td>
                                    <td>{{$data->message}}</td>
                                    <td>
                                        @if ($data->order->status == 0)
                                        <span onclick="confirm('Are you sure to change processing ...?') || event.stopImmediatePropagation()" wire:click="selectItem({{$data->order->id}}, 'panding')" class="btn badge py-0 rounded-pill bg-info">Panding </span>
                                        @elseif($data->order->status == 1)
                                        <span onclick="confirm('Are you sure to cancel it?') || event.stopImmediatePropagation()" wire:click="selectItem({{$data->order->id}}, 'processing')" class="btn badge py-0 rounded-pill bg-warning">Processing</span>
                                        @elseif($data->order->status == 2)
                                        <span onclick="confirm('Are you sure to make it order success?') || event.stopImmediatePropagation()" wire:click="selectItem({{$data->order->id}}, 'cancel')" class="btn badge py-0 rounded-pill bg-danger">Cancel</span>
                                        @elseif($data->order->status == 3)
                                        <span onclick="confirm('Are you sure to make it processing ....?') || event.stopImmediatePropagation()" wire:click="selectItem({{$data->order->id}}, 'complete')" class="btn badge py-0 rounded-pill bg-success">Complete</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->notification == 1)
                                        <span wire:click="selectItem({{$data->id}}, 'desableNotification')" class="btn badge py-0 rounded-pill bg-success">Seen </span>
                                        @else
                                        <span wire:click="selectItem({{$data->id}}, 'enableNotification')" class="btn badge py-0 rounded-pill bg-warning">Unseen</span>
                                        @endif
                                    </td>
                                    <td>{{ $data->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button data-target="#messageOrderForm" wire:click="selectItem({{$data->id}}, 'message')" class="px-2 mx-1 btn btn-sm btn-info"><i class="far fa-envelope"></i></button>
                                            <button data-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$data->id}})" class="px-2 mx-1 btn btn-danger btn-sm"><i class="fas fa-trash "></i></button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        window.addEventListener('openmodal', event => {
            $('#messageOrderForm').modal('show');
        })
    </script>
    @endpush
</div>