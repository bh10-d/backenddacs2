<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <div class="account-settings">
                <div class="user-profile">
                    <div class="user-avatar">
                        <img src="https://vsmcamp.com/wp-content/uploads/2020/11/JaZBMzV14fzRI4vBWG8jymplSUGSGgimkqtJakOV.jpeg" alt="Maxwell Admin">
                    </div><br>
                    <h5 class="user-name">{{Auth::user()->username}}{{--Bùi Đức Hiếu--}}</h5>
                    <h6 class="user-email">{{Auth::user()->email}}{{--admin@example.com--}}</h6>
                </div>
                <ul class="navbar-nav mr-auto flex-column vertical-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('thongtinnguoidung') }}"><i class="fas fa-user"></i> Thông
                            tin người dùng</a>
                        <!-- <p onclick="redirectcustom(this);" data-url="info">Thông tin người dùng</p> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kiemtradonhang') }}"><i class="fas fa-file-alt"></i> Đơn
                            Hàng</a>
                        <!-- <p onclick="redirectcustom(this);" data-url="purchase">Đơn hàng</p> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/cart') }}"><i class="fas fa-shopping-cart"></i> Giỏ hàng của
                            tôi</a>
                        <!-- <p onclick="redirectcustom(this);" data-url="thanhtoan">Giỏ hàng của tôi</p> -->
                    </li>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>