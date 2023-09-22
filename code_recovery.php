
<?php
  session_start();
  include 'includes/conn.php'

?>

<?php include 'includes/main_header.php'?>

<body class="page-body login-page login-form-fall">
<?php include 'includes/menu_bar.php'?>


        
<section class="content">



<!-- Forgot Password -->

<div class="login-box box-show" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);  -webkit-box-shadow: 0 35px 20px #777;
  -moz-box-shadow: 0 35px 20px #777;
  box-shadow: 0 35px 20px #777; ">
  	
				<div class="login-box-body">
					<div class="login-box-msg"><div class="glyphicon-ring glyphicon-teal">
             <span class="fa fa-user glyphicon-bordered"></span>
						</div>
						<h5 style=" margin-bottom:-20px; margin-top:7px; font-size:23px;">Reset your password</h5>

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
	  


					<form action="code_recovery.php" method="POST">
						
          <label for="cono1" class="control-label col-form-label text-muted ml-4 mt-3">Please Enter The Authentication Code</label>
          
          <div class="form-group has-feedback mb-4 col-12" >

							<input type="text" class="form-control effect-3 " name="reset_token" placeholder="A 6 Digit Code"  minlength="6" maxlength="6"  pattern="\d{6}" title="6-digit Code" required autofocus>

							<input type="hidden" class="form-control effect-3 " value="<?php echo $_SESSION['email']?>"name="email" placeholder="Enter Email" required autofocus>
              <span class="focus-border"></span>
						</div>



						
              <button class="btn btn-primary btn-lg btn-block " name="submit" type="submit">Submit</button>


              <div class="form-group mt-4" style="margin-bottom:-30px;">

<div class="col-sm-12 justify-content-center d-flex">

    <p><i class="fa fa-arrow-left"></i> Go back to <a href="index.php" id="to-login" class="text-info font-weight-normal ml-1  text-decoration-none hide-btn">Log In.</a></p>

</div>

</div>
     
					</form>

          
          </div>

</div>

</div>

<!-- end -->

</section>




<?php

if (isset($_POST['submit'])) {

date_default_timezone_set('Asia/Manila');
$date = date("Y-m-d");

$email = $_POST['email'];    
$reset_token = $_POST['reset_token'];

$sql="SELECT * FROM student WHERE email = '$email' AND resettoken = '$reset_token' AND resettokenexp = '$date'";
$result = $conn->query($sql);

if ($result) {
    
    if ($result->num_rows == 1) {
       
        $_SESSION['email'] = $email;
        $_SESSION['reset_token'] = $reset_token;
           $_SESSION['success'] = 'Create a New Password';
        echo "
        <script>
            window.location.href='update_password.php'
        </script>";

}else{
  $_SESSION['error'] = 'Code is Wrong';


    echo "
        <script>
            window.location.href='code_recovery.php'
        </script>";
}
}   

}
?>

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