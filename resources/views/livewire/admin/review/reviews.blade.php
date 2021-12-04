<div class="row">
    @section('title')
    {{'Reviews'}}
    @endsection
    <!-- Main content -->
    @livewire('admin.review.view-review')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-right form-group">
                    <input class="float-right form-control" type="text" wire:model="searchItem" placeholder="Search...">
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Review</th>
                            <th>Status</th>
                            <th>Notification</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $n = 1; @endphp
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $n }}</td>
                            <td data-placement="right" title="{{$data->product_name}}">{{ Str::limit($data->product_name, 15) }}</td>
                            <td data-placement="right" title="{{$data->comment}}">{{ Str::limit($data->comment, 20) }}</td>
                            <td>
                                @for($i = 0; $i < 5;$i++ ) <i class="fas fa-star {{($data->review > $i)?'text-warning':''}}"></i> @endfor
                            </td>
                            <td>
                                @if ($data->status == 0)
                                <span wire:click="selectItem({{$data->id}}, 'desable')" class="btn badge py-0 rounded-pill bg-warning">Panding
                                    <div wire:loading wire:target="selectItem({{$data->id}},'desable')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </span>
                                @else
                                <span wire:click="selectItem({{$data->id}}, 'enable')" class="btn badge py-0 rounded-pill bg-success">Approved
                                    <div wire:loading wire:target="selectItem({{$data->id}},'enable')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </span>
                                @endif
                            </td>
                            <td>
                                @if ($data->notification == 1)
                                <span wire:click="selectItem({{$data->id}}, 'desableNotification')" class="btn badge py-0 rounded-pill bg-success">Seen
                                    <div wire:loading wire:target="selectItem({{$data->id}}, 'desableNotification')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </span>
                                @else
                                <span wire:click="selectItem({{$data->id}}, 'enableNotification')" class="btn badge py-0 rounded-pill bg-warning">Unseen
                                    <div wire:loading wire:target="selectItem({{$data->id}},'enableNotification')" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </span>
                                @endif
                            </td>
                            <td>{{ $data->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="d-flex">
                                    <button data-toggle="tooltip" data-bs-placement="top" title="View {{$data->product_name}} Review" wire:click="selectItem({{$data->id}}, 'view')" class="badge badge-info mr-2 border-info"><i class="fas fa-eye"></i></button>
                                    <button data-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$data->id}})" class="badge badge-danger border-danger"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @php $n++ @endphp
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