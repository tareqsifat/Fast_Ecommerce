<main id="main" class="main-site left-sidebar">
    @section('title')
    {{'verify-method'}}
    @endsection
    <div class="container">
        <div class="row">
            <div class="m-auto col-lg-3 col-sm-12 col-md-3 col-xs-12"></div>
            <div class="m-auto col-lg-6 col-sm-12 col-md-6 col-xs-12">
                <div class="my-5 main-content-area w-100">
                    <div class="bgffffff wrap-login-item w-100">
                        <div class="register-form form-item w-100">
                            @if($activeForm == true)
                            @if($fUser == NULL)
                            <form class="form-stl" wire:submit.prevent="search">
                                @if (!is_null($message))
                                <div class="mx-2 alert alert-danger">
                                    {{ $message }}
                                </div>
                                @endif
                                <h3 class="form-title">Search your account</h3>
                                <div class="fom-group">
                                    <input class="form-control" wire:model.lazy="search" type="search" placeholder="Enter Phone Number" id="search" name="search">
                                </div>
                                <div class="form-group mt-2 mb-0">
                                    <span class="form-sub-title">Already member? <a href="{{route('user.login')}}">Login</a> here.</span>
                                </div>
                                @if($errors->has('email'))<br> <span class="text_danger">{{$errors->first('email')}}</span> @endif
                                <div class="form-group mb-5 pb-4">
                                    <input type="submit" class="float-left btn btn-sign" value="Next" name="register">
                                </div>
                            </form>
                            @else
                            <form class="form-stl p-0 text-align-center">
                                <div class="form-group">
                                    <img width="150px" src='@if(isset(Auth::user()->profile_photo_path)){{asset("uploads/user/"."/".Auth::user()->profile_photo_path)}} @else{{asset("defaults/user.png")}} @endif' alt="{{$fUser->profile_photo_path}}">
                                </div>
                                <br>
                                <br>
                                <label for="">{{$fUser->first_name}} {{$fUser->last_name}}</label>
                                <br>
                                <label for="">{{$fUser->phone}}</label>
                                <input type="hidden" value="{{$fUser->phone}}" wire:model.prevent="phone">
                                <input type="hidden" value="{{$fUser->email}}" wire:model.prevent="email">
                                <br>
                                <input wire:click.prevent="next('{{$fUser->phone}}')" type="submit" value="Next" class="btn btn-sm btn-default">
                                <br>
                                <a wire:click.prevent="notAccount" class="btn btn-default mb-5">Not my account</a>
                            </form>
                            @endif
                            @else
                            <form class="form-stl" wire:submit.prevent="verify">
                                @if (!is_null($message))
                                <div class="mx-2 alert alert-danger">
                                    {{ $message }}
                                </div>
                                @endif
                                <fieldset class="wrap-input ">
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Select Varify Method</h3>
                                        <h3 class="form-subtitle">Verify with Phone </h3>
                                    </fieldset>
                                </fieldset>
                                @if(!empty($fUser->phone))
                                <fieldset class="wrap-input">
                                    <input class="display-inline" wire:model.lazy="phoneCheck" type="hidden">
                                    <input class="display-inline" wire:model.lazy="phone" type="checkbox" id="phone" name="reg-pass">
                                    <label for="phone"><strong>Phone</strong></label>
                                    <span>{{$fUser->phone}}</span>
                                </fieldset>
                                @endif
                                @if(!empty($fUser->email))
                                <fieldset class="wrap-input ">
                                    @if($errors->has('email'))<br> <span class="text_danger">{{$errors->first('email')}}</span> @endif
                                    <input class="display-inline" wire:model.lazy="email" type="checkbox" id="email" name="reg-cfpass">
                                    <label for="email"><strong>Email</strong></label>
                                    <span>{{$fUser->email}}</span>
                                </fieldset>
                                @endif
                                <button type="submit" class="btn btn-sign" name="register">Next<span wire:loading wire:target="verify">....</span>
                                </button>
                                <h3 class="form-sub-title">Already member? <a href="{{route('user.login')}}">Login</a> here.</h3>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <!--end main products area-->
            </div>
            <div class="m-auto col-lg-3 col-sm-12 col-md-3 col-xs-12"></div>
        </div>


    </div>
    <!--end container-->

</main>