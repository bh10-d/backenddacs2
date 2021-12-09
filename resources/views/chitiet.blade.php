<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/detail/chitiet.css')}}">{{--khong co class modal--}}
    <link rel="stylesheet" href="{{asset('css/detail/chitiet2.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/detail/chitiet4.css')}}"> -->{{--bootstrap--}}
    <!-- <link rel="stylesheet" href="{{asset('css/detail/chitiet7.css')}}">{{--tac dong den anh--}} -->
    <link rel="stylesheet" href="{{asset('css/detail/chitiet8.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>Document</title>
</head>

<body>
    @extends('layouts.app')
    @section('link')
    <link rel="stylesheet" href="{{asset('css/style-list-image.css')}}">

    @endsection


    @section('body')
    <div class="opacity_menu"></div>
    <div class="bodywrap">
        <section class="bread-crumb">
            <span class="crumb-border"></span>
            <div class="container">
                <!-- <div class="rows">
                    <div class="col-xs-12 a-left">
                        <a href="{{ url('/') }}">Trang chủ</a> <span>></span> <a class="redirect" href="{{ url('/') }}">Điện thoại</a>
                    </div>
                </div> -->
                <div class="login__header--option">
                    <a href="{{ url('/') }}">Trang chủ</a> <span style="font-weight: 700;"><i class="fas fa-angle-right"></i></span> <span>Điện thoại</span> <span style="font-weight: 700;"><i class="fas fa-angle-right"></i></span> <a class="redirect" href="{{ url('/') }}">{{ $details[0]->productname }}</a>
                </div>
            </div>
        </section>
        <section class="">{{--product details-main--}}

            {{--@foreach ($details as $d)--}}
            <div class="container">
                <div class="bg_product">{{--clearfix--}}
                    <div class="section">{{--wrap-padding-15 wp_product_main clearfix--}}
                        <div class="details-product section">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="title_p">
                                        <h1 class="title-product">{{ $details[0]->productname }}</h1>
                                        {{-- <div class="reviews_details_product">
                                            <div class="sapo-product-reviews-badge sapo-product-reviews-badge-detail" data-id="18703977"></div>
                                        </div> --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">{{--product-detail-left product-images--}}
                                            <!-- <div class="wrapbb">{{----}} -->
                                            <div class="slider-big-video clearfix margin-bottom-20">
                                                <div class="container-all-image">
                                                    <div class="image-container">
                                                        @foreach($details as $img)
                                                        @if($loop->first)
                                                        <div class="big-image">
                                                            <img src="{{$img->image}}" alt="">
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                        <div class="small-images">
                                                            @foreach($details as $img)
                                                            <img src="{{$img->image}}" alt="">
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slider slider-for">
                                                    {{--<a href="" title="Click để xem">--}}
                                                    <!-- <img src="" class="lazyload img-responsive mx-auto d-block"> -->
                                                    {{--</a>--}}
                                                </div>
                                            </div>
                                            <!-- <div class="slider-has-video">
                                                    <div class="slider slider-nav">
                                                        <div class="fixs">
                                                            
                                                        </div>
                                                    </div>
                                                </div> -->
                                            <!-- </div> -->
                                        </div>
                                        @foreach($detailsnojoin as $data)

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 details-pro">
                                            <form method="get" class="form_background form-inline margin-bottom-0">{{-- enctype="multipart/form-data" id="add-to-cart-form" action="/cart/add" method="post" --}}
                                                {{--khong phan su mien vao--}}
                                                @csrf
                                                {{--thay doi title to productname--}}
                                                <input type="hidden" value="{{$details[0]->id}}" class="cart_product_id_{{$details[0]->id}}">
                                                <input type="hidden" value="{{$details[0]->productname}}" class="cart_product_title_{{$details[0]->id}}">
                                                <input type="hidden" value="{{$details[0]->price}}" class="cart_product_price_{{$details[0]->id}}">
                                                <input type="hidden" value="{{$details[0]->image}}" class="cart_product_image_{{$details[0]->id}}">
                                                <input type="hidden" value="{{$details[0]->quantity}}" class="cart_product_rest_quantity_{{$details[0]->id}}">

                                                <input type="hidden" value="1" class="cart_product_qty_{{$details[0]->id}}">
                                                {{--khong phan su mien vao--}}
                                                <div class="fw w_100">
                                                    <div class="price-box">

                                                        <span class="special-price">
                                                            <span class="price product-price price-custom-hieu">{{ $details[0]->price }}</span><span class="product-price">₫</span>
                                                        </span>
                                                        <!-- <span class="old-price" itemprop="priceSpecification" itemscope="" itemtype="http://schema.org/priceSpecification">
                                                            Giá thị trường:
                                                            <del class="price product-price-old">
                                                                16.000.000₫
                                                            </del>
                                                            <meta itemprop="price" content="16000000">
                                                            <meta itemprop="priceCurrency" content="VND">
                                                        </span>
                                                        <span class="save-price">Tiết kiệm:
                                                            <span class="price product-price-save"></span>
                                                        </span> -->
                                                    </div>
                                                    <div class="inventory_quantity">
                                                        <span class="stock-brand-title">Tình trạng:</span>
                                                        <span class="a-stock a2">
                                                            Còn hàng
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-product">
                                                    <div class="select-swatch">
                                                        <div id="variant-swatch-0" class="swatch clearfix" data-option="option1" data-option-index="0">
                                                            <div class="header">Dung lượng:</div>
                                                        </div>
                                                        <div class="swatch clearfix" data-option="option2" data-option-index="1">
                                                            <div class="header">Màu sắc:</div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix form-group ">
                                                        <div class="custom custom-btn-number show">
                                                            <label class="sl section">Tồn kho:</label>
                                                            <div class="custom input_number_product custom-btn-number form-control">
                                                                <span class="form-control prd_quantity">{{ $data->quantity }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="btn-mua button_actions">
                                                            <button type="submit" class=" btn btn_base normal_button add-to-cart" name="add-to-cart" data-id_product="{{$data->id}}">Thêm vào giỏ hàng</button>
                                                            <button type="submit" class=" btn btn_base fast purchase" name="purchase" data-id_product="{{$details[0]->id}}">
                                                                <span class="txt-main text_1">Mua ngay</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </form> -->
            {{--@endforeach--}}
            {{--ahsgd--}}
            <div class="container">
                <div class="bg_products">{{--clearfix--}}
                    <div class="wrap_tab_ed section margin-top-30">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8">
                                <div class="product-tab">
                                    <ul class="tabs tabs-title clearfix">
                                        <li class="tab-link active">
                                            <h3>Mô tả sản phẩm</h3>
                                        </li>
                                    </ul>
                                    <div class="tab-content active">
                                        <div class="rte">
                                            <div id="content">
                                                <div class="text-center">
                                                    {!! $data->description !!}
                                                </div>
                                            </div>
                                            <div class="read-more">
                                                <span>Xem thêm <i class="fa fa-angle-down"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="specifications margin-bottom-20">{{----}}
                                    <h2 class="fs-dttop">Thông số kỹ thuật</h2>{{----}}
                                    <div class="fs-tsright">{{----}}
                                        <ul>
                                            <li><label>Màn hình:</label>5.8 inches</li>
                                            <li><label>Camera trước:</label>10MP</li>
                                            <li><label>Camera sau:</label>2 camera 12 MP</li>
                                            <li><label>RAM:</label>6 GB</li>
                                            <li><label>Bộ nhớ trong:</label>128 GB</li>
                                            <li><label>CPU:</label>Exynos 9820 8 nhân 64-bit</li>
                                            <li><label>GPU:</label>Mali-G76 MP12</li>
                                            <li><label>Dung lượng pin:</label>3100 mAh</li>
                                            <li><label>Hệ điều hành:</label>Android 9.0</li>
                                            <li><label>Thẻ SIM:</label>Nano SIM, 2 Sim</li>
                                        </ul>
                                    </div>
                                    <button type="button" class="btn btn-primary">
                                        Xem chi tiết thông số kĩ thuật
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- comment--tan -->
        <section>
            <div class="container">
                <h3>Bình luận sản phẩm</h3>
                <form action="#">
                    @csrf
                    <input type="hidden" name="id_product" class="id_product" value="{{ $details[0]->id }}">
                    <div id="comment_show"></div>
                </form>
                <form action="#">
                    <span>
                        <input style="width: 100%" type="text" class="comment_name" placeholder="Tên bình luận"><br>
                    </span><br>
                    <textarea name="comment" class="comment_content" placeholder="Nhap noi dung" style="width: 100%"></textarea><br>
                    <div id="notify_comment"></div>
                    <!-- <b>Đánh giá sao</b><img src="" alt=""> -->
                    <button type="button" class="btn btn-primary send-comment" style="float: right">Bình luận</button>
                </form>
                <hr>
                <br>
                <!-- <h3>Cac binh luan</h3><br> -->
                <style>
                    .style_comment {
                        border: 1px solid #ddd;
                        border-radius: 10px;
                        background: #F0F0E9;
                    }
                </style>
            </div>
        </section>
        <section>
            <div class="container">
                <h4 style="font-weight:700; border-top: 1px solid #e4e4e4;padding:15px 0;">XEM THÊM</h4>
                <div class="container-category1">
                    <div class="card-cate">
                        <div class="container-img">
                            <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
                        </div>
                        <div class="container">
                            <p class="name_products"><a href="##" style="text-decoration: none; font-weight: 500;font-size:15px;">IPhone 4 8GB</a></p>
                            <h5 style="color: #dc3545; font-weight:500">10000đ</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endsection


    @section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.small-images img').click(function() {
                let image = $(this).attr('src');
                $('.big-image img').attr('src', image);
                // $('.small-images img').css("border", "1px solid red");
            });
        });
        $(".tab-content .rte").each(function(e) {
            if ($('.tab-content .rte #content').height() >= 300) {
                $('.tab-content').find('.read-more').removeClass('d-none').addClass('more');
            } else {
                $('.tab-content').find('.read-more').addClass('d-none');
            }
        });
        jQuery('.read-more').on('click', function(event) {
            if ($('.read-more').hasClass('more')) {
                $(this).removeClass('more').addClass('less');
                $(this).html('<span>Thu gọn <i class="fas fa-angle-up"></i></span>');
            } else {
                $(this).removeClass('less').addClass('more');
                $(this).html('<span>Xem thêm <i class="fa fa-angle-down"></span>');
                $('html, body').animate({
                    scrollTop: $('#content').offset().top
                }, 200);
            }
            jQuery(".tab-content .rte").toggleClass("expand");
        });
        //comment --tan
        $(document).ready(function() {
            load_comment();
            
            function load_comment() {
                var id = $('.id_product').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('/load-comment')}}",
                    method: "POST",
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#comment_show').html(data);
                    }
                });
            }
            $('.send-comment').click(function() {
                var id = $('.id_product').val();
                var comment_name = $('.comment_name').val();
                var comment_content = $('.comment_content').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('/send-comment')}}",
                    method: "POST",
                    data: {
                        id: id,
                        comment_name: comment_name,
                        comment_content: comment_content,
                        _token: _token
                    },
                    success: function(data) {

                        $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công</span>');
                        load_comment();
                        $('#notify_comment').fadeOut(7000);
                        $('.comment_name').val('');
                        $('.comment_content').val('');
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            });
        });
    </script>
    @endsection
</body>

</html>