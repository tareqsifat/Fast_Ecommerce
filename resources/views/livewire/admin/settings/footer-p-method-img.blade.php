<div class="row">
    @section('title')
    {{'Footer Payment Method Image'}}
    @endsection
    <!-- Main content -->
    @livewire('admin.settings.footer-p-method-img-c-u')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <!-- card header -->
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalBrandForm">
                    + New Item
                </button>
                <div class="float-right form-group">
                    <input class="float-right form-control" type="text" wire:model="searchItem" placeholder="Search...">
                </div>
                <!-- /.float-right -->
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No <small class="text-info">{{$alldatas->count()}}</small></th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $data->name }}</td>
                            <td><img width="100px" src='{{asset("uploads/payment/$data->image")}}' alt="{{$data->image}}"></td>
                            <td>
                                @if ($data->status == 0)
                                <span wire:click="selectItem({{$data->id}}, 'desable')" class="btn badge py-0 rounded-pill bg-success">Enable </span>
                                @else
                                <span wire:click="selectItem({{$data->id}}, 'enable')" class="btn badge py-0 rounded-pill bg-warning">Disable</span>
                                @endif
                            </td>
                            <td>@isset($data->created_at){{ $data->created_at->diffForHumans() }}@endisset</td>
                            <td>
                                <div class="d-flex">
                                    <button data-toggle="tooltip" data-bs-placement="top" title="Edit" wire:click="selectItem({{$data->id}}, 'edit')" class="badge badge-info border-info mr-1"><i class="fas fa-edit"></i></button>
                                    <button data-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$data->id}})" class="badge badge-danger border-danger"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @php $i++ @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            @if($alldatas->count() > $perPage)
            <div class="card-footer">
                <div class="row">
                    <div class="col-2 m-auto">
                        <button wire:click="loadMore()" class="btn btn-dark btn-sm shadow-sm text-center">Load More</button>
                    </div>
                </div>
            </div> <!-- card footer -->
            @endif
        </div>
        <!-- /.card -->
    </div>
</div>