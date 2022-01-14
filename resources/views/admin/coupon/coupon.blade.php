<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/order/order.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/pagination.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="shortcut icon" href="{{asset('image/logo.png')}}" type="image/x-icon">
    <title>Order</title>
</head>

<body>
    @include('admin.sidebar')
    <section class="home-section">
        <div class="text"><span><i class="far fa-folder-open"></i> Quản lý mã giãm giá</span></div>
        <div class="block">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive" id="coupon"></div>
                    <!-- <div id="orderr"></div> -->
                </div>
            </div>
        </div>
    </section>
    @include('admin.coupon.couponcreate')
    <!-- <script src="{{ asset('js/admin/pagination.js') }}"></script> -->
    <script>
        $(document).ready(function() {
            function coupon() {
                $.ajax({
                    url: "{{route('coupontable')}}",
                    method: "get",
                    success: function(data) {
                        $('#coupon').html(data);
                    }
                });
            }
            coupon();
            $('#myForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "{{route('couponcreatef')}}",
                    data: {
                        "_token": '{{csrf_token()}}',
                        "code": $("#code").val(),
                        "name": $("#namecoupon").val(),
                        "condition": $("#condicoupon").val(),
                        "quantity": $("#quancoupon").val(),
                        "price": $("#pricecoupon").val(),
                    },
                    success: function(data) {
                        coupon();
                        console.log('submission was successful.');
                    },
                    error: function(data) {
                        console.log('an error occurred.');
                        console.log(data);
                    }
                })
            });
        });
        function edit(data) {
            var element = data.getAttribute("data-id");
            console.log(element);
            window.location.href = `{{url('/couponeditf/${element}')}}`;
        }
        function deletef(data) {
            var element = data.getAttribute("data-id");
            console.log(element);
            window.location.href = `{{url('/coupondeletef/${element}')}}`;
        }
    </script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>
</body>

</html>