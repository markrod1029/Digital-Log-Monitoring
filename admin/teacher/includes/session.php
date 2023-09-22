<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_SESSION['teacher'])){

	if(!isset($_SESSION['teacher']) || trim($_SESSION['teacher']) == ''){
		header('location: home.php');
	}

	$sql = "SELECT * FROM teacher WHERE id = '".$_SESSION['teacher']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();

	
}

else{

	header('location:../error.php');

}
	
?>