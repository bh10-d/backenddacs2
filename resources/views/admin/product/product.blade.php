<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
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
    <!-- <div id="product"> -->
        <section class="home-section">
            <div class="text"><span><i class="far fa-folder-open"></i> Inventory</span></div>
            <div class="block">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive" id="product">{{-- id="product"--}}
                            @include('admin.product.producttable')
                            <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Thể loại</th>
                                        <th>Giá</th>
                                        <th>Mô tả</th>
                                        <th>Xem chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>IPXS</td>
                                        <td>IPhone Xsmax</td>
                                        <td>Điện thoại</td>
                                        <td>15.000.000</td>
                                        <td>buiduchieudangban</td>
                                        <td><a href="#"><i class="far fa-eye"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>IP12PM</td>
                                        <td>IPhone 12 Promax</td>
                                        <td>Điện thoại</td>
                                        <td>25.000.000</td>
                                        <td>buiduchieudangban</td>
                                        <td><a href="#"><i class="far fa-eye"></i></a></td>
                                    </tr>
                                </tbody>
                            </table> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include("admin.product.uploadproduct")
    <!-- </div> -->
    <script type="text/javascript">
        CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload',['_token'=> csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        //ajax upload product
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {
                $.ajax({
                    url: "/product/fetch_data?page=" + page,
                    success: function(data) {
                        $('#product').html(data);
                    }
                });
            }
            // ajax upload anh len 
            var testdata = '';
            $('#pimg').change(function() { // change
                var error_images = '';
                var form_data = new FormData();
                var files = $('#pimg')[0].files;
                if (files.length > 5) {
                    error_images += 'You can not select more than 5 files';
                } else {
                    for (var i = 0; i < files.length; i++) {
                        var name = document.getElementById("pimg").files[i].name;
                        var ext = name.split('.').pop().toLowerCase();
                        if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                            error_images += '<p>Invalid ' + i + ' File</p>';
                        }
                        var oFReader = new FileReader();
                        oFReader.readAsDataURL(document.getElementById("pimg").files[i]);
                        var f = document.getElementById("pimg").files[i];
                        var fsize = f.size || f.fileSize;
                        if (fsize > 2000000) {
                            error_images += '<p>' + i + ' File Size is very big</p>';
                        } else {
                            form_data.append("file[]", document.getElementById('pimg').files[i]);
                        }
                    }
                }
                if (error_images == '') {
                    $.ajax({
                        url: "{{route('imagefile',['_token'=> csrf_token()])}}",
                        method: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $('#error_multiple_files').html('<br /><label class="text-primary">Uploading...</label>');
                        },
                        success: function(data) {
                            $('#error_multiple_files').html('<br /><label class="text-success">Uploaded</label>');
                            // load_image_data();
                        }
                    });
                } else {
                    $('#pimg').val('');
                    $('#error_multiple_files').html("<span class='text-danger'>" + error_images + "</span>");
                    return false;
                }
            });
            //ajax tong
            $('#myForm').submit(function(e) {
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "{{route('uploadproduct')}}",
                    data: {
                        "_token": '{{csrf_token()}}',
                        "id": $("#code").val(),
                        "name": $("#pname").val(),
                        "category": $("#pcate").val(),
                        "description": $("#editor").val(),
                    },
                    success: function(data) {
                        $('#product').html(data); //#datatest
                        console.log('submission was successful.');
                        console.log(data);
                    },
                    error: function(data) {
                        console.log('an error occurred.');
                        console.log(data);
                    }
                });
            });
        });
        //end ajax upload product
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/validator.js') }}"></script>
</body>

</html>