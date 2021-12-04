<div class="container mt-5">
    @section('title')
    {{'Marchent Registreation'}}
    @endsection
    <div class="row w-100 m-auto">
        <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12 col-md-offset-2">
            <div class="main-content-area">
                <div class="wrap-login-item w-100 bgffffff">
                    <div class="register-form form-item w-100 " wire:ignore.self>
                        <form class="form-stl" action="#" wire:submit.prevent="signUp" name="frm-login" method="get">
                            <fieldset class="wrap-input ">
                                <fieldset class="wrap-title">
                                  <h3 class="form-title">Create a Merchant account</h3>
                                    <h3 class="form-subtitle">Personal Information</h3>
                                </fieldset>
                            </fieldset>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="first_name">First Name*</label>
                                    @if($errors->has('first_name'))<br> <span class="text_danger">{{$errors->first('first_name')}}</span> @endif
                                    <input wire:model="first_name" type="text" id="first_name" placeholder="First Name*">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="last_name">Last Name*</label>
                                    @if($errors->has('last_name'))<br> <span class="text_danger">{{$errors->first('last_name')}}</span> @endif
                                    <input wire:model.lazy="last_name" type="text" id="last_name" placeholder="Last Name*">
                                </div>
                            </div>
                            <fieldset class="wrap-input item-width-in-half left-item ">
                                <label for="phone">Phone*</label>
                                @if($errors->has('phone'))<br> <span class="text_danger">{{$errors->first('phone')}}</span> @endif
                                <input wire:model.lazy="phone" type="text" id="phone" placeholder="Phone*">
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half ">
                                <label for="email">Email</label>
                                @if($errors->has('email'))<br> <span class="text_danger">{{$errors->first('email')}}</span> @endif
                                <input wire:model.lazy="email" placeholder="Email" type="email" id="email">
                            </fieldset>

                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="frm-reg-cfpass">Birth Date*</label>
                                    @if($errors->has('brithdate'))<br> <span class="text_danger">{{$errors->first('brithdate')}}</span> @endif
                                    <input wire:model.lazy="brithdate" type="date" id="frm-reg-cfpass">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="gander">Gender*</label>
                                    @if($errors->has('gander'))<br> <span class="text_danger">{{$errors->first('gander')}}</span> @endif
                                    <div class="form-group desabledSelect_styled">
                                        <select wire:model.lazy="gander" class="d-flex w-100">
                                            <Option>Select</Option>
                                            <Option>Male</Option>
                                            <Option>Female</Option>
                                            <Option>Other</Option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="wrap-input">
                                <label class="remember-field">
                                    <input autocomplete="false" class="frm-input" wire:model.lazy="termsAndCondition" id="rememberme" value="forever" type="checkbox">
                                    <span>I agree to @if(!empty($datas->title)) {{$datas->title}} @else {{config('app.name')}} @endif
                                        <a target="_blank" href="{{route('privacyPolicy')}}">Terms & Conditions</a>
                                        and
                                        <a href="{{route('termsAndConditions')}}" target="_blank" rel="noopener noreferrer">Privacy Policy</a></span>
                                    @if($errors->has('termsAndCondition'))<br> <span class="text_danger">{{$errors->first('termsAndCondition')}}</span> @endif
                                </label>
                            </fieldset>

                            <fieldset class="wrap-input item-width-in-half float-right mt-5" wire:ignore>
                                @error('g-recaptcha-response')
                                <h6><span class="text_danger">{{$errors->first('g-recaptcha-response')}}</span></h6>
                                @enderror
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </fieldset>
                            <button type="submit" class="btn btn-sign" value="Next" name="register">Next<span wire:loading wire:target="signUp">ing....</span></button>
                            <h3 class="form-sub-title">Already member? <a href="{{route('merchant.login')}}">Login</a> here.</h3>
                        </form>
                    </div>
                </div>
            </div>
            <!--end main products area-->
        </div>
    </div>
</div>