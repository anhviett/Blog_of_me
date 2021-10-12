<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Shopper | Recover Password </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/adminlte.min.css')}}">
    {{--Link CSS--}}
    <link rel="stylesheet" href="{{asset("backend/assets/css/style.css")}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{route('home.page')}}" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Bạn chỉ còn một bước nữa để có được mật khẩu mới, hãy khôi phục mật khẩu của bạn ngay bây giờ.</p>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-warning">
                    {{ session()->get('error') }}
                </div>
            @endif
            <form action="{{url('admin/reset-password/'.$user->email.'/'.$token)}}" method="post">
                @csrf

                <div class="input-group mb-2">
                    <input type="password" class="form-control" placeholder="Mật khẩu"
                        name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                </div>
                <!-- Error -->
                @if ($errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                @endif
                <div class="input-group mb-2">
                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu"
                        name="confirm_password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <!-- Error -->
                @if ($errors->has('confirm_password'))
                    <div class="text-danger">{{ $errors->first('confirm_password') }}</div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Đổi mật khẩu</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="{{route('login')}}">Đăng nhập</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/assets/js/adminlte.js')}}"></script>
</body>
</html>
