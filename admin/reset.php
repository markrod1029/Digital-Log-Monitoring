<?php
require 'PHPMailer/class.phpmailer.php';
    require ('includes/conn.php');
    session_start();




    if (isset($_POST['send-link'])) {
         
         $email = $_POST['email'];

        $sql="SELECT * FROM admin WHERE email = '$email'";
        $result = $conn->query($sql);

        $sql="SELECT * FROM teacher WHERE email = '$email'";
        $result1 = $conn->query($sql);
    
        if ($result->num_rows >= 1) {
            
            if ($row = $result->fetch_assoc()) {
                   $fullname = $row['fname'].' '.$row['mname'].' '.$row['lname'];
                
                $numbers = '';
                for($i = 0; $i < 10; $i++){
                    $numbers .= $i;
                }
                $reset_token = substr(str_shuffle($numbers), 0, 6);

                date_default_timezone_set('Asia/Manila');
                $date = date("Y-m-d");


                $sql = "UPDATE admin SET resettoken ='$reset_token', resettokenexp = '$date' WHERE email = '$email'";

                if (($conn->query($sql)===TRUE)) {
              
                     
                    $_SESSION['success'] = 'The password reset, code has been sent to your Gmail account.';
                    $_SESSION['email'] = $email;

            $mail = new PHPMailer(true); 

        	$mail->IsSMTP();                           
        	$mail->SMTPAuth   = false;                 
        	$mail->Port       = 25;                    
        	$mail->Host       = "localhost"; 
        	$mail->Username   = "preparatory-log.online";   
        	$mail->Password   = "Markrod29";            
        
        	$mail->IsSendmail();  
        
        	$mail->From       = "preparatory-log.online";
        	$mail->FromName   = "markrodcadayong17@gmail.com";
        
        	$mail->AddAddress($email);
            $mail->Subject = 'Password Reset Code San Carlos Preparatory School';
        	$mail->WordWrap   = 80; 
        
              $mail->isHTML(true);
            $mail->Subject = 'Password Reset Code San Carlos Preparatory School';
              $mail->isHTML(true);
            $mail->Subject = 'Password Reset Code San Carlos Preparatory School';
            $mail->Body    = "Hi $fullname,<br>
            We received a request to reset your  San Carlos Preparatory School Account password.<br>
            Enter the following password reset code: '$reset_token'";
 
                 
            if(!$mail->Send())
            {
                   echo "Mail Not Sent";
                    header('location:forgot.php');
            }
            else
            {
               	echo '<script language="javascript">';
    	        echo 'alert("Thank You Contacting Us We Will Response You As Early Possible")';
    	        echo '</script>';
                 header('location:code_recovery.php');
            } 

                    }else{
                    $_SESSION['error'] = 'Something got Wrong';
                     header('location:forgot.php');

                    }

            }else{
            $_SESSION['error'] = 'Server Down';
           
                  header('location:forgot.php');
            }   


            
        }
        
        
// teacher

        else if ($result1->num_rows >= 1) {
            
          if ($row1 = $result1->fetch_assoc()) {
                 $fullname = $row1['fname'].' '.$row1['mname'].' '.$row1['lname'];
              
              $numbers = '';
              for($i = 0; $i < 10; $i++){
                  $numbers .= $i;
              }
              $reset_token = substr(str_shuffle($numbers), 0, 6);

              date_default_timezone_set('Asia/Manila');
              $date = date("Y-m-d");


              $sql = "UPDATE teacher SET resettoken ='$reset_token', resettokenexp = '$date' WHERE email = '$email'";

              if (($conn->query($sql)===TRUE)) {
                
               
                      
                    $_SESSION['success'] = 'Password reset the Code send to you Gmail';
                  $_SESSION['email'] = $email;

                  $mail = new PHPMailer(true); 

                  $mail->IsSMTP();                           
                  $mail->SMTPAuth   = false;                 
                  $mail->Port       = 25;                    
                  $mail->Host       = "localhost"; 
                  $mail->Username   = "preparatory-log.online";   
                  $mail->Password   = "Markrod29";            
                
                  $mail->IsSendmail();  
                
                  $mail->From       = "preparatory-log.online";
                  $mail->FromName   = "markrodcadayong17@gmail.com";
                
                  $mail->AddAddress($email);
                    $mail->Subject = 'Password Reset Code San Carlos Preparatory School';
                  $mail->WordWrap   = 80; 
                
                      $mail->isHTML(true);
                    $mail->Subject = 'Password Reset Code San Carlos Preparatory School';
                      $mail->isHTML(true);
                    $mail->Subject = 'Password Reset Code San Carlos Preparatory School';
                    $mail->Body    = "Hi $fullname,<br>
                    We received a request to reset your  San Carlos Preparatory School Account password.<br>
                    Enter the following password reset code: '$reset_token'";

               
          if(!$mail->Send())
          {
                 echo "Mail Not Sent";
                  header('location:forgot.php');
          }
          else
          {
               echo '<script language="javascript">';
            echo 'alert("Thank You Contacting Us We Will Response You As Early Possible")';
            echo '</script>';
               header('location:code_recovery.php');
          } 

                  }else{
                  $_SESSION['error'] = 'Something got Wrong';
                   header('location:forgot.php');

                  }

          }else{
          $_SESSION['error'] = 'Server Down';
         
                header('location:forgot.php');
          }   


          
      }



        else{
  
            $_SESSION['error'] = 'Email Address Not Found';
          header('location:forgot.php');

        }
        
        
    
        	
}        	    
        