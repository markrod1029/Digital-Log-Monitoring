<?php
  $and = 'AND YEAR(date) = '.$year;
  $months = array();
  $present = array();
  for( $m = 1; $m <= 12; $m++ ) {
    $sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m'  $and";
    $oquery = $conn->query($sql);
    array_push($present, $oquery->num_rows);

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $present = json_encode($present);

?>
<script>

var lineChartData = {
  labels  : <?php echo $months; ?>,
  datasets : [

    {
      label               : 'Ontime',
    fillColor           : '#fff',
    strokeColor         : '#546BC1',
    pointColor          : '#546BC1',
    pointStrokeColor    : '#546BC1',
    pointHighlightFill  : '#fff',
    pointHighlightStroke: '#546BC1',
    data                : <?php echo $present; ?>
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