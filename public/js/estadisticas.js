window.onload = main;

function main(){
    peticionDonut();
    peticionChartBar();
}



function peticionChartBar(){
    axios.get('/estadisticas/getTicketsDepartments', {
    })
    .then(function (response) {
      const departamentos = [];
      const total = [];
      const {data:{data}} = response;

      data.forEach(element => {
        departamentos.push(element.departamento);
          total.push(element.total);
      });

      barChart(departamentos , total);
    })
    .catch(function (error) {
        console.log(error);
    });
}





function peticionDonut(){

    axios.get('/estadisticas/getTicketsUser', {
      })
      .then(function (response) {
        const nombres = [];
        const total = [];
        const {data:{data}} = response;

        data.forEach(element => {
            nombres.push(element.name);
            total.push(element.total);
        });

        donutChat(nombres , total);

      })
      .catch(function (error) {
        console.log(error);
      });


}



function donutChat(nombres , total){
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: nombres,
      datasets: [
        {
          data: total,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
}



function barChart(departamentos , data){

    var areaChartData = {
        labels  : departamentos,
        datasets: [
          {
            label               : 'Departamentos',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : data
          }
        ]
      }


    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    barChartData.datasets[0] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
}
