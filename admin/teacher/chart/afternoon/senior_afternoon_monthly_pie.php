 
<?php
 					$month = date('n');
				  $year = date('Y');
	 			$months = date('M-Y');
 

 //  late 
  $sql = "SELECT DISTINCT student_id FROM monitoring_afternoon WHERE year = '$year' AND month = '$month' AND status_afternoon = 0  AND student = 'Senior'";
 $query = $conn->query($sql);
 $late = $query->num_rows;
 // ontime
 
 $sql = "SELECT DISTINCT student_id FROM monitoring_afternoon WHERE   year = '$year' AND month = '$month'  AND status_afternoon = 1 AND student = 'Senior'";
 $query = $conn->query($sql);
 $ontime = $query->num_rows;
 



 
 
 $total = $late + $ontime;
  
 
 
 if($ontime == 0){
	$ontime1 = 0;
   }
   
   
   else{
   
      $ontime1 = $ontime/$total*100;
   }
 
   if($late == 0){
	$late1 = 0;
     }
     
     
     else{
     
       $late1 = $late/$total*100;
     }
 
   
  
  $register = array(
    array("y"=> $ontime1, "name"=> "Ontime", "color"=> "#367FA9"),
    array("y"=> $late1, "name"=>"Late", "color"=> "#E7323A"),
    
  );
 
 
  $late = array(
   array("label"=>"Ontime", "y"=> $ontime, "color"=> "#367FA9"),
   array("label"=>"Late" , "y"=> $late, "color"=> "#E7323A"),
   
 
  
    
  );
   
  $ontime = array(
   array("label"=>"Late" , "y"=> $ontime, "color"=> "#E7323A"),
 
   array("label"=>"Ontime", "y"=> $late, "color"=> "#367FA9"),
 
  
  
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
	"Ontime": [{
		click: visitorsChartDrilldownHandler1,
		explodeOnClick: false,
		color: "#367FA9",
		indexLabel: "{y}",
		indexLabelFontSize: 20,
		name: "Ontime",
		type: "bar",
		dataPoints: <?php echo json_encode($late, JSON_NUMERIC_CHECK); ?>
	}],
	"Late": [{
		click: visitorsChartDrilldownHandler1,
		explodeOnClick: false,
		color: "#E7323A",
		indexLabel: "{y}",
		indexLabelFontSize: 20,
		name: "Late",
		type: "column",
		dataPoints: <?php echo json_encode($late, JSON_NUMERIC_CHECK); ?>
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
                          


<?php 
if($late1 >  $ontime1){
	$student = 'Late';
	$total = $late1;

}

else if($ontime1 > $late1){
	$student = 'Ontime';
	$total = $ontime1;

}
else if($ontime1 == $late1 && $ontime1 != 0 && $late1 != 0 ){
	$student = 'Ontime';
	$total = $ontime1;

}
else{
	$student = '__';

}
?>
            
<p class="h4 mx-auto text-center">The Data shown in the figures shows that <b><?php echo number_format((float)$ontime1, 2, '.', '')?>%</b> of the 
Senior Students are <b>Ontime</b>, and <b><?php echo  number_format((float)$late1, 2, '.', '') ?>%</b>  are Late.
	 This means that most of the time the Senior Students are  <b><?php echo  $student?></b>  </p>
  <br>