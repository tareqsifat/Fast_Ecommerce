<div wire:ignore.self class="modal fade" id="pcatmodalForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Category</h5>
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
                        <label for="name">Description:</label>
                        @if($errors->has('description'))<span class="text-danger">{{$errors->first('description')}}</span> @endif
                        <textarea wire:model="description" id="description" type="text" class="form-control" placeholder="Max 2000 Charecters" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="banner_status">Show Banner In Home Page:</label>
                        @if($errors->has('banner_status'))<span class="text-danger">{{$errors->first('banner_status')}} <br></span> @endif
                        <input id="banner_status" type="checkbox" wire:model.lazy="banner_status" value="1">
                    </div>
                    <div class="form-group">
                        <label for="banner">Banner:</label>
                        @if($errors->has('banner'))<span class="text-danger">{{$errors->first('banner')}} <br></span> @endif
                        <input id="{{$iteration}}" type="file" wire:model="banner" id="">
                        @if($old_image)
                        <img width="80px" class="img-thumbnail" src='{{asset("uploads/category/$old_image")}}' alt="{{$old_image}}">
                        @endif
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