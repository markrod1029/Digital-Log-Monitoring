<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];


        $sql = "SELECT * FROM admin WHERE email = '$email' || position = '$email'  ";
		$query = $conn->query($sql);

		$sql2 = "SELECT * FROM user WHERE email = '$email'";
		$query2 = $conn->query($sql2);


        $sql1 = "SELECT * FROM teacher WHERE email = '$email'";
		$query1 = $conn->query($sql1);

        if ($query->num_rows >= 1) {

            $row = $query->fetch_assoc();
			$name = $row['fname'].' '.$row['mname'].' '.$row['lname']; 
			$position = $row['position']; 
		
			if(password_verify($password, $row['password']) || $password== $row['position'] ){
				$_SESSION['admin'] = $row['id'];
				$id = $row['id'];

				$insert = "INSERT INTO activity( user_id,  name,position,  time_loged, status)
					VALUES(  '$id', '$name',  '$position',   NOW(),  'Logged in')";
					$query = mysqli_query($conn,$insert);

			}

			else{
				$_SESSION['error'] = 'Invalid Email or Password';
			}

    
        } 



        else if ($query1->num_rows >= 1) {

            $row1 = $query1->fetch_assoc();
			$name = $row1['fname'].' '.$row1['mname'].' '.$row1['lname']; 
			$position = $row1['position']; 
			if(password_verify($password, $row1['password'])){
				$_SESSION['teacher'] = $row1['id'];
				$id = $row1['id'];

				$insert = "INSERT INTO activity( user_id, name, position,  time_loged, status)
				VALUES( '$id', '$name', '$position',   NOW(),  'Logged in')";
				$query = mysqli_query($conn,$insert);

			}

			else{
				$_SESSION['error'] = 'Invalid Email or Password';
			}

    
    }



	else if ($query2->num_rows >= 1) {

		$row2 = $query2->fetch_assoc();
		if(password_verify($password, $row2['password'])){
			$_SESSION['admin'] = $row2['id'];
			$_SESSION['user'] = $row2['id'];
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