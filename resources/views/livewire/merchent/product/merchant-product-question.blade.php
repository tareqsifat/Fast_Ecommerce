<div class="row">
    @section('title')
    {{'Questions'}}
    @endsection
    <!-- Main content -->
    @livewire('admin.ask-question.reply-ans')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-right form-group">
                    <input class="float-right form-control" type="text" wire:model="searchItem" placeholder="Search...">
                </div>
                <!-- /.float-right -->
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Product Name</th>
                            <th>Question</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $i }} @if($data->ansQuestion->count() > 0)<small class="text-info">({{$data->ansQuestion->count()}})</small>@endif @if($data->notification == 0)<small class="text-info">New</small>@endif</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->product_title }}</td>
                            <td>{{ $data->description }}</td>
                            <td>
                                @if ($data->status == 0)
                                <span wire:click="selectItem({{$data->id}}, 'desable')" class="btn badge py-0 rounded-pill  bg-warning">Panding.. </span>
                                @else
                                <span wire:click="selectItem({{$data->id}}, 'enable')" class="btn badge py-0 rounded-pill bg-success">Approved</span>
                                @endif
                            </td>
                            <td>{{ $data->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="d-flex">
                                    <button data-toggle="tooltip" data-bs-placement="top" title="Ans the question" wire:click="selectItem({{$data->id}}, 'Reply')" class="badge badge-info border-info mr-1"><i class="fas fa-reply"></i></button>
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