<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="shortcut icon" href="{{asset('image/logo.png')}}" type="image/x-icon">
    <title>Chart</title>
</head>

<body>
    @include('admin.sidebar')
    <section class="home-section">
        <div class="text"><span><i class="fas fa-chart-line"></i> Chart</span></div>
        <div class="block">
            <div class="row ml-1 mr-1">
                <div class="chart chart--page mt-3 col-xl-7 col-md-12">
                    <div class="card" style="display: block;">
                        <span class="card-title">Biểu đồ tiêu thụ sản phẩm</span>
                        <canvas class="card-body" id="chart--bar"></canvas>
                    </div>
                </div>
                <div class="chart chart--page mt-3 col-xl-5 col-md-12">
                    <div class="card">
                        <span class="card-title">Biểu đồ doanh thu và đơn hàng</span>
                        <canvas id="chart--pie"></canvas>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>
    <script src="{{ asset('js/admin/chart_pie.js') }}"></script>
    <script src="{{ asset('js/admin/chart_bar.js') }}"></script>
</body>

</html>