 
<?php
 

 //  late 
 $sql = "SELECT * FROM attendance WHERE date = '$today' AND status = 0";
 $query = $conn->query($sql);
 
 $late = $query->num_rows;
 
 // ontime
 
 $sql = "SELECT * FROM attendance WHERE date = '$today' AND status = 1";
 $query = $conn->query($sql);
 
 $ontime = $query->num_rows;
 
 //  total student ontime  and percenrtage
 $sql = "SELECT * FROM attendance";
 $query = $conn->query($sql);
 $total = $query->num_rows;
 
 $sql = "SELECT * FROM attendance  WHERE date = '$today' AND status = 1";
 $query = $conn->query($sql);
 $early1 = $query->num_rows;
 
 
 
 
 
 
 //  total student late  and percenrtage
 $sql = "SELECT * FROM attendance";
 $query = $conn->query($sql);
 $total = $query->num_rows;
 
 $sql = "SELECT * FROM attendance  WHERE date = '$today' AND status = 0";
 $query = $conn->query($sql);
 $early = $query->num_rows;
 
 
 
 
 
 
 
 $total = $early + $early1;
  
 
 if($early1 == 0){
   echo 0;
   }
   
   
   else{
   
     $ontime = $early1/$total*100;
   }
 
   if($early == 0){
     echo 0;
     }
     
     
     else{
     
       $late = $early/$total*100;
     }
 
 
   
  
  $register = array(
    array("y"=> $ontime, "name"=> "Ontime", "color"=> "#F39C12"),
    array("y"=> $late, "name"=>"Late", "color"=> "#E7823A"),
    
  );
 
 
  $late = array(
   array("label"=>"Ontime", "y"=> $ontime, "color"=> "#E7823A"),
   array("label"=>"Late" , "y"=> $late, "color"=> "#F39C12"),
   
 
  
    
  );
   
  $ontime = array(
   array("label"=>"Late" , "y"=> $late, "color"=> "#F39C12"),
 
   array("label"=>"Ontime", "y"=> $ontime, "color"=> "#E7823A"),
 
  
  
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
		color: "#E7823A",
		indexLabelFontSize: 20,
		name: "Ontime",
		type: "bar",
		dataPoints: <?php echo json_encode($late, JSON_NUMERIC_CHECK); ?>
	}],
	"Late": [{
		click: visitorsChartDrilldownHandler1,
		explodeOnClick: false,
		color: "#F39C12",
		indexLabel: "{y}",
		indexLabelFontSize: 20,
		name: "Late",
		type: "bar",
		dataPoints: <?php echo json_encode($late, JSON_NUMERIC_CHECK); ?>
	}],

};
 
var newVSReturningVisitorsOptions = {
	animationEnabled: true,
	theme: "light2",
	exportEnabled: true,

	title: {
		text: "Total Percentage of Late and Ontime Today"
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
                          