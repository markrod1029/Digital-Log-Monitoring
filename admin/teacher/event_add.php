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
                  <li class="breadcrumb-item active"> /&nbsp;Student List</li>
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
                    <h4 class="card-title text-white title">Add New User</h4>
                </div>

            </div>

            
            
            <form class="form-horizontal box-show"action="crud/save_schedule.php" method="post" id="schedule-form">

                <div class="card-body">

                <h4 class="card-title text-dark mb-3">Event  Calendar</h4> <br>


                    <input type="hidden" name="id" value="">


                    <div class="form-group row">

                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Event Title</label>
                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title Here" required="">
                    </div>
                    </div>


                    <div class="form-group row">

                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Description of Event</label>
                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        <textarea rows="3" class="form-control" name="description" id="description" required></textarea>
                        
                    </div>
                    </div>


                    <div class="form-group row">

                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Start of Event</label>
                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        
                        <input  type="datetime-local" class="form-control " name="start_datetime" id="start_datetime" required>
                    </div>
                    </div>


                    <div class="form-group row">

                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">End of Event</label>
                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        
                        <input type="datetime-local" class="form-control " name="end_datetime" id="end_datetime" required>
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
<?php include 'chart/csv.php'; ?>








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



