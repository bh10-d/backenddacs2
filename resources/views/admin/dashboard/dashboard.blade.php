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
    <title>Admin</title>
</head>

<body>
    @include('admin.sidebar')
    <section class="home-section">
        <div class="text"><a href="{{route('admin')}}">Dashboard</a> / <span>Overview</span></div>
        <div class="block">
            <!--cardd-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3 mt-4">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-comments"></i>
                            </div>
                            <div class="text-left">26 Tin nhắn mới!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">Xem chi tiết</span>
                            <span class="float-right"><i class="fas fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3 mt-4">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-list"></i>
                            </div>
                            <div class="text-left">11 Nhiệm vụ mới!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">Xem chi tiết</span>
                            <span class="float-right"><i class="fas fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3 mt-4">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="text-left">{{$order}} Đơn hàng mới!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{url('/order')}}">
                            <span class="float-left">Xem chi tiết</span>
                            <span class="float-right"><i class="fas fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3 mt-4">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-life-ring"></i>
                            </div>
                            <div class="text-left">{{ $couponcount }} Voucher mới!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{url('/coupon')}}">
                            <span class="float-left">Xem chi tiết</span>
                            <span class="float-right"><i class="fas fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="home-section">
        <div class="text"><span><i class="fas fa-chart-line"></i> Chart</span></div>
        <div class="block">
            <div class="chart">
                <canvas id="chart--line" class="text-center"></canvas>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>
    <!-- <script src="{{ asset('js/admin/chart_line.js') }}"></script> -->
    <script>
        //line
        const labels_line = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        const data_line = {
            labels: labels_line,
            datasets: [{
                label: 'Balance ( vnd)',// trieu vnd
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [<?php echo $price[1][0]->totalprice?>,
                        <?php echo $price[2][0]->totalprice?>,
                        <?php echo $price[3][0]->totalprice?>, 
                        <?php echo $price[4][0]->totalprice?>, 
                        <?php echo $price[5][0]->totalprice?>, 
                        <?php echo $price[6][0]->totalprice?>, 
                        <?php echo $price[7][0]->totalprice?>, 
                        <?php echo $price[8][0]->totalprice?>, 
                        <?php echo $price[9][0]->totalprice?>, 
                        <?php echo $price[10][0]->totalprice?>, 
                        <?php echo $price[11][0]->totalprice?>, 
                        <?php echo $price[12][0]->totalprice?>],
                fill: false,
                tension: 0
            }]
        };
        const config_line = {
            type: 'line',
            data: data_line,
            options: {}
        };
        var chartline = new Chart(
            document.getElementById('chart--line'),
            config_line
        );
    </script>
</body>

</html>