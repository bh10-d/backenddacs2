<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/payment/thanhtoan.css')}}">
    <link rel="stylesheet" href="{{asset('css/payment/animationlabel.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Thanh toán</title>
</head>

<body>
    <div class="main">
        <div class="main__block--show">
            <!-- <h1>hien thi mat hang can thanh toan</h1> -->
            <div class="show__product">
                <p>Thông tin đơn hàng</p>
                <div>
                    <div class="bg-transparent">
                        <div class="">
                            <div class="table-responsive">
                                <table class="table text-center" id="dataTable" width="100%">
                                    <tr>
                                        <th></th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Giá</th>
                                    </tr>
                                    @php $total_price = 0 @endphp
                                    @php $price = 0 @endphp
                                    @php $total_qty = 0 @endphp
                                    @if(Session::get('cart'))
                                    @foreach(Session::get('cart') as $id => $details)
                                    @php $price = $details['product_price']*$details['product_qty'] @endphp
                                    @php $total_price += $price @endphp
                                    @php $total_qty += $details['product_qty'] @endphp
                                    <tr>
                                        <!-- <td><img class="img__show--info" src="image/iphone.png" alt=""></td> -->
                                        <td><img class="img__show--info" src="" alt="{{$details['product_image']}}"></td>
                                        <td>{{ $details['product_title'] }}</td>
                                        <td>{{ $details['product_qty'] }}</td>
                                        <td>{{ $details['product_price'] }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    <tr>
                                        <td>Tổng tiền:</td>
                                        <td></td>
                                        <td>{{ $total_qty }}</td>
                                        <td>{{ $total_price }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center hieu-hover">
                <a class="mt-3" href="/cart" type="button"><i class="fas fa-chevron-left"></i> Quay lại giỏ hàng</a>{{--fas fa-chevron-left fas fa-angle-left--}}
            </div>
        </div>
        <div class="main__block--info">
            <div>
                <div class="check--info">
                    <div>
                        <p>Thông tin thanh toán</p>
                    </div>
                    <form action="" class="needs-validation" novalidate>
                        <div class="form-group">
                            <div class="form-label-group">
                                @if(Route::has('login'))
                                    @auth
                                    <input type="text" class="form-control" id="username" placeholder="Họ và Tên" name="email" value="{{Auth::user()->username}}"required>
                                    @else
                                    <input type="text" class="form-control" id="username" placeholder="Họ và Tên" name="email" required>
                                    @endauth
                                @endif
                                <label for="username">Họ và Tên</label>
                                <div class="valid-feedback">Có hiệu lực</div>
                                <div class="invalid-feedback">Vui lòng điền vào trường này</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" class="form-control" id="pwdd" placeholder="Số điện thoại" name="pswd" required>
                                <label for="pwdd">Số điện thoại</label>
                                <div class="valid-feedback">Có hiệu lực</div>
                                <div class="invalid-feedback">Vui lòng điền vào trường này</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="calc_shipping_provinces" required="">
                                <option value="">Tỉnh / Thành phố</option>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="calc_shipping_district" required="">
                                <option value="">Quận / Huyện</option>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <input class="billing_address_1" name="" type="hidden" value="">
                        <input class="billing_address_2" name="" type="hidden" value="">
                        <div class="form-group">
                        <div class="form-label-group">
                                <input type="text" class="form-control" id="addressdetail" placeholder="Địa chỉ chi tiết" name="addressdetail" required>
                                <label for="addressdetail">Địa chỉ chi tiết</label>
                                <div class="valid-feedback">Có hiệu lực</div>
                                <div class="invalid-feedback">Vui lòng điền vào trường này</div>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <div class="content-box">
                                <div class="content-box__row">
                                    <div class="radio-wrapper">
                                        <div class="radio__input">
                                            <input name="paymentMethod" id="paymentMethod-cod" type="radio" class="input-radio" data-bind="paymentMethod" value="470984">
                                        </div>
                                        <label for="paymentMethod-cod" class="radio__label d-link">
                                            <span class="radio__label__primary">Thanh toán khi giao hàng (COD)</span>
                                            <span class="radio__label__accessory"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="content-box__row">
                                    <div class="radio-wrapper">
                                        <div class="radio__input">
                                            <input name="paymentMethod" id="paymentMethod-online" type="radio" class="input-radio" data-bind="paymentMethod" value="470984">
                                        </div>
                                        <label for="paymentMethod-online" class="radio__label link">
                                            <span class="radio__label__primary">Thanh toán online</span>
                                            <!-- <span class="radio__label__accessory"></span> -->
                                            <ul class="submenu" id="test">
                                                <li><a href="#">Thanh toán bằng momo</a></li>
                                                <li><a href="#">Thanh toán bằng Vnpay</a></li>
                                            </ul>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <!-- <button type="submit" class="btn btn-success">Xác nhận đơn hàng</button> -->
                                <a href="{{ route('success') }}" class="btn btn-success">Xác nhận đơn hàng</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/validator.js')}}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
    <script>
        $(document).ready(function() {
            $('.link').click(function() {
                $('.submenu').slideToggle('slow').addClass("show");
            });
            $('.d-link').click(function() {
                if ($('#test').hasClass('show')) {
                    $('.submenu').slideToggle('slow').removeClass("show");
                }
                console.log($('#test').hasClass('show'));
            });
        })
    </script>
    <script>
        window.addEventListener('load', function() {
                if (address_2 = localStorage.getItem('address_2_saved')) {
                    $('select[name="calc_shipping_district"] option').each(function() {
                        if ($(this).text() == address_2) {
                            $(this).attr('selected', '')
                        }
                    })
                    $('input.billing_address_2').attr('value', address_2)
                }
                if (district = localStorage.getItem('district')) {
                    $('select[name="calc_shipping_district"]').html(district)
                    $('select[name="calc_shipping_district"]').on('change', function() {
                        var target = $(this).children('option:selected')
                        target.attr('selected', '')
                        $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
                        address_2 = target.text()
                        $('input.billing_address_2').attr('value', address_2)
                        district = $('select[name="calc_shipping_district"]').html()
                        localStorage.setItem('district', district)
                        localStorage.setItem('address_2_saved', address_2)
                    })
                }
                $('select[name="calc_shipping_provinces"]').each(function() {
                    var $this = $(this),
                        stc = ''
                    c.forEach(function(i, e) {
                        e += +1
                        stc += '<option value=' + e + '>' + i + '</option>'
                        $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
                        if (address_1 = localStorage.getItem('address_1_saved')) {
                            $('select[name="calc_shipping_provinces"] option').each(function() {
                                if ($(this).text() == address_1) {
                                    $(this).attr('selected', '')
                                }
                            })
                            $('input.billing_address_1').attr('value', address_1)
                        }
                        $this.on('change', function(i) {
                            i = $this.children('option:selected').index() - 1
                            var str = '',
                                r = $this.val()
                            if (r != '') {
                                arr[i].forEach(function(el) {
                                    str += '<option value="' + el + '">' + el + '</option>'
                                    $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
                                })
                                var address_1 = $this.children('option:selected').text()
                                var district = $('select[name="calc_shipping_district"]').html()
                                localStorage.setItem('address_1_saved', address_1)
                                localStorage.setItem('district', district)
                                $('select[name="calc_shipping_district"]').on('change', function() {
                                    var target = $(this).children('option:selected')
                                    target.attr('selected', '')
                                    $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
                                    var address_2 = target.text()
                                    $('input.billing_address_2').attr('value', address_2)
                                    district = $('select[name="calc_shipping_district"]').html()
                                    localStorage.setItem('district', district)
                                    localStorage.setItem('address_2_saved', address_2)
                                })
                            } else {
                                $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
                                district = $('select[name="calc_shipping_district"]').html()
                                localStorage.setItem('district', district)
                                localStorage.removeItem('address_1_saved', address_1)
                            }
                        })
                    })
                })
            })
    </script>
</body>
</html>