

<?php
 $month = date('m');
 $year = date('Y');
 $months = date('M-Y');

 //  total student ontime  and percenrtage
 
 
 $sql = "SELECT * FROM attendance  WHERE months = '$month' AND year = '$year'  ";
 $query = $conn->query($sql);
 $present = $query->num_rows;
 
 //  total student absent  and percenrtage
 
 
 $sql2 = "SELECT * FROM student";
 $query2 = $conn->query($sql2);
 $student = $query2->num_rows;
 
 


 $absent = $student  - $present;
 

 if($student != $absent){
 
  $absent  = $student  - $present;
 
 }
 
 else if($absent == 0 && $student == 0){
 
  $absent = 0;
 }
 else{
 
 $absent = 0;
 
 
 }
 
 
 
 
 $total = $present + $absent;
 
 
 
 if($present == 0){
  echo 0;
  }
  
  
  else{
  
    $ontime = $present/$total;
  }
 
  if($absent == 0){
	echo 0;
    }
    
    
    else{
    
      $late = $absent/$total;
    }
  




  
    $register = array(
        array("y"=> $ontime, "name"=> "Present", "color"=> "#546BC1"),
        array("y"=> $late, "name"=>"Absent", "color"=> "#E7323A"),

        
      );


 $absent = array(
  array("label"=>"Present", "y"=> $present, "color"=> "#546BC1"),
  array("label"=>"Absent" , "y"=> $$absent, "color"=> "#E7323A"),
  

 
   
 );
  
 $present = array(
    array("label"=>"Present", "y"=> $present, "color"=> "#546BC1"),
    array("label"=>"Absent" , "y"=> $absent, "color"=> "#E7323A")

 
 
 );
  
 
 
 ?>

<script>
window.onload = function () {

var total = <?php echo $total ?>;
var visitorsData = {
   "Users Registered": [{
       click: visitorsChartDrilldownHandler,
       cursor: "pointer",
       explodeOnClick: false,
       innerRadius: "50%",
       legendMarkerType: "square",
       name: "Users Registered",
       radius: "100%",
       showInLegend: true,
       startAngle: 90,
       indexLabel: "{y}",
       yValueFormatString: "#,##0.\"%\"",
       indexLabelFontSize: 20,
       type: "doughnut",
       dataPoints: <?php echo json_encode($register, JSON_NUMERIC_CHECK); ?>
   }],
   "Present": [{
       click: visitorsChartDrilldownHandler1,
       explodeOnClick: false,
       color: "#E7823A",
       indexLabelFontSize: 20,
       indexLabel: "{y}",

       name: "OntPresentime",
       type: "bar",
       dataPoints: <?php echo json_encode($absent, JSON_NUMERIC_CHECK); ?>
   }],
   "Absent": [{
       click: visitorsChartDrilldownHandler1,
       explodeOnClick: false,
       color: "#F39C12",
       indexLabel: "{y}",
       indexLabelFontSize: 20,
       name: "Absent",
       type: "bar",
       dataPoints: <?php echo json_encode($absent, JSON_NUMERIC_CHECK); ?>
   }],

};

var newVSReturningVisitorsOptions = {
   animationEnabled: true,
   theme: "light2",
   exportEnabled: true,

   title: {
  	text: "Total Percentage of Late and Ontime Month of <?php echo  $months ?>"
	},
  
   legend: {
       fontFamily: "calibri",
       fontSize: 14,
       itemTextFormatter: function (e) {
           return e.dataPoint.name + ": " + Math.round(e.dataPoint.y) + "%";
       }
   },
   data: []
};

var visitorsDrilldownedChartOptions = {
   animationEnabled: true,
   theme: "light2",
   exportEnabled: true,

   axisX: {
       labelFontColor: "#b17171",
       lineColor: "#12a2a2",
       tickColor: "#a2a2a2",
       labelFontSize: 20,
       labelFontColor: "dimGrey"
   },
   axisY: {
       gridThickness: 0,
       includeZero: false,
       labelFontColor: "#717171",
       lineColor: "#a2a2a2",
       tickColor: "#a2a2a2",
       lineThickness: 1
   },
   data: []
};

var chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
chart.options.data = visitorsData["Users Registered"];
chart.render();

function visitorsChartDrilldownHandler(e) {
   chart = new CanvasJS.Chart("chartContainer", visitorsDrilldownedChartOptions);
   chart.options.data = visitorsData[e.dataPoint.name];
   chart.options.title = { text: e.dataPoint.name }
   chart.render();
   $("#backButton").toggleClass("invisible");
}

function visitorsChartDrilldownHandler1(e) {
   chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
   chart.options.data = visitorsData["Users Registered"];
   chart.render();
   $("#backButton").toggleClass("invisible");
}

$("#backButton").click(function() { 
   $(this).toggleClass("invisible");
   chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
   chart.options.data = visitorsData["Users Registered"];
   chart.render();
});

}
</script>
<style>
 #backButton {
   border-radius: 4px;
   padding: 8px;
   border: none;
   font-size: 16px;
   background-color: #2eacd1;
   color: white;
   
   cursor: pointer;
 }
 .invisible {
   display: none;
 }
</style>



<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                         