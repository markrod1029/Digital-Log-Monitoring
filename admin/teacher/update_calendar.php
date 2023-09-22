<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Event List
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Event List</li>
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
                    <h4 class="card-title text-white title">Update New Event</h4>
                </div>

            </div>
            <?php
$ID = $_GET['id'];
 $view = "SELECT * from schedule_list where id = '$ID'";
 $result = $conn->query($view);
 $row = $result->fetch_assoc();
  
 ?>
 

            
            <form action="crud/calendar_edit.php?id=<?php echo $row['id'];?>" method="POST" id="schedule-form">
                
            <div class="card-body">

                <h4 class="card-title text-dark mb-3">Event Info</h4> <br>


                <div class="row ">

                    <div class="form-group row">

                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Event Title</label>
                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title Here" value="<?php echo $row['title'];?>" required="">
                    </div>
                    </div>


                    <div class="form-group row">

                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Description of Event</label>
                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        <textarea rows="3" class="form-control" name="description"  value="<?php echo $row['description'];?>" id="description" required><?php echo $row['description'];?></textarea>
                        
                    </div>
                    </div>


                    <div class="form-group row">

                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Start of Event</label>
                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        
                        <input  type="datetime-local" class="form-control " name="start_datetime"  value="<?php echo $row['start_datetime'];?>" id="start_datetime" required>
                    </div>
                    </div>


                    <div class="form-group row">

                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">End of Event</label>
                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        
                        <input type="datetime-local" class="form-control " name="end_datetime"  value="<?php echo $row['end_datetime'];?>" id="end_datetime" required>
                    </div>
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



