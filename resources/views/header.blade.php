<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="shortcut icon" href="image/logo.png" type="image/x-icon">
    <title>Tạp hóa công nghệ</title>
</head>

<body>
    <div class="header__wrap"><!--edit-->
        <div class="header__wrap--p1"><!--edit-->
            <div class="header__wrap--p1e">
                <a href="" class="header__logo"><img class="logo" src="image/logo.png" alt=""></a>
                <div class="header__search"><!--edit-->
                    <div class="header__search--list">
                        <div class="header__search-droplist">
                            <a onclick="select();" class="select">Chọn danh mục <i
                                    class="fas fa-chevron-circle-down"></i></a>
                            <div class="drop">
                                <a href="#">Điện thoại - Máy tính bảng</a>
                                <a href="#">Laptop - Laptop Gaming</a>
                                <a href="#">Thiết bị văn phòng</a>
                                <a href="#">Kỹ thuật số</a>
                                <a href="#">Phụ kiện</a>
                            </div>
                        </div>
                        <input type="text" placeholder="> Nhập sản phẩm">
                        <button type="submit" class="btn"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <p class="header__hotline"><!--edit-->
                    <i class="fas fa-phone-alt"></i>
                    Hotline:
                    <span>113 113</span>
                </p>
                <div class="header__account">
                    <p><i class="far fa-user"></i> Tài khoản</p>
                    <div class="header__account--option">
                        <a href="login.html">Đăng nhập</a>
                        <a href="signup.html">Đăng kí</a>
                    </div>
                </div>
                <div class="header__cart">
                    <p><i class="fas fa-shopping-cart"></i> Giỏ hàng</p>
                    <div class="cart--count">
                        <span>1</span> <!--so luong san pham------------------------------------------------------------------------------------------------>
                    </div>
                    <div class="header__cart--list">
                        <form action="">
                            <div class="header__cart--item">
                                <img src="image/iphone.png" alt="">
                                <div class="item--info">
                                    <span class="item-name">iPhone 12 Pro Max(512GB)</span>
                                    <span class="item--price">35.990.000đ</span>
                                    <div class="item--quantity">
                                        <a class="btn item minus" onclick="quanityminus();">-</a>
                                        <input type="text" class="quantity" value="1">
                                        <a class="btn item plus" onclick="quantityplus();">+</a>
                                    </div>
                                    <!-- <span class="item--quantity" type="input"></span> -->
                                </div>
                            </div>
                            <div class="cart__list--pay">
                                <div>
                                    <span>Tổng cộng:</span><span>35.990.000 đ</span>
                                </div>
                                <button class="btn pay" type="submit"><i class="fas fa-shopping-bag"></i> Tới giỏ hàng và thanh toán</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__wrap--p2"><!--edit-->
            <label for="nav_check_input" class="head__navbarrespon--bars"><i class="fas fa-bars"></i></label>
            <div class="head__navbarrespon--cart">
                <p ><i class="fas fa-shopping-cart"></i></p>
                <div class="cart--count">
                    <span>1</span>
                </div>
            </div>
            <input type="checkbox" hidden name="" class="nav__check" id="nav_check_input">
            <label for="nav_check_input" class="navbarrespon-overlay"></label>
            <div class="header__navbarrespon">
                <div class="header__user">
                    <div class="user__info">
                        <div class="user__info--table">
                            <span><img src="image/logo.png" style="width:40px;height:40px;" alt="logo"></span>
                            <div style="display:block; width:240px; height:20px">
                                <p>Xin chào: Lorem ipsum dolor sirendis fugiat sint quas provident.</p>
                                <p>User 1</p>
                            </div>
                        </div>
                    </div>
                    <label for="nav_check_input" class="close">
                        <i class="fas fa-times"></i>
                    </label>
                </div>
                <div style="display:block; margin-top:90px">
                    <ul class="header__navbarrespon--list">
                        <li><a href="#">1</a></li>
                        <li><a style="cursor: pointer;" onclick="dropdownnav();">Danh mục sản phẩm </a><span class="arrow"><i class="fas fa-arrow-down"></i>
                            <ul class="responsive__nav--list">
                                <li><a href="#">Điện thoại - Máy tính bảng</a> </li>
                                <li><a href="#">Laptop - Laptop Gaming</a> </li>
                                <li><a href="#">Thiết bị văn phòng</a> </li>
                                <li><a href="#">Kỹ thuật số</a> </li>
                                <li><a href="#">Phụ kiện</a> </li>
                            </ul>
                        </span></li>
                        <li><a href="#">Tài khoản</a></li>
                        <!-- <li><a href="#">Giỏ hàng</a></li> -->
                    </ul>
                </div>
                <!-- <span class="bar" onclick="bars();"></i></span> -->
            </div>
        </div>
    </div>
    <script src="script/script.js"></script>
</body>

</html>