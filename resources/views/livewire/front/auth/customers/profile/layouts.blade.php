<div class="col-sm-12 col-md-4">
    <div class="card wrap-profile-content">
        <form wire:submit.prevent="changeprofile">
            <div class="card-body px-0 bgffffff">
                @if ($profile_photo_path !== null)
                @if($errors->has('profile_photo_path'))<br> <span class="text-danger">{{$errors->first('profile_photo_path')}}</span> <br> @endif
                <div class="w-100 m-auto text-align-center">
                    <img class="img-thumbnail text-align-center" height="150px" width="150px" src="{{ $profile_photo_path->temporaryUrl() }}">
                    <div class="mt-2">
                        <input type="submit" value="Save Change" class="btn btn-success">
                        <i wire:click.prevent="removepreview('profile_photo_path')" class="fa fa-trash btn btn-danger text-danger"></i>
                    </div>
                </div>
                @else
                <div class="text-center profile-wrape position-relative mt-3">
                    <img class="profile-image" width="150px" src='@if(isset($oldProfile_photo_path)) {{asset("uploads/user/$oldProfile_photo_path")}} @else{{asset("defaults/user.png")}} @endif' alt="{{Auth::user()->profile_photo_path}}">
                    <div class="position-absolute profile-edit-option">
                        <label for="customerprofile">
                            <i style="cursor:pointer" class="fa fa-edit font-weight-bold"></i>
                        </label>
                    </div>
                </div>
                @endif
                <!-- input fieldset end -->
                <input wire:model.lazy="profile_photo_path" style="visibility: hidden;" class="" type="file" id="customerprofile">
                <!-- input fieldset end -->
                <div class="text-center mb-5">
                    <h2 class="title font-weight-bold font-family-popins">{{ ucfirst(Auth::user()->first_name) }}{{ucfirst(Auth::user()->last_name) }}</h2>
                    <strong class="font-family-nunito">{{ Auth::user()->phone }}</strong>
                </div>
                <div class="list-group mb-5">
                    <a href="{{route('user.profile')}}" class="font-family-popins border_none background_none list-group-item {{(request()->is('user/profile'))?'hover profileitem_active':''}}"><i class="mr-2 fa fa-user"></i>Basic Information</a>
                    <a href="{{route('user.address')}}" class="font-family-popins border_none background_none list-group-item {{(request()->is('user/address'))?'hover profileitem_active':''}}"><i class="mr-2 fa fa-address-book"></i>Address</a>
                    <a href="{{route('user.orders')}}" class="font-family-popins border_none background_none list-group-item {{(request()->is('user/orders'))?'hover profileitem_active':''}}"><i class="mr-2 fa fa-smile-o"></i> Orders</a>
                    <a href="{{route('user.notification')}}" class="font-family-popins border_none background_none list-group-item {{(request()->is('user/notification'))?'hover profileitem_active':''}}"><i class="mr-2 fa fa-smile-o"></i> Notification</a>
                    <a href="{{route('user.reviews')}}" class="font-family-popins border_none background_none list-group-item {{(request()->is('user/reviews*'))?'hover profileitem_active':''}}"><i class="mr-2 fa fa-star"></i>Reviews</a>
                    <a href="{{route('user.password')}}" class="font-family-popins border_none background_none list-group-item {{(request()->is('user/password'))?'hover profileitem_active':''}}"><i class="mr-2 fa fa-key"></i> Password</a>
                    <a href="{{route('user.transections')}}" class="font-family-popins border_none background_none list-group-item {{(request()->is('user/transections'))?'hover profileitem_active':''}}"><i class="mr-2 fa fa-bars"></i> Transaction</a>
                </div>
            </div>
        </form>
        <style>
            .inner {
                display: flex;
                overflow-x: scroll;
            }

            /* .inner::-webkit-scrollbar {
                height: 1px;
            } */
        </style>
    </div>
</div>