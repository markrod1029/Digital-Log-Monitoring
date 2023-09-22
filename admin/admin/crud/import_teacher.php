<?php
// (A) CONNECT TO DATABASE - CHANGE SETTINGS TO YOUR OWN!
$dbHost = "localhost";
$dbName = "digital_log_db";
$dbChar = "utf8";
$dbUser = "digital_log";
$dbPass = "digital_log_db";
try {
  $pdo = new PDO(
    "mysql:host=".$dbHost.";dbname=".$dbName.";charset=".$dbChar,
    $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch (Exception $ex) { exit($ex->getMessage()); }

// (B) READ UPLOADED CSV
$fh = fopen($_FILES["upcsv"]["tmp_name"], "r");
if ($fh === false) { exit("Failed to open uploaded CSV file"); }



// (C) IMPORT ROW BY ROW
while (($row = fgetcsv($fh)) !== false) {
  try {
    // print_r($row);
    
    
  
    $stmt = $pdo->prepare("INSERT INTO `teacher` (employee_id,fname, mname, lname, email, contact, position, gender, password) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->execute([$row[0],$row[1], $row[2],$row[3],$row[4],$row[5],$row[6],$row[7], password_hash($row[8], PASSWORD_DEFAULT)]);
 
 
    $_SESSION['success'] = 'Teacher added successfully';
    echo "<html><head><script>alert('Import Teacher CSV Already Added');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../teacher.php'>";
   } catch (Exception $ex) { echo $ex->getmessage(); }
}
fclose($fh);

header('location: ../teacher.php');

