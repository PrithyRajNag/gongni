<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gongni</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/css/icheck-bootstrap.css')}}">
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
{{--            <p class="login-box-msg">{{__('Sign In To Start Your Session')}}</p>--}}

            @if($errors->any())
                <div class="text-danger pb-2 ml-3">
                    {{ implode('', $errors->all('Given email or password is incorrect')) }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post" id="login-form">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" id="email" name="email" class="form-control rounded-0" placeholder="{{__('E-Mail')}}" required />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control rounded-0"  placeholder="{{__('Password')}}" required autocomplete="off" />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row ">
{{--                    <div class="col-8">--}}
{{--                        <div class="icheck-primary">--}}
{{--                            <input type="checkbox" id="customCheck">--}}
{{--                            <label for="customCheck">--}}
{{--                                Remember Me--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- /.col -->
                    <div class="col-4 m-auto">
                        <button type="submit" class="btn btn-primary btn-block">{{__('Sign In')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-2 text-center">
                <a href="{{ route('forget.password.get') }}">{{__('I Forgot My Password')}}</a>
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
<!-- AdminLTE App -->
<script src="{{ asset('/js/adminlte.min.js')}}"></script>
</body>
</html>

