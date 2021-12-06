<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/auth/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
    <link rel="stylesheet" href="{{ asset('css/foot.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{asset('image/logo.png')}}" type="image/x-icon">
    <title>Đăng nhập</title>
</head>
<body>
    @include('header')
    <div class="login__page">
        <div class="login__header--option">
            <a href="{{ url('/') }}">Trang chủ</a> <span>></span> <a class="redirect" href="{{ route('login') }}">Đăng nhập</a>
        </div>
        <div class="login__signup__page">
            <div class="login__page--block">
                <!--login-->
                <div class="login__block">
                    <div class="login__block--title">
                        <p>ĐĂNG NHẬP</p>
                        <p>Nếu bạn chưa có tài khoản, <a onclick="changetosignup();" class="link--a">đăng kí tại đây</a></h5>
                    </div>
                    <div class="login__block--form">
                        <form class="login__form" action="{{route('login')}}" method="post">
                            @csrf
                            <input class="form--input" type="text" name="username" placeholder="Tài khoản">
                            <input class="form--input" type="password" name="password" placeholder="Mật khẩu">
                            <button class="form--input btn--danger"type="submit">Đăng nhập</button>
                            <div class="form--remem">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Ghi nhớ mật khẩu</label>
                            </div>
                        </form>
                        <a href="#" class="link--a forgot">Quên mật khẩu</a>
                    </div>
                    <div class="login__block--footer">
                        <p>Hoặc đăng nhập bằng</p>
                        <div style="margin-top: 10px;">
                            <a href="{{ url('facebook/facebook') }}" class="btn-a facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                            <a href="{{ url('/auth/redirect/google') }}" class="btn-a google"><i class="fab fa-google-plus-g"></i> Google</a>
                        </div>
                    </div>
                </div>
                <!--end login-->
                <!--signup-->
                <div class="login__block--signup hidden">
                    <div class="login__block--title">
                        <p>ĐĂNG KÝ</p>
                        <p>Đã có tài khoản, đăng nhập <a onclick="changetologin();" class="link--a">tại đây</a></h5>
                    </div>
                    <div class="login__block--form">
                        <form class="login__form" method="POST" action="{{ route('register') }}">
                            <input class="form--input" type="text" placeholder="Họ" name="firstname">
                            <input class="form--input" type="text" placeholder="Tên" name="lastname">
                            <input class="form--input" type="text" placeholder="Email" name="email">
                            <input class="form--input" type="text" placeholder="Số điện thoại" name="number">
                            <input class="form--input" type="text" placeholder="Mật khẩu" name="password">
                            <button class="form--input btn--danger"type="submit">Đăng ký</button>
                        </form>
                        <a href="#" class="link--a forgot">Quên mật khẩu</a>
                    </div>
                    <div class="login__block--footer">
                        <p>Hoặc đăng nhập bằng</p>
                        <div style="margin-top: 10px;">
                            <a href="#" class="btn-a facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                            <a href="#" class="btn-a google"><i class="fab fa-google-plus-g"></i> Google</a>
                        </div>
                    </div>
                </div>
                <!--end signup-->
            </div>
        </div>
    </div>
    @include('footer')
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>