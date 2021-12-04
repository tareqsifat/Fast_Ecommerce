    <div class="topbar">
        <div class="topbar-left	d-none d-lg-block">
            <div class="text-center">
                <a target="_blank" href="{{route('home')}}" class="logo"><img src="@if(isset($setting->logo)){{asset('uploads/logo').'/'.$setting->logo}} @else{{asset('defaults/logo.png')}} @endif" height="22" alt="logo"></a>
            </div>
        </div>

        <nav class="navbar-custom">
            <ul class="list-inline float-right mb-0">
                <div class="search-wrap" id="search-wrap">
                    <div class="search-bar">
                        <form wire:submit.prevent="submitSearch">
                            <input class="search-input" wire:model.lazy="searchQuery" type="search" placeholder="Search Product by Product Code (ex:12356789)">
                        </form>
                        <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                            <i class="mdi mdi-close-circle"></i>
                        </a>
                    </div>
                </div>
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link waves-effect toggle-search" href="#" data-target="#search-wrap">
                        <i class="mdi mdi-magnify noti-icon"></i>
                    </a>
                </li>
                <li class="list-inline-item dropdown notification-list">
                    @section('notificationCount')
                    {{$message->count()+$merchent->count()+$customers->count()+$productReview->count()+$orders->count()+$askquestions->count() + $OrderCancelNofification->count() + $subscriber->count()}}
                    @endsection
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline noti-icon"></i>
                        @if($message->count() + $merchent->count() + $customers->count() + $productReview->count() + $orders->count() + $askquestions->count() + $OrderCancelNofification->count() + $subscriber->count())
                        <span class="badge badge-danger badge-pill noti-icon-badge">@yield('notificationCount')</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg dropdown-menu-animated">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5>Notification @yield('notificationCount')</h5>
                        </div>
                        <div class="slimscroll-noti">
                            <!-- item-->
                            @if($OrderCancelNofification->count()>0)
                            <a href="{{ route('admin.order.notification')}}" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning"><i class="mdi mdi-star"></i></div>
                                <p class="notify-details"><b>Order Cancel Request</b><span class="text-muted">You have {{$OrderCancelNofification->count()}} Request To order cancel</span></p>
                            </a>
                            @endif
                            @if($subscriber->count()>0)
                            <a href="{{ route('admin.subscribers')}}" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning"><i class="mdi mdi-star"></i></div>
                                <p class="notify-details"><b>New Subscribers</b><span class="text-muted">You have {{$subscriber->count()}} New Subscriber</span></p>
                            </a>
                            @endif
                            <!-- admin notificaiton end  -->
                            @if($productReview->count()>0)
                            <a href="{{ route('admin.reviews')}}" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success"><i class="mdi mdi-star"></i></div>
                                <p class="notify-details"><b>New Review</b><span class="text-muted">You have {{$productReview->count()}} New Review</span></p>
                            </a>
                            @endif
                            @if($message->count()>0)
                            <!-- item-->
                            <a href="{{route('admin.messages')}}" class="dropdown-item notify-item">
                                <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                                <p class="notify-details"><b>New Message received</b><span class="text-muted">You have {{$message->count()}} unread messages</span></p>
                            </a>
                            @endif
                            @if($merchent->count()>0)
                            <!-- item-->
                            <a href="{{ route('admin.user.merchent_user')}}" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info"><i class="mdi dripicons-store"></i></div>
                                <p class="notify-details"><b>New Merchent User</b><span class="text-muted">You have {{$merchent->count()}} New Register Merchent</span></p>
                            </a>
                            @endif
                            <!-- item-->
                            @if($orders->count()>0)
                            <a href="{{route('admin.order')}}" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i></div>
                                <p class="notify-details"><b>New orders received</b><span class="text-muted">You have {{$orders->count()}} new orders</span></p>
                            </a>
                            @endif

                            <!-- item-->

                            @if($customers->count()>0)
                            <a href="{{route('admin.customers')}}" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning"><i class="mdi dripicons-user-group"></i></div>
                                <p class="notify-details"><b>New Register Customers</b><span class="text-muted">You have {{$customers->count()}} New Register Customers </span></p>
                            </a>
                            @endif

                            @if($askquestions->count()>0)
                            <a href="{{route('admin.askQuestions')}}" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning"><i class="dripicons-question"></i></div>
                                <p class="notify-details"><b>New Question From Customers</b><span class="text-muted">You have {{$askquestions->count()}} New Questions</span></p>
                            </a>
                            @endif

                        </div>

                    </div>
                </li>
                <li class="list-inline-item dropdown notification-list nav-user">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="@if(Auth::user()->user_as == 'merchent'){{ route('merchent.profile')}} @elseif(Auth::user()->user_as == 'user') {{route('merchent.profile')}} @endif" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src='@if(isset(Auth::user()->profile_photo_path)){{asset("uploads/user/profile/"."/".Auth::user()->profile_photo_path)}} @else{{asset("defaults/user.png")}} @endif' alt="{{Auth::user()->profile_photo_path}}" class="rounded-circle">
                        <span class="d-none d-md-inline-block ml-1">{{ ucfirst(Auth::user()->name) }}<i class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                        <a class="dropdown-item" href="@if(Auth::user()->user_as == 'merchent'){{ route('merchent.profile')}} @elseif(Auth::user()->user_as == 'admin') {{route('admin.user.profile', Auth::user()->id)}} @endif"><i class="dripicons-user text-muted"></i> Profile</a>
                        <a class="dropdown-item" href="@if(Auth::user()->user_as == 'merchent'){{ route('merchent.profile')}} @elseif(Auth::user()->user_as == 'admin') {{route('admin.settings')}} @endif"><i class="dripicons-gear text-muted"></i> Settings </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <span class="text-dark"> <i class="fa fa-power-off mr-2"></i> {{ __('Logout') }}</span>
                            </x-jet-dropdown-link>
                        </form>
                    </div>
                </li>
            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="list-inline-item">
                    <button type="button" class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
            </ul>


        </nav>

    </div>