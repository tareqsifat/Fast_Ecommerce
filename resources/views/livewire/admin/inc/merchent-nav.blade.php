<div class="topbar">
    <div class="topbar-left	d-none d-lg-block">
        <div class="text-center">
            <a target="_blank" href="{{route('home')}}" class="logo"><img src="@if(isset($setting->logo)){{asset('uploads/logo').'/'.$setting->logo}} @else{{asset('defaults/logo.png')}} @endif" height="22" alt="logo"></a>
        </div>
    </div>

    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-bell-outline noti-icon"></i>
                    <?php $notificationCount = $orderNotification->count() + $askquestionNotification->count() ?>
                    @if($notificationCount>0)
                    <span class="badge badge-danger badge-pill noti-icon-badge">{{$notificationCount}}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg dropdown-menu-animated">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>Notification ({{$notificationCount}})</h5>
                    </div>

                    <div class="slimscroll-noti">
                        <!-- item-->
                        @if($notificationMsg->count()>0)
                        @foreach($notificationMsg as $nItem)
                        <?php $dataofNft = DB::table('notification_tracks')->where('notification_id', $nItem->id)->where('user_id', Auth::user()->id)->first() ?>
                        @if(!$dataofNft)
                        <a href="{{route('merchent.read-notification', $nItem->id)}}" class="dropdown-item notify-item active">
                            <div class="notify-icon bg-{{$nItem->message_type}}"><i class="mdi mdi-bell-outline"></i></div>
                            <p class="notify-details"><b>{{$nItem->title}}</b><span class="text-muted">{{$nItem->body}}</span></p>
                        </a>
                        @endif
                        @endforeach
                        @endif

                        <!-- item-->
                        @if($orderNotification->count()>0)
                        <a href="{{route('merchent.orders')}}" class="dropdown-item notify-item">
                            <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details"><b>New Orders</b><span class="text-muted">You have {{$orderNotification->count()}} New Orders</span></p>
                        </a>
                        @endif
                        @if($askquestionNotification->count()>0)
                        <a href="{{route('merchent.askquestion')}}" class="dropdown-item notify-item">
                            <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details"><b>New Question From Customers</b><span class="text-muted">You have {{$askquestionNotification->count()}} New Questions</span></p>
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
                    <a class="dropdown-item" href="@if(Auth::user()->user_as == 'merchent'){{ route('merchent.profile')}} @elseif(Auth::user()->user_as == 'admin') {{route('admin.user.profile',Auth::user()->id)}} @endif"><i class="dripicons-user text-muted"></i> Profile</a>
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