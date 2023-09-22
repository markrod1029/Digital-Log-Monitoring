<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Add Student 
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Add Student</li>
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
                    <h4 class="card-title text-white title">Add New Student</h4>
                </div>

            </div>

            
                        <!--<ul class="nav nav-pills custom-pills mb-2" style="font-size:17px;">-->
                            
                        <!--    <li class="nav-item">-->
                        <!--        <h5 class="nav-link show-btn  " id="pills-timeline-tab"  style=" display:none;border-bottom: solid 2px blue; color:#3C8DBC; cursor: pointer;">Add Student</h5>-->
                        <!--    </li>-->

                      

                        <!--    <li class="nav-item">-->
                        <!--        <h5 class="nav-link hide-btn" id="pills-setting-tab"   s style="border-bottom: solid 2px blue; color:#3C8DBC; cursor: pointer;">Import CSV</h5>-->
                        <!--    </li>-->
  
                        <!--</ul>-->



            <form class="form-horizontal box-show" method="POST" enctype="multipart/form-data" action = "crud/student_add.php">

                <div class="card-body">

                <h4 class="card-title text-dark mb-3">Personal Information</h4> <br>








                <div class="input-group mb-3 ">

                <label class="col-sm-2 text-right control-label col-form-label text-muted">First Name</label>
                <div class="input-group col-sm-8 col-xs-11">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                    
                    <input type="text" class="form-control" id="fname" name="fname"  required=""
                    title=" First Name Required" >
                </div>
                 <label for="1cono1" style="color:red;" class=""></label>
                </div>





                <div class="input-group mb-3 ">
                <label class="col-sm-2 text-right control-label col-form-label text-muted">Middle Name</label>

                <div class="input-group col-sm-8 col-xs-11">
                    
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name Here" 
                        title="Middle Name Required" >
            </div>
            </div>




            <div class="input-group mb-3 ">
                    <label class="col-sm-2 text-right control-label col-form-label text-muted">Last Name</label>
                
                    <div class="input-group col-sm-8 col-xs-11">
                    
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>

                            <input type="text" class="form-control" id="lname" name="lname"  required=""                    
                            title="Last Name Required" >
                
                    </div>
                     <label for="1cono1" style="color:red;" class=""></label>
                </div>



                <div class="input-group mb-3 ">
                        <label  class="col-sm-2 text-right control-label col-form-label text-muted">Email</label>
                        
                        <div class="input-group col-sm-8 col-xs-11">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>

                            <input type="email" class="form-control" id="email" name="email"  required=""
                            title=" Email Required" >

                        </div> 
                        <label for="1cono1" style="color:red;" class=""></label>
                    </div>




                   <div class="input-group mb-3">
                        <label class="col-sm-2 text-right control-label col-form-label text-muted">Year level</label>
                    
                        <div class="input-group col-sm-8 col-xs-11">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                            <select type="text" class="form-control" name="student" id="position" required>
                                <option value="" selected disabled>- Select -</option>
                                
                                <?php
                                $sql = "SELECT * FROM schedules WHERE position != 'Teacher'";
                                $query = $conn->query($sql);
                                while($prow = $query->fetch_assoc()){
                                    echo "<option value='".$prow['id']."'>".$prow['position']."</option>";
                                }
                                ?>
                                
                            </select>
                        </div>
                        <label for="1cono1" style="color:red;" class=""></label>
                    </div>

                
                        

                    <div class="input-group mb-3 ">
                            <label  class="col-sm-2 text-right control-label col-form-label text-muted">Contact No</label>
                            
                            <div class="input-group col-sm-8 col-xs-11">
                                
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone-square"></i></span></div>
                                <input type="text" minlength="11" maxlength="11"  class="form-control" id="contact" name="contact" 
                                 pattern="\d{11}" title="11-digit Phone Number" required>
                                
                            </div>
                             <label for="1cono1" style="color:red;" class=""></label>
                        </div>
            





                        <div class="input-group mb-3 ">
                    <label class="col-sm-2 text-right control-label col-form-label text-muted">Gender</label>

                    <div class="col-sm-8 col-xs-11">
                        <input type="radio" id="customControlValidation2" name="gender" class="radio-col-indigo material-inputs" value="male" />
                            <label f class="mb-0 text-muted">Male</label>
                                <input type="radio" id="customControlValidation3" name="gender" class="radio-col-indigo material-inputs" value="female" />
                                    <label  class="mb-0 mt-2 text-muted">Female</label>
                                    
                    </div>
                </div>




                <div class="input-group mb-3 ">
                        <label class="col-sm-2 text-right control-label col-form-label text-muted">Address</label>
                        
                        <div class="input-group col-sm-8 col-xs-11">
                            
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                            <input type="text" class="form-control" id="street" name="street"  >
                            
                        </div>    
                    </div>





                    <div class="input-group mb-3 ">
                        <label  class="col-sm-2 text-right control-label col-form-label"></label>
                        

                        <div class="input-group col-sm-8 col-xs-11">

                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                            <select  class="form-control form-control-line size " name="city" id="city" >
                                    <option>Select City/Municipality</option>
                                </select>
                        </div>
                    </div>

   




                    <div class="input-group mb-3 ">
                    <label class="col-sm-2 text-right control-label col-form-label"></label>

                    <div class="input-group col-sm-8 col-xs-11">
                            
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                        <select  class="form-control form-control-line size " name="province" id="province" >
                                <option>Select Province</option>
                            </select>
                        </div>
                        </div>




                        <div class="input-group mb-3 ">
                            <label  class="col-sm-2 text-right control-label col-form-label text-muted">Upload Image</label>

                            
                            <div class="input-group col-sm-8 col-xs-11">

                            <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                            Upload <input type="file" onchange="readURL(this);" name="image"  id="imgInp">
                        </span>
                    </span>
                    <input type="text" class="form-control" name="image" onchange="readURL(this);" placeholder= "Choose Picture" readonly>

                   
                    </div>

                    </div>
                        </div>


                        <div class="form-group row" style="display:none">

                    <label for="1cono1" class="col-sm-3 text-right control-label col-form-label">*</label>

                    <div class="input-group col-sm-9 col-xs-11">

                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>

                            <input type="text" class="form-control" id="cono1" name="password" placeholder="School's Year level" value='' >

                    </div>

                    </div>





    <div class=" box-footer text-right">
        <button type="submit" class="btn btn-primary" name="save">Save</button>
        <button type="reset" class="btn btn-dark waves-effect waves-light">Reset</button>
    </div>

</div>
</form>

                

<form class="import" action="crud/import_student.php" method="POST" enctype="multipart/form-data" style ="display:none;">

<div class="card-body">



                            <div class="form-group row" >
                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label text-muted">CSV Student Data</label>
                            
                                <div class="input-group col-sm-7 col-xs-11">

                                    <input class="form-control" type="file" name="upcsv" accept=".csv" />
                                   

                                </div>
                             </div>


  <div class=" box-footer text-right">
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                    <button type="reset" class="btn btn-dark waves-effect waves-light">Reset</button>
                </div>

    </div>
  

</form>


            </div>
        </div>
    </div>
        </div>
    </div>







  
    <?php include 'includes/footer.php'; ?>

  <?php include 'includes/scripts.php'; ?>
<?php include 'chart/csv.php'; ?>



    <script>
      $(document).ready(function(){
          $(".hide-btn").click(function(){
              $(".box-show").hide();
              $(".import").show();
              $(".show-btn").show();
              $(".hide-btn").hide();



          });
          $(".show-btn").click(function(){
              $(".box-show").show();
              $(".import").hide();
              $(".show-btn").hide();
              $(".hide-btn").show();
          });
      });


    </script>






<style>



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
 }
 
  label[for]:before {
    content: '*';
    margin-right: 2px;
  }

  label[for].text-danger:before {
    color: red;
  }
  
  
</style>


<script>
$(document).ready( function() {
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
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});

</script>





<script>
  const fnameInput = document.querySelector('#fname');
  const fnameLabel = document.querySelector('label[for="fname"]');
  
  const lnameInput = document.querySelector('#lname');
  const lnameLabel = document.querySelector('label[for="lname"]');
  
  const emailInput = document.querySelector('#email');
  const emailLabel = document.querySelector('label[for="email"]');
  
 const contactInput = document.querySelector('#contact');
  const contactLabel = document.querySelector('label[for="contact"]');



fnameInput.addEventListener("blur", function(event) {
  if (event.target.value === "") {
    event.target.style.border = "2px solid red";
    // label.innerHTML = 'First Name *';
 fnameLabel.classList.add('text-danger');

} else {
    event.target.style.border = "";
        
           fnameLabel.classList.remove('text-danger');
  }
});


lnameInput.addEventListener("blur", function(event) {
  if (event.target.value === "") {
    event.target.style.border = "2px solid red";
     lnameLabel.classList.add('text-danger');
  } else {
    event.target.style.border = "";
     lnameLabel.classList.remove('text-danger');
  }
});


emailInput.addEventListener("blur", function(event) {
  if (event.target.value === "") {
    event.target.style.border = "2px solid red";
     emailLabel.classList.add('text-danger');
  } else {
    event.target.style.border = "";
     emailLabel.classList.remove('text-danger');
  }
});

contact.addEventListener("blur", function(event) {
  if (event.target.value === "") {
    event.target.style.border = "2px solid red";
     contactLabel.classList.add('text-danger');
  } else {
    event.target.style.border = "";
     contactLabel.classList.remove('text-danger');
  }
});



</script>


</body>



