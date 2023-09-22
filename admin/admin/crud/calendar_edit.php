<?php
	include 'session.php';

    $id = $_GET['id'];
    if(isset($_POST['edit'])){
     
        $title = $_POST['title'];
        $description = $_POST['description'];
        $start_datetime = $_POST['start_datetime'];
        $end_datetime = $_POST['end_datetime'];

        extract($_POST);
$allday = isset($allday);
    
        $sql = "UPDATE `schedule_list` set `title` = '$title', `description` = '$description',
         `start_datetime` = '$start_datetime', `end_datetime` = '$end_datetime' where `id` = '$id'";
         if($conn->query($sql)){
           $_SESSION['success'] = 'Announcement Updated successfully';
           $name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
			$position = $user['position']; 
			$id = $user['id']; 
			$insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',   NOW(),  'Updated a Announcement')";
				$query = mysqli_query($conn,$insert);
    
         }
         else{
           $_SESSION['error'] = $conn->error;
         }
      }
       else{
         $_SESSION['error'] = 'Fill up edit form first';
       }

header('location: ../announcement.php');