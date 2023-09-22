<?php
	include 'session.php';

	if(isset($_POST['save'])){
// 		$employee_id = $_POST['employee_id'];
		
	
	


$fname = htmlspecialchars( $_POST['fname'], ENT_QUOTES, 'UTF-8');
$mname = htmlspecialchars( $_POST['mname'], ENT_QUOTES, 'UTF-8');
$lname = htmlspecialchars( $_POST['lname'], ENT_QUOTES, 'UTF-8');	
$email = htmlspecialchars( $_POST['email'], ENT_QUOTES, 'UTF-8');
$contact = htmlspecialchars( $_POST['contact'], ENT_QUOTES, 'UTF-8');
$position = htmlspecialchars( $_POST['position'], ENT_QUOTES, 'UTF-8');	
$city = htmlspecialchars( $_POST['city'], ENT_QUOTES, 'UTF-8');
$province = htmlspecialchars( $_POST['province'], ENT_QUOTES, 'UTF-8');
$gender = htmlspecialchars( $_POST['gender'], ENT_QUOTES, 'UTF-8');	
$teacher = htmlspecialchars( $_POST['teacher'], ENT_QUOTES, 'UTF-8');
$student = $_POST['student'];
		



			$fileinfo=PATHINFO($_FILES["image"]["name"]);
			$newFilename=$fileinfo['filename']. "." . $fileinfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"],'../../../path/images/' .$newFilename);
			$location = $newFilename;
			

		
		

		$sql = "SELECT email, contact FROM teacher  WHERE email = '".$email."' OR contact = '".$employee_id."'";
		$query = $conn->query($sql);
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		
		$sql1 = "SELECT *  FROM teacher";
		$query1 = $conn->query($sql1);
		 while($row = $query1->fetch_assoc()){
		
		
        $latest_id = $row['employee_id'];
		 }
        // Extract the numeric portion of the latest ID
        $latest_num = substr($latest_id, 8);
        
        // Set the initial counter value
        $counter = intval($latest_num) + 1;
        
        // Generate a unique ID with the current year
        $year = date('y');
        $employee_id = 'PST-' . $year . '-' . str_pad($counter, 4, '0', STR_PAD_LEFT);
        $password = password_hash($employee_id, PASSWORD_DEFAULT);
		
		
	
		if ($count == 1 ) {
		$_SESSION['error'] = 'Have already Email Address or Employee ID';

		}
		
		else{
		
		$insert = "INSERT INTO teacher(employee_id, photo, fname, mname, lname, email, contact, position, gender,  password, student, created_at) 
		VALUES ('$employee_id', '$location',  '$fname', '$mname', '$lname', '$email', '$contact', '$position', '$gender', '$password','	$student',NOW())";
		if($conn->query($insert)){
			$_SESSION['success'] = 'Teacher added successfully';
			$name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
			$position = $user['position']; 
			$id = $user['id']; 
			$insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',  NOW(),  'Added as a new Staff')";
				$query = mysqli_query($conn,$insert);
		}
		else{
			$_SESSION['error'] = $conn->error;
		}


	}


}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	
header('location: ../teacher.php');