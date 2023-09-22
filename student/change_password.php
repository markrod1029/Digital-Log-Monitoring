<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Dashboard
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Dashboard</li>
                </ol>
              </div>
    </div>
        </section>



        <div class="content">

            <div class="row">
                <div class="col-lg-4 col-xlg-3">
                        <div div class="small-box bg-default" style ="background-color:white;">
                            <div class="card-body">
                                <center class="mt-4"> 
                                <img id="imageResult" height="150" width="150" src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle " alt="User Image" width="150">
   
                                    
                            <h4 class="card-subtitle  mt-2"><?php echo $user['fname'].' '.$user['lname']; ?></h4>
                            <h5 class="card-subtitle">Admin</h5>
    
                                 </center>
                            </div>
                                <hr>
                            <div class="card-body" style="margin-left:30px;"> <small class="text-muted">Email address </small>
                                <h6><a href="<?php echo $user['email'];?> " class="__cf_email__"><?php echo $user['email'];?> </a></h6> 
                                
                                <small class="text-muted pt-4 db">Phone</small>
                                <h6><a href="<?php echo $user['contact'];?> " ><?php echo $user['contact'];?> </a></h6> 
                                
                                <small class="text-muted ">Address</small>
                                <h6><?php echo $user['street']. ', '.$user['city'].', '.$user['province'];?></h6>
                                

                                
                            </div>

                        </div>
                    </div>


                    
                    <div class="col-lg-8 col-xlg-3">

                        <div class="small-box bg-default" style ="background-color:white;">


                            <ul class="nav nav-pills custom-pills" style="font-size:17px;">
                            
                            <li class="nav-item">
                                    <a class="nav-link " id="pills-timeline-tab" style="   " href="my_profile.php">Profile</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="pills-setting-tab" href="change_password.php" style="border-bottom: solid 2px blue; color:#3C8DBC;">Security Setting</a>
                                </li>

                               
                            </ul>
                            <br>

                            
        <center> 
            <form method="POST" action="crud/change_pass.php?id=<?php echo $user['id'];?>">

            

    <div class="form-group row" >
            <div class="form-row mt-3">
                    <label class = "col-md-12 col-xs-10 text-left text-muted" style="margin-left:50px;margin-top:20px; ">Current Password</label>
                <div class="col-md-11 col-xs-10">
                    <input style="margin-left:20px;"type="text" placeholder="Current Password" class="form-control form-control-line design" name="old" id="example-email"  required="">
                </div>
            </div>

            <div class="form-row mt-3">
                    <label class = "col-md-12 col-xs-10 text-left text-muted" style="margin-left:50px;margin-top:20px; ">New Password</label>
                <div class="col-md-11 col-xs-10">
                    <input style="margin-left:20px;"type="text" placeholder="New Password" class="form-control form-control-line design" name="new" id="example-email"  required="">
                </div>
            </div>

            <div class="form-row mt-3">
                    <label class = "col-md-12 col-xs-10 text-left text-muted" style="margin-left:50px;margin-top:20px; ">Confirm Password</label>
                <div class="col-md-11 col-xs-10">
                    <input style="margin-left:20px;"type="text" placeholder="Confirm Password" class="form-control form-control-line design" name="confirm" id="example-email"  required="">
                </div>
            </div>



                      <br>
                      <div class=" card-footer text-right" >
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                        <button type="reset" class="btn btn-dark waves-effect waves-light">Reset</button>
                    </div>
            <br>

    </div>
            </form>
        </center>



        
            </div>                        
        </div>
                    
    </div>  

    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>