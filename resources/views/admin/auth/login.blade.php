

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="BIbS7a16pcxUflATVK8ybfsuJw7RAYz3bcxyhOcX">
    <title>CAB-E</title>




    <link rel="stylesheet" href="{{ asset('/admin/dist/css/meetmightybackend.css') }}">

</head>

<body class="dark">
    <div class="wrapper">
        <section class="login-content">
            <div class="container h-100">
                <div class="row align-items-center justify-content-center h-100">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="auth-logo">
                                    <h2>
                                        <img src="{{ asset('admin/dist/img/cabe.jpg') }}"
                                            class="img-fluid mode light-img rounded-normal" alt="logo">
                                        <img src="{{ asset('admin/dist/img/cabe.jpg') }}" alt="CAB-E Logo" class="img-fluid mode dark-img rounded-normal darkmode-logo site_dark_logo_preview">
                                    </h2>
                                </div>
                                <h2 class="mb-2 text-center">Sign In</h2>

                                @if ($message = Session::get('fail'))
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @endif @if ($message = Session::get('danger'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert"></button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('dashboard') }}">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="text" placeholder="Email" id="email"
                                                class="form-control" name="email" required autofocus>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group mb-3">
                                            <input type="password" placeholder="Password" id="password"
                                                class="form-control" name="password" required>
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember"> Rememberbnvnbvne
                                                </label>
                                            </div>
                                        </div>

                                        <div class="d-grid mx-auto">
                                            <button type="submit" class="btn btn-dark btn-block">Signin</button>
                                        </div>
                                        {{-- <div class="row">
    <div class="col-lg-12">
    <div class="form-group">
    <label>Email</label>
    <input id="email" type="email" name="email"  class="form-control" placeholder="Users Email" required="" autofocus="">
    </div>
    </div>
    <div class="col-lg-12">
    <div class="form-group">
    <label>Password</label>
    <input class="form-control" type="password"  placeholder="Enter Password" name="password" required="">
    </div>
    </div>
    <div class="col-lg-6">
    <div class="custom-control custom-checkbox mb-3">
    <input type="checkbox" class="custom-control-input" id="customCheck1">
    <label class="custom-control-label" for="customCheck1">Remember Me</label>
    </div>
    </div>
    <div class="col-lg-6">
    <a href="" class="text-primary float-right">Forgot Password?</a>
    </div>
    </div>
    <div class="d-flex justify-content-between align-items-center">
    <button type="submit" class="btn btn-primary">Sign In</button> 
      <a href="{{url('admin_register')}}" class="align-text:right">Have You not Account?</a>
     </div>
      --}}
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script src="https://meetmighty.com/mobile/mighty-taxi/js/backend-bundle.min.js"></script>
    <script src="https://meetmighty.com/mobile/mighty-taxi/js/raphael-min.js"></script>
    <script src="https://meetmighty.com/mobile/mighty-taxi/js/morris.js"></script>
    <script src="https://meetmighty.com/mobile/mighty-taxi/vendor/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="https://meetmighty.com/mobile/mighty-taxi/vendor/confirmJS/jquery-confirm.min.js"></script>


    <script src="https://meetmighty.com/mobile/mighty-taxi/js/masonry.pkgd.min.js"></script>
    <script src="https://meetmighty.com/mobile/mighty-taxi/js/imagesloaded.pkgd.min.js"></script>

    <script src="https://meetmighty.com/mobile/mighty-taxi/js/vector-map-custom.js"></script>

    <script src="https://meetmighty.com/mobile/mighty-taxi/js/customizer.js"></script>

    <script src="https://meetmighty.com/mobile/mighty-taxi/js/chart-custom.js"></script>

    <script src="https://meetmighty.com/mobile/mighty-taxi/js/slider.js"></script>

    <script type="module" src="https://meetmighty.com/mobile/mighty-taxi/vendor/emoji-picker-element/index.js"></script>

    <script src="https://meetmighty.com/mobile/mighty-taxi/js/app.js" defer=""></script>
    <script>
        (function($) {

            "use strict";




        })(jQuery);
    </script>

    <svg id="SvgjsSvg1001" width="5" height="0" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
        xmlns:svgjs="http://svgjs.dev"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
    </svg>
</body>

</html>
