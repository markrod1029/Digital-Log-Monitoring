

<?php
  session_start();
  if(isset($_SESSION['change'])){
    header('location:index.php');
  }

?>




<?php include 'includes/main_header.php'?>
<?php include 'includes/conn.php'?>


<body class="page-body login-page login-form-fall">


<?php include 'includes/menu_bar.php'?>


<section class="content">

<div class="login-box " style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);  -webkit-box-shadow: 0 35px 20px #777;
  -moz-box-shadow: 0 35px 20px #777;
  box-shadow: 0 35px 20px #777;">
  	
				<div class="login-box-body">
					<div class="login-box-msg"><div class="glyphicon-ring glyphicon-teal">
             <span class="fa fa-user glyphicon-bordered"></span>
						</div>
						<h5 style=" margin-bottom:-20px; margin-top:7px; font-size:23px;">Creat New Password</h5>

					</div>
				
          <?php
        if(isset($_SESSION['error'])){
          echo " <br>
            <div class='alert alert-danger alert-dismissible'>
              ".$_SESSION['error']."
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            </div>
          ";;
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              ".$_SESSION['success']."
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
	  

	  


					<form action="update_password.php" method="POST">
						
          
               


					<div class="form-group has-feedback mt-4 mb-4  col-12">
						<input type="password" class="form-control effect-3" name="new" placeholder="Enter New Password" >
						<span class="focus-border"></span>
					
					</div>

            		
					<div class="form-group has-feedback mb-4 col-12">
						<input type="password" class="form-control  effect-3" name="confirm" placeholder="Enter Confirm Password" >
						<span class="focus-border"></span>

					</div>
          
                    <input type="hidden" name="email" class="form-control" value='<?php echo $_SESSION['email'] ?>'>


						
              <button class="btn btn-primary btn-lg btn-block mt-3" name="update" type="submit">Submit</button>

               
     
					</form>

          
          </div>

</div>

</div>
</section>


<?php




if (isset($_POST["update"]))
{
     // Get all input fields
    $email = $_POST['email'];

    $new_password = $_POST["new"];
    $confirm_password = $_POST["confirm"];


     // Check if current password is correct
     $sql = "SELECT * FROM admin WHERE email = '" . $email . "'";
    $result = mysqli_query($conn, $sql);


    $sql = "SELECT * FROM teacher WHERE email = '" . $email . "'";
    $result1 = mysqli_query($conn, $sql);


         // Check if password is same
        if ($new_password == $confirm_password)
        {

          if ($row = $result->fetch_assoc()) {

                $update = "UPDATE admin SET password='" . password_hash($new_password, PASSWORD_DEFAULT) . "',resettoken='NULL',resettokenexp=NULL WHERE email = '$email'";
                mysqli_query($conn, $sql);

            if ($conn->query($update)===TRUE) {

                $_SESSION['success'] = 'Password has been changed';

                echo "
                <script>
                window.location.href='index.php'                     
                </script>";

            }

            else{

            $_SESSION['error'] = $conn->error;

            }
          }


          else if ($row1 = $result1->fetch_assoc()) {

            $update = "UPDATE teacher SET password='" . password_hash($new_password, PASSWORD_DEFAULT) . "',resettoken='NULL',resettokenexp=NULL WHERE email = '$email'";
            mysqli_query($conn, $sql);

        if ($conn->query($update)===TRUE) {

            $_SESSION['success'] = 'Password has been changed';

            echo "
            <script>
            window.location.href='index.php'                     
            </script>";

        }

        else{

        $_SESSION['error'] = $conn->error;

        }
      }




            
        }
        else
        {
            $_SESSION['error'] = 'New and Confirm Password does not match';

        }
    
}
?>
<!-- End -->




<style>




.effect-3~.focus-border {
	position: absolute;
	bottom: 0;
	left: 10px;
	width: 100%;
	height: 2px;
	z-index: 99;
}
 
.effect-3~.focus-border:before,
.effect-3~.focus-border:after {
	content: "";
	position: absolute;
	bottom: 0;
	left: 0;
	width: 0;
	height: 100%;
	background-color: #3399FF;
	transition: 0.4s;
}
 
.effect-3~.focus-border:after {
	left: auto;
	right: 10px;
}
 
.effect-3:focus~.focus-border:before,
.effect-3:focus~.focus-border:after {
	width: 50%;
	transition: 0.4s;
}


  </style>
