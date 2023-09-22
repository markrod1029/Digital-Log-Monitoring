<?php
	$conn = new mysqli('localhost', 'digital_log', 'digital_log_db', 'digital_log_db');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>