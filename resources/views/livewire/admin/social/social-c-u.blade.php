<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Social Item</h5>
                    <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card p-3">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            @if($errors->has('name'))<span class="text-danger">{{$errors->first('name')}}</span> @endif
                            <input placeholder="Name" wire:model="name" id="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon:</label>
                            @if($errors->has('icon')) <br>
                            <span class="text-danger">{{$errors->first('icon')}}</span>
                            @endif
                            <div class="row icon-demo-content">
                                <div class="col-1">
                                    <input value="fab fa-facebook" type="radio" wire:model="icon" id="fab fa-facebook">
                                    <label for="fab fa-facebook"> <i class="fab fa-facebook"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-facebook-f" type="radio" wire:model="icon" id="fab fa-facebook-f">
                                    <label for="fab fa-facebook-f"> <i class="fab fa-facebook-f"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-facebook-messenger" type="radio" wire:model="icon" id="fab fa-facebook-messenger">
                                    <label for="fab fa-facebook-messenger"> <i class="fab fa-facebook-messenger"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-facebook-square" type="radio" wire:model="icon" id="fab fa-facebook-square">
                                    <label for="fab fa-facebook-square"> <i class="fab fa-facebook-square"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-twitter" type="radio" wire:model="icon" id="fab fa-twitter">
                                    <label for="fab fa-twitter"> <i class="fab fa-twitter"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-twitter-square" type="radio" wire:model="icon" id="fab fa-twitter-square">
                                    <label for="fab fa-twitter-square"> <i class="fab fa-twitter-square"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fas fa-envelope" type="radio" wire:model="icon" id="fas fa-envelope">
                                    <label for="fas fa-envelope"> <i class="fas fa-envelope"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-linkedin" type="radio" wire:model="icon" id="fab fa-linkedin">
                                    <label for="fab fa-linkedin"> <i class="fab fa-linkedin"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-linkedin-in" type="radio" wire:model="icon" id="fab fa-linkedin-in">
                                    <label for="fab fa-linkedin-in"> <i class="fab fa-linkedin-in"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-google-plus-g" type="radio" wire:model="icon" id="fab fa-google-plus-g">
                                    <label for="fab fa-google-plus-g"> <i class="fab fa-google-plus-g"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-google" type="radio" wire:model="icon" id="fab fa-google">
                                    <label for="fab fa-google"> <i class="fab fa-google"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-vimeo" type="radio" wire:model="icon" id="fab fa-vimeo">
                                    <label for="fab fa-vimeo"> <i class="fab fa-vimeo"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-vimeo-square" type="radio" wire:model="icon" id="fab fa-vimeo-square">
                                    <label for="fab fa-vimeo-square"> <i class="fab fa-vimeo-square"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-viber" type="radio" wire:model="icon" id="fab fa-viber">
                                    <label for="fab fa-viber"> <i class="fab fa-viber"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-whatsapp" type="radio" wire:model="icon" id="fab fa-whatsapp">
                                    <label for="fab fa-whatsapp"> <i class="fab fa-whatsapp"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-whatsapp-square" type="radio" wire:model="icon" id="fab fa-whatsapp-square">
                                    <label for="fab fa-whatsapp-square"> <i class="fab fa-whatsapp-square"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-youtube" type="radio" wire:model="icon" id="fab fa-youtube">
                                    <label for="fab fa-youtube"> <i class="fab fa-youtube"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-youtube-square" type="radio" wire:model="icon" id="fab fa-youtube-square">
                                    <label for="fab fa-youtube-square"> <i class="fab fa-youtube-square"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fas fa-street-view" type="radio" wire:model="icon" id="fas fa-street-view">
                                    <label for="fas fa-street-view"> <i class="fas fa-street-view"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-skype" type="radio" wire:model="icon" id="fab fa-skype">
                                    <label for="fab fa-skype"> <i class="fab fa-skype"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fas fa-share-alt" type="radio" wire:model="icon" id="fas fa-share-alt">
                                    <label for="fas fa-share-alt"> <i class="fas fa-share-alt"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fas fa-share-alt-square" type="radio" wire:model="icon" id="fas fa-share-alt-square">
                                    <label for="fas fa-share-alt-square"> <i class="fas fa-share-alt-square"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fas fa-rss" type="radio" wire:model="icon" id="fas fa-rss">
                                    <label for="fas fa-rss"> <i class="fas fa-rss"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fas fa-location-arrow" type="radio" wire:model="icon" id="fas fa-location-arrow">
                                    <label for="fas fa-location-arrow"> <i class="fas fa-location-arrow"></i> </label>
                                </div>
                                <div class="col-1">
                                    <input value="fab fa-yahoo" type="radio" wire:model="icon" id="fab fa-yahoo">
                                    <label for="fab fa-yahoo"> <i class="fab fa-yahoo"></i> </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="url">Url:</label>
                            @if($errors->has('url'))<span class="text-danger">{{$errors->first('url')}}</span> @endif
                            <input wire:model="url" id="url" type="url" class="form-control" placeholder="Enter Your Url" rows="5">
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
</div>