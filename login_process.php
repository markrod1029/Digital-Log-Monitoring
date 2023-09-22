<?php
	session_start();
	include 'includes/conn.php';
$currentDateTime = new DateTime('now', new DateTimeZone('Asia/Manila'));
$currentTimeFormatted = $currentDateTime->format('H:i:s');

// Convert formatted time to DateTime object
$timeObject = DateTime::createFromFormat('H:i:s', $currentTimeFormatted);

// Now you can use $timeObject as a DateTime object
$date = $timeObject->format('Y-m-d H:i:s');

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];


        $sql = "SELECT * FROM student WHERE email = '$email' || position = '$email' ";
		$query = $conn->query($sql);

        if ($query->num_rows >= 1) {

            $row = $query->fetch_assoc();
			$name = $row['fname'].' '.$row['mname'].' '.$row['lname']; 
			$position = $row['position']; 

			if(password_verify($password, $row['password'])){
				$_SESSION['student'] = $row['id'];
				$id = $row['id'];

				
				$insert = "INSERT INTO activity( name,  user_id,  position, time_loged, status)
					VALUES( '$name',  '$id',  '$position',  '$date',  'Logged in')";
					$query = mysqli_query($conn,$insert);
			}

			else{
				$_SESSION['error'] = 'Invalid Email or Password';
			}

    
        } 


    else{
        $_SESSION['error'] = 'Invalid Email or Password';


    }
}



	header('location: index.php');

?>