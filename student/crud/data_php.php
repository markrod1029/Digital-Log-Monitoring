<?php
	include 'session.php';

	if(isset($_POST['save'])){
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$position = $_POST['position'];
		$position = mysqli_real_escape_string($conn, $position);
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		$sql1 = "INSERT INTO user(email, password, position) VALUES ('$email', '$password', '$position')"; 
		$fire = mysqli_query($conn, $sql1) or die('Query is failed'. mysqli_error($conn));

		$sql = "INSERT INTO admin(fname, mname, lname, contact, position, gender, photo,  user_id) 
		VALUES ('$fname', '$mname', '$lname', '$contact', '$position', '$gender', '$filename', Last_Insert_ID() )";

		

		if($conn->query($sql)){
			$_SESSION['success'] = 'Teacher added successfully';



		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

    