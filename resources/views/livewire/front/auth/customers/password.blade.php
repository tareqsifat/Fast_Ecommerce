<main id="main" class="main-site mt-3">
    @section('title')
    {{"user-password"}}
    @endsection
    <div class="container pb-60">
        <div class="row">
            @livewire('front.auth.customers.profile.layouts')
            <div class="col-sm-12 col-md-8 m-0 p-0">
                <div class="card wrap-profile-content">
                    <div class="card-header">
                        <span><i class="fa fa-key font-size-18 mr-2"></i></span>
                        <strong class="text-gray-600">Change Password</strong>
                    </div>
                    <div class="card-body pt-5 bgffffff">
                        <div class="row">
                            <div class="col-sm-12 col-md-8">
                                <div class="information-area">
                                    <div class="p-3">
                                        <div class="information-body">
                                            <form wire:submit.prevent="changePassword">
                                                @if (!is_null($message))
                                                <div class="mx-2 alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                                @endif
                                                <div class="form-group">
                                                    <label class="text-muted font-family-nunito" for=""> Old Password:</label> <br>
                                                    @if($errors->has('oldPassword'))<span class="pl-2 text_danger">{{$errors->first('oldPassword')}}</span> @endif
                                                    <input wire:model.lazy="oldPassword" placeholder="Enter Your Old Password" type="password" class="form-control h-45px font-family-nunito">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-muted font-family-nunito" for=""> New Password:</label> <br>
                                                    @if($errors->has('password'))<span class="pl-2 text_danger">{{$errors->first('password')}}</span> @endif
                                                    <input wire:model.lazy="password" placeholder="Enter Your New Password" type="password" class="form-control h-45px font-family-nunito">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-muted font-family-nunito" for=""> Confirm New Password:</label> <br>
                                                    @if($errors->has('password_confirmation'))<span class="pl-2 text_danger">{{$errors->first('password_confirmation')}}</span> @endif
                                                    <input wire:model.lazy="password_confirmation" placeholder="Confirm Password" type="password" class="form-control h-45px font-family-nunito">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Change" class="btn btn-info">
                                                    <a href="{{route('verify.method')}}" class="text_underline"><u>Froget My Password</u></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end container-->
</main>