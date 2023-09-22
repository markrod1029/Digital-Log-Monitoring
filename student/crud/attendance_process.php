<?php
	
 
		include 'conn.php';
		include '../../timezone.php';

		$student = $_POST['student_qrcode'];
		$status = $_POST['status'] ;
		$location = $_POST['location'] ;


		$sql = "SELECT * FROM student WHERE qrcode = '$student'";
		$query = $conn->query($sql);
    $result = $query->num_rows;

		if($result > 0){
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
					$sql = "INSERT INTO attendance (student_id, student_qrcode, date, time_in, status, location) VALUES ('$id', '$id', '$date_now', NOW(), '$logstatus', '$location')";
					
					
					if($conn->query($sql)){
						echo "<div class='alert alert-success' role='alert' style='font-size:22px'><h4><i class='fa fa-clock'></i>  you time in today</h4></div>";


					}
					else{
			
            echo "<div class='alert alert-warning' role='alert' style='font-size:22px'><h4> ". $conn->error."</div>";

					
					
					}
				}
			}






			else{
				$sql = "SELECT *, attendance.id AS uid FROM attendance LEFT JOIN student ON student.id=attendance.student_qrcode WHERE attendance.student_qrcode = '$student' AND date = '$date_now'";
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
	

?>