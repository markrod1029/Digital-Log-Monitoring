<?php
	include 'session.php';
	
	$id = $_GET['id'];
		$sql = "DELETE FROM activity WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Log Report deleted successfully';

			$name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
			$position = $user['position']; 
			$id = $user['id']; 
            $insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',   NOW(),  'Deleted a Log Report')";
				$query = mysqli_query($conn,$insert);
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	header('location: ../activity_log.php');
	
?>