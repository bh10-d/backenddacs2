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
            data: [65, 59, 80, 81, 56, 55, 40, 20, 31, 43, 23, 33],
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
        {
            label: 'Linh phụ kiện và máy tính',
            data: [20, 60, 30, 40, 50, 15, 20, 12, 34, 32, 65, 21],
            backgroundColor:
            // 'rgba(255, 99, 132, 0.2)',
            // 'rgba(255, 159, 64, 0.2)',
            // 'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            // 'rgba(54, 162, 235, 0.2)',
            // 'rgba(153, 102, 255, 0.2)',
            // 'rgba(201, 203, 207, 0.2)'

            // backgroundColor: [
            //     // 'rgba(255, 99, 132, 0.2)',
            //     // 'rgba(255, 159, 64, 0.2)',
            //     // 'rgba(255, 205, 86, 0.2)',
            //     'rgba(75, 192, 192, 0.2)',
            //     // 'rgba(54, 162, 235, 0.2)',
            //     // 'rgba(153, 102, 255, 0.2)',
            //     // 'rgba(201, 203, 207, 0.2)'
            // ],
            borderColor:
            // 'rgb(255, 99, 132)',
            // 'rgb(255, 159, 64)',
            // 'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
            // 'rgb(54, 162, 235)',
            // 'rgb(153, 102, 255)',
            // 'rgb(201, 203, 207)'

            borderWidth: 1
        }
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