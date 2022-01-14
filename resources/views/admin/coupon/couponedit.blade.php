<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/pagination.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{asset('image/logo.png')}}" type="image/x-icon">
    <title>Product</title>
</head>

<body>
    @include('admin.sidebar')
    <section class="home-section">
        <div class="text"><span><i class="fas fa-tags"></i> Chỉnh sửa mã giảm giá</span></div>
        <div class="block pt-3 uploadpro">
            <!-- <input type="text" disabled id="idcoupon" value="{{ $coupons['id'] }}"> test data -->
            <form class="needs-validation" id="myForm" novalidate>
                @csrf
                <div class="text-left">
                    <div class="row">
                        <div class="form-group col-xl-3">
                            <label for="code">Mã giảm giá:</label>
                            <input type="text" class="form-control" id="code" placeholder="Nhập mã giảm giá" name="code" value="{{ $coupons->coupon }}" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-xl-9">
                            <label for="namecoupon">Tên mã giảm giá:</label>
                            <input type="text" class="form-control" id="namecoupon" placeholder="Nhập tên mã giảm giá" name="namecoupon" value="{{ $coupons->name }}" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="condicoupon">Điều kiện chi tiết:</label>
                        <select class="form-control" name="condicoupon" id="condicoupon">
                            @if($coupons->condition == 0)
                            <option value="0">Giảm giá theo phần trăm</option>
                            <option value="1">Giảm giá theo số tiền</option>
                            @else
                            <option value="1">Giảm giá theo số tiền</option>
                            <option value="0">Giảm giá theo phần trăm</option>
                            @endif
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="quancoupon">Số lượng mã:</label>
                        <input type="number" class="form-control" id="quancoupon" placeholder="Nhập số lượng" name="quancoupon" value="{{ $coupons->quantity }}" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="pricecoupon">Số giảm:</label>
                        <input type="number" class="form-control" id="pricecoupon" placeholder="Nhập số giảm" name="pricecoupon" value="{{ $coupons->price }}" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- <div id="test"></div> dung de test data -->
    </section>
    <script>
        $('#myForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                cache: false,
                url: "{{route('couponeditaccept')}}",
                data: {
                    "_token": '{{csrf_token()}}',
                    "id": <?php echo $coupons['id']?>,
                    "code": $("#code").val(),
                    "name": $("#namecoupon").val(),
                    "condition":$("#condicoupon").val(),
                    "quantity":$("#quancoupon").val(),
                    "price": $("#pricecoupon").val()
                },
                success: function(data) {
                    window.location.href = `{{url('/coupon')}}`;
                    console.log('submission was successful.');
                    // $("#test").html(data); test data
                    // console.log(data); test data
                },
                error: function(data) {
                    console.log('an error occurred.');
                    console.log(data);
                }
            });
        });
    </script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>
</body>

</html>