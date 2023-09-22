<?php
	include 'session.php';

    $ID = $_GET['id'];
    if(isset($_POST['edit'])){
      
        $employee_id = $_POST['employee_id'];
$fname = htmlspecialchars( $_POST['fname'], ENT_QUOTES, 'UTF-8');
$mname = htmlspecialchars( $_POST['mname'], ENT_QUOTES, 'UTF-8');
$lname = htmlspecialchars( $_POST['lname'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars( $_POST['email'], ENT_QUOTES, 'UTF-8');
$contact = htmlspecialchars( $_POST['contact'], ENT_QUOTES, 'UTF-8');
$position = htmlspecialchars( $_POST['position'], ENT_QUOTES, 'UTF-8');
    $password = password_hash($_POST['employee_id'], PASSWORD_DEFAULT);
        $student = $_POST['student'];



    
         $sql = "UPDATE teacher SET  employee_id = '$employee_id', fname = '$fname', mname = '$mname', lname = '$lname', 
         email = '$email', position = '$position', contact = '$contact', password = '$password' , student = '$student' WHERE id = '$ID'";
         if($conn->query($sql)){
           $_SESSION['success'] = 'Teacher updated successfully';
           $name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
           $position = $user['position']; 
           $id = $user['id']; 
           $insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',  NOW(),  'Updated his profile info')";
             $query = mysqli_query($conn,$insert);
    
         }
         else{
           $_SESSION['error'] = $conn->error;
         }
       }
       else{
         $_SESSION['error'] = 'Fill up edit form first';
       }

header('location: ../teacher.php');