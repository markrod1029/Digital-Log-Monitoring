<?php
	session_start();
	session_destroy();
	$_SESSION['success'] = 'Log Out successfully';

	header('location: index.php');
?>