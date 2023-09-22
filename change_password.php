
<?php
	session_start();
include 'includes/conn.php';

    if (isset($_POST["update"]))
    {
         // Get all input fields
        $email = $_POST['email'];

        $new_password = $_POST["new"];
        $confirm_password = $_POST["confirm"];

        echo $email;
  
         // Check if current password is correct
         $sql = "SELECT * FROM student WHERE email = '" . $email . "'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_object($result);

             // Check if password is same
            if ($new_password == $confirm_password)
            {

                

                    $update = "UPDATE student SET password='$new_password',resettoken='NULL',resettokenexp=NULL WHERE email = '$email'";
                    mysqli_query($conn, $sql);

                if ($conn->query($update)===TRUE) {

                    $_SESSION['success'] = 'Password has been changed';
                    $_SESSION['change'] = $row['id'];

                    echo $row['id'];
                    header('location:index.php');

                }

                else{

			    $_SESSION['error'] = $conn->error;

                }


                
            }
            else
            {
                $_SESSION['error'] = 'New and Confirm Password does not match';

            }
        
    }
    header('location:update_password.phpemail=echo$email');

    




?>