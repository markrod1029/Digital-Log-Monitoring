<?php
	include 'session.php';

    $ID = $_GET['id'];
    if(isset($_POST['save'])){
     
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $province = $_POST['province'];
       
        $fileinfo=PATHINFO($_FILES["image"]["name"]);
        $newFilename=$fileinfo['filename']. "." . $fileinfo['extension'];
        move_uploaded_file($_FILES["image"]["tmp_name"],'../../../path/images/' .$newFilename);
        $location = $newFilename;
  
  
  

        if(empty($location)|| $location == '.'){
          $sql = "UPDATE teacher SET  fname = '$fname', lname = '$lname', 
          email = '$email', contact = '$contact', street = '$street', city = '$city', province = '$province' WHERE id = '$ID'";
 
        }

        else{

          $sql = "UPDATE teacher SET photo = '$location', fname = '$fname', lname = '$lname', 
          email = '$email', contact = '$contact', street = '$street', city = '$city', province = '$province' WHERE id = '$ID'";
 
        }
            if($conn->query($sql)){
           $_SESSION['success'] = 'Admin updated successfully';
           
           $name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
           $position = $user['position']; 
           $id = $user['id']; 
           $insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',   NOW(),  'Updated his Profile Info')";
             $query = mysqli_query($conn,$insert);
    
         }
         else{
           $_SESSION['error'] = $conn->error;
         }
       }



     
       else{
         $_SESSION['error'] = 'Fill up edit form first';
       }



       header('location: ../my_profile.php');

    
         
