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
        <div class="text"><span><i class="far fa-folder-open"></i> Edit Products</span></div>
        <div class="block pt-3 uploadpro">
            <form action="{{ route('product') }}" class="needs-validation" id="myForm" novalidate>
                @csrf
                <div class="text-left">
                    <div class="row">
                        <div class="form-group col-xl-2">
                            <label for="code">Mã sản phẩm:</label>
                            <input type="text" class="form-control" id="code" placeholder="Enter Code product" name="code" value="{{$data[0]->code}}" disabled required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-xl-10">
                            <label for="pname">Tên sản phẩm:</label>
                            <input type="text" class="form-control" id="pname" placeholder="Enter name" name="pname" value="{{$data[0]->productname}}" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pcate">Thể loại:</label>
                        <select class="form-control" name="pcate" id="pcate" disabled>
                            <option value="1">Điện thoại</option>
                            <option value="2">Máy tính</option>
                            <option value="3">Phụ kiện</option>
                            <!-- <option value="4">4</option>
                            <option value="5">5</option> -->
                        </select>
                        <!-- <input type="text" class="form-control" id="pcate" placeholder="Enter category" name="pcate" required> -->
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="pprice">Giá:</label>
                        <input type="number" class="form-control" id="pprice" placeholder="Enter price" name="pprice" value="{{$data[0]->price}}" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="pquan">Số lượng:</label>
                        <input type="number" class="form-control" id="pquan" placeholder="Enter quantity" name="pquan" value="{{$data[0]->quantity}}" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <!-- sua ckeditor -->

                    <div class="form-group">
                        <label for="editor">Mô tả:</label>
                        <!-- <div id="editor"></div> -->
                        <textarea class="form-control" rows="5" id="editor" placeholder="Enter details" name="pdetail" required></textarea>
                        <!-- <input type="text" class="form-control" id="editor" placeholder="Enter details" name="pdetail" required> -->
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </section>
    <script>
        CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload',['_token'=> csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
        });
        $('#myForm').submit(function(e) {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            e.preventDefault();

            $.ajax({
                type: "POST",
                cache: false,
                url: "{{route('editproductaccept')}}",
                data: {
                    "_token": '{{csrf_token()}}',
                    "id": $("#code").val(),
                    "name": $("#pname").val(),
                    "price": $("#pprice").val(),
                    "category": $("#pcate").val(),
                    "quantity":$("#pquan").val(),
                    "description": $("#editor").val(),
                },
                success: function(data) {
                    window.location.href = `{{url('/product')}}`;
                    console.log('submission was successful.');
                    // console.log(data);
                },
                error: function(data) {
                    console.log('an error occurred.');
                    console.log(data);
                }
            });
        });
    </script>
    <!-- <script src="{{ asset('js/script.js') }}"></script> -->
    <script src="{{ asset('js/admin/admin.js') }}"></script>
</body>

</html>