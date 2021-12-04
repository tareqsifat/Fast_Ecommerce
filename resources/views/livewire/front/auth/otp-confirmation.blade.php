<main id="main" class="main-site left-sidebar">
    @section('title')
    {{'otp-confirmation'}}
    @endsection
    <div class="row">
        <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
            <div class="my-5 main-content-area">
                <div class="wrap-login-item bgffffff">
                    <div class="register-form form-item ">
                        <form wire:submit.prevent="verify" class="form-stl" action="#" name="frm-login" method="get">
                            @if (!is_null($message))
                            <div class="mx-2 alert alert-danger">
                                {{ $message }}
                            </div>
                            @endif
                            <fieldset class="wrap-input ">
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Verification</h3>
                                </fieldset>
                            </fieldset>
                            <div class="form-group">
                                @if($errors->has('verification_code'))<br> <span class="text_danger">{{$errors->first('verification_code')}}</span> @endif
                                <input wire:model.lazy="verification_code" type="text" id="frm-reg-pass" name="reg-pass" placeholder="Verification Code*">
                            </div>
                            <div class="form-group">
                                <label>New password:</label>
                                @if($errors->has('password'))<br> <span class="text_danger">{{$errors->first('password')}}</span> @endif
                                <input type="password" wire:model.lazy="password" placeholder="******">
                            </div>
                            <div class="form-group">
                                <label>Confirm password:</label>
                                @if($errors->has('password_confirmation'))<br> <span class="text_danger">{{$errors->first('password_confirmation')}}</span> @endif
                                <input type="password" wire:model.lazy="password_confirmation" placeholder="*******">
                            </div>

                            <input type="submit" class="btn btn-sign" value="Next" name="register">
                            <h3 class="form-sub-title">Verification Code not found!
                                <span class="cursor_pointer text-info" wire:click.prevent="resendverifyCode">Resend<span wire:loading wire:target="resendverifyCode" class="text-info">ing...</span>
                                </span> again
                            </h3>
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