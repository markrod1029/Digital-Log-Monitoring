<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Student Information
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Student</li>
                </ol>
              </div>
    </div>
        </section>



        <div class="content">


        
        <?php
$ID = $_GET['id'];
 $view = "SELECT * from student where id = '$ID'";
 $result = $conn->query($view);
 $user = $result->fetch_assoc();
 
 ?>
            <div class="row">
                <div class="col-lg-4 col-xlg-3">
                        <div div class="small-box bg-default" style ="background-color:white;">
                            <div class="card-body">
                                <center class="mt-4"> 
                                <img id="imageResult" height="150" width="150" src="<?php echo (!empty($user['photo'])) ? '../../images/'.$user['photo'] : '../../images/profile.jpg'; ?>" class="img-circle " alt="User Image" width="150">
   
                                    
                            <h4 class="card-subtitle  mt-2"><?php echo $user['fname'].' '.$user['lname']; ?></h4>
                            <h5 class="card-subtitle"><?php echo $user['position'] ?></h5>
    
                            </div>
                                <hr>
                            <div class="card-body text-center">                                
                             <img id="imageResult" height="150" width="150" src="<?php echo (!empty($user['qrcode'])) ? '../../images/'.$user['qrcode'] : '../../images/qr-code.png'; ?>"  alt="User Image" >

                                
                            </div>
                            </center>

                        </div>
                    </div>


                    <div class="col-lg-8 col-xlg-3">
                        <div class="small-box bg-default" style ="background-color:white;">


                            <ul class="nav nav-pills custom-pills" style="font-size:17px;">
                            
                                <li class="nav-item">
                                    <a class="nav-link " id="pills-timeline-tab" style="   border-bottom: solid 2px blue; color:#3C8DBC;"  href="my_profile.php">Profile Information</a>
                                </li>


                               



                               
                            </ul>


                            <center> 
            <form method="POST" action="crud/update-admin.php?id=<?php echo $user['id'];?>" enctype="multipart/form-data">


    <div class="form-group row" >

 




        <br>



            <div class="form-group form-row">
                    <label class = "col-md-12 col-xs-10 text-left text-muted" style="margin-left:80px;margin-top:20px; ">Full Name</label>
                    <br>


                <label class="col-sm-1  control-label col-form-label text-muted"></label>
            <div class="col-md-5 col-xs-10 text-left">
                
                    <input type="text "   placeholder="First Name" class="form-control text-capitalize size" name="fname" value="<?php echo $user['fname'];?>" readonly="">
            </div>

            <div class="col-md-5 p-md-1 col-xs-10 text-right">
                    <input type="text" placeholder="Last Name"   class="form-control text-capitalize size" name="lname" value="<?php echo $user['lname'];?>" readonly="">
            </div>
        </div>




        <div class="form-row ">

                    <label class = "col-md-12 col-xs-10 text-left text-muted" style="margin-left:80px;margin-top:20px; ">Email Address</label>


                                                <div class="col-md-11 col-xs-10">
                                                    <input style="margin-left:20px;"type="email" placeholder="Email address" class="form-control form-control-line design" name="email" id="example-email" value="<?php echo $user['email'];?>" readonly="">
                                                </div>
                                            </div>

                                            <br>
        <div class="form-row mt-3">
                    <label class = "col-md-12 col-xs-10 text-left text-muted" style="margin-left:80px;margin-top:20px; ">Phone Number</label>

                                                <div class="col-md-11 col-xs-10">
                                                    <input style="margin-left:20px;"type="contact" placeholder="Contact Number" class="form-control form-control-line design" name="contact" id="example-email" value="<?php echo $user['contact'];?>" readonly="">
                                                </div>
                                            </div>


                                            <br>

                                            <div class="form-row mt-3">

                    <label class = "col-md-12 col-xs-10 text-left text-muted" style="margin-left:80px;margin-top:20px; ">Street/Barangay</label>

                                            
                                                <div class="col-md-11 col-xs-10">
                                                    <input style="margin-left:20px;"type="street" placeholder="Street/Barangay" class="form-control form-control-line design" name="street" id="example-email" value="<?php echo $user['street'];?>"readonly="">
                                                </div>
                                            </div>



            <br>



            <div class="form-group form-row">
                    <label class = "col-md-12 col-xs-10 text-left text-muted" style="margin-left:80px;margin-top:20px; ">City and Province</label>


                <label class="col-sm-1  control-label col-form-label text-muted"></label>
            <div class="col-md-5 col-xs-10 text-left">
                
                     <input type="text "   placeholder="City" class="form-control text-capitalize size" name="fname" value="<?php echo $user['fname'];?>" readonly="">

            </div>

            <div class="col-md-5 p-md-1 col-xs-10 text-right">
            <input type="text "   placeholder="Province" class="form-control text-capitalize size" name="fname" value="<?php echo $user['province'];?>" readonly="">

            </div>
        </div>

        

</div>  
            <br>

    
    </div>
    
</form>


                        </div>
                    </div>




                    
        </div>
    </div>
    

    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>



</body>
