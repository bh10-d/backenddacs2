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
        <div class="text"><span><i class="fas fa-chart-line"></i> Biểu đồ</span></div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>
    <!-- <script src="{{ asset('js/admin/chart_pie.js') }}"></script> -->
    <!-- <script src="{{ asset('js/admin/chart_bar.js') }}"></script> -->
    <script>
        //pie
        const labels_pie = [
            'Orders',
            'Balance',
        ];
        const data_pie = {
            labels: labels_pie,
            datasets: [{
                label: 'My First Dataset',
                data: [<?php echo $quantity ?>, <?php echo $price->totalprice ?>],
                backgroundColor: [
                    'rgb(255, 205, 86)',
                    '#22CFCF',
                ],
                hoverOffset: 4
            }]
        };
        const config_pie = {
            type: 'pie', //doughnut
            data: data_pie,
            options: {
                // title: {
                //     display: true,
                //     text: 'Doanh thu và đơn hàng'
                // }
            }
        };
        var chartpie = new Chart(
            document.getElementById('chart--pie'),
            config_pie
        );
        //end pie

        //bar
        const labels_bar = [
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
        const data_bar = {
            labels: labels_bar,
            datasets: [{
                    label: 'Điện thoại',
                    data:   [<?php echo $phonebar[1]?>,
                             <?php echo $phonebar[2]?>,
                             <?php echo $phonebar[3]?>, 
                             <?php echo $phonebar[4]?>, 
                             <?php echo $phonebar[5]?>, 
                             <?php echo $phonebar[6]?>, 
                             <?php echo $phonebar[7]?>, 
                             <?php echo $phonebar[8]?>, 
                             <?php echo $phonebar[9]?>, 
                             <?php echo $phonebar[10]?>, 
                             <?php echo $phonebar[11]?>, 
                             <?php echo $phonebar[12]?>],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    // 'rgba(255, 159, 64, 0.2)',
                    // 'rgba(255, 205, 86, 0.2)',
                    // 'rgba(75, 192, 192, 0.2)',
                    // 'rgba(54, 162, 235, 0.2)',
                    // 'rgba(153, 102, 255, 0.2)',
                    // 'rgba(201, 203, 207, 0.2)'

                    // backgroundColor: [
                    //     'rgba(255, 99, 132, 0.2)',
                    //     // 'rgba(255, 159, 64, 0.2)',
                    //     // 'rgba(255, 205, 86, 0.2)',
                    //     // 'rgba(75, 192, 192, 0.2)',
                    //     // 'rgba(54, 162, 235, 0.2)',
                    //     // 'rgba(153, 102, 255, 0.2)',
                    //     // 'rgba(201, 203, 207, 0.2)'
                    // ],
                    // borderColor: [
                    //     'rgb(255, 99, 132)',
                    //     // 'rgb(255, 159, 64)',
                    //     // 'rgb(255, 205, 86)',
                    //     // 'rgb(75, 192, 192)',
                    //     // 'rgb(54, 162, 235)',
                    //     // 'rgb(153, 102, 255)',
                    //     // 'rgb(201, 203, 207)'
                    // ],
                    borderColor: 'rgb(255, 99, 132)',
                    // 'rgb(255, 159, 64)',
                    // 'rgb(255, 205, 86)',
                    // 'rgb(75, 192, 192)',
                    // 'rgb(54, 162, 235)',
                    // 'rgb(153, 102, 255)',
                    // 'rgb(201, 203, 207)'

                    borderWidth: 1
                },
                // {
                //     label: 'Linh phụ kiện và máy tính',
                //     data: [20, 60, 30, 40, 50, 15, 20, 12, 34, 32, 65, 21],
                //     backgroundColor:
                //         // 'rgba(255, 99, 132, 0.2)',
                //         // 'rgba(255, 159, 64, 0.2)',
                //         // 'rgba(255, 205, 86, 0.2)',
                //         'rgba(75, 192, 192, 0.2)',
                //     // 'rgba(54, 162, 235, 0.2)',
                //     // 'rgba(153, 102, 255, 0.2)',
                //     // 'rgba(201, 203, 207, 0.2)'

                //     // backgroundColor: [
                //     //     // 'rgba(255, 99, 132, 0.2)',
                //     //     // 'rgba(255, 159, 64, 0.2)',
                //     //     // 'rgba(255, 205, 86, 0.2)',
                //     //     'rgba(75, 192, 192, 0.2)',
                //     //     // 'rgba(54, 162, 235, 0.2)',
                //     //     // 'rgba(153, 102, 255, 0.2)',
                //     //     // 'rgba(201, 203, 207, 0.2)'
                //     // ],
                //     borderColor:
                //         // 'rgb(255, 99, 132)',
                //         // 'rgb(255, 159, 64)',
                //         // 'rgb(255, 205, 86)',
                //         'rgb(75, 192, 192)',
                //     // 'rgb(54, 162, 235)',
                //     // 'rgb(153, 102, 255)',
                //     // 'rgb(201, 203, 207)'

                //     borderWidth: 1
                // }
            ]
        };
        const config_bar = {
            type: 'bar',
            data: data_bar,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                // title: {
                //     display: 'true',
                //     text: 'Số lượng sản phẩm bán ra'
                // }
            },
        };
        var chartbar = new Chart(
            document.getElementById('chart--bar'),
            config_bar
        );

        //end bar
    </script>
</body>

</html>