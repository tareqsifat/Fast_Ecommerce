<div class="row">
    @section('title')
    {{'Users'}}
    @endsection
    <!-- Main content -->
    @livewire('admin.users.user-create')
    @livewire('admin.users.user-edit')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
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
                            <th width="1%">No</th>
                            <th width="10%">Profile</th>
                            <th width="10%">Name</th>
                            <th width="10%">Email</th>
                            <th width="10%">Role</th>
                            <!-- <th width="10%">Status</th> -->
                            <th width="10%">Created at</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $i }}</td>
                            <td><img width="30px" src="{{ asset('uploads/user').'/'.$data->profile_photo_path}}" alt="{{ $data->profile_photo_path }}"></td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                @if($data->user_role === 0){{'Admin'}}
                                @elseif($data->user_role === 1){{'Editor'}}
                                @endif
                            </td>
                           
                            <td>@if(!empty($data->created_at)){{ $data->created_at->diffForHumans() }}@endif</td>
                            <td>
                                <div class="d-flex">
                                    <button wire:click="selectItem({{$data->id}}, 'edit')" data-toggle="modal" data-target="#editmodalForm" class="badge badge-info border-info mr-1"><i class="fas fa-edit"></i></button>
                                    @if(Auth::user()->id === $data->id)
                                    @else
                                    <button onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$data->id}})" class="badge badge-danger border-danger"><i class="fas fa-trash"></i></button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @php $i++ @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>