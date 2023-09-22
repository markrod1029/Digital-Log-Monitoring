<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

            <section class="content-header">
                <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


                <h1 class = "dashboard">Add Teacher 
                </h1>
                <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                            <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                            <li class="breadcrumb-item active"> /&nbsp;Add Teacher </li>
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
                    <h4 class="card-title text-white title">Add New Staff</h4>
                </div>
               
            </div>
                        <ul class="nav nav-pills custom-pills mb-2" style="font-size:17px;">
                            
                            <li class="nav-item">
                                <h5 class="nav-link show-btn  " id="pills-timeline-tab"  style=" display:none;border-bottom: solid 2px blue; color:#3C8DBC; cursor: pointer;">Add Teacher</h5>
                            </li>

                      

                            <li class="nav-item">
                                <h5 class="nav-link hide-btn" id="pills-setting-tab"   s style="border-bottom: solid 2px blue; color:#3C8DBC; cursor: pointer;">Import CSV</h5>
                            </li>
  
                        </ul>


                     
    <form class="form-horizontal box-show" method="POST" action="crud/teacher_add.php" enctype="multipart/form-data">



        <div class="card-body">

                <h4 class="card-title text-dark mb-3">Personal Information</h4> <br>







            <div class="input-group mb-3 ">


                    <label  class="col-sm-2  text-right control-label col-form-label text-muted">First Name</label>
                    <div class="input-group col-sm-8 col-xs-11  ">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name Here" required="">
                    </div>
                    <label for="fname"></label>
                </div>




                <div class="input-group mb-3 ">

                    <label  class="col-sm-2 text-right control-label col-form-label text-muted">Middle Name</label>

                    <div class="input-group col-sm-8 col-xs-11">
                        
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                            <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name Here" >
                    </div>
                </div>



                <div class="input-group mb-3 ">

                        <label  class="col-sm-2 text-right control-label col-form-label text-muted">Last Name</label>
                    
                        <div class="input-group col-sm-8 col-xs-11">
                        
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>

                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name Here" required="">
                    
                        </div>
                         <label for="lname"></label>
                    </div>

                                    
                    <div class="input-group mb-3 ">

                        <label class="col-sm-2 text-right control-label col-form-label text-muted">Email</label>
                        
                        <div class="input-group col-sm-8 col-xs-11">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>

                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Here"  required="">
                            
                        </div>
                         <label for="email"></label>
                    </div>


                                    
                    <div class="input-group mb-3 ">

                        <label class="col-sm-2 text-right control-label col-form-label text-muted">Position</label>

                        
                        <div class="input-group col-sm-8 col-xs-11">

                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone-square"></i></span></div>
                                <input type="text" class="form-control" id="position" name="position" placeholder="School's Position" required>

                        </div>
                         <label for="position"></label>
                    </div>
    
                    
                    
                    <div class="input-group mb-3 ">

                        <label  class="col-sm-2 text-right control-label col-form-label text-muted">Contact No</label>
                        
                        <div class="input-group col-sm-8 col-xs-11">
                            
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                            <input type='tel' minlength="11" maxlength="11" class="form-control" id="contact" name="contact"         
                              pattern="^09\d{9}$|^\+63\d{10}$" title="11-digit Start in 09 Phone Number"  placeholder="Contact No Here"  required>
                            
                        </div>
                         <label for="contact"></label>
                    </div>
                    




                    <div class="input-group mb-3 ">

                            <label class="col-sm-2 text-right control-label col-form-label text-muted">Gender</label>

                            <div class="col-sm-8 col-xs-11">
                                <input type="radio" id="customControlValidation2" name="gender" class="radio-col-indigo material-inputs" value="male" />
                                    <label  class="mb-0  text-muted">Male</label>
                                        <input type="radio" id="customControlValidation3" name="gender" class="radio-col-indigo material-inputs" value="female" />
                                            <label  class="mb-0 mt-2 text-muted">Female</label>
                                            
                            </div>
                        </div>

                        




        <div class="input-group mb-3 ">
                        <label  class="col-sm-2 text-right control-label col-form-label text-muted">Student</label>

                        
                        <div class="input-group col-sm-8 col-xs-11">

                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        <select type = "text" class="form-control" name="student" id="position" required>
                                        <option value="" selected>- Select -</option>
                                            
                                    <?php
                                        $sql = "SELECT * FROM schedules ";
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
                                    <label  class="col-sm-2 text-right control-label col-form-label text-muted">Upload Image</label>
                            
                                <div class="input-group col-sm-8 col-xs-11">

                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                Upload <input type="file" onchange="readURL(this);" name="image"  id="imgInp">
                                            </span>
                                        </span>
                                            <input type="text" class="form-control" name="image" onchange="readURL(this);" placeholder= "Choose Picture" readonly>

                                            <span class="input-group-btn">
                                                <span class="btn btn-default btn-file">
                                                    Browse <input type="file" id="imgInp">
                                                </span>
                                            </span>
                                    </div>

                                </div>
                             </div>


                          
                        



                    <div class=" box-footer text-right">
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                        <button type="reset" class="btn btn-dark waves-effect waves-light">Reset</button>
                    </div>

                    </div>

    </form >




    <form class="import" action="crud/import_teacher.php" method="POST" enctype="multipart/form-data" style ="display:none;">

    <div class="card-body">





                            <div class="form-group row" >
                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label text-muted">CSV Teacher Data</label>
                            
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



  label[for]:before {
    content: '*';
    margin-right: 2px;
  }

  label[for].text-danger:before {
    color: red;
  }
</style>


<script>
var fnameInput = document.querySelector("#fname");
  const fnameLabel = document.querySelector('label[for="fname"]');
  
var lnameInput = document.querySelector("#lname");
  const lnameLabel = document.querySelector('label[for="lname"]');
  
var emailInput = document.querySelector("#email");
  const emailLabel = document.querySelector('label[for="email"]');
  
var positionInput = document.querySelector("#position");
  const positionLabel = document.querySelector('label[for="position"]');
  
var contact = document.querySelector("#contact");
  const contactLabel = document.querySelector('label[for="contact"]');


fnameInput.addEventListener("blur", function(event) {
  if (event.target.value === "") {
    event.target.style.border = "2px solid red";
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


positionInput.addEventListener("blur", function(event) {
  if (event.target.value === "") {
    event.target.style.border = "2px solid red";
    positionLabel.classList.add('text-danger');
  } else {
    event.target.style.border = "";
    positionLabel.classList.remove('text-danger');
  }
});





</script>



</body>


<style>
    @media (max-width: 796px) {
 .control-label{
    text-align: left !important;
}
 }
 </style>