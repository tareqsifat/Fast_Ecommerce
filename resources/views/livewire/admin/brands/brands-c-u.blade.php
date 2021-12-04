<div wire:ignore.self class="modal fade" id="modalBrandForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Brand</h5>
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
                        <label for="brand_logo">Brand Logo:</label>
                        @if($errors->has('brand_logo'))<span class="text-danger">{{$errors->first('brand_logo')}}</span> <br> @endif
                        <input id="image{{ $iteration }}" type="file" wire:model="brand_logo" id="brand_logo">

                        @if ($brand_logo)
                        <img class="img-thumbnail" height="80px" width="80px" src="{{ $brand_logo->temporaryUrl() }}">
                        <i wire:click.prevent="removepreviewThumb" class="fa fa-trash btn text-danger p-0 m-0"></i>
                        @else
                        <img width="80px" class="img-thumbnail" src='{{asset("uploads/brands/$old_brand_logo")}}' alt="{{$old_brand_logo}}">
                        @endif
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
                <button wire:click="save" class="btn btn-sm btn-info"> Save</button>
            </div>
        </div>
    </div>
</div>