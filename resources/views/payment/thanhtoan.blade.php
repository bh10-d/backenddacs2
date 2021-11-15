<!DOCTYPE html>
<html class="floating-labels">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Thanh toán đơn hàng" />
    <title>Thanh toán đơn hàng</title>
    <!-- <link rel="shortcut icon" href="//bizweb.dktcdn.net/assets/sapo_favicon.png" type="image/x-icon" /> -->

    <!-- <link rel="stylesheet" href="/dist/css/checkout.vendor.min.css?v=4fcd86c"> -->
    <!-- <link rel="stylesheet" href="css/thanhtoanv4.css"> -->
    <link rel="stylesheet" href="{{asset('css/thanhtoanv41.css')}}">

    <!-- <link rel="stylesheet" href="/dist/css/checkout.min.css?v=1a1bc95"> -->

    <!-- Begin checkout custom css -->
    <style>

    </style>
    <!-- End checkout custom css -->


    <!-- <script src="/dist/js/checkout.vendor.min.js?v=11006c9"></script> -->



    <!-- <script src="/dist/js/checkout.min.js?v=aea8b49"></script> -->


    <!-- <script>
        var Bizweb = Bizweb || {};
        Bizweb.id = '397652';
        Bizweb.store = 'eco-shop-1.mysapo.net';


        Bizweb.template = 'checkout';
        Bizweb.Checkout = Bizweb.Checkout || {};
        Bizweb.Checkout.token = "c9a1c2879b9b4ac9b65684a928274a92"
        Bizweb.Checkout.apiHost = "eco-shop-1.mysapo.net"
    </script>

    <script>
        window.BizwebAnalytics = window.BizwebAnalytics || {};
        window.BizwebAnalytics.meta = window.BizwebAnalytics.meta || {};
        window.BizwebAnalytics.meta.currency = 'VND';
        window.BizwebAnalytics.tracking_url = '/s';
        var meta = {};
        for (var attr in meta) {
            window.BizwebAnalytics.meta[attr] = meta[attr];
        }
    </script> -->


    <!-- <script src="/dist/js/stats.min.js?v=542c4dc"></script> -->


</head>

<body>
    <header class="banner">
        <div class="wrap">
            <div class="logo logo--left ">

                <h1 class="shop__name">
                    <a href="index.html">
				Eco Shop
			</a>
                </h1>

            </div>
        </div>
    </header>
    <aside>
        <button class="order-summary-toggle" data-toggle="#order-summary" data-toggle-class="order-summary--is-collapsed">
			<span class="wrap">
				<span class="order-summary-toggle__inner">
					<span class="order-summary-toggle__text expandable">
						<!-- Đơn hàng (1 sản phẩm) -->
                        @if (Session::get('cart'))
                        @php $product=0 @endphp
                        @php $list=0 @endphp
                        @foreach (Session::get('cart') as $id => $details)
                        @php $product = $details['product_qty'] @endphp
                        @php $list+=$product @endphp
                        @endforeach
                            Đơn hàng ({{ $list }} sản phẩm)
                        @endif
					</span>
                    <!-- <span class="">
						Đơn hàng (1 sản phẩm)
					</span> -->
					<span class="order-summary-toggle__total-recap" data-bind="getTextTotalPrice()"></span>
				</span>
			</span>
		</button>
    </aside>
    <div class="content">
        <form data-tg-refresh="checkout" id="checkoutForm" method="post" data-define="{
				loadingShippingErrorMessage: 'Không thể load phí vận chuyển. Vui lòng thử lại',
				loadingReductionCodeErrorMessage: 'Có lỗi xảy ra khi áp dụng khuyến mãi. Vui lòng thử lại',
				submitingCheckoutErrorMessage: 'Có lỗi xảy ra khi xử lý. Vui lòng thử lại',
				requireShipping: true,
				requireDistrict: false,
				requireWard: false,
				shouldSaveCheckoutAbandon: true}" action="index.html" data-bind-event-submit="handleCheckoutSubmit(event)" data-bind-event-keypress="handleCheckoutKeyPress(event)" data-bind-event-change="handleCheckoutChange(event)">
            <input type="hidden" name="_method" value="patch" />
            <div class="wrap">
                <main class="main">
                    <header class="main__header">
                        <div class="logo logo--left ">
                            <h1 class="shop__name">
                                <a href="/">Eco Shop</a>
                            </h1>
                        </div>
                    </header>
                    <div class="main__content">
                        <article class="animate-floating-labels row">
                            <div class="col col--two">
                                <section class="section">
                                    <div class="section__header">
                                        <div class="layout-flex">
                                            <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                <i class="fa fa-id-card-o fa-lg section__title--icon hide-on-desktop"></i> Thông tin nhận hàng
                                            </h2>
                                            @if(Auth::user()==null)
                                                <a href="{{ route('login') }}">
                                                    <i class="fa fa-user-circle-o fa-lg"></i>
                                                    <span>Đăng nhập </span>
                                                </a>
                                            @else
                                                <p>Xin chào: {{Auth::user()->username}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="section__content">
                                        <div class="fieldset">
                                            <div class="field">
                                                <div class="field__input-wrapper field--show-floating-label">
                                                    <label for="email" class="field__label">
                                                    @if(Auth::user()==null)
                                                        Email
                                                    @else
                                                        {{ Auth::user()->email }}
                                                    @endif
													</label>
                                                    <input name="email" id="email" type="email" class="field__input" data-bind="email" value="">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="field__input-wrapper field--show-floating-label">
                                                    <label for="billingName" class="field__label ">Họ và tên</label>
                                                    <input name="billingName" id="billingName" type="text" class="field__input " value="">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="field__input-wrapper field--show-floating-label">
                                                    <label for="billingPhone" class="field__label">
														Số điện thoại (tùy chọn)
													</label>
                                                    <input name="billingPhone" id="billingPhone" type="tel" class="field__input" value="">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="field__input-wrapper field--show-floating-label">
                                                    <label for="billingAddress" class="field__label">
														Địa chỉ (tùy chọn)
													</label>
                                                    <input name="billingAddress" id="billingAddress" type="text" class="field__input" value="">
                                                </div>
                                            </div>
                                            <!-- <div class="field field--show-floating-label ">
                                                <div class="field__input-wrapper field__input-wrapper--select2">
                                                    <label for="billingProvince" class="field__label">Tỉnh thành</label>
                                                    <select name="billingProvince" id="billingProvince" size="1" type="text" class="field__input field__input--select" data-bind="billing.province" value="1" data-address-type="province" data-address-zone="billing">
														<option value="1"></option>
													</select>
                                                </div>
                                            </div>
                                            <div class="field field--show-floating-label ">
                                                <div class="field__input-wrapper field__input-wrapper--select2">
                                                    <label for="billingDistrict" class="field__label">
														Quận huyện (tùy chọn)
													</label>
                                                    <select name="billingDistrict" id="billingDistrict" size="1" type="text" class="field__input field__input--select" value="2" data-bind="billing.district" data-address-type="district" data-address-zone="billing">
														<option value="2"></option>
													</select>
                                                </div>
                                            </div>
                                            <div class="field field--show-floating-label ">
                                                <div class="field__input-wrapper field__input-wrapper--select2">
                                                    <label for="billingWard" class="field__label">
														Phường xã (tùy chọn)
													</label>
                                                    <select name="billingWard" id="billingWard" size="1" type="text" class="field__input field__input--select" value="1" data-bind="billing.ward" data-address-type="ward" data-address-zone="billing">
														<option value="1"></option>
													</select>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </section>
                                <div class="fieldset">
                                    <h3 class="visually-hidden">Ghi chú</h3>
                                    <div class="field " data-bind-class="{'field--show-floating-label': note}">
                                        <div class="field__input-wrapper field--show-floating-label">
                                            <label for="note" class="field__label">
												Ghi chú (tùy chọn)
											</label>
                                            <textarea name="note" id="note" type="text" class="field__input" data-bind="note"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col--two">
                                <section class="section">
                                    <div class="section__header">
                                        <div class="layout-flex">
                                            <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                <i class="fa fa-credit-card fa-lg section__title--icon hide-on-desktop"></i> Thanh toán
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="section__content">
                                        <div class="content-box" data-define="{paymentMethod: undefined}">
                                            <div class="content-box__row">
                                                <div class="radio-wrapper">
                                                    <div class="radio__input">
                                                        <input name="paymentMethod" id="paymentMethod-cod" type="radio" class="input-radio" data-bind="paymentMethod" value="470984">
                                                    </div>
                                                    <label for="paymentMethod-cod" class="radio__label">
														<span class="radio__label__primary">Thanh toán khi giao hàng (COD)</span>
														<span class="radio__label__accessory">
															<!-- <span class="radio__label__icon">
																<i class="payment-icon payment-icon--4"></i>
															</span> -->
														</span>
													</label>
                                                </div>
                                                <!-- <div class="content-box__row__desc" data-bind-show="paymentMethod == 470984">
                                                    <p>Bạn chỉ phải thanh toán khi nhận được hàng</p>
                                                </div> -->
                                            </div>

                                            <div class="content-box__row">
                                                <div class="radio-wrapper">
                                                    <div class="radio__input">
                                                        <input name="paymentMethod" id="paymentMethod-online" type="radio" class="input-radio" data-bind="paymentMethod" value="470984">
                                                    </div>
                                                    <label for="paymentMethod-online" class="radio__label">
														<span class="radio__label__primary">Thanh toán online</span>
														<span class="radio__label__accessory">
														</span>
													</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </section>
                            </div>
                        </article>
                        <div class="field__input-btn-wrapper field__input-btn-wrapper--vertical hide-on-desktop">
                            <button type="submit" class="btn btn-checkout spinner" data-bind-class="{'spinner--active': isSubmitingCheckout}" data-bind-disabled="isSubmitingCheckout || isLoadingReductionCode">
								<span class="spinner-label">ĐẶT HÀNG</span>
								<svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
									<use href="#spinner"></use>
								</svg>
							</button>
                            <a href="/cart" class="previous-link">
                                <i class="previous-link__arrow">❮</i>
                                <span class="previous-link__content">Quay về giỏ hàng</span>
                            </a>
                        </div>
                        <!-- <div id="common-alert" data-tg-refresh="refreshError">
                            <div class="alert alert--danger hide-on-desktop" data-bind-show="!isSubmitingCheckout && isSubmitingCheckoutError" data-bind="submitingCheckoutErrorMessage">
                            </div>
                        </div> -->
                    </div>
                </main>
                <aside class="sidebar">
                    <div class="sidebar__header">
                        @if (Session::get('cart'))
                        @php $product=0 @endphp
                        @php $list=0 @endphp
                        @foreach (Session::get('cart') as $id => $details)
                        @php $product = $details['product_qty'] @endphp
                        @php $list+=$product @endphp
                        @endforeach
                        <h2 class="sidebar__title">
                            <!-- Đơn hàng (1 sản phẩm)(chua sua) -->
                            Đơn hàng ({{ $list }} sản phẩm)
                        </h2>
                        @endif
                    </div>
                    <div class="sidebar__content">
                        <div id="order-summary" class="order-summary order-summary--is-collapsed">
                            <div class="order-summary__sections">
                                @php $total = 0 @endphp
                                @if(Session::get('cart'))
                                @foreach(Session::get('cart') as $id => $details)
                                <div class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                                    <table class="product-table">
                                        <caption class="visually-hidden">Chi tiết đơn hàng</caption>
                                        <thead class="product-table__header">
                                            <tr>
                                                <th>
                                                    <span class="visually-hidden">Ảnh sản phẩm</span>
                                                </th>
                                                <th>
                                                    <span class="visually-hidden">Mô tả</span>
                                                </th>
                                                <th>
                                                    <span class="visually-hidden">Sổ lượng</span>
                                                </th>
                                                <th>
                                                    <span class="visually-hidden">Đơn giá</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="product">
                                                <td class="product__image">
                                                    <div class="product-thumbnail">
                                                        <div class="product-thumbnail__wrapper" data-tg-static>
                                                            <!-- <img src="//bizweb.dktcdn.net/thumb/thumb/100/397/652/products/636683033477213503-xiaomi-mi8-xanh-1.jpg?v=1595835092797" alt="" class="product-thumbnail__image"> -->
                                                            {{ $details['product_image'] }}
                                                        </div>
                                                        <span class="product-thumbnail__quantity">{{--1--}}{{ $details['product_qty'] }}</span>
                                                    </div>
                                                </td>
                                                <th class="product__description">
                                                    <span class="product__description__name">
														{{--Xiaomi Mi 8 64GB--}}
                                                        {{ $details['product_title'] }}
													</span>
                                                </th>
                                                <td class="product__quantity visually-hidden"><em>Số lượng:</em> 1</td>
                                                <td class="product__price">
                                                    {{--10.000.000₫--}}
                                                    {{ $details['product_price'] }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @endforeach
                                @endif
                                <div class="order-summary__section order-summary__section--total-lines order-summary--collapse-element" data-define="{subTotalPriceText: '10.000.000₫'}" data-tg-refresh="refreshOrderTotalPrice" id="orderSummary">
                                    <table class="total-line-table">
                                        <caption class="visually-hidden">Tổng giá trị</caption>
                                        <thead>
                                            <tr>
                                                <td><span class="visually-hidden">Mô tả</span></td>
                                                <td><span class="visually-hidden">Giá tiền</span></td>
                                            </tr>
                                        </thead>
                                        <tbody class="total-line-table__tbody">
                                            <tr class="total-line total-line--subtotal">
                                                @php $test = 0 @endphp
                                                @php $count = 0 @endphp
                                                @if(Session::get('cart'))
                                                @foreach (Session::get('cart') as $id => $ele)
                                                @php $test = $ele['product_price']*$ele['product_qty'] @endphp
                                                @php $count+=$test @endphp
                                                @endforeach
                                                <th class="total-line__name">
                                                    Tạm tính
                                                </th>
                                                <td class="total-line__price">{{--10.000.000₫--}}{{ $count }}</td>
                                                @endif
                                            </tr>
                                            <tr class="total-line total-line--shipping-fee">
                                                <th class="total-line__name">
                                                    Phí vận chuyển
                                                </th>
                                                <td class="total-line__price" data-bind="getTextShippingPrice()">
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="total-line-table__footer">
                                            <tr class="total-line payment-due">
                                                <th class="total-line__name">
                                                    <span class="payment-due__label-total">
														Tổng cộng
													</span>
                                                </th>
                                                <td class="total-line__price">
                                                    <!-- <span class="payment-due__price" data-bind="getTextTotalPrice()"></span> -->
                                                    <span class="payment-due__price">{{ $count }}</span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                {{--test--}}


                                
                                {{--test--}}

                                <div class="order-summary__nav field__input-btn-wrapper hide-on-mobile layout-flex--row-reverse">
                                    <button type="submit" class="btn btn-checkout spinner" data-bind-class="{'spinner--active': isSubmitingCheckout}" data-bind-disabled="isSubmitingCheckout || isLoadingReductionCode">
										<span class="spinner-label">ĐẶT HÀNG</span>
										<svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
											<use href="#spinner"></use>
										</svg>
									</button>
                                    <a href="/cart" class="previous-link">
                                        <i class="previous-link__arrow">❮</i>
                                        <span class="previous-link__content">Quay về giỏ hàng</span>
                                    </a>
                                </div>
                                <!-- <div id="common-alert-sidebar" data-tg-refresh="refreshError">
                                    <div class="alert alert--danger hide-on-mobile" data-bind-show="!isSubmitingCheckout && isSubmitingCheckoutError" data-bind="submitingCheckoutErrorMessage">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/test.js') }}"></script>
</body>

</html>