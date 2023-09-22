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


error_reporting(0);

// (B) READ UPLOADED CSV

$fh = fopen($_FILES["upcsv"]["tmp_name"], "r");
if ($fh === false) { exit("Failed to open uploaded CSV file"); }

// (C) IMPORT ROW BY ROW
while (($row = fgetcsv($fh)) !== false) {
  try {
    // print_r($row);
    $stmt = $pdo->prepare("INSERT INTO student( student_id, qrcode, fname, mname, lname, email, contact, street, city, province, position, gender, password,  schedule_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
require_once "../../../libs/phpqrcode/qrlib.php";
   



    function rand_string( $length ) {
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      return substr(str_shuffle($chars),0,$length);
    }
  $pathDir = '../../../path/qrcode/'; 
  if(!is_file('../../path/qrcode/'.$row[0].'.png'))
      $codeContents = ''.rand_string(8); 
      QRcode::png($codeContents, $pathDir.''.$row[0].'.png', QR_ECLEVEL_L, 5);
  

   
    $stmt->execute([$row[0], $codeContents, $row[2],$row[3],$row[4],$row[5],$row[6],$row[7], $row[8],$row[9],$row[10],$row[11],password_hash($row[12], PASSWORD_DEFAULT),$row[13]]);
    echo "<html><head><script>alert('Import Teacher CSV Already Added');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../student.php'>";
  
  
  
  } catch (Exception $ex) { echo $ex->getmessage(); }
}
fclose($fh);
echo "DONE."; 

