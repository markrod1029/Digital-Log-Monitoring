<?php
	include 'session.php';
	require_once "../../../libs/phpqrcode/qrlib.php";

		require 'PHPMailer/class.phpmailer.php';
   
	if(isset($_POST['save'])){

// 		$student_id = $_POST['student_id'];

$fname = htmlspecialchars( $_POST['fname'], ENT_QUOTES, 'UTF-8');
$mname = htmlspecialchars( $_POST['mname'], ENT_QUOTES, 'UTF-8');
$lname = htmlspecialchars( $_POST['lname'], ENT_QUOTES, 'UTF-8');	
$email = htmlspecialchars( $_POST['email'], ENT_QUOTES, 'UTF-8');
$contact = htmlspecialchars( $_POST['contact'], ENT_QUOTES, 'UTF-8');
$street = htmlspecialchars( $_POST['street'], ENT_QUOTES, 'UTF-8');	
$city = htmlspecialchars( $_POST['city'], ENT_QUOTES, 'UTF-8');
$province = htmlspecialchars( $_POST['province'], ENT_QUOTES, 'UTF-8');
$gender = htmlspecialchars( $_POST['gender'], ENT_QUOTES, 'UTF-8');	
$student = htmlspecialchars( $_POST['student'], ENT_QUOTES, 'UTF-8');
$position = "Student";
		
		$fullname = $fname.' '.$mname.' '.$lname;
    



			$fileinfo=PATHINFO($_FILES["image"]["name"]);
			$newFilename=$fileinfo['filename']. "." . $fileinfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"],'../../../path/images/' .$newFilename);
			$location = $newFilename;



	$sql1 = "SELECT * FROM student ";
	$query1 = $conn->query($sql1);
	  while($row = $query1->fetch_assoc()){

$latest_id = $row['student_id'];

}

// Extract the numeric portion of the latest ID
$latest_num = substr($latest_id, 8);

// Set the initial counter value
$counter = intval($latest_num) + 1;

// Generate a unique ID with the current year
$year = date('y');
$student_id = 'PSS-' . $year . '-' . str_pad($counter, 4, '0', STR_PAD_LEFT);


				function generatePassword($length = 8) {
  // Define the characters that will be used to generate the password
  $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

  // Shuffle the characters randomly
  $shuffled_chars = str_shuffle($chars);

  // Take the first $length characters from the shuffled string as the password
  $password = substr($shuffled_chars, 0, $length);

  // Return the generated password
  return $password;
}

// Generate an 8-character password
$pass = generatePassword();

 $password = password_hash($pass, PASSWORD_DEFAULT);



      
        function rand_string( $length ) {
          $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
          return substr(str_shuffle($chars),0,$length);
        }
      $pathDir = '../../../path/qrcode/'; 
      if(!is_file('../../path/qrcode/'.$student_id.'.png'))
          $codeContents = ''.rand_string(8); 
          QRcode::png($codeContents, $pathDir.''.$student_id.'.png', QR_ECLEVEL_L, 5);
      


	$sql = "SELECT email, contact FROM student  WHERE email = '".$email."' OR contact = '".$contact."'";
	$query = $conn->query($sql);
	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);

	if ($count == 1 ) {
	$_SESSION['error'] = 'Have already Email Address or Student ID ';

	} 
	
	else{

		$insert = "INSERT INTO student( student_id, photo, qrcode, fname, mname, lname, email, contact, street, city, province, position, gender, password,  schedule_id, created_at)
		VALUES( '$student_id', '$location', '$codeContents', '$fname', '$mname', '$lname', '$email', '$contact', '$street', '$city', '$province', '$position', '$gender',  '$password',  '$student', NOW())";
		$query = mysqli_query($conn,$insert);
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student added successfully';

			$name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
			$position = $user['position']; 
			$id = $user['id']; 
			$insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',    NOW(),  'Added as a new User')";
				$query = mysqli_query($conn,$insert);
				
				
				


				
				
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
        	$mail->WordWrap   = 80; 
              $mail->isHTML(true);
            $mail->Subject = 'Digital Log Monitoring (Account Notification)';
            $mail->Body    = "Hi $fullname,<br><br>
           We are writing to confirm that you already have an account with San Carlos Preparatory School. You can log in to your account using the following credentials:<br>
           Email: $email<br>
           Password:$pass<br><br>
           If you have forgotten your password, you can reset it by clicking on the 'Forgot Password' link on the login page.<br>
            Thank you for being a part of the San Carlos Preparatory School community. If you have any questions or concerns, please do not hesitate to contact us.
            <br><br>Best regards,
            <br>San Carlos Preparatory School";
 
                 
            if(!$mail->Send())
            {
                   echo "Mail Not Sent";
                  
            }
            else
            {
                echo "Mail Sent";
                

            } 






		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

header('location: ../student.php');