<div class="row">
    @section('title')
    {{'Subscribers'}}
    @endsection
    <!-- Main content -->
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
                            <th>No</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="d-flex">
                                    <button data-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$data->id}})" class="badge badge-danger border-danger"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @php $i++ @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($alldata->count() > $perPage)
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