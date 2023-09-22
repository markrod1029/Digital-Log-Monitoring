<?php
	include 'session.php';

	if(isset($_POST['save'])){

		
	
		$position = $_POST['position'];

		$am_time_in = $_POST['time_in_morning'];
		$am_time_out = $_POST['time_out_morning'];
		$pm_time_in = $_POST['time_in_afternoon'];
		$pm_time_out = $_POST['time_out_afternoon'];



	
		$sql = "INSERT INTO schedules( position,  time_in_morning, time_out_morning, time_in_afternoon, time_out_afternoon) 
		VALUES ('$position', '$am_time_out', '$am_time_out',  '$pm_time_in', '$pm_time_out')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule added successfully';
			$name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
			$position = $user['position']; 
			$id = $user['id']; 
            $insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',   NOW(),  'Added a new schedules')";
				$query = mysqli_query($conn,$insert);
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

header('location: ../schedule.php');