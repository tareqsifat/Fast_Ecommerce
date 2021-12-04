<div class="row">
    @section('title')
    {{'Services'}}
    @endsection
    <!-- Main content -->
    @livewire('admin.service.service-c-u')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <!-- card header -->
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalForm">
                    + Add New
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
                            <th>No</th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Icon</th>
                            <th>Baner Images</th>
                            <th>Background Color</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $key => $data)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->subtitle }}</td>
                            <td><i class="fas fa-{{ $data->icon }}"></i></td>
                            <td>
                                @foreach($data->service_image as $oldimage)
                                <img class="img-thumbnail" height="30px" width="30px" src='{{asset("uploads/services/$oldimage->image")}}'>
                                @endforeach
                            </td>
                            <td>{{ $data->bg }}</td>
                            <td>{{ Str::limit($data->description,100) }}</td>
                            <td>
                                @if ($data->status == 0)
                                <span wire:click="selectItem({{$data->id}}, 'desable')" class="btn badge py-0 rounded-pill bg-success">Enable
                                    <span wire:loading wire:target="selectItem({{$data->id}}, 'desable')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </span>
                                </span>
                                @else
                                <span wire:click="selectItem({{$data->id}}, 'enable')" class="btn badge py-0 rounded-pill bg-warning">Desable
                                    <span wire:loading wire:target="selectItem({{$data->id}}, 'enable')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </span>
                                </span>
                                @endif
                            </td>
                            <td>{{ $data->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="d-flex">
                                    <button data-toggle="tooltip" data-bs-placement="top" title="Edit" wire:click="selectItem({{$data->id}}, 'edit')" class="badge badge-info border-info mr-1"><i class="fas fa-edit"></i></button>
                                    <button data-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$data->id}})" class="badge badge-danger border-danger"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.card -->
    </div>
</div>