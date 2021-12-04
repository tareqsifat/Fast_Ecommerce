<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Add New User</h5>
                    <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card p-3">
                        <div class="form-group">
                            <div class="row">
                                <!-- title  -->
                                <div class="col-sm-12 col-md-6">
                                    <label for="title">Name: <small><i></i></small></label>
                                    @if($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                    <input placeholder="Name" wire:model="name" id="name" type="text" class="form-control">
                                </div>
                                <!-- email  -->
                                <div class="col-sm-12 col-md-6">
                                    <label for="title">Email:</label>
                                    @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                    <input placeholder="Email" wire:model="email" id="email" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- image  -->
                        <div class="form-group">
                            <label for="image">Image:<small><i class="text-info">Image size high and width 250px-350px</i></small></label><br>
                            @if($errors->has('profile_photo_path'))
                            <span class="text-danger">{{$errors->first('profile_photo_path')}}</span>
                            @endif
                            <input wire:model="profile_photo_path" id="image" type="file">
                            <!-- <div class="row"> -->
                            <!-- user-role  -->
                            <!-- <div class="col-sm-12 col-md-6"><label for="user_role">Role</label>
                                    <select wire:model="user_role" id="user_role" class="form-control">
                                        <option selected value="0">Admin</option>
                                        <option value="1">Editor</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-6"> -->
                            <!-- profile_photo_path  -->
                            <!-- </div> -->
                            <!-- </div> -->
                        </div>
                        <!-- password  -->
                        <div class="form-group">
                            <div class="row">
                                <!-- password  -->
                                <div class="col-sm-12 col-md-6">
                                    <label for="image">Password:</label><br>
                                    @if($errors->has('password'))
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                    @endif
                                    <input placeholder="Password" wire:model="password" id="password" class="form-control" type="password">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <!-- password  -->
                                    <label for="image">Confirmation Password:</label><br>
                                    @if($errors->has('password_confirmation'))
                                    <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                                    @endif
                                    <input placeholder="Confirm Password" wire:model="password_confirmation" id="password_confirmation" type="password" class="form-control">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="close" type="button" class="btn btn-sm btn-warning" data-di~smiss="modal">Close</button>
                    <button wire:click="save" class="btn btn-sm btn-info"> Save<span wire:loading wire:target="save">ing...</span></button>
                </div>
            </div>
        </div>
    </div>
</div>