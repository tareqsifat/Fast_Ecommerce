<div class="col-9">
    <h6 class="font-weight-bold">Edit Shop</h6>
    <form wire:submit.prevent="save">
        <div class="row">
            <div class="col-sm-12 col-md-5 mb-5">
                <div class="form-group">
                    @if ($profile_photo_path !== null)
                    @if($errors->has('profile_photo_path'))<br> <span class="text-danger">{{$errors->first('profile_photo_path')}}</span> <br> @endif
                    <img class="img-thumbnail" height="80px" width="150px" src="{{ $profile_photo_path->temporaryUrl() }}">
                    <i wire:click.prevent="removepreview('profile_photo_path')" class="fa fa-trash btn text-danger p-0 m-0"></i>
                    @else
                    <label for="profile" class="bg-light">
                        <div class="dropzoon-lavel">click hare to upload</div>
                    </label>
                    <input wire:model.lazy="profile_photo_path" type="file" class="d-none" id="profile">
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-5 mb-5">
                <img height="200" width="200" src='@if(isset(Auth::user()->profile_photo_path))
                                {{asset("uploads/user/profile/$oldprofile_photo_path")}} @else{{asset("defaults/user.png")}} @endif' alt="{{Auth::user()->profile_photo_path}}" class="rounded-circle text-align-center">
            </div>
        </div>
        <div class="form-group">

            <label for="shop_name">Shop Name</label>
            @if($errors->has('shop_name'))<br> <span class="text-danger">{{$errors->first('shop_name')}}</span> <br> @endif
            <input wire:model.lazy="shop_name" type="text" class="form-control" placeholder="Shop Name">
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label for="first_name">First Name</label>
                    @if($errors->has('first_name'))<br> <span class="text-danger">{{$errors->first('first_name')}}</span> <br> @endif
                    <input wire:model.lazy="first_name" type="text" class="form-control" placeholder="First Name">
                </div>
                <div class="col-sm-12 col-md-6">
                    <label for="last_name">Last Name</label>
                    @if($errors->has('last_name'))<br> <span class="text-danger">{{$errors->first('last_name')}}</span> <br> @endif
                    <input wire:model.lazy="last_name" type="text" class="form-control" placeholder="Last Name">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label for="phone">Phone</label>
                    @if($errors->has('phone'))<br> <span class="text-danger">{{$errors->first('phone')}}</span> <br> @endif
                    <input wire:model.lazy="phone" type="text" class="form-control" placeholder="Phone">
                </div>
                <div class="col-sm-12 col-md-6">
                    <label for="email">Email</label>
                    @if($errors->has('email'))<br> <span class="text-danger">{{$errors->first('email')}}</span> <br> @endif
                    <input wire:model.lazy="email" type="text" class="form-control" placeholder="Email">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            @if($errors->has('description'))<br> <span class="text-danger">{{$errors->first('description')}}</span> <br> @endif
            <textarea class="form-control" wire:model.lazy="description" name="description" id="" cols="30" rows="10" placeholder="Description"></textarea>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label for="description">NID - Upload your NID photo to verify your identity</label>
                    @if ($nid !== null)
                    <img class="img-thumbnail" height="80px" width="150px" src="{{ $nid->temporaryUrl() }}">
                    <i wire:click.prevent="removepreview('nid')" class="fa fa-trash btn text-danger p-0 m-0"></i>
                    @else
                    @if($errors->has('nid'))<br> <span class="text-danger">{{$errors->first('nid')}}</span> <br> @endif
                    <label class="bg-light" for="nid">
                        <div class="dropzoon-lavel"><i class="dripicons-upload"></i></div>
                    </label>
                    <input wire:model.lazy="nid" type="file" class="d-none" id="nid">
                    @endif
                </div>
                <div class="col-sm-12 col-md-6">
                    @if(!empty($oldnid))
                    <img class="img-thumbnail" height="80px" width="150px" src='{{asset("uploads/user/profile/nid/$oldnid")}}'>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label for="description">Trade License - Upload your trade license photo to verify your business</label>
                    @if ($tid !== null )
                    <img class="img-thumbnail" height="80px" width="150px" src="{{ $tid->temporaryUrl() }}">
                    <i wire:click.prevent="removepreview('tid')" class="fa fa-trash btn text-danger p-0 m-0"></i>
                    @else
                    @if($errors->has('tid'))<br> <span class="text-danger">{{$errors->first('tid')}}</span> <br> @endif
                    <label for="tid" class="bg-light">
                        <div class="dropzoon-lavel"><i class="dripicons-upload"></i></div>
                    </label>
                    <input wire:model.lazy="tid" type="file" class="d-none" id="tid">
                    @endif
                </div>
                <div class="col-sm-12 col-md-6">
                    @if(!empty($oldtid))
                    <img class="img-thumbnail" height="80px" width="150px" src='{{asset("uploads/user/profile/tid/$oldtid")}}'>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" value="Save" class="btn btn-dark">
        </div>
    </form>
</div>