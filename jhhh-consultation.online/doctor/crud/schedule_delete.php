
<?php
	include 'conn.php';
	
	$id = $_GET['id'];
		$sql = "DELETE FROM doctor_schedule_table WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	header('location: ../availavility.php');
	
?>