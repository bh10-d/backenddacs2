<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/detail/chitiet.css')}}">
    <link rel="stylesheet" href="{{asset('css/detail/chitiet2.css')}}">
    <link rel="stylesheet" href="{{asset('css/detail/chitiet4.css')}}">
    <link rel="stylesheet" href="{{asset('css/detail/chitiet7.css')}}">
    <link rel="stylesheet" href="{{asset('css/detail/chitiet8.css')}}">
    <title>Document</title>
</head>

<body>
    <div class="opacity_menu"></div>
    <div class="bodywrap">
        <section class="bread-crumb">
            <span class="crumb-border"></span>
            <div class="container">
                <div class="rows">
                    <div class="col-xs-12 a-left">
                        <!-- <ul class="breadcrumb">
                            <li class="home">
                                <a href="/"><span>Trang chủ</span></a>
                                <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                            </li>
                            <li>
                                <a class="changeurl" href="/dien-thoai-may-tinh-bang"><span>Điện thoại - Máy tính
                                        bảng</span></a>
                                <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                            </li>
                            <li>
                                <strong><span>Điện thoại Samsung Galaxy S10+</span></strong>
                            <li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </section>
        <section class="product details-main">
            @foreach ($details as $d)
            <form>
                {{--khong phan su mien vao--}}
                @csrf
                <input type="hidden" value="{{$d->id}}" class="cart_product_id_{{$d->id}}">
                <input type="hidden" value="{{$d->title}}" class="cart_product_title_{{$d->id}}">
                <input type="hidden" value="{{$d->price}}" class="cart_product_price_{{$d->id}}">
                <input type="hidden" value="{{$d->image}}" class="cart_product_image_{{$d->id}}">
                <input type="hidden" value="1" class="cart_product_qty_{{$d->id}}">
                {{--khong phan su mien vao--}}
                <div class="hidden">
                    <div class="inventory_quantity hidden">
                        <span class="a-stock">
                            Còn hàng
                        </span>
                    </div>
                </div>
                <!-- <div itemprop="review" class="hidden">
                <span itemprop="itemReviewed">
                    <span itemprop="name">Điện thoại Samsung Galaxy S10+</span>
                </span>
                <span itemprop="author">
                    <span itemprop="name">Eco Shop</span>
                </span>
                <div itemprop="reviewRating" class="hidden">

                    <span itemprop="ratingValue">10</span> out of
                    <span itemprop="bestRating">10</span>
                </div>
                <span itemprop="publisher">
                    <meta itemprop="name" content="Eco Shop">
                </span>
            </div> -->
                <div class="container">
                    <div class="bg_product clearfix">
                        <div class="section wrap-padding-15 wp_product_main clearfix">
                            <div class="details-product section">
                                <div class="row ">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="title_p">
                                            <h1 class="title-product">{{ $d->title }}</h1>
                                            <div class="reviews_details_product ">
                                                <div class="sapo-product-reviews-badge sapo-product-reviews-badge-detail" data-id="18703977"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="product-detail-left product-images col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                                <div class="wrapbb">
                                                    <div class="slider-big-video clearfix margin-bottom-20">
                                                        <div class="slider slider-for">
                                                            <a href="" title="Click để xem">
                                                                <!-- <img src="" class="lazyload img-responsive mx-auto d-block"> -->
                                                                {{ $d->image }}
                                                            </a>
                                                            <!-- <a href="//bizweb.dktcdn.net/thumb/1024x1024/100/397/652/products/636863636050913338-ss-galaxy-s10-plus-den-2.png?v=1595839275557" title="Click để xem">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="//bizweb.dktcdn.net/thumb/grande/100/397/652/products/636863636050913338-ss-galaxy-s10-plus-den-2.png?v=1595839275557" alt="Đi&#7879;n tho&#7841;i Samsung Galaxy S10+" data-image="https://bizweb.dktcdn.net/100/397/652/products/636863636050913338-ss-galaxy-s10-plus-den-2.png?v=1595839275557" class="lazyload img-responsive mx-auto d-block">
                                                        </a>
                                                        <a href="//bizweb.dktcdn.net/thumb/1024x1024/100/397/652/products/636863636050673338-ss-galaxy-s10-plus-den-3.png?v=1595839275937" title="Click để xem">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="//bizweb.dktcdn.net/thumb/grande/100/397/652/products/636863636050673338-ss-galaxy-s10-plus-den-3.png?v=1595839275937" alt="Đi&#7879;n tho&#7841;i Samsung Galaxy S10+" data-image="https://bizweb.dktcdn.net/100/397/652/products/636863636050673338-ss-galaxy-s10-plus-den-3.png?v=1595839275937" class="lazyload img-responsive mx-auto d-block">
                                                        </a>
                                                        <a href="//bizweb.dktcdn.net/thumb/1024x1024/100/397/652/products/636863648672228468-ss-galaxy-s10-plus-trang-1.png?v=1595839276413" title="Click để xem">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="//bizweb.dktcdn.net/thumb/grande/100/397/652/products/636863648672228468-ss-galaxy-s10-plus-trang-1.png?v=1595839276413" alt="Đi&#7879;n tho&#7841;i Samsung Galaxy S10+" data-image="https://bizweb.dktcdn.net/100/397/652/products/636863648672228468-ss-galaxy-s10-plus-trang-1.png?v=1595839276413" class="lazyload img-responsive mx-auto d-block">
                                                        </a>
                                                        <a href="//bizweb.dktcdn.net/thumb/1024x1024/100/397/652/products/636863648672698468-ss-galaxy-s10-plus-trang-2.png?v=1595839276880" title="Click để xem">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="//bizweb.dktcdn.net/thumb/grande/100/397/652/products/636863648672698468-ss-galaxy-s10-plus-trang-2.png?v=1595839276880" alt="Đi&#7879;n tho&#7841;i Samsung Galaxy S10+" data-image="https://bizweb.dktcdn.net/100/397/652/products/636863648672698468-ss-galaxy-s10-plus-trang-2.png?v=1595839276880" class="lazyload img-responsive mx-auto d-block">
                                                        </a>
                                                        <a href="//bizweb.dktcdn.net/thumb/1024x1024/100/397/652/products/636863659522918468-ss-galaxy-s10-plus-xanh-1.png?v=1595839277597" title="Click để xem">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="//bizweb.dktcdn.net/thumb/grande/100/397/652/products/636863659522918468-ss-galaxy-s10-plus-xanh-1.png?v=1595839277597" alt="Đi&#7879;n tho&#7841;i Samsung Galaxy S10+" data-image="https://bizweb.dktcdn.net/100/397/652/products/636863659522918468-ss-galaxy-s10-plus-xanh-1.png?v=1595839277597" class="lazyload img-responsive mx-auto d-block">
                                                        </a>
                                                        <a href="//bizweb.dktcdn.net/thumb/1024x1024/100/397/652/products/636863659522648468-ss-galaxy-s10-plus-xanh-2.png?v=1595839278180" title="Click để xem">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="//bizweb.dktcdn.net/thumb/grande/100/397/652/products/636863659522648468-ss-galaxy-s10-plus-xanh-2.png?v=1595839278180" alt="Đi&#7879;n tho&#7841;i Samsung Galaxy S10+" data-image="https://bizweb.dktcdn.net/100/397/652/products/636863659522648468-ss-galaxy-s10-plus-xanh-2.png?v=1595839278180" class="lazyload img-responsive mx-auto d-block">
                                                        </a> -->
                                                        </div>
                                                    </div>
                                                    <div class="slider-has-video clearfix">
                                                        <div class="slider slider-nav">
                                                            <div class="fixs">
                                                                <img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/397/652/products/636863636051023338-ss-galaxy-s10-plus-den-1.png?v=1595839272423" alt="Đi&#7879;n tho&#7841;i Samsung Galaxy S10+" data-image="https://bizweb.dktcdn.net/100/397/652/products/636863636051023338-ss-galaxy-s10-plus-den-1.png?v=1595839272423" />
                                                            </div>
                                                            <!-- <div class="fixs">
                                                            <img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/397/652/products/636863636050913338-ss-galaxy-s10-plus-den-2.png?v=1595839275557" alt="Đi&#7879;n tho&#7841;i Samsung Galaxy S10+" data-image="https://bizweb.dktcdn.net/100/397/652/products/636863636050913338-ss-galaxy-s10-plus-den-2.png?v=1595839275557" />
                                                        </div>
                                                        <div class="fixs">
                                                            <img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/397/652/products/636863636050673338-ss-galaxy-s10-plus-den-3.png?v=1595839275937" alt="Đi&#7879;n tho&#7841;i Samsung Galaxy S10+" data-image="https://bizweb.dktcdn.net/100/397/652/products/636863636050673338-ss-galaxy-s10-plus-den-3.png?v=1595839275937" />
                                                        </div>
                                                        <div class="fixs">
                                                            <img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/397/652/products/636863648672228468-ss-galaxy-s10-plus-trang-1.png?v=1595839276413" alt="Đi&#7879;n tho&#7841;i Samsung Galaxy S10+" data-image="https://bizweb.dktcdn.net/100/397/652/products/636863648672228468-ss-galaxy-s10-plus-trang-1.png?v=1595839276413" />
                                                        </div>
                                                        <div class="fixs">
                                                            <img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/397/652/products/636863648672698468-ss-galaxy-s10-plus-trang-2.png?v=1595839276880" alt="Đi&#7879;n tho&#7841;i Samsung Galaxy S10+" data-image="https://bizweb.dktcdn.net/100/397/652/products/636863648672698468-ss-galaxy-s10-plus-trang-2.png?v=1595839276880" />
                                                        </div>
                                                        <div class="fixs">
                                                            <img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/397/652/products/636863659522918468-ss-galaxy-s10-plus-xanh-1.png?v=1595839277597" alt="Đi&#7879;n tho&#7841;i Samsung Galaxy S10+" data-image="https://bizweb.dktcdn.net/100/397/652/products/636863659522918468-ss-galaxy-s10-plus-xanh-1.png?v=1595839277597" />
                                                        </div>
                                                        <div class="fixs">
                                                            <img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/397/652/products/636863659522648468-ss-galaxy-s10-plus-xanh-2.png?v=1595839278180" alt="Đi&#7879;n tho&#7841;i Samsung Galaxy S10+" data-image="https://bizweb.dktcdn.net/100/397/652/products/636863659522648468-ss-galaxy-s10-plus-xanh-2.png?v=1595839278180" />
                                                        </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 details-pro">
                                                <!-- <form enctype="multipart/form-data" id="add-to-cart-form" action="/cart/add" method="post" class="form_background form-inline margin-bottom-0"> -->
                                                <div class="fw w_100">
                                                    <div class="price-box clearfix">

                                                        <span class="special-price">
                                                            <span class="price product-price">{{ $d->price }}₫</span>
                                                            <!-- <meta itemprop="price" content="15000000">
                                                            <meta itemprop="priceCurrency" content="VND"> -->
                                                        </span>
                                                        <span class="old-price" itemprop="priceSpecification" itemscope="" itemtype="http://schema.org/priceSpecification">
                                                            Giá thị trường:
                                                            <del class="price product-price-old">
                                                                16.000.000₫
                                                            </del>
                                                            <meta itemprop="price" content="16000000">
                                                            <meta itemprop="priceCurrency" content="VND">
                                                        </span>
                                                        <span class="save-price">Tiết kiệm:
                                                            <span class="price product-price-save"></span>
                                                        </span>
                                                    </div>
                                                    <div class="inventory_quantity">
                                                        <span class="stock-brand-title">Tình trạng:</span>
                                                        <span class="a-stock a2">
                                                            <link itemprop="availability" href="http://schema.org/InStock" />Còn hàng
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-product">
                                                    <div class="select-swatch">
                                                        <div id="variant-swatch-0" class="swatch clearfix" data-option="option1" data-option-index="0">
                                                            <div class="header">Dung lượng:</div>
                                                            <!-- <div class="select-swap">
                                                                <div data-value="128gb" class="n-sd swatch-element 128gb ">
                                                                    <input data-value="128gb" class="variant-0" id="swatch-0-128gb" type="radio" name="option1" value="128GB" checked />

                                                                    <label for="swatch-0-128gb">
                                                                        128GB
                                                                        <img class="crossed-out"
                                                                            src="//bizweb.dktcdn.net/100/397/652/themes/809936/assets/soldout.png?1618283467191"
                                                                            alt="128GB" />
                                                                        <img class="img-check"
                                                                            src="//bizweb.dktcdn.net/100/397/652/themes/809936/assets/select-pro.png?1618283467191"
                                                                            alt="128GB" />
                                                                    </label>
                                                                </div>
                                                                <div data-value="512gb" class="n-sd swatch-element 512gb ">
                                                                    <input data-value="512gb" class="variant-0" id="swatch-0-512gb" type="radio" name="option1" value="512GB" />

                                                                    <label for="swatch-0-512gb">
                                                                        512GB
                                                                        <img class="crossed-out"
                                                                            src="//bizweb.dktcdn.net/100/397/652/themes/809936/assets/soldout.png?1618283467191"
                                                                            alt="512GB" />
                                                                        <img class="img-check"
                                                                            src="//bizweb.dktcdn.net/100/397/652/themes/809936/assets/select-pro.png?1618283467191"
                                                                            alt="512GB" />
                                                                    </label>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                        <div id="variant-swatch-1" class="swatch clearfix" data-option="option2" data-option-index="1">
                                                            <div class="header">Màu sắc:</div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix form-group ">
                                                        <div class="custom custom-btn-number show">
                                                            <label class="sl section">Số lượng:</label>
                                                            <div class="custom input_number_product custom-btn-number form-control">
                                                                <!-- <button class="btn_num num_1 button button_qty" onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro &gt; 1 ) result.value--;return false;" type="button"><i class="fas fa-minus"></i></button>
                                                                <input type="text" id="qtym" name="quantity" value="1" maxlength="3" class="form-control prd_quantity" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onchange="if(this.value == 0)this.value=1;">
                                                                <button class="btn_num num_2 button button_qty" onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;" type="button"><i class="fas fa-plus"></i></button> -->
                                                            </div>
                                                        </div>
                                                        <div class="btn-mua button_actions clearfix">
                                                            <!-- <button type="submit" class="btn btn_base normal_button btn_add_cart add_to_cart btn-cart">
                                                                <span class="txt-main text_1">Thêm vào giỏ hàng</span>
                                                            </button> -->
                                                            <button type="submit" class=" btn btn_base normal_button btn_add_cart btn-cart add-to-cart" name="add-to-cart" data-id_product="{{$d->id}}">Them gio hang</button>
                                                            <!-- <button type="submit" class="btn fast btn_base btn_add_cart btn-cart">
                                                                <span class="txt-main text_1">Mua ngay</span>
                                                            </button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
            <!-- <div class="container">
                <div class="bg_products clearfix">
                    <div class="wrap_tab_ed section margin-top-30">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8">
                                <div class="tab_h">
                                    <div class="section bg_white">
                                        <div class="product-tab e-tabs not-dqtab">
                                            <ul class="tabs tabs-title clearfix">
                                                <li class="tab-link active" data-tab="#tab-1">
                                                    <h3>Mô tả sản phẩm</h3>
                                                </li>
                                            </ul>
                                            <div class="tab-float">
                                                <div id="tab-1" class="tab-content active content_extab">
                                                    <div class="rte product_getcontent">
                                                        <div id="content">
                                                            <p><strong>Chiếc điện thoại màn hình Infinity-O lớn nhất,
                                                                    camera xuất sắc nhất và hiệu năng mạnh mẽ nhất của
                                                                    Samsung đã xuất hiện.&nbsp;Galaxy S10+&nbsp;dẫn đầu
                                                                    xu thế, mang trên mình các công nghệ tiên tiến của
                                                                    tương lai và là một tác phẩm nghệ thuật đích
                                                                    thực.</strong></p>
                                                            <p><strong><img alt="Samsung Galaxy S10+" data-src="https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/galaxy-s10-plus-1.jpg" src="https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/galaxy-s10-plus-1.jpg" title="Bảo mật Samsung Galaxy S10+" /></strong>
                                                            </p>
                                                            <h3><strong>Kiệt tác màn hình vô cực Infinity-O</strong>
                                                            </h3>
                                                            <p>Gần như toàn bộ phần viền màn hình đã được loại bỏ trên Samsung Galaxy S10+, không có tai thỏ, không bị hạn chế tầm nhìn, trước mắt bạn là màn hình cực lớn 6,4 inch hiển thị vô cùng sống động.
                                                                Viền cong siêu mỏng tràn cả 4 cạnh kết hợp cùng các đường cắt laser chuẩn xác khéo léo giấu kín camera nằm ngay trên màn hình. Samsung S10+ xứng đáng được gọi là một kiệt tác ngay trên tay
                                                                bạn.
                                                            </p>
                                                            <p><img alt="Màn hình Galaxy S10+" data-src="https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/galaxy-s10-plus-2.jpg" src="https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/galaxy-s10-plus-2.jpg" title="Màn hình Galaxy S10+" /></p>
                                                            <p>Công nghệ màn hình Dynamic AMOLED thế hệ mới mang đến hình ảnh chuẩn HDR10+, độ phân giải Quad HD+ siêu sắc nét. Mọi khung hình đều hiện lên chân thực, độ tương phản cao và màu sắc vô cùng sống
                                                                động. Màn hình hiển thị chuẩn điện ảnh, kết hợp cùng hệ thống âm thanh nổi của loa ngoài stereo, công nghệ Dolby Atmos khiến Galaxy S10+ trở thành phương tiện giải trí di động hoàn hảo nhất.</p>
                                                            <p><img alt="Thiết kế Galaxy S10+" data-src="https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/galaxy-s10-plus-3.jpg" src="https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/galaxy-s10-plus-3.jpg" title="Thiết kế Galaxy S10+" /></p>
                                                            <h3><strong>Cảm biến vân tay siêu âm ngay trên màn
                                                                    hình</strong></h3>
                                                            <p>Không còn cảm biến vân tay ở mặt lưng nữa, giờ đây với công nghệ vân tay siêu âm, Galaxy S10+ đã tích hợp cảm biến vân tay ngay trên màn hình chính. Đây là một bước tiến lớn trong công nghệ bảo
                                                                mật. Cảm biến sẽ sử dụng sóng siêu âm để nhận dạng 3D vân tay của bạn, giúp bạn là người duy nhất có thể truy cập vào máy, vô cùng tiện lợi và an toàn tuyệt đối.</p>
                                                            <p><img alt="Bảo mật Samsung Galaxy S10+" data-src="https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/galaxy-s10-plus-4.jpg" src="https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/galaxy-s10-plus-4.jpg" title="Bảo mật Samsung Galaxy S10+" /></p>
                                                            <h3><strong>Camera đa nhiệm, chụp đẹp trong mọi hoàn
                                                                    cảnh</strong></h3>
                                                            <p>Mang trên mình tới 3 camera sau, Samsung Galaxy S10+ có thể chụp được những bức ảnh độc đáo và xuất sắc trong mọi hoàn cảnh. 3 camera với 3 vai trò khác nhau bao gồm camera chụp thông thường;
                                                                camera tele để chụp gần và camera góc siêu rộng để chụp được khung hình nhiều hơn. Nhiếp ảnh di động được nâng lên một tầm cao mới trên Galaxy S10+.</p>
                                                            <p><img alt="Camera Galaxy S10+" data-src="https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/galaxy-s10-plus-5.jpg" src="https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/galaxy-s10-plus-5.jpg" title="Camera Galaxy S10+" /></p>
                                                            <h3><strong>Khẩu độ kép, chụp tối ưu cho cả ban ngày lẫn đêm
                                                                    tối</strong></h3>
                                                            <p>Với khả năng tự động thay đổi khẩu độ từ f/2.4 khi chụp ảnh ban ngày và f/1.5 dành riêng cho chụp thiếu sáng, Samsung S10+ cho bạn thỏa sức chụp ảnh ở những điều kiện ánh sáng khác nhau. Chỉ
                                                                cần đưa máy lên và bấm chụp, phần cứng camera tuyệt vời và bộ vi xử lý mạnh mẽ sẽ cùng nhau tạo nên bức ảnh đẹp nhất cho riêng bạn.</p>
                                                        </div>
                                                        <div class="read-more">
                                                            <span>Xem thêm <i class="fa fa-angle-down"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="specifications margin-bottom-20">
                                    <h2 class="fs-dttop">Thông số kỹ thuật</h2>
                                    <div class="fs-tsright">
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
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#specifications">
                                        Xem chi tiết thông số kĩ thuật
                                    </button>
                                    <div class="modal fade" id="specifications" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Thông số kỹ thuật chi tiết
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <ul>
                                                        <li><label>Công nghệ màn hình :</label>Curved Dynamic AMOLED
                                                        </li>
                                                        <li><label>Màu màn hình :</label>16 Triệu</li>
                                                        <li><label>Chuẩn màn hình :</label>Quad HD+</li>
                                                        <li><label>Độ phân giải màn hình :</label>1440 x 3040 pixels
                                                        </li>
                                                        <li><label>Màn hình :</label>6.4 inches</li>
                                                        <li><label>Mặt kính màn hình :</label>Đang cập nhật</li>
                                                        <li><label>Độ phân giải :</label>Camera kép</li>
                                                        <li><label>Thông tin khác :</label>Đang cập nhật</li>
                                                        <li><label>Độ phân giải:&nbsp;</label>3 camera</li>
                                                        <li><label>Quay phim :</label>2160p@60fps, 1080p@240fps, 720p@960fps, HDR, dual-video rec</li>
                                                        <li><label>Đèn Flash :</label>Có</li>
                                                        <li><label>Chụp ảnh nâng cao :</label>Đang cập nhật</li>
                                                        <li><label>Tốc độ CPU :</label>2x2.7 GHz + 2x2.3 GHz + 4x1.9 GHz
                                                        </li>
                                                        <li><label>Số nhân :</label>8</li>
                                                        <li><label>Chipset :</label>Exynos 9820</li>
                                                        <li><label>RAM :</label>8 GB</li>
                                                        <li><label>Chip đồ họa (GPU) :</label>Mali-G76 MP12</li>
                                                        <li><label>Cảm biến :</label>Mở khóa bằng vân tay siêu âm, Mở khóa bằng khuôn mặt 2D,...</li>
                                                        <li><label>Danh bạ lưu trữ :</label>Không giới hạn</li>
                                                        <li><label>ROM :</label>512 GB</li>
                                                        <li><label>Bộ nhớ còn lại :</label>Đang cập nhật</li>
                                                        <li><label>Thẻ nhớ ngoài :</label>MicroSD</li>
                                                        <li><label>Hỗ trợ thẻ nhớ tối đa :</label>512 GB</li>
                                                        <li><label>Kiểu dáng :</label>Đang cập nhật</li>
                                                        <li><label>Chất liệu :</label>Kính, kim loại, Ceramic</li>
                                                        <li><label>Kích thước :</label>157.6 x 74.1 x 7.8 mm</li>
                                                        <li><label>Trọng lượng :</label>175g</li>
                                                        <li><label>Khả năng chống nước :</label>Có</li>
                                                        <li><label>Loại SIM :</label>Nano SIM</li>
                                                        <li><label>Khe cắm sim :</label>2</li>
                                                        <li><label>Wifi :</label>Wi-Fi 802.11 a/b/g/n/ac,&nbsp;Dual-band,&nbsp;Wi-Fi Direct,&nbsp;Wi-Fi hotspot
                                                        </li>
                                                        <li><label>GPS :</label>A-GPS, GLONASS, BDS</li>
                                                        <li><label>Bluetooth
                                                                :</label>v5.0,&nbsp;apt-X,&nbsp;A2DP,&nbsp;LE</li>
                                                        <li><label>GPRS/EDGE :</label>Không</li>
                                                        <li><label>NFC :</label>Có</li>
                                                        <li><label>Cổng sạc :</label>Type-C 1.0</li>
                                                        <li><label>Jack (Input &amp; Output) :</label>3.5mm</li>
                                                        <li><label>Xem phim :</label>True</li>
                                                        <li><label>Nghe nhạc :</label>True</li>
                                                        <li><label>Ghi âm :</label>Có</li>
                                                        <li><label>FM radio :</label>Có</li>
                                                        <li><label>Đèn pin :</label>Có</li>
                                                        <li><label>Chức năng khác :</label>Đang cập nhật</li>
                                                        <li><label>Loại pin :</label>Li-Ion</li>
                                                        <li><label>Dung lượng pin :</label>4100 mAh</li>
                                                        <li><label>Pin có thể tháo rời :</label>Không</li>
                                                        <li><label>Chế độ sạc nhanh :</label>Có</li>
                                                        <li><label>Thời gian bảo hành :</label>12 Tháng</li>
                                                        <li>Hệ điều hành</li>
                                                        <li><label>Hệ điều hành :</label>Android 9.0 (Pie)</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        </section>
        <div class="sapo-product-reviews-module"></div>
    </div>
    <div id="popupCartModal" class="modal fade" role="dialog">
    </div>
</body>

</html>