<?php
	include 'session.php';
  	require_once "../../libs/phpqrcode/qrlib.php";

    $id = $_GET['id'];
    if(isset($_POST['edit'])){
     
  		  $student_id = $_POST['student_id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $contact = $_POST['contact']; 
        $email = $_POST['email'];
        $password = password_hash($_POST['student_id'], PASSWORD_DEFAULT);
        $student = $_POST['student'];


        function rand_string( $length ) {
          $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
          return substr(str_shuffle($chars),0,$length);
        }
      $pathDir = '../images/'; 
      if(!is_file('../../images/'.$student_id.'.png'))
          $codeContents = ''.rand_string(8); 
          QRcode::png($codeContents, $pathDir.''.$student_id.'.png', QR_ECLEVEL_L, 5);
      
         $sql = "UPDATE student SET student_id = '$student_id', qrcode = '$codeContents', fname = '$fname', mname = '$mname', lname = '$lname', email = '$email', contact = '$contact', 
        password = '$password', schedule_id = '$student' WHERE id = '$id'";
         $name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
         $position = $user['position']; 
         $id = $user['id']; 
         $insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',  NOW(),  'Updated a User')";
           $query = mysqli_query($conn,$insert);
         
        

         if($conn->query($sql)){
           $_SESSION['success'] = 'Student updated successfully';
    
         }
         else{
           $_SESSION['error'] = $conn->error;
         }
       }
       else{
         $_SESSION['error'] = 'Fill up edit form first';
       }

       header('location: ../student.php');