@extends('layouts.app')

@section('body')
<section>
    
    <div class="container-list-advertise">
        <ul class="list-category">
            <li><span><a href="#"><i class="fas fa-gifts"></i></span> DANH MỤC SẢN PHẨM</a></li>
            <li><span><i class="fas fa-gifts"></i></span> Điện thoại - Máy tính bảng</li>
            <li><span><i class="fas fa-gifts"></i></span> Laptop-Laptop Gaming</li>
            <li><span><i class="fas fa-gifts"></i></span> May giặt - Máy sấy</li>
            <li><span><i class="fas fa-gifts"></i></span> Tivi - Loa âm thanh</li>
            <li><span><i class="fas fa-gifts"></i></span> Thiết bị văn phòng</li>
            <li><span><i class="fas fa-gifts"></i></span> Kỹ thuật số</li>
            <li><span><i class="fas fa-gifts"></i></span> Phụ kiện</li>
        </ul>
        {{-- <div class="container-img">
            <img src="./image/banner1.png" alt="no image">
        </div> --}}


        <ul class="list-advertise">
            <li><span><i class="fas fa-gifts"></i></span> Sản phẩm khuyến mãi</li>
            <li><span><i class="fas fa-american-sign-language-interpreting"></i></i></span> Đổi trả trong 15 ngày</li>
            <li><span><i class="fas fa-shuttle-van"></i></span> Miễn phí giao hàng toàn quốc</li>
            <li><span><i class="fas fa-money-check-alt"></i></span> Thanh toán khi nhận hàng</li>
        </ul>
    </div>
</section>

{{-- flashsale-section --}}
<section class="flashsale-section">
    <a href="#"><i class="fas fa-bolt"></i>FLASH SALE</a>
    <span>00</span>:<span>00</span>:<span>00</span>
    <div class="row justify-content-center">
        <div class="glider-contain">


            <button class="glider-prev">
                <i class="fa fa-chevron-left"></i>
            </button>

            <div id="container-carousel-p" class="glider">

                <div class="card">
                    <div class="card-body">
                        <div class="container-img-product">
                            <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                        </div>
                        <p class="card-text">Samsung galaxy anime</p>

                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <div class="container-img-product">
                            <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                        </div>
                        <p class="card-text">Samsung galaxy anime</p>

                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <div class="container-img-product">
                            <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                        </div>
                        <p class="card-text">Samsung galaxy anime</p>

                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <div class="container-img-product">
                            <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                        </div>
                        <p class="card-text">Samsung galaxy anime</p>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="container-img-product">
                            <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                        </div>
                        <p class="card-text">Samsung galaxy anime</p>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="container-img-product">
                            <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                        </div>
                        <p class="card-text">Samsung galaxy anime</p>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="container-img-product">
                            <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                        </div>
                        <p class="card-text">Samsung galaxy anime</p>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="container-img-product">
                            <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                        </div>
                        <p class="card-text">Samsung galaxy anime</p>

                    </div>
                </div>


            </div>


            <button class="glider-next">
                <i class="fa fa-chevron-right"></i>
            </button>

        </div>
    </div>
</section>


<section class="section-category1">
    <div class="top-section-cate1">
        <h2>ĐIỆN THOẠI</h2>
        <ul>
            <li>Trang chủ</li>
            <li>Giới thiệu</li>
            <li>Sản phẩm</li>
            <li>Tin tức</li>
            <li>Liên hệ</li>
            <li><a href="{{ URL::to('/search') }}">Xem tất cả</a></li>
        </ul>

    </div>

    <div class="container-category1">
        @foreach($allproduct as $product)
        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>

            <div class="container">

                <h4 class="name_products"><a href="{{URL::to('/detail-product/'.$product->id)}}">{{$product->productname}}</a></h4>
                <p>{{$product->price}} d</p>
            </div>
        </div>
        @endforeach


    </div>
</section>

<section class="section-banner2">
    <div class="container-banner2">
        <img src="{{asset('image/banner2.png')}}" alt="">
    </div>
</section>


<section class="section-category1">
    <div class="top-section-cate1">
        <h2>May tinh</h2>
        <ul>
            <li>Trang chủ</li>
            <li>Giới thiệu</li>
            <li>Sản phẩm</li>
            <li>Tin tức</li>
            <li>Liên hệ</li>
            <li>Xem tất cả</li>
        </ul>

    </div>

    <div class="container-category1">
        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>

            <div class="container">
                <h4 class="name_products"><a href="#">Ipad pro</a></h4>
                <p>4.500.000 d</p>
            </div>
        </div>

        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>
            <div class="container">
                <h4 class="name_products"><a href="#">Ipad pro</a></h4>
                <p>4.500.000 d</p>
            </div>
        </div>

        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>
            <div class="container">
                <h4 class="name_products"><a href="#">Ipad pro</a></h4>
                <p>4.500.000 d</p>
            </div>
        </div>

        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>
            <div class="container">
                <h4 class="name_products"><a href="#">Ipad pro</a></h4>

                <p>4.500.000 d</p>
            </div>
        </div>

        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>
            <div class="container">
                <h4 class="name_products"><a href="#">Ipad pro</a></h4>
                <p>4.500.000 d</p>
            </div>
        </div>

    </div>
</section>

<section class="last-banner">

    <div class="last-banner-1">
        <img src="./image/banner3-1.png" alt="">
    </div>

    <div class="last-banner-2">
        <img src="./image/banner4-1.png" alt="">
    </div>

</section>

<section class="section-category1">
    <div class="top-section-cate1">
        <h2>Phu kien</h2>
        <ul>
            <li>Trang chủ</li>
            <li>Giới thiệu</li>
            <li>Sản phẩm</li>
            <li>Tin tức</li>
            <li>Liên hệ</li>
            <li>Xem tất cả</li>
        </ul>

    </div>

    <div class="container-category1">
        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>

            <div class="container">
                <h4 class="name_products"><a href="#">Ipad pro</a></h4>
                <p>4.500.000 d</p>
            </div>
        </div>

        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>
            <div class="container">
                <h4 class="name_products"><a href="#">Ipad pro</a></h4>
                <p>4.500.000 d</p>
            </div>
        </div>

        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>
            <div class="container">
                <h4 class="name_products"><a href="#">Ipad pro</a></h4>
                <p>4.500.000 d</p>
            </div>
        </div>

        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>
            <div class="container">
                <h4 class="name_products"><a href="#">Ipad pro</a></h4>

                <p>4.500.000 d</p>
            </div>
        </div>

        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>
            <div class="container">
                <h4 class="name_products"><a href="#">Ipad pro</a></h4>
                <p>4.500.000 d</p>
            </div>
        </div>

    </div>
</section>

<script src="{{asset('js/glider.min.js')}}"></script>
<script>
    new Glider(document.querySelector('.glider'), {
        slidesToShow: 5,


        draggable: true,
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }

    });
</script>
<script src="https://kit.fontawesome.com/721d15c2a9.js" crossorigin="anonymous"></script>


@endsection