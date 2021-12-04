<div class="row">
    @section('title')
    {{'profile'}}
    @endsection
    @section('styles')
    <style>
        .dropzoon-lavel {
            height: 150px;
            content: "";
            width: 200px;
            border: 2px dashed #777;
            cursor: pointer;
            text-align: center;
            padding-top: 50px;
        }
    </style>
    @endsection
    <!-- Main content -->
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h6 class="font-weight-bold">Edit Profile</h6>
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
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label for="first_name">First Name</label>
                                @if($errors->has('first_name'))<br> <span class="text-danger">{{$errors->first('first_name')}}</span> <br> @endif
                                <input wire:model.lazy="first_name" type="text" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="last_name">LastName</label>
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
                        <input type="submit" value="Save" class="btn btn-dark">
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <h6 class="font-weight-bold">Change Password</h6>
                        <form wire:submit.prevent="changePassword">
                            @if (!is_null($message))
                            <div class="mx-2 alert alert-danger">
                                {{ $message }}
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="password">Password</label>
                                @if($errors->has('oldPassword'))<br> <span class="text-danger">{{$errors->first('oldPassword')}}</span> <br> @endif
                                <input wire:model.lazy="oldPassword" type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                @if($errors->has('password'))<br> <span class="text-danger">{{$errors->first('password')}}</span> <br> @endif
                                <input wire:model.lazy="password" type="password" class="form-control" placeholder="New Password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                @if($errors->has('password_confirmation'))<br> <span class="text-danger">{{$errors->first('password_confirmation')}}</span> <br> @endif
                                <input wire:model.lazy="password_confirmation" type="password" class="form-control" placeholder="Password Confirmation">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Save" class="btn btn-dark">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>