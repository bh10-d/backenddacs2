//pie
const labels_pie = [
    'Orders',
    'Balance',
];
const data_pie = {
    labels: labels_pie,
    datasets: [{
        label: 'My First Dataset',
        data: [300, 50],
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