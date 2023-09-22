<?php include('header.php'); ?>

<?php include('link.php'); ?>
<body id="login">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <div class="title_index">

                </div>
            </div>
            <div class="span6">
                <div class="pull-right">
                    <form id="signin_student" class="form-signin" method="post">
                        <h3 class="form-signin-heading"><i class="icon-lock"></i> Reset Password </h3>
                        <input type="text" class="input-block-level" id="remail" name="remail" placeholder="Email Address" required>
                        <button id="forgotpass" name="submit" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i> Submit</button>
                    </form>
                    <a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Click here to Login</a>

                    <?php
                    include('admin/dbcon.php');
                    // This code runs if the form has been submitted
                    if (isset($_POST['submit'])) {

                        // Check for valid email address
                        $email = $_POST['remail'];
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $error[] = 'Please enter a valid email address';
                        }

                        // Check if the email exists in the database
                        // Assuming you have a database connection object named $conn
                        $check = mysqli_query($conn, "SELECT email, username FROM student WHERE email = '$email'") or die(mysqli_error($conn));
                        $check2 = mysqli_num_rows($check);

                        // If the email does not exist, give an error
                        if ($check2 == 0) {
                            $error[] = 'Sorry, we cannot find your account details. Please try another email address.';
                        } else {
                            $row = mysqli_fetch_assoc($check);
                            $username = $row['firstname'];

                            // Create a new random password
                            $password = substr(uniqid(rand(), 1), 3, 10);
                            
                            

                            // Send email
                            $from = "urbiztondois@uislms.online";
                            $to = $email;
                            $subject = "Request For New Password";
                            $message = "Hi $username,\n\nYou or someone else have requested to reset your password.\n\n Please keep your new password below as you may need this at a later stage.\n\nYour password is $password\n\n Please login and change your password to something more memorable.\n\nRegards,\nSite Admin";
                            $headers = "From: " . $from . "\r\n" .
                                "Reply-To: " . $from . "\r\n" .
                                "X-Mailer: PHP/" . phpversion();

                            mail($to, $subject, $message, $headers);

                            // Update database
                            // Assuming you have a database connection object named $conn
                            $sql = mysqli_query($conn, "UPDATE student SET password='$password' WHERE email = '$email'") or die(mysqli_error($conn));
                            $rsent = true;
                        }
                    }

                    // Show any errors
                    if (!empty($error)) {
                        $i = 0;
                        echo '<div class="alert alert-danger">';
                        echo '<strong>Error:</strong> ';
                        foreach ($error as $key => $value) {
                            echo $value . '<br>';
                        }
                        echo '</div>';
                    }

                    // Show success message if password was reset and email sent
                    if (isset($rsent) && $rsent == true) {
                        echo '<div class="alert alert-success">';
                        echo '<strong>Success:</strong> Your password has been reset. Please check your email for the new password.';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('script.php'); ?>
</body>
</html>

