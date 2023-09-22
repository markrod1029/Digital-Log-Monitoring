<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Schedules List
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Update Schedules</li>
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
                    <h4 class="card-title text-white title">Update New Schedule</h4>
                </div>

            </div>

                        <?php
$ID = $_GET['id'];
 $view = "SELECT * from aboutus where id = '$ID'";
 $result = $conn->query($view);
 $row = $result->fetch_assoc();
 
 ?>
 

                <div class="box-body">

            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action = "crud/about_edit.php?id=<?php echo $row['id'];?>">

                <div class="card-body">

                <h4 class="card-title text-dark mb-3">Personal Info</h4> <br>



    



                <div class="input-group mb-3 ">
                    <label for="lname" class="col-sm-3 text-right control-label col-form-label text-muted">About US</label>
                
                    <div class="input-group col-sm-7 col-xs-11">
                    
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-file"></i></span></div>
                    <textarea rows="10" class="form-control " name="about" id="description" required><?php echo $row['about']?></textarea>

                
                    </div>
                </div>


              


    <div class=" box-footer text-right">
        <button type="submit" class="btn btn-primary" name="edit">Update</button>
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



