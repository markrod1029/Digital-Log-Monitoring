
	<?php
		$num_correct = 0;
		for ($i = 0; $i < count($answer_key); $i++) {
			if ($answer_key[$i] == $answers[$i]) {
				$num_correct++;
			}
		}
		$score = ($num_correct / count($answer_key)) * 100;
		echo "<p>" . $score . "/". $ ."%</p>";
	?>

<?php

$student_name = $_POST['student_name'];
$score = $_POST['score'];

// Insert data into table
$sql = "INSERT INTO grade (student_name, score) VALUES ('$student_name', '$score')";

if ($conn->query($sql) === TRUE) {
   echo "Score added successfully";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
