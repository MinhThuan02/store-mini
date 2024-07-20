 // Dữ liệu mẫu cho biểu đồ
 const salesData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
    datasets: [{
        label: 'Sales',
        data: [1000, 1500, 1200, 1800, 2000, 1700],
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
    }]
};

// Lấy thẻ canvas và vẽ biểu đồ doanh số
const salesChartCanvas = document.getElementById('salesChart').getContext('2d');
const salesChart = new Chart(salesChartCanvas, {
    type: 'line',
    data: salesData,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});


