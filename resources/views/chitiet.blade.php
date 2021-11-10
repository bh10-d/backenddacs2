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
@extends('layouts.app')

@section('body')
    <div class="opacity_menu"></div>
    <div class="bodywrap">
        <section class="bread-crumb">
            <span class="crumb-border"></span>
            <div class="container">
                <div class="rows">
                    <div class="col-xs-12 a-left">
                    </div>
                </div>
            </div>
        </section>
        <section class="product details-main">
            @foreach ($details as $d)
            <!-- <form> -->

            <div class="hidden">
                <div class="inventory_quantity hidden">
                    <span class="a-stock">
                        Còn hàng
                    </span>
                </div>
            </div>
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
                                                    </div>
                                                </div>
                                                <div class="slider-has-video clearfix">
                                                    <div class="slider slider-nav">
                                                        <div class="fixs">
                                                            <img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="https://bizweb.dktcdn.net/100/397/652/products/636863636051023338-ss-galaxy-s10-plus-den-1.png?v=1595839272423" alt="Đi&#7879;n tho&#7841;i Samsung Galaxy S10+" data-image="https://bizweb.dktcdn.net/100/397/652/products/636863636051023338-ss-galaxy-s10-plus-den-1.png?v=1595839272423" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 details-pro">
                                            <form class="form_background form-inline margin-bottom-0">{{-- enctype="multipart/form-data" id="add-to-cart-form" action="/cart/add" method="post" --}}
                                                {{--khong phan su mien vao--}}
                                                @csrf
                                                <input type="hidden" value="{{$d->id}}" class="cart_product_id_{{$d->id}}">
                                                <input type="hidden" value="{{$d->title}}" class="cart_product_title_{{$d->id}}">
                                                <input type="hidden" value="{{$d->price}}" class="cart_product_price_{{$d->id}}">
                                                <input type="hidden" value="{{$d->image}}" class="cart_product_image_{{$d->id}}">
                                                <input type="hidden" value="1" class="cart_product_qty_{{$d->id}}">
                                                {{--khong phan su mien vao--}}
                                                <div class="fw w_100">
                                                    <div class="price-box clearfix">

                                                        <span class="special-price">
                                                            <span class="price product-price">{{ $d->price }}₫</span>
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
                                                            <link itemprop="availability" href="http://schema.org/InStock" />Còn hàng
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-product">
                                                    <div class="select-swatch">
                                                        <div id="variant-swatch-0" class="swatch clearfix" data-option="option1" data-option-index="0">
                                                            <div class="header">Dung lượng:</div>
                                                        </div>
                                                        <div id="variant-swatch-1" class="swatch clearfix" data-option="option2" data-option-index="1">
                                                            <div class="header">Màu sắc:</div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix form-group ">
                                                        <div class="custom custom-btn-number show">
                                                            <label class="sl section">Số lượng:</label>
                                                            <div class="custom input_number_product custom-btn-number form-control">
                                                                <button class="btn_num num_1 button button_qty" onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro &gt; 1 ) result.value--;return false;" type="button"><i class="fas fa-minus"></i></button>
                                                                <input type="text" id="qtym" name="quantity" value="1" maxlength="3" class="form-control prd_quantity" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onchange="if(this.value == 0)this.value=1;">
                                                                <button class="btn_num num_2 button button_qty" onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;" type="button"><i class="fas fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="btn-mua button_actions clearfix">
                                                            <button type="submit" class=" btn btn_base normal_button add-to-cart" name="add-to-cart" data-id_product="{{$d->id}}">Thêm vào giỏ hàng</button>
                                                            <button type="submit" class=" btn btn_base fast purchase" name="purchase" data-id_product="{{$d->id}}">
                                                                <span class="txt-main text_1">Mua ngay</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </form> -->
            @endforeach
        </section>
        <div class="sapo-product-reviews-module"></div>
    </div>
    <div id="popupCartModal" class="modal fade" role="dialog">
    </div>
    @endsection
</body>

</html>