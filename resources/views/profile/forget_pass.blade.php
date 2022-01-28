<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{__('Gongni')}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/css/icheck-bootstrap.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/css/toastr.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Gon</b>gni</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{__('You Forgot Your Password? Here You Can Easily Retrieve A New Password.')}}</p>


            <form action="{{ route('forget.password.post') }}" method="POST">
                @csrf

                <div class="form-group row mb-0">
                    <label for="email" class="col-sm-3 col-form-label mb-0">{{__('Email')}}</label>
                </div>

                <div class="form-group row">

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="{{__('Email')}}" value="{{ old('email') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>


                <div class="row">
                    <div class="col-8 offset-2">
                        <button type="submit" class="btn btn-primary btn-block">{{__('Request New Password')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1 text-right mr-2">
                <a href="{{ route('customer-login') }}">{{__('Login Now')}}</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('/js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/js/bootstrap.bundle.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ asset('/js/toastr.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/adminlte.min.js')}}"></script>


<script>
    $(function () {
        //For Toastr
        var sessionData = '{{ session('success') }}';
        if (sessionData)
            toastr.success(sessionData)
    });
</script>
</body>
</html>
