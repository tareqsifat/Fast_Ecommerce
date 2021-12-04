<div wire:ignore.self class="modal fade" id="modalForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Sub Category</h5>
                <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card p-3">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        @if($errors->has('name'))<span class="text-danger">{{$errors->first('name')}}</span> @endif
                        <input wire:model="name" id="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Description:</label>
                        @if($errors->has('description'))<span class="text-danger">{{$errors->first('description')}}</span> @endif
                        <textarea wire:model="description" id="description" type="text" class="form-control" placeholder="Max 2000 Charecters" rows="5"></textarea>
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
                        <label for="name">Parent Category:</label>
                        @if($errors->has('category_id'))<span class="text-danger">{{$errors->first('category_id')}}</span> @endif
                        <select class="form-control" wire:model="category_id" id="category_id">
                            <option>--- Select ---</option>
                            @foreach($pcategory as $pc)
                            <option value="{{$pc->id}}">{{$pc->name}}</option>
                            @endforeach
                        </select>
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