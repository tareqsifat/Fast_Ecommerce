<div class="row">
    @section('title')
    {{'Baby Category'}}
    @endsection
    <!-- Main content -->
    @livewire('admin.category.new-born-category-c-u')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <!-- card header -->
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#new_born_Cat_Form">
                    + New Born Category
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
                            <th>SL/No <small class="text-info">{{$alldatas->count()}}</small></th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
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
                            <td>{{ $data->name }} <small><i class="text-info">@if ($data->product->count() > 0) {{$data->product->count().' Products'}} @endif</i></small></td>
                            <td><img width="50px" src='@if($data->image) @if(file_exists("uploads/category/$data->image")){{asset("uploads/category/$data->image")}} @else {{asset("defaults/default-blank-img.jpg")}}  @endif  @else {{asset("defaults/default-blank-img.jpg")}} @endif' alt="{{$data->image}}"></td>
                            <td>{{ $data->description }}</td>
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
                                @if(Auth::user()->user_as == 'merchent')
                                <span>Unauthorize</span>
                                @else
                                <div class="d-flex">
                                    <button data-toggle="tooltip" data-bs-placement="top" title="Edit" wire:click="selectItem({{$data->id}}, 'edit')" class="mr-1 btn"><i class="fas fa-edit text-info"></i></button>
                                    <button data-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$data->id}})" class="btn"><i class="fas fa-trash text-danger"></i></button>
                                </div>
                                @endif
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