var ctx = document.getElementById("ReviewChart");
var ReviewChart = new Chart(ctx, {
type: 'horizontalBar',
data: {
    labels: ['☆☆☆☆☆  5', '☆☆☆☆  4', '☆☆☆  3', '☆☆  2', '☆  1'],
    datasets: [
    {
        label: '',
        data: [countstar5, countstar4, countstar3, countstar2, countstar1],
        backgroundColor: "#E7DA3D"
    }
    ]
},
options: {
    legend: {
    display: false,
    },
    scales: {
        yAxes: [{
            ticks: {
                suggestedMax: 1000,
                suggestedMin: 0,
                stepSize: 10,
        callback: function(value, index, values){
            return  value
        }
        }
    }]
    },
}
});
