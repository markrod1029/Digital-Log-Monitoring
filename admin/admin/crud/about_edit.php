<?php
	include 'session.php';

    $id = $_GET['id'];
    if(isset($_POST['edit'])){
     
        $about = $_POST['about'];

       
    
    
         $sql = "UPDATE  aboutus SET about = '$about' WHERE id = '$id'";
         if($conn->query($sql)){
           $_SESSION['success'] = 'About Updated successfully';
           $name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
			$position = $user['position']; 
      $id = $user['id']; 
      $insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',  NOW(),  'Updated a About')";
				$query = mysqli_query($conn,$insert);
    
         }
         else{
           $_SESSION['error'] = $conn->error;
         }
      }
       else{
         $_SESSION['error'] = 'Fill up edit form first';
       }

header('location: ../aboutus.php');