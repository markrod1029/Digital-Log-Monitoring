<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Add Announcement 
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Add Announcement t</li>
                </ol>
              </div>
    </div>
        </section>



        <section class="content">

    <div class="row">
        <div class="col-xs-12">
          <div class="card">
            
            <div class="box-header with-border " style ="background-color:#367FA9;">
                
                <div class="card-header ">
                    <h4 class="card-title text-white title">Add New Announcement</h4>
                </div>

            </div>

            
            <form action="crud/save_schedule.php" method="post" id="schedule-form">
                
            <div class="card-body">

                <h4 class="card-title text-dark mb-3">Announcement Information</h4> <br>
 
 
 
 
             <div class="input-group mb-3 ">

                 <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Announcement Title </label>
                        <div class="input-group col-sm-8 col-xs-11">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-tag"></i></span></div>
                            
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title Here" required="">
                        </div>

                </div>


                    <div class="row ">


           

                        <div class="input-group mb-3 ">

                            <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Announcement Description</label>
                            <div class="input-group col-sm-8 col-xs-11">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-at"></i></span></div>
                                
                                <textarea rows="3" class="form-control " name="description" id="description" required></textarea>

                            </div>


                            </div>


                            <div class="input-group mb-3">

                            <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Date & Time Start </label>
                            <div class="input-group col-sm-8 col-xs-11">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-clock"></i></span></div>
                                
                                <input type="datetime-local" class="form-control" name="start_datetime" id="start_datetime" placeholder="Date & Time Here" required="">
                            </div>

                            </div>


                            <div class="input-group mb-3">

                            <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Date & Time End </label>
                            <div class="input-group col-sm-8 col-xs-11">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-clock"></i></span></div>
                                
                                <input type="datetime-local" class="form-control"name="end_datetime" id="end_datetime" placeholder="Date & Time Here" required="">
                            </div>

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
</section>
 
</div>
</div>







  
    <?php include 'includes/footer.php'; ?>

  <?php include 'includes/scripts.php'; ?>








<script>
var student_id = document.querySelector("#title");
var fnameInput = document.querySelector("#description");
var mnameInput = document.querySelector("#start_datetime");
var lnameInput = document.querySelector("#end_datetime");


student_id.addEventListener("blur", function(event) {
  if (event.target.value === "") {
    event.target.style.border = "2px solid red";
  } else {
    event.target.style.border = "";
  }
});

fnameInput.addEventListener("blur", function(event) {
  if (event.target.value === "") {
    event.target.style.border = "2px solid red";
  } else {
    event.target.style.border = "";
  }
});


mnameInput.addEventListener("blur", function(event) {
  if (event.target.value === "") {
    event.target.style.border = "2px solid red";
  } else {
    event.target.style.border = "";
  }
});

lnameInput.addEventListener("blur", function(event) {
  if (event.target.value === "") {
    event.target.style.border = "2px solid red";
  } else {
    event.target.style.border = "";
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
</style>







</body>



