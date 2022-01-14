<div class="header__wrap">
    <!--edit-->
    <div class="custom-block">
        <div class="header__wrap--p1">
            <!--edit-->
            <div class="header__wrap--p1e">
                <a href="{{ url('/') }}"><img class="logo" src="{{asset('image/logo.png')}}" alt="logo"></a>
                <div class="header__search">
                    <!--edit-->
                    <div class="header__search--listt">{{--cai nay co height--}}
                        <div class="header__search-droplist">
                            <a onclick="select();" class="select-hieu">Chọn danh mục <i class="fas fa-chevron-circle-down"></i></a>
                            <div class="drop">
                                <a href="{{ url('/search') }}">Điện thoại - Máy tính bảng</a>
                                <a href="#">Laptop - Laptop Gaming</a>
                                <a href="#">Thiết bị văn phòng</a>
                                <a href="#">Kỹ thuật số</a>
                                <a href="#">Phụ kiện</a>
                            </div>
                        </div>
                        <form class="sear" action="" method="post">
                            @csrf
                            {{--de anh hiu them div de boc input dropdown data search--}}
                            <div>
                                <input id="search-input" autocomplete="off" type="text" placeholder="> Nhập sản phẩm">
                            </div>
                            <div id="search-block"></div>
                            {{--<button type="submit" class="btn"><i class="fas fa-search"></i></button>--}}
                        </form>
                    </div>
                </div>
                <p class="header__hotline">
                    <!--edit-->
                    <i class="fas fa-phone-alt"></i>
                    Hotline:
                    <span>113 113</span>
                </p>
                <div class="header__account">
                    <span>
                        <i class="far fa-user"></i>
                        @if(Route::has('login'))
                        @auth
                        <span>Xin chào: {{Auth::user()->username}}</span>
                        @else
                        {{ __('Tài khoản') }}
                        @endauth
                        @endif
                    </span>
                    <div class="header__account--option">
                        @guest
                        <p><a style="text-decoration:none;font-weight: 500;" href="{{ route('login') }}">Đăng nhập</a></p>
                        <p><a style="text-decoration:none;font-weight: 500;" href="{{ route('register') }}">Đăng kí</a></p>
                        @elseif(Auth::user()->username == "admin")
                        <a href="{{ route('admin') }}">Truy cập admin</a>
                        @else
                        <a href="{{ route('thongtinnguoidung') }}">{{ __('Tài khoản của tôi')}}</a>
                        <a href="{{ route('kiemtradonhang') }}">{{ __('Đơn mua')}}</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Đăng xuất') }}
                        </a>
                        <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form> -->
                        @endguest
                    </div>
                </div>
                <div class="header__cart">
                    <div onclick="cartbutton();">
                        <p><i class="fas fa-shopping-cart"></i> Giỏ hàng</p>
                        @if (Session::get('cart'))
                        <div class="cart--count">
                            @php $product=0 @endphp
                            @php $list=0 @endphp
                            @foreach (Session::get('cart') as $id => $details)
                            @php $product = $details['product_qty'] @endphp
                            @php $list+=$product @endphp
                            @endforeach
                            <span class="hieu-test">{{ $list }}</span>
                            <!--so luong san pham------------------------------------------------------------------------------------------------>
                        </div>
                        @endif
                    </div>
                    <div class="header__cart--list">
                        <form>
                            @php $one=0 @endphp
                            @php $total=0 @endphp
                            @if(Session::get('cart'))
                            @foreach(Session::get('cart') as $id => $product)
                            <div class="header__cart--item">
                                <img src="{{ $product['product_image'] }}" alt="">
                                <div class="item--info">
                                    <span class="item-name">{{$product['product_title']}}</span><br>
                                    <span class="item--price">{{$product['product_price']}}đ</span>
                                    <div class="item--quantity">
                                        <a class="btn--custom item minus">-</a>
                                        <!--onclick="quanityminus();"-->
                                        <input type="text" class="quantityy" value="{{$product['product_qty']}}">
                                        <a class="btn--custom item plus">+</a>
                                        <!--onclick="quantityplus();"-->
                                    </div>
                                </div>
                                @php $one = $product['product_qty']*$product['product_price'] @endphp
                                @php $total+=$one @endphp
                            </div>
                            @endforeach
                            <div class="cart__list--pay">
                                <div>
                                    <span>Tổng cộng:</span><span>{{ $total }}đ</span>
                                </div>
                                <!-- <button class="btn btn-outline-danger mt-2 pay" type="submit"><i class="fas fa-shopping-bag"></i> Tới giỏ hàng và thanh toán</button> -->
                                <a class="btn btn-outline-danger mt-2 pay" href="{{ url('thanhtoan') }}"><i class="fas fa-shopping-bag"></i> Tới giỏ hàng và thanh toán</a>
                            </div>
                            @else
                            <div class="header__cart--item">
                                <p>Bạn hiện chưa chọn sản phẩm nào</p>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
        <div class="header__wrap--p2">
            <!--edit-->
            <label for="nav_check_input" class="head__navbarrespon--bars"><i class="fas fa-bars"></i></label>
            <div class="head__navbarrespon--cart" onclick="cartbutton();">
                <p><i class="fas fa-shopping-cart"></i></p>
                @if (Session::get('cart'))
                <div class="cart--count">
                    <!-- <span>1</span> -->
                    @php $product=0 @endphp
                    @php $list=0 @endphp
                    @foreach (Session::get('cart') as $id => $details)
                    @php $product = $details['product_qty'] @endphp
                    @php $list+=$product @endphp
                    @endforeach
                    <span>{{ $list }}</span>
                    <!--so luong san pham------------------------------------------------------------------------------------------------>
                </div>
                @endif
            </div>
            <input type="checkbox" hidden name="" class="nav__check" id="nav_check_input">
            <label for="nav_check_input" class="navbarrespon-overlay"></label>
            <div class="header__navbarrespon">
                <div class="header__user">
                    <div class="user__info">
                        <div class="user__info--table">
                            <span><img src="{{ asset('image/logo.png') }}" style="width:40px;height:40px;" alt="logo"></span>
                            <div style="display:block; width:240px; height:20px">
                                @guest
                                <p><a style="text-decoration:none;font-weight: 500; color: white;" href="{{ route('login') }}">Đăng nhập</a></p>
                                <p><a style="text-decoration:none;font-weight: 500; color: white;" href="{{ route('register') }}">Đăng kí</a></p>
                                @else
                                <p>Xin chào: {{Auth::user()->username}}</p>
                                <p>Email: {{Auth::user()->email}}</p>
                                @endguest
                            </div>
                        </div>
                    </div>
                    <label for="nav_check_input" class="close">
                        <i class="fas fa-times"></i>
                    </label>
                </div>
                <div style="display:block; margin-top:90px">
                    <ul class="header__navbarrespon--list">
                        <li><a style="cursor: pointer;" onclick="dropdownnav();">Danh mục sản phẩm </a><span class="arrow"><i class="fas fa-arrow-down"></i>
                                <ul class="responsive__nav--list">
                                    <li><a href="{{ url('/search') }}">Điện thoại - Máy tính bảng</a> </li>
                                    <li><a href="#">Laptop - Laptop Gaming</a> </li>
                                    <li><a href="#">Thiết bị văn phòng</a> </li>
                                    <li><a href="#">Kỹ thuật số</a> </li>
                                    <li><a href="#">Phụ kiện</a> </li>
                                </ul>
                            </span></li>
                        <li>
                            @guest
                            @elseif(Auth::user()->username == "admin")
                            <a href="{{ route('admin') }}">Truy cập admin</a>
                            @else
                            <p><a href="{{ route('thongtinnguoidung') }}">{{ __('Tài khoản của tôi')}}</a></p>
                            <p><a href="{{ route('kiemtradonhang') }}">{{ __('Đơn mua')}}</a></p>
                            @endguest
                        </li>
                        <li>
                            @if(Auth::user()!=null)
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Đăng xuất') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @endif
                        </li>
                        <!-- <li><a href="#">Giỏ hàng</a></li> -->
                    </ul>
                </div>
                <!-- <span class="bar" onclick="bars();"></i></span> -->
            </div>
        </div>
    </div>
</div>
@section('script')
<script>
    $('#search-input').keyup(function() {
        let query = $(this).val();
        if (query != "") {
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ url('/search-block') }}",
                method: "POST",
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) {
                    // $('#search-block').fadeIn();
                    $('#search-block').html(data);
                    console.log(data);
                },
                error: function(response) {
                    console.log(response)
                }
            });
        } else {
            // $('#search-block').fadeOut();
        }
    });
</script>



@endsection