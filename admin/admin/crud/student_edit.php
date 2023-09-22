<?php
	include 'session.php';
  	require_once "../../../libs/phpqrcode/qrlib.php";

    $id = $_GET['id'];
    if(isset($_POST['edit'])){
     


$fname = htmlspecialchars( $_POST['fname'], ENT_QUOTES, 'UTF-8');
$mname = htmlspecialchars( $_POST['mname'], ENT_QUOTES, 'UTF-8');
$lname = htmlspecialchars( $_POST['lname'], ENT_QUOTES, 'UTF-8');	
$email = htmlspecialchars( $_POST['email'], ENT_QUOTES, 'UTF-8');
$contact = htmlspecialchars( $_POST['contact'], ENT_QUOTES, 'UTF-8');
$student = htmlspecialchars( $_POST['student'], ENT_QUOTES, 'UTF-8');
$student_id = $_POST['student_id'];
$password = password_hash($_POST['student_id'], PASSWORD_DEFAULT);
   
	
	
	

        function rand_string( $length ) {
          $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
          return substr(str_shuffle($chars),0,$length);
        }
      $pathDir = '../../../path/qrcode/'; 
      if(!is_file('../../path/qrcode/'.$student_id.'.png'))
          $codeContents = ''.rand_string(8); 
          QRcode::png($codeContents, $pathDir.''.$student_id.'.png', QR_ECLEVEL_L, 5);
      
 

  
          
         $sql = "UPDATE student SET student_id = '$student_id',fname = '$fname', mname = '$mname', lname = '$lname', email = '$email', contact = '$contact', 
        password = '$password', schedule_id = '$student' WHERE id = '$id'";
         
        

         if($conn->query($sql)){
           $_SESSION['success'] = 'Student updated successfully';
           $name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
			$position = $user['position']; 
      $id = $user['id']; 
      $insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',  NOW(),  'Updated a User')";
				$query = mysqli_query($conn,$insert);
    
         }
         else{
           $_SESSION['error'] = $conn->error;
         }
       }
       else{
         $_SESSION['error'] = 'Fill up edit form first';
       }
       header('location: ../student.php');
