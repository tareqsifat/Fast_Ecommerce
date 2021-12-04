<form id="product_create_form" wire:submit.prevent="updateProduct" enctype="multipart/form-data">
    <div class="row">
        @section('title')
        {{'Product Edit'}}
        @endsection
        @livewire('admin.category.category-create')
        @livewire('admin.category.sub-category-c-u')
        @livewire('admin.child-category.child-category-c-u')
        @livewire('admin.category.baby-category-c-u')
        @livewire('admin.brands.brands-c-u')
        @livewire('admin.product.product-specification-create')
        @livewire('admin.product.product-specification-update')
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
                                <input class="form-control" wire:model="price" id="price" type="text" />
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="sale_price">Offer Price</label> <br>
                                @if($errors->has('sale_price'))<span class="text-danger">{{$errors->first('sale_price')}}</span> @endif
                                <input class="form-control" placeholder="Offer Price" type="text" wire:model="sale_price" id="sale_price">
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
                                <select class="form-control" name="availability" id="availability">
                                    <option value="1">In Stock</option>
                                    <option value="0">Out Of Stock</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                @if($errors->has('sold'))<span class="text-danger">{{$errors->first('sold')}}</span> @endif
                                <label>Sold <small class="text-info">( You Can Use This Only Integer Value )</small></label>
                                <div class="d-flex">
                                    <input type="number" wire:model="sold" placeholder="Sold" class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                @if($errors->has('color'))<span class="text-danger">{{$errors->first('color')}}</span> @endif
                                <label>Color <small class="text-info">( Use | to separation each name )</small></label>
                                <div class="d-flex">
                                    <input placeholder="Ex: Black | White" type="text" wire:model="color" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" wire:ignore>
                        <label>Short Description</label>
                        <textarea class="form-control" data-note="@this" id="editor" wire:model="description">{!! $description !!}</textarea>
                    </div>
                    <div class="form-group" wire:ignore>
                        <label>Description</label>
                        @if($errors->first('shortdescription')) <span class="text-danger">{{ $errors->first('shortdescription') }}</span> @endif
                        <textarea class="form-control" name="shortdescription" id="editable" wire:model="shortdescription">{{$shortdescription}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-sm btn-info my-2" data-toggle="modal" data-target="#modalspecificationForm">+ Product Specification</button>
                        @foreach($oldspecification as $psp)
                        <div class="card">
                            <div class="card-header">{{$psp->title}}
                                <span class="float-right p-0">
                                    <i wire:click.prevent="PsPAction({{$psp->id}}, 'edit')" class="fa fa-edit text-info btn"></i>
                                    <i onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click.prevent="PsPAction({{$psp->id}}, 'delete')" class="fa fa-trash text-danger btn"></i>
                                </span>
                            </div>
                            <div class="card-body">
                                @foreach($psp->ProductSpecificationOptions as $pSop)
                                <table class="table table-stripd">
                                    <tbody>
                                        <tr>
                                            <td>{{$pSop->name}}</td>
                                            <td>{{$pSop->description}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        @foreach($specification as $psp)
                        <div class="card">
                            <div class="card-header">{{$psp->title}} <small class="text-info"><i>New</i></small>
                                <span class="float-right p-0">
                                    <i wire:click.prevent="PsPAction({{$psp->id}}, 'edit')" class="fa fa-edit text-info btn"></i>
                                    <i onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click.prevent="PsPAction({{$psp->id}}, 'delete')" class="fa fa-trash text-danger btn"></i>
                                </span>
                            </div>
                            <div class="card-body">
                                @foreach($psp->ProductSpecificationOptions as $pSop)
                                <table class="table table-stripd">
                                    <tbody>
                                        <tr>
                                            <td>{{$pSop->name}}</td>
                                            <td>{{$pSop->description}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <button id="submit" type="submit" class="btn btn-block btn-info">Save
                            <span wire:loading wire:target="updateProduct" class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="category">Category</label> <br>
                        @if($errors->has('category_id'))<span class="text-danger">{{$errors->first('category_id')}}</span> @endif
                        <select class="form-control" wire:model.lazy="category_id">
                            <option>Select</option>
                            @foreach($category as $pcatdata)
                            <option value="{{$pcatdata->id}}">{{$pcatdata->name}} {{ ($pcatdata->product->count() > 0 ) ? "(".$pcatdata->product->count().")" : '' }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-sm mt-2 text-info" data-toggle="modal" data-target="#pcatmodalForm">
                            <u> + New Category</u>
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="category">Sub Category</label> <br>
                        @if($errors->has('subcategory_id'))<span class="text-danger">{{$errors->first('subcategory_id')}}</span> @endif
                        <select class="form-control" wire:model.lazy="subcategory_id">
                            <option>Select</option>
                            @foreach($subcategory as $catdata)
                            <option value="{{$catdata->id}}">{{$catdata->name}} {{ ($catdata->product->count() > 0 ) ? "(".$catdata->product->count().")" : '' }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-sm mt-2 text-info" data-toggle="modal" data-target="#modalForm">
                            <u> + New Sub Category</u>
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="brand">Child Category</label> <br>
                        @if($errors->has('child_category'))<span class="text-danger">{{$errors->first('child_category')}}</span> @endif
                        <select class="form-control" wire:model.lazy="child_category">
                            <option>--Select--</option>
                            @foreach($childCategory as $childdItem)
                            <option value="{{$childdItem->id}}">{{$childdItem->name}}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-sm mt-2 text-info" data-toggle="modal" data-target="#modalC_CatForm">
                            <u> + New Child Category</u>
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="brand">Baby Category
                            <span wire:loading wire:target="baby_category_id" class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </span>
                        </label> <br>
                        @if($errors->has('baby_category_id'))<span class="text-danger">{{$errors->first('baby_category_id')}}</span> @endif
                        <select class="form-control" wire:model.lazy="baby_category_id">
                            <option>--Select--</option>
                            @foreach($babyCategory as $babyItem)
                            <option value="{{$babyItem->id}}">{{$babyItem->name}}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-sm mt-2 text-info" data-toggle="modal" data-target="#baby_Cat_Form">
                            <u> + New Baby Category</u>
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="brand">New Born Category
                            <span wire:loading wire:target="new_born_category_id" class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </span>
                        </label> <br>
                        @if($errors->has('new_born_category_id'))<span class="text-danger">{{$errors->first('new_born_category_id')}}</span> @endif
                        <select class="form-control" wire:model.lazy="new_born_category_id">
                            <option>--Select--</option>
                            @foreach($newBornCategory as $newBornItem)
                            <option value="{{$newBornItem->id}}">{{$newBornItem->name}}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-sm mt-2 text-info" data-toggle="modal" data-target="#new_born_Cat_Form">
                            <u> + New Born Category</u>
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="brand">Before Born Category </label> <br>
                        @if($errors->has('before_born_category_id'))<span class="text-danger">{{$errors->first('before_born_category_id')}}</span> @endif
                        <select class="form-control" wire:model.lazy="before_born_category_id">
                            <option>--Select--</option>
                            @foreach($beforeBorn as $beforeBorn)
                            <option value="{{$beforeBorn->id}}">{{$beforeBorn->name}}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-sm mt-2 text-info" data-toggle="modal" data-target="#befor_born_Cat_Form">
                            <u> + Before Born Category</u>
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="category">Brand</label> <br>
                        @if($errors->has('brand_id'))<span class="text-danger">{{$errors->first('brand_id')}}</span> @endif
                        <select class="form-control" wire:model.lazy="brand_id">
                            <option>Select</option>
                            @foreach($brands as $branddata)
                            <option value="{{$branddata->id}}">{{$branddata->name}} {{ ($branddata->product->count() > 0 ) ? "(".$branddata->product->count().")" : '' }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-sm mt-2 text-info" data-toggle="modal" data-target="#modalBrandForm">
                            <u> + New Brand</u>
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="campaign">Product For
                            <span wire:loading wire:target="product_for" class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </span>
                        </label> <br>
                        @if($errors->has('product_for'))<span class="text-danger">{{$errors->first('product_for')}}</span> @endif
                        <select class="form-control" wire:model.lazy="product_for">
                            <option value="fast_deals">Fast Deals</option>
                            <option value="campaign">Campaign</option>
                            <option value="shipping">Shipping</option>
                        </select>
                    </div>
                    <div class="form-group">
                        @if($errors->has('shipping'))<span class="text-danger">{{$errors->first('shipping')}}</span> @endif
                        <input type="checkbox" wire:model.lazy="shipping" value="1" id="shippingId">
                        <label for="shippingId">Shipping Product
                            <span wire:loading wire:target="shipping" class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </span>
                        </label>
                    </div>
                    @if($shipping || $product_for == 'shipping')
                    <div class="form-group">
                        <label for="impa_code">IMPA CODE</label> <br>
                        @if($errors->has('impa_code'))<span class="text-danger">{{$errors->first('impa_code')}}</span> @endif
                        <input class="form-control" placeholder="IMPA CODE" type="text" wire:model.lazy="impa_code" id="impa_code">
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="offer_time">Offer Time</label> <br>
                        @if($errors->has('offer_time'))<span class="text-danger">{{$errors->first('offer_time')}}</span> @endif
                        <input class="form-control" type="datetime-local" wire:model.lazy="offer_time" id="offer_time">
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label> <br>
                        @if($errors->has('thumbnail'))<span class="text-danger">{{$errors->first('thumbnail')}}</span> <br> @endif
                        @if ($thumbnail)
                        <img class="img-thumbnail" height="80px" width="150px" src="{{ $thumbnail->temporaryUrl() }}">
                        <i wire:click.prevent="removepreviewThumb" class="fa fa-trash btn text-danger p-0 m-0"></i>
                        @else
                        <img class="img-thumbnail" height="80px" width="150px" src='{{asset("uploads/products/thumbnails/$product->thumbnail")}}'>
                        @endif
                        <input class="mt-2" id="thumbnail{{ $iteration }}" type="file" wire:model="thumbnail" id="thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="image">Images</label> <br>
                        @if($errors->has('image.*'))<span class="text-danger">{{$errors->first('image')}}</span> <br> @endif
                        @if ($image)
                        @foreach($image as $pimage)
                        <img class="img-thumbnail" height="80px" width="150px" src="{{ $pimage->temporaryUrl() }}">
                        <i wire:click.prevent="removepreviewImg({{$loop->index}})" class="fa fa-trash btn text-danger p-0 m-0"></i>
                        @endforeach
                        @endif
                        @foreach($product->productimages as $oldimage)
                        <img class="img-thumbnail" height="80px" width="150px" src='{{asset("uploads/products/images/$oldimage->image")}}'>
                        <i onclick="confirm('Are you sure to delete this product image?') || event.stopImmediatePropagation()" wire:click.prevent="removeOldImg({{$oldimage->id}})" class="fa fa-trash btn text-danger p-0 m-0"></i>
                        @endforeach
                        <input class="mt-2" multiple type="file" wire:model="image" id="upload{{ $iteration }}">
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
    $(document).ready(function() {
        $('#editable').summernote({
            height: 100,
            codemirror: {
                theme: 'monokai'
            },
            callbacks: {
                onChange: function(e) {
                    @this.set('shortdescription', e);
                }
            }
        });
    });
</script>
@endpush