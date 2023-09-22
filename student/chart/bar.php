
<?php
  $and = 'AND YEAR(date) = '.$year;
  $months = array();
  $ontime = array();
  $late = array();
  for( $m = 1; $m <= 12; $m++ ) {

    $sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m' AND status = 1 $and";
    $oquery = $conn->query($sql);
    array_push($ontime, $oquery->num_rows);

    $sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m' AND status = 0 $and";
    $lquery = $conn->query($sql);
    array_push($late, $lquery->num_rows);

    



    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
    
  }

  $months = json_encode($months);
  $late = json_encode($late);
  $ontime = json_encode($ontime);
 
?>


<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    
    datasets: [
      {
        label               : 'Late',
        fillColor           : 'rgb(255,165,0)',
        strokeColor         : 'rgb(255,165,0)',
        pointColor          : 'rgb(255,165,0)',
        pointStrokeColor    : 'rgb(255,165,0)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgb(255,165,0)',
        data                : <?php echo $late; ?>
      },
      {
        label               : 'Ontime',
        fillColor           : '#546BC1',
        strokeColor         : '#546BC1',
        pointColor          : '#546BC1',
        pointStrokeColor    : '#546BC1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: '#546BC1',
        data                : <?php echo $ontime; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#FFFF00'
  barChartData.datasets[1].strokeColor = '#FFFF00'
  barChartData.datasets[1].pointColor  = '#FFFF00'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true,
    exportEnabled: true,

  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
  document.getElementById("chart_image").src = document.getElementById("canvas").toDataURL();
});

</script>

<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'ontime.php?year='+$(this).val();
  });
});
</script>
