<div class="row">
    @section('title')
    {{'Products'}}
    @endsection
    <!-- Main content -->
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header border-0">
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalForm">
                    <a href="{{route('admin.products.create')}}" class="text-dark font-weight-bold">+ New product</a>
                </button>
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
                                    <th>No</th>
                                    <th>Product Code</th>
                                    <th>Title</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Thumbnail</th>
                                    <th>Sold</th>
                                    <th>Color</th>
                                    <th>Description</th>
                                    <th>Availability</th>
                                    <th>Quantity</th>
                                    <th>Regular Price</th>
                                    <th>Sale Price</th>
                                    <th>Offer Time</th>
                                    <th>status</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $data->product_code }}</td>
                                    <td>{{ Str::limit($data->title,30) }}</td>
                                    <td>{{ (isset($data->brands->name))? $data->brands->name:'Non Brand'}}</td>
                                    <td>{{ (isset($data->subcategories->name))?$data->subcategories->name:'Uncategories' }}</td>
                                    <td><img width="30px" src='{{asset("uploads/products/thumbnails/$data->thumbnail")}}' alt="{{$data->thumbnail}}"></td>
                                    <td>{{ $data->sold }}</td>
                                    <td>{{ $data->color }}</td>
                                    <td><span data-container="body" data-toggle="popover" data-placement="right" data-content="{{strip_tags($data->description)}}">{!! Str::limit(strip_tags($data->description), 20) !!}</span></td>
                                    <td>
                                        @if ($data->availability == 0)
                                        <span wire:click="selectItem({{$data->id}}, 'desableAvailability')" class="btn badge py-0 rounded-pill bg-success">In Stock
                                            <span wire:loading wire:target="selectItem({{$data->id}}, 'desableAvailability')" class="spinner-border spinner-border-sm" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </span>
                                        </span>
                                        @else
                                        <span wire:click="selectItem({{$data->id}}, 'enableAvailability')" class="btn badge py-0 rounded-pill bg-warning">Out Of Stock
                                            <span wire:loading wire:target="selectItem({{$data->id}}, 'enableAvailability')" class="spinner-border spinner-border-sm" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </span>
                                        </span>
                                        @endif
                                    </td>
                                    <td>{{ $data->quantity }}</td>
                                    <td>{{ $data->price }}</td>
                                    <td>{{ $data->sale_price }}</td>
                                    <td>{{ $data->offer_time }}</td>
                                    <td>
                                        @if ($data->status == 0)
                                        <span wire:click="selectItem({{$data->id}}, 'desable')" class="btn badge py-0 rounded-pill bg-success">Enabled
                                            <span wire:loading wire:target="selectItem({{$data->id}}, 'desable')" class="spinner-border spinner-border-sm" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </span>
                                        </span>
                                        @else
                                        <span wire:click="selectItem({{$data->id}}, 'enable')" class="btn badge py-0 rounded-pill bg-warning">Disable
                                            <span wire:loading wire:target="selectItem({{$data->id}}, 'enable')" class="spinner-border spinner-border-sm" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </span>
                                        </span>
                                        @endif
                                    </td>
                                    <td>{{ $data->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a target="_blank" href="{{route('single', $data->slug)}}" data-toggle="tooltip" data-bs-placement="top" title="view" class="btn btn-default"><i class="fas fa-eye text-info"></i></a>
                                            <a href="{{route('admin.products.edit', $data->id)}}" data-toggle="tooltip" data-bs-placement="top" title="Edit" class="btn btn-default"><i class="fas fa-edit text-warning"></i></a>
                                            <button data-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="delete({{$data->id}})" class="btn btn-default"><i class="fas fa-trash text-danger "></i></button>
                                        </div>
                                    </td>
                                </tr>
                                @php $i++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
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
        </div>
    </div>
</div>
<!-- /.card -->