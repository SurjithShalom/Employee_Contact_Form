<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
            </div>
            <div  class="col-md-6">
                <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
            </div>        
        </div>
    </div>
   
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
    var p1 = parseInt(<?php echo $p1; ?>);
    var p2= parseInt(<?php echo $p2; ?>);
    var p3 = parseInt(<?php echo $p3; ?>);
    var xValues = ["Pretical_Mark-1", "Pretical_Mark-2","Pretical_Mark-3"];
    var yValues = [p1, p2, p3];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
     
    ];
    
    new Chart("myChart2", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: "Average Pratical Mark"
        }
      }
    });
    </script>
<script>
    var tmp1 = parseInt(<?php echo $avg; ?>);
    var tmp2= parseInt(<?php echo $avg2; ?>);
    var tmp3 = parseInt(<?php echo $avg3; ?>);
    var tmp4 = parseInt(<?php echo $avg4; ?>);
    var tmp5 = parseInt(<?php echo $avg5; ?>);
    var yValues = [tmp1,tmp2,tmp3,tmp4,tmp5];
    new Chart("myChart", {
  type: "line",
  data: {
    labels: ['mark1','mark2','mark3','mark4','mark5'],
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 10, max:100}}],
    }
  }
});
</script>

</html>