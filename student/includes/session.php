<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_SESSION['student'])){

	if(!isset($_SESSION['student']) || trim($_SESSION['student']) == ''){
		header('location: home.php');
	}

	$sql = "SELECT * FROM student WHERE id = '".$_SESSION['student']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
	
}

else{

	header('location: ../error.php');

}
?>