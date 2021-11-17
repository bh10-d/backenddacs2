//


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
        label: 'Balance (triệu vnd)',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [0, 10, 5, 10, 15, 20, 15, 10, 5, 10, 20, 20],
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
