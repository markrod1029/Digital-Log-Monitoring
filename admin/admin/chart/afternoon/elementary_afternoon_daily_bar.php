
<?php
	 $todays = date('M');
$and = 'AND MONTH(date) = '.$year;
$months = array();
$nums = array();
$ontime = array();
$late = array();
for( $m = 1; $m <= 31; $m++ ) {
  $sql = "SELECT DISTINCT student_id FROM monitoring_afternoon WHERE Day(date) = '$m' AND status_afternoon = 1 AND student = 'Elementary' $and";
  $oquery = $conn->query($sql);
  array_push($ontime, $oquery->num_rows);

  $sql = "SELECT DISTINCT student_id FROM monitoring_afternoon WHERE Day(date) = '$m' AND status_afternoon = 0 AND student = 'Elementary' $and";
  $lquery = $conn->query($sql);
  array_push($late, $lquery->num_rows);

  $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
  $month =  date('d', mktime(0, 0, 0, 0,  $m, 1));
  array_push($months, $month);
  array_push($nums, $m);
}


$months = json_encode($months);
$nums = json_encode($nums);
$late = json_encode($late);
$ontime = json_encode($ontime);

$label = $months ;
?>


<script>
$(function(){
var barChartCanvas = $('#barChart').get(0).getContext('2d')

var barChart = new Chart(barChartCanvas)
var barChartData = {
  labels  : <?php echo $label ; ?>,
  
  datasets: [
    {
      label               : 'Late',
      fillColor           : '#E7323A',
      strokeColor         : '#E7323A',
      pointColor          : '#E7323A',
      pointStrokeColor    : '#E7323A',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: '#E7323A',
      data                : <?php echo $late; ?>
    },
    {
      label               : 'Ontime',


      fillColor           : '#367FA9',
      strokeColor         : '#367FA9',
      pointColor          : '#367FA9',
      pointStrokeColor    : '#367FA9',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: '#367FA9',
      data                : <?php echo $ontime; ?>
    }
  ]
}
barChartData.datasets[1].fillColor   = '#367FA9'
barChartData.datasets[1].strokeColor = '#367FA9'
barChartData.datasets[1].pointColor  = '#367FA9'
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
  window.location.href = 'elementary_afternoon_daily.php?month='+$(this).val();
});
});
</script>