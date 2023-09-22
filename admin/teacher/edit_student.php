<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Student List
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Update Student</li>
                </ol>
              </div>
    </div>
        </section>
        <script>	
window.onload = function() {	


	var $ = new City();
	$.showProvinces("#province");
	$.showCities("#city");

	console.log($.getProvinces());
	
	console.log($.getAllCities());
	
	console.log($.getCities("Pangasinan"));	
	
}
</script>



        <section class="content">

    <div class="row">
        <div class="col-xs-12">
          <div class="card">
            
            <div class="box-header with-border " style ="background-color:#367FA9;">
                
                <div class="card-header ">
                    <h4 class="card-title text-white title">Update New User</h4>
                </div>

            </div>

                        <?php
$ID = $_GET['id'];
 $view = "SELECT * from student where id = '$ID'";
 $result = $conn->query($view);
 $row = $result->fetch_assoc();
  
 ?>
 

                <div class="box-body">

            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action = "crud/student_edit.php?id=<?php echo $row['id'];?>">

                <div class="card-body">

                <h4 class="card-title text-dark mb-3">Personal Info</h4> <br>


                <div class="input-group mb-3 ">

                <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Student ID</label>
                <div class="input-group col-sm-8 col-xs-11">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                    
                    <input type="text" class="form-control" id="fname" name="student_id" placeholder="Student ID Here"  value = "<?php echo $row['student_id'];?>" required="">
                </div>
                </div>



                <div class="input-group mb-3 ">

                <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">First Name</label>
                <div class="input-group col-sm-8 col-xs-11">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                    
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name Here"  value = "<?php echo $row['fname'];?>" required="">
                </div>
                </div>




                <div class="input-group mb-3 ">
                    <label for="lname" class="col-sm-2 text-right control-label col-form-label text-muted">Middle Name</label>

                    <div class="input-group col-sm-8 col-xs-11">
                        
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                            <input type="text" class="form-control" id="mname" name="mname"  value = "<?php echo $row['mname'];?>" placeholder="Middle Name Here" >
                </div>
                </div>



                <div class="input-group mb-3 ">
                    <label for="lname" class="col-sm-2 text-right control-label col-form-label text-muted">Last Name</label>
                
                    <div class="input-group col-sm-8 col-xs-11">
                    
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>

                            <input type="text" class="form-control" id="lname" name="lname"  value = "<?php echo $row['lname'];?>" placeholder="Last Name Here" required="">
                
                    </div>
                </div>

                <div class="input-group mb-3 ">
                    <label for="email1" class="col-sm-2 text-right control-label col-form-label text-muted">Email</label>
                    
                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>

                        <input type="email" class="form-control" id="email1" name="email" placeholder="Email Here"   value = "<?php echo $row['email'];?>" required="">
                        
                    </div>
                </div>

                <div class="input-group mb-3 ">
                    <label for="cono1" class="col-sm-2 text-right control-label col-form-label text-muted">Position</label>

                    
                    <div class="input-group col-sm-8 col-xs-11">

                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone-square"></i></span></div>
                    <select type = "text" class="form-control" name="student" id="position" >
                                        
                                <?php
                                    $sql = "SELECT * FROM schedules WHERE position != 'Teacher' OR position != 'teacher'  ";
                                    $query = $conn->query($sql);
                                    while($prow = $query->fetch_assoc()){
                                        echo "
                                        <option value='".$prow['id']."'>".$prow['position']."</option>
                                        ";
                                    }
                                    ?>
                                
                                
                                </select>
                    </div>
                </div>
    
    
    
                <div class="input-group mb-3 ">
                    <label for="cono1" class="col-sm-2 text-right control-label col-form-label text-muted">Contact No</label>
                    
                    <div class="input-group col-sm-8 col-xs-11">
                        
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        <input type="text" class="form-control" id="cono1" name="contact"  value = "<?php echo $row['contact'];?>" placeholder="Contact No Here"  >
                        
                    </div>
                </div>
                

                <div class="form-group row" style="display:none">

            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">*</label>

            <div class="input-group col-sm-9 col-xs-11">

                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>

                    <input type="text" class="form-control" id="cono1" name="password" placeholder="School's Position" value='password' >

            </div>

            </div>








    <div class=" box-footer text-right">
        <button type="submit" class="btn btn-primary" name="edit">Save</button>
        <button type="reset" class="btn btn-dark waves-effect waves-light">Reset</button>
    </div>

</div>
</form>

                


                </div>
                </div>
            </div>
        </div>
    </div>


    </section>   




  
    <?php include 'includes/footer.php'; ?>

  <?php include 'includes/scripts.php'; ?>
<?php include 'chart/csv.php'; ?>
  </div>


    </div>
</div>









<style>
.title{
    color:white;
font-size:18px;
font-family:poppins;
}

.title1{
    margin:20px 0 12px 40px ;
    font-size:20px;
}
@media (max-width: 776px) {
    form{
    margin-left: 20px;
}
.box{
    margin-top:70px;
}
}


@media (max-width: 796px) {
 .control-label{
    text-align: left !important;
}
</style>






</body>



