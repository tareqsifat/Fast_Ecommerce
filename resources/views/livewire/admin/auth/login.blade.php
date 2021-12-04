<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@if(!empty($settings->title)) {{$settings->title}} @else {{ config('app.name') }} @endif | Login</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/x-icon" href='@if(isset($settings->favicon)){{asset("uploads/favicon/$settings->favicon")}} @else {{asset("front/firstdeals.png")}} @endif'>
    <link href="{{ asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/icons.css')}}" defer data-turbolinks-track="true" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/style.css')}}" defer data-turbolinks-track="true" rel="stylesheet" type="text/css">
</head>

<body class="fixed-left">
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
    <div class="account-pages">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 offset-lg-4">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="p-2">
                                <h4 class="text-muted float-right font-18 mt-4">Sign In</h4>
                                <div>
                                    <a href="index.html" class="logo logo-admin"><img src='@if(isset($settings->logo)){{asset("uploads/logo/$settings->logo")}} @else {{asset("front/firstdeals.png")}} @endif' height="100" alt="logo"></a>
                                </div>
                            </div>

                            <div class="p-2">
                                <form class="form-horizontal m-t-20" action="{{route('admin.login')}}" method="POST">
                                    @csrf
                                    @if(isset($message))
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group row">
                                        <div class="col-12">
                                            @if($errors->has('email')) <br> <span class="text-danger">{{$errors->first('email')}}</span> @endif
                                            <input class="form-control" name="email" type="text" required="" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            @if($errors->has('password')) <br> <span class="text-danger">{{$errors->first('password')}}</span> @endif
                                            <input class="form-control" name="password" type="password" required="" placeholder="Password">
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

                                    <!-- <div class="form-group m-t-10 mb-0 row">
                                        <div class="col-sm-7 m-t-20">
                                            <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                        <div class="col-sm-5 m-t-20">
                                            <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                                        </div>
                                    </div> -->
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>


    <script src="{{ asset('admin/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/modernizr.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/detect.js')}}"></script>
    <script src="{{ asset('admin/assets/js/fastclick.js')}}"></script>
    <script src="{{ asset('admin/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('admin/assets/js/app.js')}}" defer data-turbolinks-track="true"></script>

</body>

</html>