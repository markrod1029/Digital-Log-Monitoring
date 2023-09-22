<?php
$mon = date('m');
   $months = date('M');
$sql = "SELECT * FROM incident_info WHERE incident = 'Medical' AND sub_incident = 'Stroke' AND month = '$mon' ";
$tquery = $conn->query($sql);
$Stroke = $tquery->num_rows;


$sql = "SELECT * FROM incident_info WHERE incident = 'Medical' AND sub_incident = 'Highblood' AND month = '$mon' ";
  $squery = $conn->query($sql);
  $Highblood = $squery->num_rows;


  

  $sql = "SELECT * FROM incident_info WHERE incident = 'Medical' AND sub_incident = 'Others' AND month = '$mon' ";
  $aquery = $conn->query($sql);
  $Others = $aquery->num_rows;




$dataPoints = array( 
	array("label"=> "Stroke", "y"=> $Stroke),
	array("label"=> "Highblood", "y"=> $Highblood),
	array("label"=> "Others", "y"=> $Others),

)

  
?>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<script>



var chart = new CanvasJS.Chart("chartContainer2",
    {
        animationEnabled: true,

        title: {
            text: "Medical (<?php echo $months ?>)",
            fontSize: 24,
            fontWeight: "normal",
        },
        data: [
        {
            
            type: "pie",
		indexLabel: "{y}",
		indexLabelFontSize: 20,
        toolTipContent: "<b>{label}</b>: {y} (#percent%)",
		fontFamily: "calibri",
		legendText: "{label}" ,
    
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            
            
        },
        ]
    });
chart.render();
</script> 






<?php

$sql = "SELECT * FROM incident_info WHERE incident = 'Trauma' AND sub_incident = 'Self Accident' AND month = '$mon' ";
$tquery = $conn->query($sql);
$Self = $tquery->num_rows;



$sql = "SELECT * FROM incident_info WHERE incident = 'Trauma' AND sub_incident = 'Vehicle Accident' AND month = '$mon' ";
  $squery = $conn->query($sql);
  $Vehicle = $squery->num_rows;

  $sql = "SELECT * FROM incident_info WHERE incident = 'Trauma' AND sub_incident = 'Drowning' AND month = '$mon' ";
  $squery = $conn->query($sql);
  $Drowning = $squery->num_rows;

  

  $sql = "SELECT * FROM incident_info WHERE incident = 'Trauma' AND sub_incident = 'Others' AND month = '$mon' ";
  $otquery = $conn->query($sql);
  $Others = $otquery->num_rows;


  $dataPoints = array( 
	array("label"=> "Self Accident", "y"=> $Self),
	array("label"=> "Vehicle Accident", "y"=> $Vehicle),
	array("label"=> "Drowning", "y"=> $Drowning),
	array("label"=> "Others", "y"=> $Others),

)

?>
<script>



var chart = new CanvasJS.Chart("chartContainer3",
    {
        animationEnabled: true,

        title: {
            text: "Trauma (<?php echo $months?>)",
            fontSize: 24,
            fontWeight: "normal",
        },
        data: [
        {
            
            type: "pie",
		indexLabel: "{y}",
		indexLabelFontSize: 20,
        toolTipContent: "<b>{label}</b>: {y} (#percent%)",
		fontFamily: "calibri",
		legendText: "{label}" ,
    
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            
            
        },
        ]
    });
chart.render();
</script> 



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>





<?php
  $and = 'AND YEAR(date) = '.$year;
  $months = array();
  $Medical = array();
  $Trauma = array();
  for( $m = 1; $m <= 12; $m++ ) {
    $sql = "SELECT * FROM incident_info WHERE MONTH(date) = '$m' AND incident = 'Medical' $and";
    $oquery = $conn->query($sql);
    array_push($Medical, $oquery->num_rows);

    $sql = "SELECT * FROM incident_info WHERE MONTH(date) = '$m' AND  incident = 'Trauma'  $and";
    $lquery = $conn->query($sql);
    array_push($Trauma, $lquery->num_rows);

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $Trauma = json_encode($Trauma);
  $Medical = json_encode($Medical);

?>


<script>
new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels:  <?php echo $months ; ?>,
    datasets: [{ 
        data: <?php echo $Medical ; ?>,
        label: "Medical",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: <?php echo $Trauma ; ?>,

        label: "Trauma",
        borderColor: "rgb(255, 77, 32)",
        fill: false
      },
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Incident Report'
    }
  }
});
</script>


</script>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

:root{
    --color-main: #ff6600;
    --bg: #fbfefd;
    --bg2: #dce55f;
    --main-accent: #e9eefd;
    --main-text: #4b5876;
    --shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
}
*{
    padding: 0;
    margin: 0;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
    list-style: none;
    box-sizing: border-box;
}
body{
    background: var(--bg);
    overflow-x: hidden;
    
}
#menu-toggle{
    display: none;
}
#menu-toggle:checked ~ .sidebar {
    left: -345px;
}
#menu-toggle:checked ~ .main-content {
    margin-left: 0;
    width: 100vw;
}
img{
    width: 100%;
    height: auto;
}
.sidebar{
    width: 345px;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    padding: 1rem 1.2rem;
    transition: left 300ms;
}
.sidebar-container{
    height: 100%;
    width: 100%;
    background: #fff;
    border-radius: 20px;
    box-shadow: var(--shadow);
    padding: 1.2rem;
    overflow-y: auto;
}
    .sidebar-container::-webkit-scrollbar {
        width: 6px;
    }
    .sidebar-container::::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    .sidebar-container::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px; 
    }
    .sidebar-container::::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }
.brand span img{
    width: 100px;
}
.brand h3 span{
    color: var(--color-main);
    font-size: 2.5rem;
    display: inline-block;
    margin-right: .5rem;
}
.sidebar-avatar{
    display: grid;
    grid-template-columns: 70px auto;
    align-items: center;  
    border: 2px solid var(--color-main);
    padding: .1rem .7rem;
    border-radius: 7px;
    margin: 1rem 0rem;
}
.sidebar-avatar img{
    width: 70px; 
    height: 70px; 
    border-radius: 50%;
}

.avatar-info{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-left: 4px;
}
.avatar-info h4{
    font-size: 1rem;
    font-weight: 600;
}
.avatar-info h4 small{
    font-size: .5rem;
    color: var(--main-text);
}
.sidebar-menu li{
    margin-bottom: .2rem;
  
}
.sidebar-menu a{
    color: var(--main-text);
    display: block;
    padding: .7rem 0rem;
    text-decoration: none;
}
.sidebar-menu a:hover{
    color: var(--color-main);
}
.sidebar-menu a.active{
    background: var(--main-accent);
    padding: .7rem;
    border-radius: 5px;
}
.sidebar-menu a span:first-child{
    display: inline-block;
    margin-right: .8rem;
    font-size: 1.5rem;
    color: var(--color-main);
}
.btn{
    padding: .7rem 1rem;
    border: none;
    border-radius: 10px;
}
.btn-main{
    background: var(--color-main);
    color: #fff;
}
.main-content{
    margin-left: 345px;
    width: calc(100vw - 345px);
    padding: 1rem 1.2rem;
    padding-right: 2rem;
    transition: margin-left 300ms;
}

header{
    display: flex;
    justify-content: space-between;
    padding-top: .5rem;
}
.header-title-wrapper{
    display: flex;
}
.header-title-wrapper label{
    display: inline-block;
    color: var(--color-main);
    margin-right: 2rem;
    font-size: 1.8rem;
}
.header-title h1{
    color: var(--main-text);
    font-weight: 600;
}
.header-title p{
    color: var(--color-main);
    font-size: .9rem;
}
.header-title p span{
    color: red;
    font-size: 1.2rem;
    display: inline-block;
    margin-left: .5rem;
}

main{
    padding-top: .3rem;
    padding-bottom: 1rem;
}
h3{
    font-size: 1.4rem;
    color: var(--main-text);
    font-weight: 600;
    margin-bottom: .1rem;
}
.contents{
    padding: 1.5rem;
    border-radius: 10px;
    margin-bottom: 3rem;
}
.analytics{
    margin-top: 20px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 2.5rem;
    margin-bottom: 3rem;
}
.back{
    background: blue;
    padding: 4px;
    border-radius: 0%;
    margin-bottom: 10px;
    width:70px;

 
}
.back a{
    color:#000;
    text-decoration:none;
    
 
}
.btn{
    outline: 1px solid #ff6600;;
    padding: 4px;
    border-radius: 0%;
    margin-bottom: 10px;
    width:40px;
 
}
.btn a{
    text-decoration: none;
    color: #ff6600;
}
.btn a:hover{
    text-decoration: none;
    color:#ff6600;
}
button{
    outline: none;
    border: none;
    padding: 4px;
    border-radius: 0%;
}

.graph-content{
    border-radius: 0%;
    background: #fff;
  
}

#revenueChart{
    width: 100%;
    height: 100px;
}
.overlay{
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    z-index: 10;
    display: none;
    background: rgba(255,255,255,0.5);
}
.overlay label{
    display: block;
    height: 100%;
    width: 100%;
}
#line-chart{
    width: 100%;
    height: 300px
}
#chartContainer2{
    width: 100%;
    height: 200px;
}
#chartContainer3{
    width: 100%;
    height: 200px;
}
@media only screen and (max-width:500px){
    header, .header-title-wrapper{
        align-items: center;
    }
    .header-title h1{
        font-size: 1.2rem;
    }
    .header-title p{
        display: none;
    }
}
@media only screen and (max-width:860px){
    .analytics{
        margin-top: 20px;
        grid-template-columns: repeat(1, 1fr);
    }
    .block-grid{
        grid-template-columns: 100%;
    }
    .graph-content{
        border-radius: 12px;
        background: #fff;
        padding: 1rem;
    
    }
 
   
}

@media only screen and (max-width:500px){
    .analytics{

        grid-template-columns: 100%;
    }
    
    #line-chart{
        grid-template-columns: 100%;
       
    }
   
}

</style>