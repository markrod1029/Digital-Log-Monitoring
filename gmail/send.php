<?php
require 'PHPMailer/class.phpmailer.php';

if(isset($_POST['send']))
{     
            $name=$_POST['name'];
            $email=$_POST['email'];
            $msg=$_POST['message'];
            $subject=$_POST['subject'];
    
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
            $mail->Subject  = $subject;
        	$mail->WordWrap   = 80; 
        
              $mail->isHTML(true);
            $mail->Subject = 'Password Reset Code San Carlos Preparatory School';
            $mail->Body    = "Hi ".$fullname.",<br>
            We received a request to reset your  San Carlos Preparatory School Account password.<br>
            Enter the following password reset code: $reset_token'";
            $mail->send();
                 
            if(!$mail->Send())
            {
                   echo "Mail Not Sent";
            }
            else
            {
               	echo '<script language="javascript">';
    	        echo 'alert("Thank You Contacting Us We Will Response You As Early Possible")';
    	        echo '</script>';
         
            } 
        	
}        	    
        