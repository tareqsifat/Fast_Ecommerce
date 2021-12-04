<div class="topbar-menu-area d-none d-md-none d-lg-block d-xl-block">
    <div class="container">
        <div class="topbar-menu left-menu">
            <ul class="">
                <li class="menu-item mr-md-4">
                    <a title="Hotline: {{$data->phone}}" href="tel:+{{$data->phone}}"><span class="icon label-before dripicons-phone"></span> <span> Hotline: {{$data->phone}}</span> </a>
                </li>
                <li class="menu-item">
                    <a title="Hotline: {{$data->email}}" href="mailto:{{$data->email}}"><span class="icon label-before dripicons-mail"></span> <span class="pt-2"> Mail: {{$data->email}}</span> </a>
                </li>
            </ul>
        </div>
        <div class="topbar-menu right-menu">
            <ul>
                @if($data->button)
                <li class="menu-item">
                    <a title="{{$data->url}}" href="{{$data->url}}"><span><i class="dripicons-device-tablet mr-2"></i> <i class="pb-2">{{$data->button}}</i></span>
                    </a>
                </li>
                @else
                @foreach($socialIcon as $data)
                <li class="menu-item">
                    <a target="_blank" class="px-1" title="{{$data->url}}" href="{{$data->url}}"><span><i class="{{$data->icon}} mr-2"></i> </span>
                    </a>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>