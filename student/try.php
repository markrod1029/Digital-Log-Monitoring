<?php 
$dd = array(50, -25, -5, 80, -40, -152, -45, 28, -455, 100, 98, -455);
$curr = '';
$max = $dd[0];
$max1 = $dd[0];

for($i = 0; $i < count($dd); $i++) {
    $curr = $dd[$i];

    if($curr >= $max) {
        $max = $curr;   
   }

   if($curr <= $max) {
    $max1 = $curr;   
}


}
echo $max;
echo $max1;

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <title>Hello, world!</title>
    <style>
      .box {
        display: none;
      }
    </style>
  </head>
  <body>

      <a href="#!" class="hide-btn">Hide Div</a> | <a href="#!" class="show-btn">Show Div</a>
      <div class="box">
          This is hide by default, when press on the Show Div this div will be display.
      <div'>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>
      $(document).ready(function(){
          $(".hide-btn").click(function(){
              $(".box").hide();
          });
          $(".show-btn").click(function(){
              $(".box").show();
          });
      });
    </script>
  </body











  <?php
	
	error_reporting(0);
 
		include 'includes/conn.php';
		include '../timezone.php';

		$student = $_POST['student_qrcode'];
		$status = $_POST['status'] ;

		$sql = "SELECT * FROM student WHERE qrcode = '$student'";
		$query = $conn->query($sql);
 		$loc = $query->fetch_assoc();

    $result = $query->num_rows;
	$location= $loc['location'];


	if(empty($loc['location'])){
		echo "<div class='alert alert-warning' role='alert' style='font-size:18px'><p><b><i class='fas fa-exclamation-triangle'></i>  Your Need Generate Your QR Code </b></p></div>";

	}


	else{
		
		$sql = "SELECT * FROM student WHERE qrcode = '$student'";
		$query = $conn->query($sql);
 		$loc = $query->fetch_assoc();

    $result = $query->num_rows;
	$location= $loc['location'];
	
	if($query->num_rows > 0){
		$row = $query->fetch_assoc();
		$id = $row['id'];

		$date_now = date('Y-m-d');

		if($status == 'Time_In'){
			$sql = "SELECT * FROM attendance WHERE student_qrcode = '$id' AND date = '$date_now' AND time_in IS NOT NULL";
			$query = $conn->query($sql);
			if($query->num_rows > 0){
				echo "<div class='alert alert-success' role='alert' style='font-size:22px'><h4><i class='fa fa-clock'></i>  you already Time In today</h4></div>";



			}
			else{
				//updates
				$sched = $row['schedule_id'];
				$lognow = date('H:i:s');
				$sql = "SELECT * FROM schedules WHERE id = '$sched'";
				$squery = $conn->query($sql);
				$srow = $squery->fetch_assoc();
				$logstatus = ($lognow > $srow['time_in']) ? 0 : 1;
				//
				$sql = "INSERT INTO attendance (student_qrcode, date, time_in, status, location) VALUES ('$id', '$date_now', NOW(), '$logstatus', '$location')";
				if($conn->query($sql)){
					$output['message'] = 'Time in: '.$row['firstname'].' '.$row['lastname'];

					echo "<div class='alert alert-success' role='alert' style='font-size:22px'><h4><i class='fa fa-clock'></i>  you time in today</h4></div>";

				}
				else{
					echo "<div class='alert alert-warning' role='alert' style='font-size:22px'><h4> ". $conn->error."</div>";

				
				}
			}
		}


		else{
			$sql = "SELECT *, attendance.id AS uid FROM attendance LEFT JOIN student ON student.id=attendance.student_qrcode WHERE attendance.student_qrcode = '$id' AND date = '$date_now'";
			$query = $conn->query($sql);
			if($query->num_rows < 1){
				echo "<div class='alert alert-warning' role='alert' style='font-size:22px'><h4> Cannot Timeout. No time in</div>";
				

			}
			else{
				$row = $query->fetch_assoc();
				if($row['time_out'] != '00:00:00'){
					echo "<div class='alert alert-success' role='alert' style='font-size:22px'><h4> You have timed out for today</div>";

				}
				else{
					
					$sql = "UPDATE attendance SET time_out = NOW() WHERE id = '".$row['uid']."'";
					if($conn->query($sql)){
						$output['message'] = 'Time out: '.$row['fname'].' '.$row['lname'];

						$sql = "SELECT * FROM attendance WHERE id = '".$row['uid']."'";
						$query = $conn->query($sql);
						$urow = $query->fetch_assoc();

						$time_in = $urow['time_in'];
						$time_out = $urow['time_out'];

						$sql = "SELECT * FROM student LEFT JOIN schedules ON schedules.id=student.schedule_id WHERE student.id = '$id'";
						$query = $conn->query($sql);
						$srow = $query->fetch_assoc();

						if($srow['time_in'] > $urow['time_in']){
							$time_in = $srow['time_in'];
						}

						if($srow['time_out'] < $urow['time_in']){
							$time_out = $srow['time_out'];
						}

						$time_in = new DateTime($time_in);
						$time_out = new DateTime($time_out);
						$interval = $time_in->diff($time_out);
						$hrs = $interval->format('%h');
						$mins = $interval->format('%i');
						$mins = $mins/60;
						$int = $hrs + $mins;
						if($int > 4){
							$int = $int - 1;
						}

						$sql = "UPDATE attendance SET num_hr = '$int' WHERE id = '".$row['uid']."'";
						$conn->query($sql);


						$sql = "SELECT * FROM student WHERE qrcode = '$student'";
				
						 $location = "";

						$sql = "UPDATE student SET location = '$location' WHERE  qrcode = '$student'";
						$conn->query($sql);

						echo "<div class='alert alert-success' role='alert' style='font-size:22px'><h4> You have timed out for today</div>";

					}
					else{
						echo "<div class='alert alert-warning' role='alert' style='font-size:22px'><h4> ". $conn->error."</div>";


						
					}
				}
				
			}
		}
	}


    else{
      echo "<div class='alert alert-warning' role='alert' style='font-size:18px'><p><b><i class='fas fa-exclamation-triangle'></i>  Your QR Code does not register</b></p></div>";
      
    }
}

?>