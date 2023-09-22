<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Absent',
        fillColor           : '#DD4B39',
        strokeColor         : '#DD4B39',
        pointColor          : '#DD4B39',
        pointStrokeColor    : '#DD4B39',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: '#DD4B39',
        data                : <?php echo $late; ?>
      },
      {
        label               : 'Present',
        fillColor           : '#00A65A',
        strokeColor         : '#00A65A',
        pointColor          : '#00A65A',
        pointStrokeColor    : '#00A65A',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: '#00A65A',
        data                : <?php echo $present; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#00A65A'
  barChartData.datasets[1].strokeColor = '#00A65A'
  barChartData.datasets[1].pointColor  = '#00A65A'
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
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>