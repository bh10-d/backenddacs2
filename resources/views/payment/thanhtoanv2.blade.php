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
    <title>Thanh toan</title>
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
            <!-- <h1>thanh toan</h1> -->
            <div>
                <div class="check--info">
                    <div>
                        <p>Thông tin thanh toán</p>
                    </div>
                    <form action="" class="needs-validation" novalidate>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" class="form-control" id="username" placeholder="Họ và Tên" name="email" required>
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
                            <!-- <label for="pcate">Tỉnh/Thành phố:</label> -->
                            <select class="form-control" name="pcate" id="pcate">
                                <option value="1">Tỉnh/Thành phố</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <!-- <input type="text" class="form-control" id="pcate" placeholder="Enter category" name="pcate" required> -->
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <!-- <label for="pcate">Quận/Huyện:</label> -->
                            <select class="form-control" name="pcate" id="pcate">
                                <option value="1">Quận/Huyện</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <!-- <input type="text" class="form-control" id="pcate" placeholder="Enter category" name="pcate" required> -->
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <!-- <label for="pcate">Phường/Xã:</label> -->
                            <select class="form-control" name="pcate" id="pcate">
                                <option value="1">Phường/Xã</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <!-- <input type="text" class="form-control" id="pcate" placeholder="Enter category" name="pcate" required> -->
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="pcate" id="pcate">
                                <option value="1">Phương thức thanh toán</option>
                                <option value="2">COD</option>
                                <option value="3">Thanh toán trực tuyến</option>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
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
    <script src="{{asset('js/validator.js')}}"></script>
</body>
</html>