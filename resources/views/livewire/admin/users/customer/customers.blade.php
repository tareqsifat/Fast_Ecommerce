<div class="row">
    @section('title')
    {{'Customers'}}
    @endsection
    @livewire('admin.users.customer.view-customer')
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
                            <th width="10%">Notification</th>
                            <th width="10%">Created at</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $key => $data)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><img width="30px" src="{{ asset('uploads/user/profile').'/'.$data->profile_photo_path}}" alt="{{ $data->profile_photo_path }}"></td>
                            <td>{{(!empty($data->first_name) ? "$data->first_name $data->last_name" : $data->name)}}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                @if ($data->notification == 1)
                                <span wire:click="selectItem({{$data->id}}, 'desableNotification')" class="btn badge py-0 rounded-pill bg-success">Seen
                                    <span wire:loading wire:target="selectItem({{$data->id}}, 'desableNotification')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </span>
                                </span>
                                @else
                                <span wire:click="selectItem({{$data->id}}, 'enableNotification')" class="btn badge py-0 rounded-pill bg-warning">Unseen
                                    <span wire:loading wire:target="selectItem({{$data->id}}, 'enableNotification')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </span>

                                </span>
                                @endif
                            </td>
                            <td>@if(!empty($data->created_at)){{ $data->created_at->diffForHumans() }}@endif</td>
                            <td>
                                <div class="d-flex">
                                    <button wire:click="selectItem({{$data->id}}, 'view')" data-toggle="modal" data-target="#modalviewForm" class="badge badge-info border-info mr-1"><i class="fas fa-eye"></i></button>
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
    </div>
    @push('scripts')
    <script>
        // open modal for edit 
        window.addEventListener('modalviewForm', event => {
            $('#modalviewForm').modal('show');
        })
    </script>
    @endpush
</div>