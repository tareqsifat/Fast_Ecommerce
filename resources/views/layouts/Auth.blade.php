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
    <link href="{{ asset('front/assets/css/main.css')}}" data-turbolinks-track="reload" rel="stylesheet" type="text/css">
    <style>

    </style>
    <!-- <script src="{{ asset('js/app.js') }}" defer data-turbolinks-track="reload"></script> -->
    @yield('styles')
    @livewireStyles
    <!-- Scripts -->
</head>

<body class="fixed-left">

    {{$slot}}
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div>

        <!-- Begin page -->
        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="mdi mdi-home h1"></i></a>
        </div>

        <div class="account-pages">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div>
                            <div>
                                <a href="index.html" class="logo logo-admin"><img src="assets/images/logo_dark.png" height="28" alt="logo"></a>
                            </div>
                            <h5 class="font-14 text-muted mb-4">Responsive Bootstrap 4 Admin Dashboard</h5>
                            <p class="text-muted mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>

                            <h5 class="font-14 text-muted mb-4">Terms :</h5>
                            <div>
                                <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>At solmen va esser necessi far uniform paroles.</p>
                                <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>Donec sapien ut libero venenatis faucibus.</p>
                                <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>Nemo enim ipsam voluptatem quia voluptas sit .</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-2">
                                    <h4 class="text-muted float-right font-18 mt-4">Sign In</h4>
                                    <div>
                                        <a href="index.html" class="logo logo-admin"><img src="assets/images/logo_dark.png" height="28" alt="logo"></a>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <form class="form-horizontal m-t-20" action="index.html">

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="text" required="" placeholder="Username">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="password" required="" placeholder="Password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>

                                        <div class="form-group m-t-10 mb-0 row">
                                            <div class="col-sm-7 m-t-20">
                                                <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                            </div>
                                            <div class="col-sm-5 m-t-20">
                                                <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
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
        <!-- Plugins Init js -->
        <script src="{{ asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{ asset('js/form-advanced.js')}}"></script>

        <script src="{{ asset('admin/plugins/raphael/raphael.min.js')}}"></script>
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
                $('#modalForm').modal('hide');
                $('#modalBrandForm').modal('hide');
            })
            //  tostermessage  
            window.addEventListener('successalert', event => {
                toastr.success(event.detail.success);
            });
            //  tostermessage  
            window.addEventListener('erroralert', event => {
                toastr.error(event.detail.erroralert);
            });

            // open modal for edit 
            window.addEventListener('openmodal', event => {
                $('#modalForm').modal('show');
                $('#modalBrandForm').modal('show');
            })

            // open modal for edit 
            window.addEventListener('openEditmodal', event => {
                $('#openEditmodal').modal('show');
            })

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