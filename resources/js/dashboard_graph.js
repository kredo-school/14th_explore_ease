  //User 
var ctx = document.getElementById("userChart");
var userChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
    datasets: [
    {
        label: 'users',
        data: [55, 45, 73, 75, 41, 45, 58, 73, 75, 41, 45, 58],
        backgroundColor: "rgba(255,183,76,0.5)"
      }
    ]
  },
  options: {
    title: {
      display: true,
    },
    scales: {
      yAxes: [{
        ticks: {
          suggestedMax: 100,
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

//Owner
var ctx = document.getElementById("ownersChart");
      var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
          datasets: [
          {
              label: 'Owners',
              data: [55, 45, 73, 75, 41, 45, 58, 73, 75, 41, 45, 58],
              backgroundColor: "rgba(255,183,76,0.5)"
            }
          ]
        },
        options: {
          title: {
            display: true,
          },
          scales: {
            yAxes: [{
              ticks: {
                suggestedMax: 100,
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

    //Restaurant
      var ctx = document.getElementById("restaurantsChart");
      var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
          datasets: [
          {
              label: 'Restaurant pages',
              data: [55, 45, 73, 75, 41, 45, 58, 73, 75, 41, 45, 58],
              backgroundColor: "rgba(255,183,76,0.5)"
            }
          ]
        },
        options: {
          title: {
            display: true,
          },
          scales: {
            yAxes: [{
              ticks: {
                suggestedMax: 100,
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

  // Reviews
  var ctx = document.getElementById("reviewsChart");
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
      {
          label: 'Number of reviews',
          data: [55, 45, 73, 75, 41, 45, 58, 73, 75, 41, 45, 58],
          backgroundColor: "rgba(255,183,76,0.5)"
        }
      ]
    },
    options: {
      title: {
        display: true,
      },
      scales: {
        yAxes: [{
          ticks: {
            suggestedMax: 100,
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

  // Reservations
  var ctx = document.getElementById("reservationsChart");
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
      {
          label: 'Number of booking',
          data: [55, 45, 73, 75, 41, 45, 58, 73, 75, 41, 45, 58],
          backgroundColor: "rgba(255,183,76,0.5)"
        }
      ]
    },
    options: {
      title: {
        display: true,
      },
      scales: {
        yAxes: [{
          ticks: {
            suggestedMax: 100,
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

  // Nationality
  var ctx = document.getElementById("nationalityChart");
  var myBarChart = new Chart(ctx, {
      type: 'horizontalBar',
    data: {
      labels: ['AU', 'CU', 'KR', 'BE', 'CN', 'FI', 'SE', 'UK', 'US', 'PH', 'DK', 'CA'],
      datasets: [
      {
          label: 'number of people',
          data: [500, 1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 5500, 6000],
          backgroundColor: "rgba(255,183,76,0.5)"
        }
      ]
    },
    options: {
      title: {
        display: true,
      },
      scales: {
          yAxes: [{
              ticks: {
                  suggestedMax: 100,
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