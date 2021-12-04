<div wire:ignore.self class="modal fade" id="modalBrandForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Notification</h5>
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
                        <label for="user_id">User ID:</label>
                        @if($errors->has('user_id'))<span class="text-danger">{{$errors->first('user_id')}}</span> @endif
                        <input wire:model="user_id" id="user_id" type="number" min="1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="body">Body:</label>
                        @if($errors->has('body'))<span class="text-danger">{{$errors->first('body')}}</span> @endif
                        <textarea wire:model="body" placeholder="Message Body" id="body" type="text" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="notification_for">Notification For:</label>
                        @if($errors->has('notification_for'))<span class="text-danger">{{$errors->first('notification_for')}}</span> @endif
                        <select class="form-control" wire:model="notification_for" id="notification_for">
                            <option>--Select--</option>
                            <option value="merchent"> Merchents</option>
                            <option value="customers"> Customers</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message_type">Notification Type:</label>
                        @if($errors->has('message_type'))<span class="text-danger">{{$errors->first('message_type')}}</span> @endif
                        <select class="form-control" wire:model="message_type" id="message_type">
                            <option>--Select--</option>
                            <option value="alert"> Alert</option>
                            <option value="warning">Warning</option>
                            <option value="success">Success</option>
                            <option value="error">Error</option>
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