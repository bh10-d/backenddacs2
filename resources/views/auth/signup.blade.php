<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/auth/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
    <link rel="stylesheet" href="{{ asset('css/foot.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link rel="shortcut icon" href="image/logo.png" type="image/x-icon"> -->
    <title>Đăng nhập</title>
</head>

<body>
    @include('header')
    <div class="login__page">
        <div class="custom-block">
            <div class="login__header--option">
                <a href="{{ url('/') }}">Trang chủ</a> <span>></span> <a class="redirect" href="signup.html">Đăng ký</a>
            </div>
        </div>
        <div class="login__signup__page">
            <div class="login__page--block">
                <!--login-->
                <div class="login__block hidden">
                    <div class="login__block--title">
                        <p>ĐĂNG NHẬP</p>
                        <p>Nếu bạn chưa có tài khoản, <a onclick="changetosignup();" class="link--a">đăng kí tại đây</a></h5>
                    </div>
                    <div class="login__block--form">
                        <form class="login__form" action="{{route('login')}}" method="post">
                            @csrf
                            <input class="form--input" type="text" name="username" placeholder="Tài khoản">
                            <input class="form--input" type="text" name="password" placeholder="Mật khẩu">
                            <button class="form--input btn--danger" type="submit">Đăng nhập</button>
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
                <div class="login__block--signup">
                    <div class="login__block--title">
                        <p>ĐĂNG KÝ</p>
                        <p>Đã có tài khoản, đăng nhập <a onclick="changetologin();" class="link--a">tại đây</a></h5>
                    </div>
                    <div class="login__block--form">
                        <form class="login__form" action="{{ route('register') }}" method="post">
                            @csrf
                            <input class="form--input @error('lastname') is-invalid @enderror" type="text" placeholder="Tên tài khoản" name="lastname" required>
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input class="form--input @error('email') is-invalid @enderror" type="text" placeholder="Email" name="email" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input class="form--input @error('number') is-invalid @enderror" type="text" placeholder="Số điện thoại" name="number" required>
                            @error('number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input class="form--input @error('password') is-invalid @enderror" type="password" name="password" placeholder="Mật khẩu" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <!-- <input class="form--input" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" required> -->
                            <button class="form--input btn--danger" type="submit">Đăng ký</button>
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
                <!--end signup-->
            </div>
        </div>
    </div>
    @include('footer')
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>