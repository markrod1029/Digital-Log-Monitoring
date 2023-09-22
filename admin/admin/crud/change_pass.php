
<?php
 
include 'session.php';
 
 $ID = $_GET['id'];

    if (isset($_POST["save"]))
    {
        // Get all input fields
        $current_password = $_POST["old"];
        $new_password = $_POST["new"];
        $confirm_password = $_POST["confirm"];
 
        // Check if current password is correct
        $sql = "SELECT * FROM admin WHERE id = '" . $ID . "'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_object($result);
         
        if (password_verify($current_password, $row->password))
        {
            // Check if password is same
            if ($new_password == $confirm_password)
            {
                if($new_password == $current_password && $current_password ==  $confirm_password){
                    $_SESSION['error'] = 'Password Already use in Current Password';
        
                }

                else{

                    $sql = "UPDATE admin SET password = '" . password_hash($new_password, PASSWORD_DEFAULT) . "' WHERE id = '" . $ID . "'";
                    mysqli_query($conn, $sql);
     
                    $_SESSION['success'] = 'Password has been changed';

                    $name = $user['fname'].' '.$user['mname'].' '.$user['lname']; 
				$position = $user['position']; 
			$id = $user['id']; 
            $insert = "INSERT INTO activity( name,user_id, position,  time_loged, status)
      VALUES( '$name', '$id', '$position',   NOW(),  'Updated his password')";
					$query = mysqli_query($conn,$insert);


                }

               
            }
            else
            {
                $_SESSION['error'] = 'New and Confirm Password does not match';
            }
        }

        
        else
        {
            $_SESSION['error'] = 'Current Password is not correct';

        }
    }

header('location: ../my_profile.php');

?>