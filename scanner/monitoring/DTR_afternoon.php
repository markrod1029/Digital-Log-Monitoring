<?php

error_reporting(0);
include 'includes/conn.php';
include 'timezone.php';
require_once "../libs/phpqrcode/qrlib.php";


if(isset($_POST['student_qrcode']))
{

    $student = $_POST['student_qrcode'];

    
		$sql = "SELECT * FROM student WHERE qrcode = '$student'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		$id = $row['id'];
		$position = $row['position'];
		$student_id = $row['student_id'];

		$date_now = date('Y-m-d');
		 $morning = date('A');
		$month = date("m");
        $year = date("Y");
        $day = date("d");
		$morning = date('A');
		$time =  date('h:i:A', strtotime("+0 HOURS"));


	   $currentDateTime = new DateTime('now', new DateTimeZone('Asia/Manila'));
    $currentTimeFormatted = $currentDateTime->format('H:i:s');
    // $time = $currentDateTime->format('h:i:A', strtotime("+0 HOURS"));


        if($query->num_rows <= 0){

            echo "
            <div class='alert alert-warning' role='alert' style='font-size:18px'>
            <p><b><i class='fas fa-exclamation-triangle'></i>  Your QR Code does not register</b></p>
            </div>";
      
        }


        else{

				$query = $conn->query($sql);
					

				 $sql = "SELECT * FROM monitoring WHERE student_id = '$id' AND date = '$date_now' AND status = '0'";
				 $query = $conn->query($sql);
			if($query->num_rows > 0 ){

				
							echo "<div class='alert alert-success' role='alert' style='font-size:22px'><h4> You have timed out for today</div>
							
							<audio controls id='video' autoplay  style='display:none;'>
						<source onclick='playedOnce()' src='../path/audio/timeout.mp3' type='audio/mp3' />
						
					</audio>";

					
				
				
					$sql = "SELECT *, monitoring.id AS uid FROM monitoring LEFT JOIN student ON student.id=monitoring.student_id WHERE monitoring.student_id = '$id'  AND monitoring.status = '0' ";
					$query = $conn->query($sql);
					$row = $query->fetch_assoc(); 


							$sql = "SELECT * FROM monitoring WHERE id = '".$row['uid']."'";
							$query = $conn->query($sql);
							$urow = $query->fetch_assoc();

							$time_in = $urow['time_in'];
							$time_out = $urow['time_out'];
				
							$sql = "SELECT * FROM student LEFT JOIN schedules ON schedules.id=student.schedule_id WHERE student.id = '$id' ";
							$query = $conn->query($sql);
							$srow = $query->fetch_assoc();
							$position = $srow['position'];
							if($srow['time_in'] > $urow['time_in']){
								$time_in = $srow['time_out'];
							}

							if($srow['time_out'] < $urow['time_out']){
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

							$sql = "UPDATE monitoring SET num_hr = '$int', student = '$position'  WHERE id = '".$row['uid']."' ";
							$conn->query($sql);

							$sql = "UPDATE monitoring SET time_out = '$currentTimeFormatted',  status = '1'  WHERE student_id = '$id' AND date = '$date_now'  AND status = '0' ";
							$query = $conn->query($sql);
			
				}
	



			else{


				if( $morning == 'AM')
				{
					echo "
					<div class='alert alert-warning' role='alert' style='font-size:22px'>
					<h4>You cannot Time In Already Morning</div>
				";

				}

				else
				{

				$sql = "SELECT * FROM monitoring WHERE student_qrcode = '$id' AND time_in IS NOT NULL";
				$query = $conn->query($sql);
				if($query->num_rows > 0){
					echo "<div class='alert alert-success' role='alert' style='font-size:22px'><h4><i class='fa fa-clock'></i>  you already Time In today</h4></div>
					
					
					<audio controls id='video' autoplay  style='display:none;'>
					<source onclick='playedOnce()' src='../path/audio/already_timein.mp3' type='audio/mp3' />
					</audio>";
				}

				else {


					//updates
					$sched = $row['schedule_id'];
					$lognow = date('H:i:s');
					$sql = "SELECT * FROM schedules WHERE id = '$sched'";
					$squery = $conn->query($sql);
					$srow = $squery->fetch_assoc();
					$schedule_id = $srow['position'];


                    $sql = "SELECT * FROM monitoring WHERE date = '$date_now' AND student_qrcode = '$student' ";
					$query1 = $conn->query($sql);
					$row1 = $query1->fetch_assoc();
					if($query1->num_rows > 0 )
					{

						if($row1['status_monitoring'] == 1)
						{
							$logstatus = 2;	
						}
						else{
							$logstatus = -1;	

						}
					}

					else {
						$logstatus = ($lognow > $srow['time_in']) ? 0 : 1;						
					}
					//
					$sql = "INSERT INTO monitoring (student_qrcode, student, student_id, schedule_id, date, time_in, status_monitoring, day, month, year, time ) VALUES ('$student', '$schedule_id', '$id',  '$sched',  '$date_now', '$currentTimeFormatted', '$logstatus', '$day', $month, '$year', 'Afternoon')";
				

					if($conn->query($sql)){

						echo "
						<div class='alert alert-success' role='alert' style='font-size:22px'>
						<h4><i class='fa fa-clock'></i>  you time in today  '".$row['fname']."' '".$row['lname']."'</h4></div>
						
						<audio controls id='video' autoplay  style='display:none;'>
						<source onclick='playedOnce()' src='../path/audio/timein.mp3' type='audio/mp3' />
					</audio>";

					}


					else{
						echo "<div class='alert alert-warning' role='alert' style='font-size:22px'><h4> ". $conn->error."</div>";

				
					}
			}
			}
			}


           
			}





}


?>