<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">
    <h1 class = "dashboard">Add Schedule 
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Add Schedule </li>
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
                    <h4 class="card-title text-white title">Add New Schedule</h4>
                </div>

            </div>

                <div class="box-body">

            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action = "crud/schedule_add.php">

                <div class="card-body">

                <h4 class="card-title text-dark mb-3">Schedule Information</h4> <br>

                <div class="input-group mb-3 ">
                <label for="cono1" class="col-sm-2 text-right control-label col-form-label text-muted">User Schedule</label>
                    
            <div class="input-group col-sm-8 col-xs-11">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                    <select  class="form-control" name="position" id="position" required>
                                    <option value="Elementary">Elementary</option>
                                    <option value="Junior">Junior High</option>
                                    <option value="Senior">Senior High</option>
                            </select>
                            </div>
                         
                    
            </div>







            <div class="input-group mb-3 ">
                <label  class="col-sm-2 text-right control-label col-form-label text-muted">Morning Time In</label>
            
                <div class="input-group col-sm-8 col-xs-11">
                
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div>
                        <input type="time" class="form-control" id="time_in_morning" name="time_in_morning" required="">
            
                </div>
                    <label for="time_in_morning"></label>
            </div>


            <div class="input-group mb-3 ">
            <label  class="col-sm-2 text-right control-label col-form-label text-muted">Morning Time Out</label>
        
            <div class="input-group col-sm-8 col-xs-11">
            
            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div>
                    <input type="time" class="form-control" id="time_out_morning" name="time_out_morning"  required="">
        
            </div>
            <label for="time_out_morning"></label>
        </div>



            <div class="input-group mb-3 ">
                <label  class="col-sm-2 text-right control-label col-form-label text-muted">Afternoon Time In</label>
            
                <div class="input-group col-sm-8 col-xs-11">
                
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div>
                        <input type="time" class="form-control" id="time_in_afternoon" name="time_in_afternoon" required="">
            
                </div>
                 <label for="time_in_afternoon"></label>
            </div>


            <div class="input-group mb-3 ">
            <label  class="col-sm-2 text-right control-label col-form-label text-muted">Afternoon Time Out</label>
        
            <div class="input-group col-sm-8 col-xs-11">
            
            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div>
                    <input type="time" class="form-control"  name="time_out_afternoon"   id="time_out_afternoon" required="">
        
            </div>
               <label for="time_out_afternoon"></label>
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


    </section>   




    <?php include 'includes/footer.php'; ?>
  

  <?php include 'includes/scripts.php'; ?>
<?php include 'chart/csv.php'; ?>
  </div>


    </div>
</div>


<style>
    

  label[for]:before {
    content: '*';
    margin-right: 2px;
  }

  label[for].text-danger:before {
    color: red;
  }
  
</style>





<script>
var student_id = document.querySelector("#time_in_morning");
  const time_in_morningLabel = document.querySelector('label[for="time_in_morning"]');
var fnameInput = document.querySelector("#time_out_morning");
  const time_out_morningLabel = document.querySelector('label[for="time_out_morning"]');
var mnameInput = document.querySelector("#time_in_afternoon");
const time_in_afternoonLabel = document.querySelector('label[for="time_in_afternoon"]');
var lnameInput = document.querySelector("#time_out_afternoon");
const time_out_afternoonLabel = document.querySelector('label[for="time_out_afternoon"]');

student_id.addEventListener("blur", function(event) {
  if (event.target.value === "") {
    event.target.style.border = "2px solid red";
    time_in_morningLabel.classList.add('text-danger');
  } else {
    event.target.style.border = "";
      time_in_morningLabel.classList.remove('text-danger');
      
  }
});

fnameInput.addEventListener("blur", function(event) {
  if (event.target.value === "") {
    event.target.style.border = "2px solid red";
        time_out_morningLabel.classList.add('text-danger');
  } else {
    event.target.style.border = "";
      time_out_morningLabel.classList.remove('text-danger');
  }
});


mnameInput.addEventListener("blur", function(event) {
  if (event.target.value === "") {
    event.target.style.border = "2px solid red";
        time_in_afternoonLabel.classList.add('text-danger');
        
  } else {
    event.target.style.border = "";
      time_in_afternoonLabel.classList.remove('text-danger');
  }
});

lnameInput.addEventListener("blur", function(event) {
  if (event.target.value === "") {
    event.target.style.border = "2px solid red";
        time_out_afternoonLabel.classList.add('text-danger');
  } else {
    event.target.style.border = "";
      time_out_afternoonLabel.classList.remove('text-danger');
  }
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
</style>





</body>

