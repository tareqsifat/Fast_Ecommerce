<div class="row">
    @section('title')
    {{'Merchent User'}}
    @endsection
    @livewire("admin.users.merchent.merchant-user-view")
    <div class="col-12">
        <div class="card">
            <div class="card-header">
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
                            <th width="10%">Status</th>
                            <th width="10%">Created at</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $key => $data)
                        <tr>
                            <td>{{ $key+1 }} @if($data->notification == 0) <small class="text-info">New</small>@endif</td>
                            <td><img width="30px" src="{{ asset('uploads/user/profile').'/'.$data->profile_photo_path}}" alt="{{ $data->profile_photo_path }}"></td>
                            <td>@if(isset($data->name)) {{$data->name }} @else {{$data->fast_name}} {{$data->last_name}} @endif</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                @if ($data->user_role == 1)
                                <span wire:click="selectItem({{$data->id}}, 'approve')" class="btn badge py-0 rounded-pill bg-success">Approved
                                    <span wire:loading wire:target="selectItem({{$data->id}}, 'approve')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </span>
                                </span>
                                @else
                                <span wire:click="selectItem({{$data->id}}, 'panding')" class="btn badge py-0 rounded-pill bg-warning">Panding
                                    <span wire:loading wire:target="selectItem({{$data->id}}, 'panding')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </span>
                                </span>
                                @endif
                            </td>
                            <td>@if(!empty($data->created_at)){{ $data->created_at->diffForHumans() }}@endif</td>
                            <td>
                                <div class="d-flex">
                                    <button wire:click="selectItem({{$data->id}}, 'view')" data-toggle="modal" class="badge badge-info border-info mr-1"><i class="fas fa-eye"></i></button>

                                    <button onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$data->id}})" class="badge badge-danger border-danger"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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

        @push('scripts')
        <script>
            window.addEventListener('merchantUserView', event => {
                $("#merchantUserView").modal('show');
            })
        </script>
        @endpush
    </div>
</div>