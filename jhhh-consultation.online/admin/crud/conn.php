<?php
	$conn = new mysqli('localhost', 'appointment', 'doctor_appointment', 'doctor_appointment');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>