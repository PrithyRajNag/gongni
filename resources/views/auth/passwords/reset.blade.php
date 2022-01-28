<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gongni</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('all.min.css')}}">
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
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

            {{--            <form action="" method="post">--}}
            @if(session('success'))
                {{ session('success') }}
                @endif
            <form action="{{ route('reset.password.post') }}" method="POST">
                @csrf


                <input hidden name="token" placeholder="token" value="{{request()->segment(3)}}">
                <input hidden name="email" value="{{request()->get('email')}}">


{{--                <div class="form-group row mb-0">--}}
{{--                    <label for="email" class="col-form-label mb-0">Email</label>--}}
{{--                </div>--}}

{{--                <div class="form-group row">--}}
{{--                    <input type="email" class="form-control" id="email" name="email"--}}
{{--                           placeholder="Email" value="{{request()->get('email')}}" required>--}}
{{--                    @if ($errors->has('email'))--}}
{{--                        <span class="text-danger">{{ $errors->first('email') }}</span>--}}
{{--                    @endif--}}
{{--                </div>--}}

                <div class="form-group row mb-0">
                    <label for="password" class="col-form-label mb-0">Password</label>
                </div>

                <div class="form-group row">
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-group row mb-0">
                    <label for="password-confirm" class="col-form-label mb-0">Password Confirm</label>
                </div>

                <div class="form-group row">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                           placeholder="Password Confirm" required>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>


                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1 text-right mr-2">
                <a href="{{ route('customer-login') }}">Login Now</a>
            </p>








            {{--            <form action="{{ route('reset.password.post') }}" method="POST">--}}
            {{--                @csrf--}}
            {{--                <input type="hidden" name="token" value="{{ $token }}">--}}

            {{--                <div class="form-group row">--}}
            {{--                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>--}}
            {{--                    <div class="col-md-6">--}}
            {{--                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>--}}
            {{--                        @if ($errors->has('email'))--}}
            {{--                            <span class="text-danger">{{ $errors->first('email') }}</span>--}}
            {{--                        @endif--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            {{--                <div class="form-group row">--}}
            {{--                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>--}}
            {{--                    <div class="col-md-6">--}}
            {{--                        <input type="password" id="password" class="form-control" name="password" required autofocus>--}}
            {{--                        @if ($errors->has('password'))--}}
            {{--                            <span class="text-danger">{{ $errors->first('password') }}</span>--}}
            {{--                        @endif--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            {{--                <div class="form-group row">--}}
            {{--                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>--}}
            {{--                    <div class="col-md-6">--}}
            {{--                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>--}}
            {{--                        @if ($errors->has('password_confirmation'))--}}
            {{--                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>--}}
            {{--                        @endif--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            {{--                <div class="col-md-6 offset-md-4">--}}
            {{--                    <button type="submit" class="btn btn-primary">--}}
            {{--                        Reset Password--}}
            {{--                    </button>--}}
            {{--                </div>--}}
            {{--            </form>--}}
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
        var successData = '{{ session('success') }}';
        if (successData)
            toastr.success(successData)

        var errorData = '{{ session('error') }}';
        if (errorData)
            toastr.error(errorData)
    });
</script>
</body>
</html>








{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('password.update') }}">--}}
{{--                        @csrf--}}

{{--                        <input type="hidden" name="token" value="{{ $token }}">--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Reset Password') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
