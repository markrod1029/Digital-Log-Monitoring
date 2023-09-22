<?php
	include 'session.php';

    $id = $_GET['id'];
    if(isset($_POST['edit'])){
     
  	$am_time_in = $_POST['time_in_morning'];
		$am_time_out = $_POST['time_out_morning'];
		$pm_time_in = $_POST['time_in_afternoon'];
		$pm_time_out = $_POST['time_out_afternoon'];

       
    
    
        
    
         $sql = "UPDATE schedules SET  time_in_morning = '$am_time_in', time_out_morning = '$am_time_out', time_in_afternoon = '$pm_time_in', time_out_afternoon = '$pm_time_out'
         WHERE id = '$id'";
         if($conn->query($sql)){
           $_SESSION['success'] = 'Schedules updated successfully';
           $name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
			$position = $user['position']; 
      $id = $user['id']; 
      $insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',   NOW(),  'Updated a schedules')";
				$query = mysqli_query($conn,$insert);
    
         }
         else{
           $_SESSION['error'] = $conn->error;
         }
      }
       else{
         $_SESSION['error'] = 'Fill up edit form first';
       }

header('location: ../schedule.php');