
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
$.ajax({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:'/api/admin/dashboard',
  type:'GET',
  data: {
    user_type: 'owner'
  },
  success: (data)=>{

    const ctx = document.getElementById("ownersChart").getContext('2d');
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

    //Restaurant
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url:'/api/admin/dashboard_restaurant',
      type:'GET',
      data: {
        user_type: 'restaurant'
      },
      success: (data)=>{
    
        const ctx = document.getElementById("restaurantChart").getContext('2d');
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

  // Reviews

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url:'/api/admin/dashboard_review',
      type:'GET',
      data: {
        user_type: 'review'
      },
      success: (data)=>{
    
        const ctx = document.getElementById("reviewChart").getContext('2d');
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

  // Reservations
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url:'/api/admin/dashboard_reservation',
    type:'GET',
    data: {
      user_type: 'reservation'
    },
    success: (data)=>{
  
      const ctx = document.getElementById("reservationChart").getContext('2d');
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

  // Nationality
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url:'/api/admin/dashboard_nationality',
    type:'GET',
    type: 'horizontalBar',//check the syntax
    data: {
      user_type: 'nationality'
    },
    success: (data)=>{
  
      const ctx = document.getElementById("nationalityChart").getContext('2d');
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
