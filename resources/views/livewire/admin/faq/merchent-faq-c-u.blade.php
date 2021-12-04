<div wire:ignore.self class="modal fade" id="modalBrandForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Faq</h5>
                <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card p-3">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        @if($errors->has('title'))<span class="text-danger">{{$errors->first('title')}}</span> @endif
                        <input wire:model="title" id="title" type="text" placeholder="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        @if($errors->has('description'))<span class="text-danger">{{$errors->first('description')}}</span> @endif
                        <textarea wire:model="description" id="description" type="text" class="form-control" placeholder="Max 2000 Charecters" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Faq For:</label>
                        @if($errors->has('faq_for'))<span class="text-danger">{{$errors->first('faq_for')}}</span> @endif
                        <select wire:model.lazy="faq_for" id="" class="form-control">
                            <option> Select..</option>
                            <option value="global">Global </option>
                            <option value="merchent"> Merchent </option>
                            <option value="customers">Customers </option>
                        </select>
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