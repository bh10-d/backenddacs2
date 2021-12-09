<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/user/user.css')}}">
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
    <link rel="stylesheet" href="{{ asset('css/foot.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    @include('header')
    <div class="container">
        <div class="row gutters">
            @include('user.sidebar')
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div style="padding: 20px">
                    <!-- <span style="color:#a8729a;">Đơn hàng</span> -->
                    <h4 class="text-primary">Đơn hàng</h4>
                </div>
                <div id="de">
                    <!-- tu day -->
                    @if($check != 0)
                    @foreach($orders as $order)
                    <div class="card">
                        <div style="border-bottom: 1px dashed #a8729a">
                            <div><span>Mã đơn hàng: <strong>{{$order->CodeOrder}}</strong></span></div>
                            <div class="text-right"><span>Tổng số tiền: <strong>{{$order->totalprice}}</strong></span></div>
                        </div>
                        <div class="text-right custom-h-d" onclick="customde(this);" data-de="{{$order->CodeOrder}}"><span style="cursor:pointer;">Xem chi tiết</span></div>
                    </div>
                    <div hidden data-dee="{{$order->CodeOrder}}">
                        <div class="table-responsive">
                            <td colspan="4 ">
                                <div class="text-left ">
                                    <p>Mã đơn hàng: <strong>{{$order->CodeOrder}}</strong></p>
                                    <table class="table table-bordered " id="dataTable " width="100% " cellspacing="0 " style="background-color:#d9d9d9 ">
                                        <tr>
                                            <td>Số thứ tự</td>
                                            <td>Tên sản phẩm</td>
                                            <td>Số lượng sản phẩm</td>
                                            <td>Giá</td>
                                        </tr>
                                        @php $num = 1; @endphp
                                        @foreach($order->productlist as $product)
                                        <tr class="ordershowdetail{{$order->CodeOrder}}" data-show="{{$order->CodeOrder}}">
                                            <td>{{$num}}</td>
                                            <td>{{$product->NameProduct}}</td>
                                            <td>{{$product->Quantity}}</td>
                                            <td>{{$product->Price}}</td>
                                        </tr>
                                        @php $num++; @endphp
                                        @endforeach
                                    </table>
                                    <div style="float:right ">
                                        <table class="hieu-disable">
                                            <tr>
                                                <td class="text-right ">Trạng thái đơn hàng:</td>
                                                @if($order->Status=='Đang xử lý')
                                                <td class="text-warning h5">{{$order->Status}}</td>
                                                @elseif($order->Status=='Chấp nhận')
                                                <td class="text-success h5">{{$order->Status}}</td>
                                                @else
                                                <td class="text-info h5">{{$order->Status}}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="text-right">Mã giảm giá:</td>
                                                <td class="text-left"><strong>{{ $order->Coupon }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right ">Tổng tiền:</td>
                                                <td class="text-left "><strong>{{$order->totalprice}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right ">Phương thức thanh toán:</td>
                                                <td class="text-left "><strong>COD</strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </td>
                            </tr>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <!-- den day -->
                </div>
                <div id="dee"></div>
            </div>
        </div>
    </div>
    @include('footer')
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        function customde(data) {
            const doc = document.querySelector('#de');
            const docreplace = document.querySelector('#dee');
            const button = data.getAttribute("data-de");
            const show = document.querySelector("div[data-dee='" + button + "']");
            doc.classList.add('hidden');
            docreplace.style.display = "block";
            docreplace.innerHTML = `<div class="custom-h-d back" onclick="back();"><p><i class="fas fa-chevron-left"></i>Quay về</p></div>` + show.innerHTML;
            console.log(button);
            console.log(show);
        }

        function back() {
            const doc = document.querySelector('#de');
            const docreplace = document.querySelector('#dee');
            doc.classList.remove('hidden');
            docreplace.style.display = "none";
        }
    </script>
</body>

</html>