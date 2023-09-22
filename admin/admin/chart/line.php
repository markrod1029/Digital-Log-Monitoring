<?php
  $and = 'AND YEAR(date) = '.$year;
  $months = array();
  $ontime = array();
  $late = array();
  for( $m = 1; $m <= 12; $m++ ) {
    $sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m'  $and";
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

var lineChartData = {
  labels  : <?php echo $months; ?>,
  datasets : [
    // {
    //   label               : 'Late',
    // fillColor           : 'rgb(255,165,0)',
    // strokeColor         : 'rgb(255,165,0)',
    // pointColor          : 'rgb(255,165,0)',
    // pointStrokeColor    : 'rgb(255,165,0)',
    // pointHighlightFill  : '#fff',
    // pointHighlightStroke: 'rgb(255,165,0)',
    // data                : <?php echo $late; ?>
    // },
    {
      label               : 'Ontime',
    fillColor           : '#fff',
    strokeColor         : '#546BC1',
    pointColor          : '#546BC1',
    pointStrokeColor    : '#546BC1',
    pointHighlightFill  : '#fff',
    pointHighlightStroke: '#546BC1',
    data                : <?php echo $ontime; ?>
    },
  ]

}

window.onload = function(){
var line = document.getElementById("canvas").getContext("2d");
window.myLine = new Chart(line).Line(lineChartData, {
  responsive: true,
  exportEnabled: true,

});
}


</script>



<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'ontime_late.php?year='+$(this).val();
  });
});
</script>