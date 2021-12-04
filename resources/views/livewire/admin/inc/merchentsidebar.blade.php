<div>
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
            <i class="mdi mdi-close"></i>
        </button>

        <div class="left-side-logo d-block d-lg-none">
            <div class="text-center">
                <a href="{{route('home')}}" class="logo"><img src="@if(isset($setting->logo)){{asset('uploads/logo').'/'.$setting->logo}} @else{{asset('defaults/logo.png')}} @endif" height="20" alt="logo"></a>
            </div>
        </div>

        <div class="sidebar-inner slimscrollleft">
            <div id="sidebar-menu">

                <ul>
                    <!-- dashboard -->
                    <li>
                        <a href="{{ route('merchent.dashboard')}}" class="{{request()->is('merchent/dashboard')?'itemactive':''}} waves-effect">
                            <i class="dripicons-home"></i>
                            <span> Dashboard</span>
                        </a>
                    </li>
                    <!-- category start -->
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect {{request()->is('merchent/category','merchent/subcategory')?'itemactive':''}}">
                            <i class="dripicons-tags"></i><span> Categorys </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                        <ul class="list-unstyled">
                            <li><a href="{{route('merchent.product.category')}}">Category</a></li>
                            <li><a href="{{route('merchent.product.subcategory')}}">SubCategory</a></li>
                            <li><a href="{{route('merchent.childcategory')}}">Child Category</a></li>
                        </ul>
                    </li>
                    <!-- category end -->
                    <!-- brands -->
                    <li>
                        <a href="{{route('merchent.product.brand')}}" class="{{request()->is('merchent/brands')?'itemactive':''}} waves-effect">
                            <i class="dripicons-view-list-large"></i>
                            <span>Brands</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('merchent.product')}}" class="{{request()->is('merchent/products','merchent/products/edit*')?'itemactive':''}} waves-effect">
                            <i class="dripicons-view-thumb"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('merchent.askquestion')}}" class="{{request()->is('merchent/ask-questions')?'itemactive':''}} waves-effect">
                            <i class="dripicons-question"></i>
                            <span>Ask-questions</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('merchent.orders')}}" class="{{request()->is('merchent/orders')?'itemactive':''}} waves-effect">
                            <i class="dripicons-cart"></i>
                            <span>Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="@if(Auth::user()->user_as == 'merchent'){{ route('merchent.profile')}} @elseif(Auth::user()->user_as == 'user') {{route('merchent.profile')}} @endif" class="{{request()->is('merchent/profile')?'itemactive':''}} waves-effect">
                            <i class="dripicons-gear"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('merchent.faq')}}" class="{{request()->is('merchent/faq')?'itemactive':''}} waves-effect">
                            <i class="dripicons-question"></i>
                            <span> FAQ</span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="p-2">
                            @csrf
                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <span class="text-dark"> <i class="fa fa-power-off mr-2"></i> {{ __('Logout') }}</span>
                            </x-jet-dropdown-link>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- end sidebarinner -->
    </div>
    <!-- Left Sidebar End -->
</div>