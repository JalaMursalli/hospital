<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/upcube/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Oct 2023 05:30:41 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Login | Upcube - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="index.html" class="auth-logo">
                                <img src="{{asset('backend/assets/images/hospital-logo.png')}}" height="100" class="logo-dark mx-auto" alt="">
                                <img src="{{asset('backend/assets/images/hospital-logo.png')}}" height="100" class="logo-light mx-auto" alt="">
                            </a>
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>

                    <div class="p-3">
                        @if (session('status'))
                        <p class="text-success">{{session('status')}}</p>
                        @endif
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                        <form method="POST" class="form-horizontal mt-3" action="{{route('login-post')}}">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input name="email" class="form-control" type="email" value="{{old('email')}}" placeholder="email">
                                    <div class="invalid-feedback">
                                        @if($errors->has('email'))
                                      <code>{{$errors->first('email')}}</code>
                                      @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input name="password" class="form-control" type="password"  placeholder="Password">
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="form-label ms-1" for="customCheck1">Remember me</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3 text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log
                                        In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->

    <!-- JAVASCRIPT -->
    <script src="{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('backend/"assets/libs/node-waves/waves.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/app.js')}}"></script>

</body>

<!-- Mirrored from themesdesign.in/upcube/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Oct 2023 05:30:41 GMT -->

</html>
