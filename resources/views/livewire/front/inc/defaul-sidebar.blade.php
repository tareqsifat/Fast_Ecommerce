<div class="visibility-hidden w-100 bgf5 profile-wraper-content" wire:ignore.self>
    <div class="profile-wraper bgf5 border-f5f5" wire:ignore.self>
        <button class="cartdismissabel border_none bgffffff" type="button"><span class=" font-size-20 font-weight-bold" aria-hidden="true">&times;</span></button>
        @if(Auth::user() && Auth::user()->user_as == 'user')
        <div class="d-flex pt-3">
            <div class="p-image pl-4" style="height: 100px; width: 115px;">
                <img class="rounded-circle bgf5 w-100 h-100" height="100px" width="100px" src='@if(isset(Auth::user()->profile_photo_path)){{asset("uploads/user/"."/".Auth::user()->profile_photo_path)}} @else{{asset("defaults/user.png")}} @endif' alt="{{Auth::user()->profile_photo_path}}">
            </div>
            <div class="ml-1 mt-2">
                <span class="text-gray-700">{{ ucfirst(Auth::user()->first_name) }}{{ucfirst(Auth::user()->last_name) }} </span> <br>
                <span><a class="text-gray-600 font-size-14" href="tel:+{{ ucfirst(Auth::user()->phone) }}">{{ ucfirst(Auth::user()->phone) }}</a></span> <br>
            </div>
        </div>
        @else
        <div class="d-flex py-3 border_bottom_f5f5">
            <a href="{{route('user.login')}}" class="btn header-button">Login</a>
        </div>
        @endif
        <ul class="list-category mt-2 nav primary cart-scroll" style="overflow-y: scroll; height:450px; overflow-x: hidden;" id="Profile">

            <li class="category-item has-child-cate p-3 bg_white">
                <a class="p-0" href="{{route('user.profile')}}">
                    <div class="row d-flex">
                        <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                            <span class="cate-link font-size-15 text-gray-700 px-4"> <i class="fa fa-user-o mr-2"></i>Profile<span class="text-info"></span></span>
                        </div>
                        <div class="col-md-2 col-sm-9 col-xs-2 col-xsm-2">
                            <span class="font-size-18 text_dark"><i class="fa fa-angle-right"></i></span>
                        </div>
                    </div>
                </a>
            </li>

            <li class="category-item has-child-cate p-3 bg_white">
                <a class="p-0" href="{{route('user.cart')}}">
                    <div class="row d-flex">
                        <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                            <span class="cate-link font-size-15 text-gray-700 px-4"> <i class="fa fa-shopping-cart mr-2"></i>My Cart<span class="text-info"></span>
                        </div>
                        <div class="col-md-2 col-sm-9 col-xs-2 col-xsm-2">
                            <span class="font-size-18 text_dark"><i class="fa fa-angle-right"></i></span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="category-item has-child-cate p-3 bg_white">
                <a class="p-0" href="{{route('user.notification')}}">
                    <div class="row d-flex">
                        <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                            <span class="cate-link font-size-15 text-gray-700 px-4"> <i class="dripicons-bell mr-2"></i>Notification <span class="text-info"> @if(Auth::user()) @if($notification->count() > 0) ({{$notification->count()}}) @endif @endif</span><span class="text-info"></span>
                        </div>
                        <div class="col-md-2 col-sm-9 col-xs-2 col-xsm-2">
                            <span class="font-size-18 text_dark"><i class="fa fa-angle-right"></i></span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="category-item has-child-cate p-3 bg_white">
                <a class="p-0" href="{{route('user.orders')}}">
                    <div class="row d-flex">
                        <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                            <span class="cate-link font-size-15 text-gray-700 px-4"> <i class="fa fa-drivers-license mr-2"></i> Orders<span class="text-info"></span></span>
                        </div>
                        <div class="col-md-2 col-sm-9 col-xs-2 col-xsm-2">
                            <span class="font-size-18 text_dark"><i class="fa fa-angle-right"></i></span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="category-item has-child-cate p-3 bg_white">
                <a class="p-0" href="{{route('user.reviews')}}">
                    <div class="row d-flex">
                        <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                            <span class="cate-link font-size-15 text-gray-700 px-4"> <i class="fa fa-star mr-2"></i> Reviews<span class="text-info"></span></span>
                        </div>
                        <div class="col-md-2 col-sm-9 col-xs-2 col-xsm-2">
                            <span class="font-size-18 text_dark"><i class="fa fa-angle-right"></i></span>
                        </div>
                    </div>
                </a>
            </li>
            @if(Auth::user())
            <li class="category-item has-child-cate p-3 bg_white">
                <a class="p-0" href="{{route('user.profile')}}">
                    <div class="row d-flex">
                        <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                            <span class="cate-link font-size-15 text-gray-700 px-4"> <i class="fa fa-cogs mr-2"></i> Settings<span class="text-info"></span></span>
                        </div>
                        <div class="col-md-2 col-sm-9 col-xs-2 col-xsm-2">
                            <span class="font-size-18 text_dark"><i class="fa fa-angle-right"></i></span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="category-item has-child-cate p-3 bg_white">
                <div class="row d-flex">
                    <div class="col-md-10 col-sm-9 col-xs-10 col-xsm-10">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <span class="text-dark font-size-15"> <i class="fa fa-power-off mr-2"></i> {{ __('Logout') }}</span>
                            </x-jet-dropdown-link>
                        </form>
                    </div>
                    <div class="col-md-2 col-sm-9 col-xs-2 col-xsm-2">
                        <span class="font-size-18 text_dark"><i class="fa fa-angle-right"></i></span>
                    </div>
                </div>
            </li>
            @endif
        </ul>
        <!--end main content area-->
    </div>
    <div class="content_bg_opacity"></div>
</div>
@push('scripts')
<script>
    $('.content_bg_opacity').click(function() {
        $(".profile-wraper-content").hide()
    });
    $('.cartdismissabel').click(function() {
        $(".profile-wraper-content").hide()
    });


    $('.userInfo_event').click(function() {
        $(".profile-wraper-content").show()
        $(".profile-wraper-content").removeClass("visibility-hidden");
    });
</script>
@endpush