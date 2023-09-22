<?php

$sql = "SELECT * FROM teacher";
$tquery = $conn->query($sql);
$teacher = $tquery->num_rows;



  $sql = "SELECT * FROM student";
  $squery = $conn->query($sql);
  $student = $squery->num_rows;


  

  $sql = "SELECT * FROM admin";
  $aquery = $conn->query($sql);
  $admin = $aquery->num_rows;


  

  

$dataPoints = array( 
	array("label"=> "Teacher", "y"=> $teacher),
	array("label"=> "Student", "y"=> $student),
	array("label"=> "Admin", "y"=> $admin),

)

  
?>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<script>



var chart = new CanvasJS.Chart("chartContainer2",
    {
        animationEnabled: true,
        exportEnabled: true,

        title: {
            text: "Total Users Registered",
            fontSize: 24,
            fontWeight: "normal",
        },
        data: [
        {
            type: "column",
		indexLabel: "{y}",
		indexLabelFontSize: 20,
		fontFamily: "calibri",
		legendText: "{label}" ,
    
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            
            
        },
        ]
    });
chart.render();
</script> 



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

