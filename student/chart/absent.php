

<?php
 

 //  total student ontime  and percenrtage
 
 
 $sql = "SELECT * FROM attendance  WHERE date = '$today'";
 $query = $conn->query($sql);
 $present = $query->num_rows;
 
 //  total student absent  and percenrtage
 
 
 $sql2 = "SELECT * FROM student";
 $query2 = $conn->query($sql2);
 $student = $query2->num_rows;
 
 
 $absent = $student  - $present;
 
 if($student != $absent){
 
  $absent;
 
 }
 
 else if($absent == 0 && $student == 0){
 
  $absent = 0;
 }
 else{
 
 $absent = 0;
 
 
 }
 
 
 
 
 $total = $present + $absent;
  
 
 
 if($present == 0){
 $ontime = 0;
  }
  
  
  else{
  
    $ontime = $present/$total*100;
  }
 
  if($absent == 0){
    $late = 0;
    }
    
    
    else{
    
      $late = $absent/$total*100;
    }
  
 
 
 
 $dataPoints = array( 
     array("label"=> "Present", "y"=> $ontime),
     array("label"=> "Absent", "y"=> $late),
 
 )
 
   
 ?>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<script>



var chart = new CanvasJS.Chart("chartContainer2",
    {
        animationEnabled: true,
		theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
        title: {
            text: "Total Percentage of Present and Absent Today",
        },
        data: [
        {

		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}%",
    
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            
            
        },
        ],
    }
	);
	
chart.render();
</script> 



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<script>





