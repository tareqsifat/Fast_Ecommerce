<div wire:ignore.self class="modal fade" id="messageOrderForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Send Message</h5>
                <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <form wire:submit.prevent="sendMessage">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                @if($errors->has('phone'))<span class="text-danger">{{$errors->first('phone')}}</span> @endif
                                <input type="phone" wire:model.lazy="phone" placeholder="Phone" id="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                @if($errors->has('email'))<span class="text-danger">{{$errors->first('email')}}</span> @endif
                                <input type="email" wire:model.lazy="email" placeholder="Email" id="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="message">Message Body</label>
                                @if($errors->has('message'))<span class="text-danger">{{$errors->first('message')}}</span> @endif
                                <textarea wire:model.lazy="message" placeholder="Message" id="message" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="message">Message Type</label>
                                @if($errors->has('messsage_type'))<span class="text-danger">{{$errors->first('messsage_type')}}</span> @endif
                                <select wire:model.lazy="messsage_type" class="form-control">
                                    <option>--Select--</option>
                                    <option value="cancel">Order Cancel</option>
                                    <option value="info">Order Info</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info">Send Message
                                    <div wire:loading wire:target="sendMessage" class="spinner-border spinner-border-sm" role="status">
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <div class="card">
                    <div class="card-body">
                        @if($ordermessage)
                        @foreach($ordermessage as $ordermessageItem)
                        <div class="row border p-2" style="margin-top:-1px ;">
                            <div class="col-12">
                                <p>{{$ordermessageItem->message}}</p>
                                <p>{{$ordermessageItem->created_at->format("d M Y")}}</p>
                                <button wire:click.prevent="delteOrdmessage({{$ordermessageItem->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <button wire:click="close" type="button" class="btn btn-sm btn-warning" aria-label="Close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        window.addEventListener('closeModal', event => {
            $('#messageOrderForm').modal('hide');
        })
    </script>
    @endpush
</div>