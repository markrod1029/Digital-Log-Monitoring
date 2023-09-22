<?php
	include 'session.php';
	
	$id = $_GET['id'];
		$sql = "DELETE FROM schedules WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule deleted successfully';
			$name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
			$position = $user['position']; 
			$id = $user['id']; 
            $insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',   NOW(),  'Deleted a schedules')";
				$query = mysqli_query($conn,$insert);
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	header('location: ../schedule.php');
	
?>