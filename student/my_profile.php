<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
<script>
document.addEventListener("DOMContentLoaded", function() {
  var $ = new City();
  $.showProvinces("#province");
  $.showCities("#city");

  console.log($.getProvinces());
  console.log($.getAllCities());
  console.log($.getCities("Pangasinan"));

  var form = document.querySelector("form");
  form.addEventListener("submit", function(event) {
    var cityDropdown = document.getElementById("city");
    var provinceDropdown = document.getElementById("province");

    if (cityDropdown.value === "" || provinceDropdown.value === "") {
      event.preventDefault();
      alert("Please select both a city/municipality and a province.");
    }
  });
});
</script>

  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">My Profile
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;My Profile</li>
                </ol>
              </div>
    </div>
        </section>

 

        <div class="content">

            
        <?php
        if(isset($_SESSION['error'])){
          echo"
              <script type='text/javascript'>
              toastr.error('".$_SESSION['error']."', 'Error')
              toastr.options.timeOut = 3000;
              </script>
              
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
           
          <script type='text/javascript'>
          toastr.success('".$_SESSION['success']."', 'Success')
          toastr.options.timeOut = 3000;
          </script>
          ";
          unset($_SESSION['success']);
        }
      ?>

            <div class="row profile">
                <div class="col-lg-4 col-xlg-3">
                        <div div class="small-box bg-default" style ="background-color:white;">
                            <div class="card-body">
                                <center class="mt-4"> 
                                
                                <?php
                            echo $photoValue = $user['photo'];
                            
                            // Check if $photoValue is empty or contains only dots
                            if (empty($photoValue) || trim($photoValue, '.') === '') {
                                $imageSrc = '../../path/images/profile.jpg';
                            } else {
                                $imageSrc = '../../path/images/' . $photoValue;
                            }
                            ?>
                            <img src="<?php echo $imageSrc; ?>"  id="imageResult" height="150" class="img-circle " alt="User Image" width="150">
                            
                               
                                    
                            <h4 class="card-subtitle  mt-2"><?php echo $user['fname'].' '.$user['lname']; ?></h4>
                            <h5 class="card-subtitle"><?php echo $user['position'];?></h5>
    
                        </center>
                            </div>
                                <hr>
                            <div class="card-body" style="margin-left:30px;"> <small class="text-muted">Email address </small>
                                <h6><a href="mailto: <?php echo $user['email'];?> " class="__cf_email__"><?php echo $user['email'];?> </a></h6> 
                                
                                <small class="text-muted pt-4 db">Phone</small>
                                <h6><a href="tel: <?php echo $user['contact'];?> " ><?php echo $user['contact'];?> </a></h6> 
                                
                                <small class="text-muted ">Address</small>
                                <h6><?php echo $user['street']. ', '.$user['city'].', '.$user['province'];?></h6>
                                
                                
                            </div>

                        </div>
                    </div>


                    <div class="col-lg-8 col-xlg-3">
                        <div class="small-box bg-default " style ="background-color:white; cursor: default;">


                            <ul class="nav nav-pills custom-pills" style="font-size:17px;">
                            
                                <li class="nav-item">
                                    <a class="nav-link " id="pills-timeline-tab" style=" cursor: default; border-bottom: solid 2px blue; color:#3C8DBC;"  >Profile</a>
                                </li>


                               


                                <li class="nav-item">
                                    <a class="nav-link show-btn" id="pills-setting-tab"  style="  color:#3C8DBC;">Security Setting</a>
                                </li>



                               
                            </ul>


                            <center> 
            <form method="POST" action="crud/update_admin.php?id=<?php echo $user['id'];?>" enctype="multipart/form-data">
            <div class="card-body">


                <div class="input-group mb-3 mt-5 ">
                            <label for="cono1" class="col-sm-2 text-right control-label col-form-label text-muted">Upload Image</label>

                            
                            <div class="input-group col-sm-9 col-xs-11">

                            <div class="input-group">
                    <span class="input-group-btn">
                   
                    <span class="btn btn-default btn-file">
                        Upload  <input type="file" onchange="readURL(this);" name="image" id="imgInp" >

                    </span>
                </span>
                <input type="text" class="form-control" name="image" onchange="readURL(this);" placeholder= "Choose Picture" readonly>

                <span class="input-group-btn">
                    <span class="btn btn-default btn-file">
                        Browse <input type="file" onchange="readURL(this);" name="image" id="imgInp" disabled>
                    </span>
                </span>
                    </div>

                    </div>
                </div>




            
                <div class="input-group mb-3  mt-4 ">

                <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">First Name</label>
                <div class="input-group col-sm-9 col-xs-11">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                    
                    <input type="text "   placeholder="First Name" class="form-control text-capitalize size" name="fname" value="<?php echo $user['fname'];?>" required="">
                </div>
                </div>

                
            <div class="input-group mb-3  mt-4">
                    <label for="lname" class="col-sm-2 text-right control-label col-form-label text-muted">Last Name</label>
                
                    <div class="input-group col-sm-9 col-xs-11">
                    
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>

                <input type="text" placeholder="Last Name"   class="form-control text-capitalize size" name="lname" value="<?php echo $user['lname'];?>" required="">
                
                    </div>
                </div>


                <div class="input-group mb-3  mt-4 ">
                        <label for="email1" class="col-sm-2 text-right control-label col-form-label text-muted">Email</label>
                        
                        <div class="input-group col-sm-9 col-xs-11">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>

                            <input type="email" placeholder="Email address" class="form-control form-control-line design" name="email" id="example-email" value="<?php echo $user['email'];?>" required="">
                            
                        </div>
                    </div>

                    <div class="input-group mb-3  mt-4 ">
                            <label for="cono1" class="col-sm-2 text-right control-label col-form-label text-muted">Contact No</label>
                            
                            <div class="input-group col-sm-9 col-xs-11">
                                
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone-square"></i></span></div>
                            <input type="contact" placeholder="Contact Number" class="form-control form-control-line design" name="contact" id="example-email" value="<?php echo $user['contact'];?>" required
                            title="minimun of 11 number and number start 09" >
                                
                            </div>
                        </div>







                        <div class="input-group mb-3  mt-4 ">
                        <label for="brgy" class="col-sm-2 text-right control-label col-form-label text-muted">Address</label>
                        
                        <div class="input-group col-sm-9 col-xs-11">
                            
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                            <input type="street" placeholder="Street/Barangay" class="form-control form-control-line design" name="street" id="example-email" value="<?php echo $user['street'];?>" required="">
                            
                        </div>    
                    </div>



                    
                    
                    <div class="input-group mb-3 mt-4">
                      <label for="city" class="col-sm-2 text-right control-label col-form-label"></label>
                      <div class="input-group col-sm-9 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                        <select class="form-control form-control-line size" name="city" id="city" required>
                          <option value="" selected disabled>Select City/Municipality</option>
                          <!-- ... Populate options here ... -->
                        </select>
                      </div>
                    </div>
                    
                    <div class="input-group mb-3 mt-4">
                      <label for="province" class="col-sm-2 text-right control-label col-form-label"></label>
                      <div class="input-group col-sm-9 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                        <select class="form-control form-control-line size" name="province" id="province" required>
                          <option value="" selected disabled>Select Province</option>
                          <!-- ... Populate options here ... -->
                        </select>
                      </div>
                    </div>


   


        <br>
        <div class="text-right">
        <button type="submit" class="btn btn-primary" name="save">Save</button>
        <button type="reset" class="btn btn-dark waves-effect waves-light">Reset</button>
    </div>

</div>  
            <br>

    
    </div>
    
</form>


                        </div>
                    </div>




                    
                </div>





            <!-- password change -->

                
            <div class="row box-show" style="display:none; position:absolute; top:160px;">
                <div class="col-lg-4 col-xlg-3" >

                    
                        <div div class="small-box bg-default" style ="background-color:white;">
                            <div class="card-body">
                                <center class="mt-4"> 
   
                                <img id="imageResult" height="150" width="150" src="<?php echo (!empty($user['photo'])) ? '../../path/images/'.$user['photo'] : '../../path/images/profile.jpg'; ?>" class="img-circle " alt="User Image" width="150">
                                    
                            <h4 class="card-subtitle  mt-2"><?php echo $user['fname'].' '.$user['lname']; ?></h4>
                            <h5 class="card-subtitle">Admin</h5>
    
                                 </center>
                            </div>
                                <hr>
                                <div class="card-body" style="margin-left:30px;"> <small class="text-muted">Email address </small>
                                <h6><a href="mailto: <?php echo $user['email'];?> " class="__cf_email__"><?php echo $user['email'];?> </a></h6> 
                                
                                <small class="text-muted pt-4 db">Phone</small>
                                <h6><a href="tel: <?php echo $user['contact'];?> " ><?php echo $user['contact'];?> </a></h6> 
                                
                                <small class="text-muted ">Address</small>
                                <h6><?php echo $user['street']. ', '.$user['city'].', '.$user['province'];?></h6>
                                

                                
                            </div>

                        </div>
                    </div>


                    
                    <div class="col-lg-8 col-xlg-3">

                        <div class="small-box bg-default" style ="background-color:white;">


                            <ul class="nav nav-pills custom-pills" style="font-size:17px;">
                            
                            <li class="nav-item">
                                    <a class="nav-link hide-btn" style="cursor: default;" id="pills-timeline-tab">Profile</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="pills-setting-tab" style=" cursor: default; border-bottom: solid 2px blue; color:#3C8DBC;">Security Setting</a>
                                </li>

                               
                            </ul>
                            <br>

                            
        <center> 
            <form method="POST" action="crud/change_pass.php?id=<?php echo $user['id'];?>">

            

    <div class="form-group row" >
            <div class="form-row mt-3">
                    <label class = "col-md-12 col-xs-10 text-left text-muted" style="margin-left:50px;margin-top:20px; ">Current Password</label>
                <div class="col-md-11 col-xs-10">
                    <input style="margin-left:20px;"type="password" placeholder="Current Password" class="form-control form-control-line design" name="old" id="example-email"  required="">
                </div>
            </div>

            <div class="form-row mt-3">
                    <label class = "col-md-12 col-xs-10 text-left text-muted" style="margin-left:50px;margin-top:20px; ">New Password</label>
                <div class="col-md-11 col-xs-10">
                    <input style="margin-left:20px;"type="password" placeholder="New Password" class="form-control form-control-line design" name="new" id="example-email"  required="">
                </div>
            </div>

            <div class="form-row mt-3">
                    <label class = "col-md-12 col-xs-10 text-left text-muted" style="margin-left:50px;margin-top:20px; ">Confirm Password</label>
                <div class="col-md-11 col-xs-10">
                    <input style="margin-left:20px;"type="password" placeholder="Confirm Password" class="form-control form-control-line design" name="confirm" id="example-email"  required="">
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

<style>

@media (max-width: 796px) {
 .control-label{
    text-align: left !important;
}
 }
</style>
    

</body>
<script>
function readURL(input) {

    $(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}

</script>


    <script>
      $(document).ready(function(){
          $(".hide-btn").click(function(){
              $(".box-show").hide();
              $(".profile").show();


          });
          $(".show-btn").click(function(){
              $(".box-show").show();
              $(".profile").hide();

          });
      });


    </script>
