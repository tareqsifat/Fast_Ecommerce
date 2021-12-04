<main id="main" class="main-site left-sidebar">
    @section('title')
    {{'Find user'}}
    @endsection
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12 col-md-offset-2">
                <div class="mt-5 main-content-area">
                    <div class="bgffffff wrap-login-item ">
                        <div class="register-form form-item ">
                            <form class="form-stl" action="#" name="frm-login" method="get">

                                <fieldset class="wrap-input ">
                                    <fieldset class="wrap-title">
                                        <h3 class="form-subtitle">Enter Your </h3>
                                    </fieldset>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <input wire:model.lazy="phone" type="radio" id="phone" name="reg-pass">
                                    <label for="phone"><strong>Phone</strong></label>
                                    <span>017*********</span>
                                </fieldset>
                                <fieldset class="wrap-input ">
                                    <input wire:model.lazy="email" type="radio" id="email" name="reg-cfpass"> 
                                    <label for="email"><strong>Email</strong></label>
                                    @if($errors->has('email'))<br> <span class="text_danger">{{$errors->first('email')}}</span> @endif
                                    <span>example@gmail.com</span>
                                </fieldset>
                                <input type="submit" class="btn btn-sign" value="Next" name="register">
                                <h3 class="form-sub-title">Already member? <a href="{{route('user.login')}}">Login</a> here.</h3>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end main products area-->
            </div>
        </div>


    </div>
    <!--end container-->

</main>