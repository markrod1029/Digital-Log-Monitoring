<?php
	include 'session.php';
	require_once "../../../libs/phpqrcode/qrlib.php";


	if(isset($_POST['save'])){

		$student_id = $_POST['student_id'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
        $street = $_POST['street'];
		$city = $_POST['city'];
		$province = $_POST['province'];
		$position = "Student";
		$gender = $_POST['gender'];
		$student = $_POST['student'];
		$password = password_hash($_POST['student_id'], PASSWORD_DEFAULT);
		
		$fileinfo=PATHINFO($_FILES["image"]["name"]);
		$newFilename=$fileinfo['filename']. "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["image"]["tmp_name"],'../../../path/images/' .$newFilename);
		$location = $newFilename;
		


		function rand_string( $length ) {
		    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		    return substr(str_shuffle($chars),0,$length);
	    }
		$pathDir = '../../../path/qrcode/'; 
		if(!is_file('../../../path/qrcode/'.$student_id.'.png'))
				$codeContents = ''.rand_string(8); 
				QRcode::png($codeContents, $pathDir.''.$student_id.'.png', QR_ECLEVEL_L, 5);
		



	$sql = "SELECT email, contact FROM student  WHERE email = '".$email."' OR contact = '".$contact."'";
	$query = $conn->query($sql);
	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);

	$row = $query->fetch_assoc();
	




	if ($count == 1 ) {
	$_SESSION['error'] = 'Have already Email Address or Contact Number ';

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
      VALUES( '$name', '$id', '$position',  NOW(),  'Added as a new User')";
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

header('location: ../student.php');