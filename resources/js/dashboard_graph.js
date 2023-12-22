
$.ajax({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:'/api/admin/dashboard',
  type:'GET',
  data: {
    user_type: 'user'
  },
  success: (data)=>{

    const ctx = document.getElementById("userChart").getContext('2d');
    const userChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: data.labels,
        datasets: data.datasets
        
      },
    });
  },
  error: (error)=>{
     console.log(error);
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
              backgroundColor: "#CAC2C7"
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
              backgroundColor: "#CAC2C7"
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
          backgroundColor: "#CAC2C7"
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
          backgroundColor: "#CAC2C7"
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
          backgroundColor: "#CAC2C7"
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

