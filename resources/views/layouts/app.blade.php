<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(!empty($settings->title)) {{$settings->title}} @else {{ config('app.name') }} @endif | @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="shortcut icon" type="image/x-icon" href='@if(isset($settings->favicon)){{asset("uploads/favicon/$settings->favicon")}} @else {{asset("front/firstdeals.png")}} @endif'>
    <!-- morris css -->
    <link rel="stylesheet" defer data-turbolinks-track="true" href="{{ asset('admin/plugins/morris/morris.css') }}">
    <!-- bootstrap-colorpicker -->
    <link href="{{ asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
    <!--  summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- toastr css  -->
    <link rel="stylesheet" defer data-turbolinks-track="true" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/icons.css')}}" defer data-turbolinks-track="true" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/style.css')}}" defer data-turbolinks-track="true" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom.css')}}" defer data-turbolinks-track="true" rel="stylesheet" type="text/css">
    <style>

    </style>
    <!-- <script src="{{ asset('js/app.js') }}" defer data-turbolinks-track="reload"></script> -->
    @yield('styles')
    @livewireStyles
    <!-- Scripts -->
</head>

<body class="fixed-left">

    <div id="wrapper">
        @if(Auth::user()->user_as == 'merchent')
        @livewire('admin.inc.merchentsidebar')
        @else
        @livewire('admin.inc.sidebar')
        @endif
        <!--  sidebar  -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content mt-5">
                @if(Auth::user()->user_as == 'merchent')
                @livewire('admin.inc.merchent-nav')
                @else
                @livewire('admin.inc.nav')
                @endif
                <div class="page-content-wrapper">
                    <div class="container-fluid px-0">
                        @livewire('admin.inc.breadcrumb')
                        {{$slot}}
                    </div>
                </div>
            </div>
            @livewire('admin.inc.footer')
        </div>
    </div>
    @livewireScripts
    <script src="{{ asset('admin/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/modernizr.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/detect.js')}}"></script>
    <script src="{{ asset('admin/assets/js/fastclick.js')}}"></script>
    <script src="{{ asset('admin/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('admin/assets/js/jquery.blockUI.js')}}"></script>
    <script src="{{ asset('admin/assets/js/waves.js')}}"></script>
    <script src="{{ asset('admin/assets/js/jquery.nicescroll.js')}}"></script>
    <script src="{{ asset('admin/assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('admin/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('admin/plugins/raphael/raphael.min.js')}}"></script>
    <!-- Plugins Init js -->
    <!-- toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- dashboard js -->
    <script src="{{ asset('admin/assets/pages/dashboard.int.js')}}"></script>
    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.js')}}" defer data-turbolinks-track="true"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script src="http://127.0.0.1:8000/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    @stack('scripts')


    @yield('scripts')
    <script>
        @if(Session::get('success'))
        toastr.success("{!! Session::get('success') !!}");
        @endif


        window.addEventListener('closeModal', event => {
            $('#modalOrderForm').modal('hide');
            $('#modalForm').modal('hide');
            $('#modalBrandForm').modal('hide');
            $('#pcatmodalForm').modal('hide');
            $('#colormodalForm').modal('hide');
            $('#modalC_CatForm').modal('hide');
            $('#baby_Cat_Form').modal('hide');
            $('#new_born_Cat_Form').modal('hide');
            $('#befor_born_Cat_Form').modal('hide');
        })

        // open modal for edit 
        window.addEventListener('openmodal', event => {
            $('#modalForm').modal('show');
            $('#modalBrandForm').modal('show');
            $('#pcatmodalForm').modal('show');
            $('#modalOrderForm').modal('show');
            $('#colormodalForm').modal('show');
            $('#modalC_CatForm').modal('show');
            $('#baby_Cat_Form').modal('show');
            $('#new_born_Cat_Form').modal('show');
            $('#befor_born_Cat_Form').modal('show');
        })

        // open modal for edit 
        window.addEventListener('openEditmodal', event => {
            $('#openEditmodal').modal('show');
        })
        //  tostermessage  
        window.addEventListener('successalert', event => {
            toastr.success(event.detail.success);
        });
        //  tostermessage  
        window.addEventListener('erroralert', event => {
            toastr.error(event.detail.erroralert);
        });

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        $(document).ready(function() {
            $('#editable').summernote({
                height: 400,
                codemirror: {
                    theme: 'monokai'
                },
            });
        });
    </script>
</body>

</html>