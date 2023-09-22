<?php 
require_once('session.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No data to save.'); location.replace('../calendar.php') </script>";
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

if(empty($id)){
    $sql = "INSERT INTO `schedule_list` (`title`,`description`,`start_datetime`,`end_datetime`) VALUES ('$title','$description','$start_datetime','$end_datetime')";

    $name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
    $position = $user['position']; 
    $id = $user['id']; 
    $insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',  NOW(),  'Added a new Announcement')";
        $query = mysqli_query($conn,$insert);

}

else{
    $_SESSION['error'] = $conn->error;

}
$save = $conn->query($sql);
if($save){
    	$_SESSION['success'] = 'Announcement added successfully';
}else{
    $_SESSION['error'] = $conn->error;


    
   
}
$conn->close();

header('location: ../announcement.php');

?>