<div class="wrap-icon-section minicart" wire:ignore.self>
    <div class="dropdown link-direction float-right" @if(Auth::user()) style="background: #ededed; padding-bottom:6px" @endif wire:ignore.self>
        @if(Auth::user() && Auth::user()->user_as == 'user')
        <div wire:click.prevent="open" class="userInfo_event dropdown-toggle btn py-0 px-2 m-0" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!-- if(isset(Auth::user()->profile_photo_path)) -->
            <img style="height: 25px;" width="25px" height="25px" src='@if(isset(Auth::user()->profile_photo_path))
            {{asset("uploads/user/"."/".Auth::user()->profile_photo_path)}} @else{{asset("defaults/user.png")}} @endif' alt="{{Auth::user()->profile_photo_path}}" class="rounded-circle">
            <!-- else -->
            <!-- <div class="cart_item_style" style="padding: 4px;">
                <i class="dripicons-user navicon px-1" aria-hidden="true"></i>
            </div>
            endif -->
        </div>
        @else
        <div style="border-radius: inherit;" class="float-right ml-2 dropdown-toggle btn py-0 px-5 py-2 font-weight-bold m-0 btn-success text_white" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Login
        </div>
        <div class="left-info"></div>
        <ul wire:ignore.self id="login_menue" class="dropdown-menu p-0 login_menue" aria-labelledby="dropdownMenu1">
            <form action="" wire:submit.prevent="login">
                <div class="form-group bg-gray-200 my-0">
                    <label class="p-3" for="Login">Login</label>
                </div>
                @if (!is_null($message))
                <div class="mx-2 alert alert-danger">
                    {{ $message }}
                </div>
                @endif

                <div class="form-group px-3 my-4">
                    <label class="input_label" for="Phone">Phone Number</label>
                    @if($errors->has('phone')) <br> <span class="text-danger">{{$errors->first('phone')}}</span> @endif
                    <input wire:model="phone" type="phone" placeholder="Phone" class="form-control">
                </div>
                <div class="form-group px-3 my-4">
                    <label class="input_label" for="password">Password</label>
                    @if($errors->has('password'))<br> <span class="text-danger">{{$errors->first('password')}}</span> @endif
                    <input wire:model="password" type="password" placeholder="Password" class="form-control">
                </div>
                <div class="form-group px-3 mt-5">
                    <input type="submit" value="Login" class="uppercase font-weight-bold color_white btn btn-block btn-success">
                </div>
                <div class="form-group px-3 pt-3">
                    <div class="text-align-center">
                        <span class="">Don't have an account?<a class="color_danger" href="{{route('customer.register')}}"> Sign up</a></span><br>
                        <a class="color_danger" href="{{route('verify.method')}}">Forget Password</a>
                    </div>
                </div>
            </form>
        </ul>
        @endif
    </div>
</div>