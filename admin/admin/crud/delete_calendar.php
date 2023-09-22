<?php 
require_once('session.php');

if(!isset($_GET['id'])){
    echo "<script> alert('Undefined Schedule ID.'); location.replace('schedule') </script>";
    $conn->close();
    exit;
}

$delete = $conn->query("DELETE FROM `schedule_list` where id = '{$_GET['id']}'");
if($delete){
    $_SESSION['success'] = 'Announcement Deleted successfully';

    $name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
    $position = $user['position']; 
    $id = $user['id']; 
    $insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',    NOW(),  'Delete a  Announcement')";
        $query = mysqli_query($conn,$insert);


}else{
    $_SESSION['error'] = $conn->error;

}
$conn->close();

header('location: ../announcement.php');

?>