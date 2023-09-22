<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Student Information
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Student</li>
                </ol>
              </div>
    </div>
        </section>



        <div class="content">


        
        <?php
$ID = $_GET['id'];
 $view = "SELECT * from student where id = '$ID'";
 $result = $conn->query($view);
 $user = $result->fetch_assoc();
 
 ?>
            <div class="row profile">
                <div class="col-lg-4 col-xlg-3">
                        <div div class="small-box bg-default" style ="background-color:white;">
                            <div class="card-body">
                                <center class="mt-4"> 
                                <img id="imageResult" height="150" width="150" src="<?php echo (!empty($user['photo'])) ? '../../path/images/'.$user['photo'] : '../../path/images/profile.jpg'; ?>" class="img-circle " alt="User Image" width="150">
   
                                    
                            <h4 class="card-subtitle  mt-2"><?php echo $user['fname'].' '.$user['lname']; ?></h4>
                            <h5 class="card-subtitle"><?php echo $user['position'] ?></h5>
    
                            </div>
                                <hr>
                            <div class="card-body text-center">       
                             <img  id="imageResult" height="150" width="150"  src="../../path/qrcode/<?= $user['student_id'] ; ?>.png">
                                
                            </div>
                            </center>

                        </div>
                    </div>


                    <div class="col-lg-8 col-xlg-3">
                        <div class="small-box bg-default" style ="background-color:white;">


                            
                        <ul class="nav nav-pills custom-pills" style="font-size:17px; cursor: default;">
                            
                            <li class="nav-item">
                                <a class="nav-link " id="pills-timeline-tab" style=" cursor: default; border-bottom: solid 2px blue; color:#3C8DBC;" >Profile</a>
                            </li>


                           


                            <li class="nav-item">
                                <a class="nav-link show-btn" id="pills-setting-tab"   style="  color:#3C8DBC;">Student History</a>
                            </li>



                           
                        </ul>

                            <center> 
            <form method="POST" action="crud/update-admin.php?id=<?php echo $user['id'];?>" enctype="multipart/form-data">


    <div class="form-group row" >

 




        <br>



                   <div class="form-group form-row">
                  <label class="col-md-12 col-xs-10 text-left text-muted" style="margin-left: 80px; margin-top: 20px;">Full Name</label>
                  <div class="col-md-6 col-xs-10">
                    <input type="text" placeholder="First Name" class="form-control text-capitalize size" name="fname" value="<?php echo $user['fname']; ?>" readonly="">
                  </div>
                  <div class="col-md-6 col-xs-10">
                    <input type="text" placeholder="Last Name" class="form-control text-capitalize size" name="lname" value="<?php echo $user['lname']; ?>" readonly="">
                  </div>
                </div>




        <div class="form-row ">

                    <label class = "col-md-12 col-xs-10 text-left text-muted" style="margin-left:80px;margin-top:20px; ">Email Address</label>


                                                <div class="col-md-11 col-xs-10">
                                                    <input style="margin-left:20px;"type="email" placeholder="Email address" class="form-control form-control-line design" name="email" id="example-email" value="<?php echo $user['email'];?>" readonly="">
                                                </div>
                                            </div>

                                            <br>
        <div class="form-row mt-3">
                    <label class = "col-md-12 col-xs-10 text-left text-muted" style="margin-left:80px;margin-top:20px; ">Phone Number</label>

                                                <div class="col-md-11 col-xs-10">
                                                    <input style="margin-left:20px;"type="contact" placeholder="Contact Number" class="form-control form-control-line design" name="contact" id="example-email" value="<?php echo $user['contact'];?>" readonly="">
                                                </div>
                                            </div>


                                            <br>

                                            <div class="form-row mt-3">

                    <label class = "col-md-12 col-xs-10 text-left text-muted" style="margin-left:80px;margin-top:20px; ">Street/Barangay</label>

                                            
                                                <div class="col-md-11 col-xs-10">
                                                    <input style="margin-left:20px;"type="street" placeholder="Street/Barangay" class="form-control form-control-line design" name="street" id="example-email" value="<?php echo $user['street'];?>"readonly="">
                                                </div>
                                            </div>



            <br>



      <div class="form-group form-row">
  <label class="col-md-12 col-xs-10 text-left text-muted" style="margin-left: 80px; margin-top: 20px;">City and Province</label>
  <div class="col-md-6 col-xs-10">
    <input type="text" placeholder="City" class="form-control text-capitalize size" name="city" value="<?php echo $user['city']; ?>" readonly="">
  </div>
  <div class="col-md-6 col-xs-10">
    <input type="text" placeholder="Province" class="form-control text-capitalize size" name="province" value="<?php echo $user['province']; ?>" readonly="">
  </div>
</div>


        

</div>  
            <br>

    
    </div>
    
</form>


                        </div>
                    </div>


         
                    


     



<section class="content  box-show" style="display:none;">
<div class="row  box-show" >
<div class="col-xs-12 ">
    
<div class="card">
<div class="box-header with-border">
                        
                        <ul class="nav nav-pills custom-pills" style="font-size:17px;">
                            
                            <li class="nav-item">
                                    <a class="nav-link hide-btn" id="pills-timeline-tab" style="  cursor: default; ">Profile</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="pills-setting-tab" style="cursor: default;border-bottom: solid 2px blue; color:#3C8DBC;">Student History</a>
                                </li>

                               
                        </ul>
                            <br>
                            <?php
$ID = $_GET['id'];
$view = "SELECT * from student where id = '$ID'";
$result = $conn->query($view);
$row1 = $result->fetch_assoc();
?>
</div>


<div class="box-body  mt-3 mb-3 ml-2 mr-2">
<table id='empTable' class='display dataTable table-bordered' style="width:100%;">
<thead>
<tr>
  <th>Date</th>
  <th>Student ID</th>
  <th>Name</th>
  <th> Time In/Time Out</th>
  <th>Status</th>
</tr>
</thead>
<tbody>
<?php

$sql1 = "SELECT *, student.student_id AS system_id FROM monitoring LEFT JOIN student ON
student.id = monitoring.student_id
where monitoring.student_id = '$ID' ";
$query1 = $conn->query($sql1);





while($row = $query1->fetch_assoc()  ){
    if($row['status_monitoring'] == 1){
        $status = ' <span class="badge badge-success text-white text-normal p-2 " style="font-size:15px;">Ontime</span>';
     }

     else if($row['status_monitoring'] == 0){
         $status = '<span class="badge badge-danger text-white text-normal p-2 " style="font-size:15px;">Late</span>';
         
     }

     
     else if($row['status_monitoring'] == 2){
           $status = ' <span class="badge badge-warning text-white text-normal p-2 " style="font-size:15px;">Ontime</span>';
         
     }
     else {
        $status = ' <span class="badge badge-warning text-white text-normal p-2 " style="font-size:15px;">Late</span>';

     }
?>

      <tr>
   
        <td><?php echo date('M d, Y', strtotime($row['date']))?></td>
          <td><?php echo $row['system_id']?></td>
          <td><?php echo $row1['fname'].' '.$row1['lname']?></td>
          <td> <?php echo date('h:i A', strtotime($row['time_in'])). '/' .date('h:i A', strtotime($row['time_out']))?></td>
          <td><span class="badge badge-primary">Morning</span> <?php echo  $status?></td>

           
       </tr>

      

<?php
    }


?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</section>


            </div>
            </div>
                    </div>


    <?php include 'chart/csv.php'; ?>
    
    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>



</body>

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