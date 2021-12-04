<div class="container">
    @section('title')
    {{'Login'}}
    @endsection
    <div class="row mt-5">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
            <div class="main-content-area bgffffff">
                <div class="wrap-login-item">
                    <div class="login-form form-item form-stl p-5">
                        <p class="text-align-center">
                            <img class="logo_image" width="150px" src="{{asset('defaults/logo.png')}}" alt="">
                        </p>
                        <form name="frm-login" wire:submit.prevent="login">
                            @if (!is_null($message))
                            <div class="mx-2 alert alert-danger">
                                {{ $message }}
                            </div>
                            @endif
                            <fieldset class="wrap-input">
                                <label for="frm-login-uname">Phone Number:</label>
                                @if($errors->has('phone')) <br> <span class="text-danger">{{$errors->first('phone')}}</span> @endif
                                <input autocomplete=false wire:model.lazy="phone" type="tel" id="frm-login-uname" name="email" placeholder="Enter Your Phone Number">
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="frm-login-pass">Password:</label>
                                @if($errors->has('password'))<br> <span class="text-danger">{{$errors->first('password')}}</span> @endif
                                <input autocomplete=false wire:model.lazy="password" type="password" id="frm-login-pass" name="pass" placeholder="************">
                            </fieldset>

                            <fieldset class="wrap-input">
                                <label class="remember-field">
                                    <input autocomplete=false class="frm-input" name="rememberme" id="rememberme" value="forever" type="checkbox"><span>Remember me</span>
                                </label>
                            </fieldset>
                            <input type="submit" class="btn btn-submit btn-block br-5 py-3 font-weight-bold uppercase" value="Login" name="submit">
                            <p class="mt-5 font-weight600 text-align-center">Don't have an account? <a class="color_danger" href="{{route('customer.register')}}">Sign up</a></p>
                            <p class="text-align-center"><a href="{{route('verify.method')}}" class="color_danger mt-3 font-weight600 text-align-center">Forgot Password</a></p>
                        </form>
                    </div>
                </div>
            </div>
            <!--end main products area-->
        </div>
    </div>
    <!--end row-->
</div>
<!--end container-->