
  <?php
 

 
 $total = $student +  $teacher +  $admin;
  
 if($teacher == 0){
  echo 0;
  }
  
  
  else{
  
    $teacher1 = $teacher/$total*100;
  }

  if($student == 0){
    echo 0;
    }
    
    
    else{
    
      $student1 = $student/$total*100;
    }

    if($admin == 0){
      echo 0;
      }
      
      
      else{
      
        $admin1 = $admin/$total*100;
      }
  
 $register = array(
   array("y"=> $teacher1, "name"=> "Teacher", "color"=> "#E7823A"),
   array("y"=> $student1, "name"=> "Student", "color"=> "#546BC1"),
   array("y"=> $admin1, "name"=> "Admin", "color"=> "#00a651"),
   
 );
 $admin = array(
   array("y"=> $admin, "label"=> "Admin", "color"=> "#00a651"),
  array("y"=> $teacher, "label"=> "Teacher", "color"=> "#E7823A"),
  array("y"=> $student, "label"=> "Student", "color"=> "#546BC1"),

   
 );
  
 $teacher = array(
  array("y"=> $teacher, "label"=> "Teacher", "color"=> "#E7823A"),
  array("y"=> $student, "label"=> "Student", "color"=> "#546BC1"),
  array("y"=> $admin, "label"=> "Admin", "color"=> "#00a651"),


 
 
 );
  
 $student = array(
	array("y"=> $admin, "name"=> "Admin", "color"=> "#00a651"),
	array("y"=> $teacher, "label"=> "Teacher", "color"=> "#E7823A"),  
   array("y"=> $student, "label"=> "Student", "color"=> "#546BC1"),


   
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
	"Teacher": [{
		click: visitorsChartDrilldownHandler1,
		explodeOnClick: false,
		color: "#E7823A",
		indexLabelFontSize: 20,
		indexLabel: "{y}",
		name: "Teacher",
		type: "column",
		dataPoints: <?php echo json_encode($admin, JSON_NUMERIC_CHECK); ?>
	}],
	"Student": [{
		click: visitorsChartDrilldownHandler1,
		explodeOnClick: false,
		color: "#546BC1",
		indexLabel: "{y}",
		indexLabelFontSize: 20,
		name: "Student",
		type: "bar",
		dataPoints: <?php echo json_encode($admin, JSON_NUMERIC_CHECK); ?>
	}],

	"Admin": [{
			click: visitorsChartDrilldownHandler1,
		explodeOnClick: false,
		color: "#00a65a",
		indexLabel: "{y}",
		indexLabelFontSize: 20,
		name: "Admin",
		type: "area",
		dataPoints: <?php echo json_encode($admin, JSON_NUMERIC_CHECK); ?>
	}],
};
 
var newVSReturningVisitorsOptions = {
	animationEnabled: true,
	theme: "light2",
	exportEnabled: true,

	title: {
		text: "Percentage Users Registered",
		fontSize: 24,
	},
	
	legend: {
		fontFamily: "calibri",
		fontSize: 14,
		itemTextFormatter: function (e) {
			return e.dataPoint.name + ": " + Math.round(e.dataPoint.y ) + "%"; 
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


 

<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                          