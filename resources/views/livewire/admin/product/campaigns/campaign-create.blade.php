<form id="product_create_form" wire:submit.prevent="save" enctype="multipart/form-data">
    <div class="row">
        @section('title')
        {{'campaign careate'}}
        @endsection
        @livewire('admin.category.sub-category-c-u')
        @livewire('admin.brands.brands-c-u')
        <!-- Main content -->
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label for="Title" class="">Name</label> <br>
                                @if($errors->has('title'))<span class="text-danger">{{$errors->first('title')}}</span> @endif
                                <input placeholder="Title" class="form-control" wire:model="title" type="text" id="title">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="slug" class="">Slug</label> <br>
                                @if($errors->has('slug'))<span class="text-danger">{{$errors->first('slug')}}</span> @endif
                                <input placeholder="Slug" wire:model="slug" class="form-control" type="text" id="slug">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label for="price">Regular Price</label> <br>
                                @if($errors->has('price'))<span class="text-danger">{{$errors->first('price')}}</span> @endif
                                <input class="form-control" wire:model="price" id="price" type="number" min="0.00" max="10000.00" step="0.01" />
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="sale_price">Sale Price</label> <br>
                                @if($errors->has('sale_price'))<span class="text-danger">{{$errors->first('sale_price')}}</span> @endif
                                <input class="form-control" type="number" min="1" wire:model="sale_price" id="sale_price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label for="quantity">Quantaty</label> <br>
                                @if($errors->has('quantity'))<span class="text-danger">{{$errors->first('quantity')}}</span> @endif
                                <input class="form-control" type="number" min="1" wire:model="quantity" id="quantity">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="availability">Availability</label> <br>
                                @if($errors->has('availability'))<span class="text-danger">{{$errors->first('availability')}}</span> @endif
                                <select class="form-control" wire:model.lazy="availability" id="availability">
                                    <option value="1">In Stock</option>
                                    <option value="0">Out Of Stock</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" wire:ignore>
                        <label>Description</label>
                        <textarea class="form-control" data-note="@this" id="editor" wire:model="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>On sell Permition <small class="text-info">(Optional)</small></label>
                        @if($errors->has('sellingStatus'))<span class="text-danger">{{$errors->first('sellingStatus')}}</span> @endif
                        <select wire:model.lazy="sellingStatus" class="form-control" name="sellingStatus" id="sellingStatus">
                            <option>Select</option>
                            <option value="1">On Sell Product</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button id="submit" type="submit" class="btn btn-block btn-info">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="category">Sub Category</label> <br>
                        @if($errors->has('subcategory_id'))<span class="text-danger">{{$errors->first('subcategory_id')}}</span> @endif
                        <select class="form-control" wire:model.lazy="subcategory_id">
                            <option>Select</option>
                            @foreach($subcategory as $catdata)
                            <option value="{{$catdata->id}}">{{$catdata->name}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-sm btn-info mt-2" data-toggle="modal" data-target="#modalForm">+New Category</button>
                    </div>
                    <div class="form-group">
                        <label for="category">Brand</label> <br>
                        @if($errors->has('brand_id'))<span class="text-danger">{{$errors->first('brand_id')}}</span> @endif
                        <select class="form-control" wire:model.lazy="brand_id">
                            <option>Select</option>
                            @foreach($brands as $branddata)
                            <option value="{{$branddata->id}}">{{$branddata->name}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-sm btn-info mt-2" data-toggle="modal" data-target="#modalBrandForm">+New Brand</button>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label> <br>
                        @if($errors->has('thumbnail'))<span class="text-danger">{{$errors->first('thumbnail')}}</span> @endif
                        @if ($thumbnail)
                        <img width="50px" src="{{ $thumbnail->temporaryUrl() }}">
                        @endif
                        <input id="thumbnail{{ $iteration }}" type="file" wire:model="thumbnail" id="thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="image">Images</label> <br>
                        @if($errors->has('image.*'))<span class="text-danger">{{$errors->first('image')}}</span> @endif
                        @if ($image)
                        @foreach($image as $pimage)
                        <img width="150px" src="{{ $pimage->temporaryUrl() }}">
                        <i wire:click.prevent="removepreviewImg({{$loop->index}})" class="fa fa-trash btn text-danger p-0 m-0"></i>
                        @endforeach
                        @endif
                        <input multiple type="file" wire:model="image" id="upload{{ $iteration }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@push('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            document.querySelector('#submit').addEventListener('click', () => {
                let note = $('#editor').data('note');
                eval(note).set('description', editor.getData());
            });
        })
        .catch(error => {
            console.error(error);

        });
</script>
@endpush