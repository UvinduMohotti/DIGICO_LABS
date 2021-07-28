<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>DIGICO LABS</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <!-- Start css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">
<!-- Start Containerbar -->
<div id="containerbar" class="containerbar authenticate-bg">
    <!-- Start Container -->
    <div class="container">
        <div class="auth-box login-box">
            <!-- Start row -->
            <div class="row no-gutters align-items-center justify-content-center">
                <!-- Start col -->
                <div class="col-md-6 col-lg-5">
                    <!-- Start Auth Box -->
                    <div class="auth-box-right">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-head">
                                        <a href="#" class="logo"><img src="{{asset('assets/images/logo.svg')}}"
                                                                               class="img-fluid" alt="logo"></a>
                                    </div>
                                    <h4 class="text-primary my-4">Log in !</h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                               value="{{ old('username') }}" id="username" name="username" placeholder="Username"
                                               required>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password"
                                               required>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-checkbox text-left">
                                                <input type="checkbox" class="custom-control-input" {{ old('remember') ? 'checked' : '' }} id="remember">
                                                <label class="custom-control-label font-14" for="remember">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg btn-block font-18">Log in
                                    </button>
                                </form>
                                <p class="mb-0 mt-3">Don't have a account? <a href="{{ route('register-user') }}">Sign up</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- End Auth Box -->
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
    </div>
    <!-- End Container -->
</div>
<!-- End Containerbar -->
<!-- Start js -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/modernizr.min.js')}}"></script>
<script src="{{asset('assets/js/detect.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<!-- End js -->
</body>
</html>
