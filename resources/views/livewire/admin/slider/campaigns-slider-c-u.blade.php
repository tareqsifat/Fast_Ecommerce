<div wire:ignore.self class="modal fade" id="modalForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Campaign Slider</h5>
                <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card p-3">
                    <div class="form-group">
                        <label for="name">Slider Name:</label>
                        @if($errors->has('name'))<span class="text-danger">{{$errors->first('name')}}</span> @endif
                        <input wire:model="name" id="name" type="text" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <label for="url">Slider Url:</label>
                                @if($errors->has('url'))<span class="text-danger">{{$errors->first('url')}}</span> @endif
                                <input wire:model="url" id="url" type="text" placeholder="Slider url" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- sub title  -->
                    <div class="form-group">
                        <label for="image">Slider Image:</label><br>
                        @if($errors->has('image'))<span class="text-danger">{{$errors->first('image')}}</span> <br> @endif
                        <input id="image{{ $iteration }}" type="file" wire:model="image" id="image">
                        @if ($image)
                        <img class="img-thumbnail" height="80px" width="150px" src="{{ $image->temporaryUrl() }}">
                        <i wire:click.prevent="removepreviewThumb" class="fa fa-trash btn text-danger p-0 m-0"></i>
                        @elseif(isset($oldImage))
                        <img class="img-thumbnail" height="80px" width="150px" src='{{asset("uploads/sliders/campaignslider/$oldImage")}}'>
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