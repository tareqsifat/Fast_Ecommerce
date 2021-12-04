<div class="row">
    @section('title')
    {{'Merchant Products'}}
    @endsection
    <!-- Main content -->
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header border-0">
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
                                    <th>No <small class="text-info">{{$alldata->count()}}</small></th>
                                    <th>Product Code</th>
                                    <th>Title</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Thumbnail</th>
                                    <th>Description</th>
                                    <th>Availability</th>
                                    <th>Quantity</th>
                                    <th>Regular Price</th>
                                    <th>Sale Price</th>
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
                                    <td data-container="body" data-toggle="popover" data-placement="right" data-content="{{strip_tags($data->description)}}">{!! Str::limit(strip_tags($data->description), 20) !!}</td>
                                    <td>
                                        @if ($data->availability == 0)
                                        <span wire:click="selectItem({{$data->id}}, 'desableAvailability')" class="btn badge py-0 rounded-pill bg-success">In Stock </span>
                                        @else
                                        <span wire:click="selectItem({{$data->id}}, 'enableAvailability')" class="btn badge py-0 rounded-pill bg-warning">Out Of Stock</span>
                                        @endif
                                    </td>
                                    <td>{{ $data->quantity }}</td>
                                    <td>{{ $data->price }}</td>
                                    <td>{{ $data->sale_price }}</td>
                                    <td>
                                        @if ($data->status == 0)
                                        <span wire:click="selectItem({{$data->id}}, 'desable')" class="btn badge py-0 rounded-pill bg-success">Enabled </span>
                                        @else
                                        <span wire:click="selectItem({{$data->id}}, 'enable')" class="btn badge py-0 rounded-pill bg-warning">Disable</span>
                                        @endif
                                    </td>
                                    <td>{{ $data->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex">
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