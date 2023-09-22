
<?php
session_start();
if(isset($_SESSION['student'])){
  header('location:student/home.php');
}

include 'includes/conn.php';


?>

<?php include 'includes/main_header.php'?>
<?php include 'includes/menu_bar.php'?>

<body class="page-body login-page login-form-fall">



<!-- Log in Student  -->
        
<section class="content">
	<div class="login-box " style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);  -webkit-box-shadow: 0 35px 20px #777;
  -moz-box-shadow: 0 35px 20px #777;
  box-shadow: 0 35px 20px #777;">
  	
				<div class="login-box-body">
					<div class="login-box-msg"><div class="glyphicon-ring glyphicon-teal">
             <span class="fa fa-user glyphicon-bordered"></span>
						</div>
						<h5 style=" margin-bottom:-20px; margin-top:7px; font-size:23px;">Sign In</h5>

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
	  

					<form action="login_process.php" method="POST">
						
          
          <div class="form-group has-feedback mt-2 col-12" >
							<span class="glyphicon glyphicon-user form-control-feedback"></span>

							<input type="text" class="form-control effect-3 " name="email" placeholder="Enter Email" required autofocus>
              <span class="focus-border"></span>
            </div>


					<div class="form-group has-feedback mb-4 col-12">
						<input type="password" class="form-control effect-3" name="password" placeholder="Enter Password" >
            <span class="focus-border"></span>
				
          </div>
          

    	
     
    <!--<div class="col-md-6 ml-auto mb-4">-->

    <!--    <a href="forgot.php" id="to-recover" class="text-muted w-100 text-decoration-none show-btn" ><i class="fa fa-lock mr-1"></i> Forgot password?</a>-->

    <!--</div>-->

						
              <button class="btn btn-primary btn-lg btn-block mt-3" name="login" type="submit">Login</button>

               
     
					</form>

          
          </div>

</div>

</div>


<!-- End -->




</section>



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












