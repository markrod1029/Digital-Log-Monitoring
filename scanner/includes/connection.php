<?php 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$conn = new mysqli('localhost', 'digital_log', 'digital_log_db', 'digital_log_db');
	if($conn->connect_error) {
	  exit('Error connecting to database'); //Should be a message a typical user could understand in production
	}

?>



