<div class="row pt-4">
    <div class="col-12">
        <div class="page-title-box p-2">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0">@yield('title')</h4>
                </div>
                <div class="col-md-4">
                    <ol class="breadcrumb float-sm-right">
                        @if(request()->is('admin/dashboard')) @else
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i>Dashboard</i></a></li>
                        @endif
                        @if(request()->is('admin/dashboard') || request()->is('merchent/dashboard'))
                        @else
                        <li class="breadcrumb-item "><i>@yield('title')</i></li>
                        @endif
                    </ol>
                </div><!-- /.col -->
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end page-title-box -->
    </div>
</div>