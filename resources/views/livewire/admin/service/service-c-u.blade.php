<div wire:ignore.self class="modal fade" id="modalForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Service</h5>
                <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card p-3">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        @if($errors->has('title'))<span class="text-danger">{{$errors->first('title')}}</span> @endif
                        <input wire:model="title" id="title" type="text" placeholder="Title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="subtitle">SubTitle:</label>
                        @if($errors->has('subtitle'))<span class="text-danger">{{$errors->first('subtitle')}}</span> @endif
                        <input wire:model="subtitle" id="subtitle" placeholder="Subtitle" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon:</label>
                        @if($errors->has('icon')) <br>
                        <span class="text-danger">{{$errors->first('icon')}}</span>
                        @endif
                        <ul class="list-unstyled d-flex">
                            <li class="mr-2">
                                <input value="truck" type="radio" wire:model="icon" id="truck">
                                <label for="truck"><i class="fa fa-truck"></i></label>
                            </li>
                            <li class="mr-2">
                                <input value="recycle" type="radio" wire:model="icon" id="recycle">
                                <label for="recycle"><i class="fa fa-recycle"></i></label>
                            </li>
                            <li class="mr-2">
                                <input value="credit-card" type="radio" wire:model="icon" id="credit-card">
                                <label for="credit-card"><i class="fa fa-credit-card"></i></label>
                            </li>
                            <li class="mr-2">
                                <input value="users" type="radio" wire:model="icon" id="users">
                                <label for="users"><i class="fa fa-users"></i></label>
                            </li>
                            <li class="mr-2">
                                <input value="gift" type="radio" wire:model="icon" id="gift">
                                <label for="gift"><i class="fa fa-gift"></i></label>
                            </li>
                            <li class="mr-2">
                                <input value="reply" type="radio" wire:model="icon" id="reply">
                                <label for="reply"><i class="fa fa-reply"></i></label>
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="image">Images</label> <br>
                        @if($errors->has('image'))<span class="text-danger">{{$errors->first('image')}}</span> <br> @endif
                        @if ($image)
                        @foreach($image as $pimage)
                        <img class="img-thumbnail" height="30px" width="30px" src="{{ $pimage->temporaryUrl() }}">
                        <i wire:click.prevent="removepreviewImg({{$loop->index}})" class="fa fa-trash btn text-danger p-0 m-0"></i>
                        @endforeach
                        @endif
                        @if($oldimageData)
                        @foreach($oldimageData as $oldimage)
                        <img class="img-thumbnail" height="30px" width="30px" src='{{asset("uploads/services/$oldimage->image")}}'>
                        <i onclick="confirm('Are you sure to delete this product image?') || event.stopImmediatePropagation()" wire:click.prevent="removeOldImg({{$oldimage->id}})" class="fa fa-trash btn text-danger p-0 m-0"></i>
                        @endforeach
                        @endif
                        <input class="mt-2" multiple type="file" wire:model="image" id="upload{{ $iteration }}">
                    </div>
                    <div class="form-group">
                        <label for="background">Background:</label>
                        @if($errors->has('background'))<span class="text-danger">{{$errors->first('background')}}</span> @endif
                        <input class="form-control" type="color" wire:model="background" id="background">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        @if($errors->has('description'))<span class="text-danger">{{$errors->first('description')}}</span> @endif
                        <textarea class="form-control" wire:model="description" id="description" cols="30" placeholder="Max 1000 Character" rows="10"></textarea>
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