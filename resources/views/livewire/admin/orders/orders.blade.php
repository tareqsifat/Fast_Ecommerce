<div class="row">
    @section('title')
    {{'Orders'}}
    @endsection
    <!-- Main content -->
    <div class="col-12">
        @livewire('admin.orders.order-view')
        @livewire('admin.orders.send-custom-message')
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
                                    <th>Order Number</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $data->orderId }}</td>
                                    <td>{{ $data->first_name }}{{$data->last_name}}</td>
                                    <td>@if($data->order_items){{ $data->order_items->count() }}@endif</td>
                                    <td>
                                        <select name="" id="" class="@if($data->status == 0) {{'bg-warning'}} @elseif($data->status == 1) {{'bg-info'}} @elseif($data->status == 2) {{'bg-success'}} @elseif($data->status == 3) {{'bg-danger'}}  @endif" wire:change="changeStatusEvent($event.target.value,{{$data->id}})">
                                            <option {{$data->status == 0 ? 'selected' : null}} value="0">Pending..</option>
                                            <option {{$data->status == 1 ? 'selected' : null}} value="1">Processing..</option>
                                            <option {{$data->status == 2 ? 'selected' : null}} value="2">Success</option>
                                            <option {{$data->status == 3 ? 'selected' : null}} value="3">Cancel</option>
                                        </select>
                                    </td>
                                    <td>{{ $data->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button title="View order" wire:click="selectItem({{$data->id}}, 'view')" class="btn mr-1 mx-1 btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                            <button data-target="#messageOrderForm" wire:click="selectItem({{$data->id}}, 'message')" class="px-2 mx-1 btn btn-sm btn-primary"><i class="far fa-envelope"></i></button>
                                            <button title="Delete" onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$data->id}})" class="btn mx-1 btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                @if($datas->count() > $perPage)
                <div class="card-footer">
                    <div class="row">
                        <div class="col-2 m-auto">
                            <button wire:click="loadMore()" class="btn btn-dark btn-sm shadow-sm text-center">Load More</button>
                        </div>
                    </div>
                </div> <!-- card footer -->
                @endif
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        window.addEventListener('openMessagemodal', event => {
            $('#messageOrderForm').modal('show');
        })
        window.addEventListener('openmodal', event => {
            $('#modalOrderForm').modal('show');
            $('#modalOrderForm').show();
            $('.modal-backdrop').show();
        })
    </script>
    @endpush
</div>