<?php
	include 'includes/session.php';

  
    $id = $_GET['id'];
    $query = "SELECT * from student where id = '$id'";



	$location	= $_POST['location'];


        
        $sql = "UPDATE student SET  location = '$location' WHERE id = '$id'";

    
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student Undo successfully';

            $query = mysqli_query($conn,$sql);
		}
        
		else{
			$_SESSION['error'] = $conn->error;
		}


        header('location: attendance.php');
