<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/payment/thanhtoan.css')}}">
    <link rel="stylesheet" href="{{asset('css/payment/animationlabel.css')}}">
    <link rel="stylesheet" href="{{asset('css/animationload.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Thanh toán</title>
</head>

<body>
    <div class="main" id="hieu-test">
        <div class="main__block--show">
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
                                    <input type="text" hidden id="idproduct" value="{{$details['product_id']}}">
                                    <tr class="dataproduct">
                                        <td hidden>{{ $details['product_id'] }}</td>
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
                                        <td id="totalprice">{{ $total_price }}</td>
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
                        @if(Route::has('login'))
                        @auth
                        <div class="row">
                            <div class="col-7">
                                <p class="text-left title-order">Thông tin thanh toán</p>
                            </div>
                            <div class="col-5">
                                <p class="text-right pt-2">Xin chào: {{Auth::user()->username}}</p>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-7">
                                <p class="text-left title-order">Thông tin thanh toán</p>
                            </div>
                            <div class="col-5">
                                <p class="text-right pt-2"><a href="{{route('login')}}"><i class="far fa-user"></i>Đăng nhập</a></p>
                            </div>
                        </div>
                        @endauth
                        @endif
                    </div>
                    <form class="needs-validation" id="hieu-form" novalidate>
                        @csrf
                        <div class="form-group">
                            <div class="form-label-group">
                                @if(Route::has('login'))
                                @auth
                                <input type="text" class="form-control" id="username" placeholder="Họ và Tên" name="name" value="{{Auth::user()->username}}" disabled required>
                                @else
                                <input type="text" class="form-control" id="username" placeholder="Họ và Tên" name="name" required>
                                @endauth
                                @endif
                                <label for="username">Họ và Tên</label>
                                <div class="valid-feedback">Có hiệu lực</div>
                                <div class="invalid-feedback">Vui lòng điền vào trường này</div>
                            </div>
                        </div>
                        {{--khong phan su mien vao--}}
                        @if (Route::has('login'))
                        @auth
                        <input type="text" hidden id="iduser" value="{{Auth::user()->id}}">
                        @endauth
                        @endif
                        {{--khong phan su mien vao--}}
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" class="form-control" id="phoneuser" placeholder="Số điện thoại" name="phoneuser" required>
                                <label for="phoneuser">Số điện thoại</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="calc_shipping_provinces" required>
                                <option value="">Tỉnh / Thành phố</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="calc_shipping_district" required>
                                <option value="">Quận / Huyện</option>
                            </select>
                        </div>
                        <input class="billing_address_1" name="" id="city" type="hidden" value="">
                        <input class="billing_address_2" name="" id="district" type="hidden" value="">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" class="form-control" id="addressdetail" placeholder="Địa chỉ chi tiết" name="addressdetail" required>
                                <label for="addressdetail">Địa chỉ chi tiết</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="content-box">
                                <div class="content-box__row">
                                    <div class="radio-wrapper">
                                        <div class="radio__input">
                                            <input name="paymentMethod" id="paymentMethod-cod" type="radio" class="input-radio" required>
                                        </div>
                                        <label for="paymentMethod-cod" class="radio__label d-link">
                                            <span class="radio__label__primary">Thanh toán khi giao hàng (COD)</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="content-box__row">
                                    <div class="radio-wrapper">
                                        <div class="radio__input">
                                            <input name="paymentMethod" id="paymentMethod-online" type="radio" class="input-radio" required>
                                        </div>
                                        <label for="paymentMethod-online" class="radio__label link">
                                            <span class="radio__label__primary">Thanh toán online</span>
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
                                <button type="submit" class="btn btn-success">Xác nhận đơn hàng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
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
    <script>
        $(document).ready(function() {
            $("#hieu-form").validate({
                rules: {
                    username: "required",
                    phoneuser: "required",
                    calc_shipping_provinces: "required",
                    calc_shipping_district: "required",
                    addressdetail: "required",
                    paymentMethod: "required"
                },
                messages: {
                    username: "Vui lòng nhập tên",
                    phoneuser: "Vui lòng nhập số điện thoại",
                    calc_shipping_provinces: "Vui lòng nhập Tỉnh/Thành phố",
                    calc_shipping_district: "Vui lòng nhập Quận/Huyện",
                    addressdetail: "Vui lòng nhập địa chỉ chi tiết",
                    paymentMethod: "Vui lòng chọn phương thức thanh toán"
                },
                errorElement: "div",
                submitHandler: function(form) {
                    $.ajax({
                        url: "{{route('loadpayment')}}",
                        type: "GET",
                        cache: false,
                        data: {
                            "_token": '{{csrf_token()}}',
                            'iduser': $('#iduser').val(),
                            'username': $('#username').val(),
                            'phoneuser': $('#phoneuser').val(),
                            'city': $('#city').val(),
                            'district': $('#district').val(),
                            'detail': $('#addressdetail').val(),
                            // 'typepayment': $('.paymentMethod').val(),
                            // 'idproduct': idproduct,
                            // 'total': quantity
                        },
                        success: function(response) {
                            window.location.href = "{{url('/success')}}";
                        },
                        error: function(data) {
                            console.log('an error occurred.');
                            console.log(data);
                        }
                    });
                }
            });

        });
    </script>
</body>

</html>