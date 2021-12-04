<div wire:ignore.self class="modal fade" id="modalC_CatForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Child Category</h5>
                <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card p-3">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        @if($errors->has('name'))<span class="text-danger">{{$errors->first('name')}}</span> @endif
                        <input wire:model="name" id="name" type="text" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug:</label>
                        @if($errors->has('slug'))<span class="text-danger">{{$errors->first('slug')}}</span> @endif
                        <input wire:model="slug" id="slug" type="text" placeholder="slug" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        @if($errors->has('image'))<span class="text-danger">{{$errors->first('image')}}</span> <br> @endif
                        <input id="image{{ $iteration }}" type="file" wire:model="image" id="image">

                        @if ($image)
                        <img class="img-thumbnail" height="80px" width="80px" src="{{ $image->temporaryUrl() }}">
                        <i wire:click.prevent="removepreviewThumb" class="fa fa-trash btn text-danger p-0 m-0"></i>
                        @else
                        <img width="80px" class="img-thumbnail" src='{{asset("uploads/category/$old_image")}}' alt="{{$old_image}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="subcategory_id">Sub Category:</label>
                        @if($errors->has('subcategory_id'))<span class="text-danger">{{$errors->first('subcategory_id')}}</span> @endif
                        <select wire:model="subcategory_id" id="subcategory_id" class="form-control">
                            <option>----Select SubCategory---</option>
                            @foreach($pBrands as $bitem)
                            <option value="{{$bitem->id}}">{{$bitem->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        @if($errors->has('description'))<span class="text-danger">{{$errors->first('description')}}</span> @endif
                        <textarea wire:model="description" id="description" type="text" class="form-control" placeholder="Max 2000 Charecters" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="close" type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
                <button wire:click="save" class="btn btn-sm btn-info"> Save
                    <span wire:loading wire:target="save" class="spinner-border spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>