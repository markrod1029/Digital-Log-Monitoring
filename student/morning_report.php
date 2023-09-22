<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Morning Report
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="home.php" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Morning Report</li>
                </ol>
              </div>
    </div>
        </section>




        <section class="content">




        <div class="row">
        <div class="col-xs-12">
          <div class="card">
            <div class="box-header with-border">
            </div>
            <div class="box-body  mt-3 mb-3 ml-2 mr-2">
            <table id='example2' class='display dataTable table-bordered' style="width:100%;">
                <thead>
                <tr>
                  <th>Date</th>
                
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id = $user['id'];
                   $sql = "SELECT *, student.student_id AS stid, monitoring_morning.id AS attid FROM monitoring_morning LEFT JOIN student ON student.id=monitoring_morning.student_id WHERE monitoring_morning.student_id  = '$id'  ORDER BY monitoring_morning.date DESC, monitoring_morning.time_in_morning DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                        if($row['status_morning'] == 1){
                           $status = ' <span class="badge badge-success text-white text-normal p-2 " style="font-size:15px;">Ontime</span>';
                        }

                        else if($row['status_morning'] == 0){
                            $status = '<span class="badge badge-danger text-white text-normal p-2 " style="font-size:15px;">Late</span>';
                            
                        }

                        
                        else if($row['status_morning'] == 2){
                              $status = ' <span class="badge badge-warning text-white text-normal p-2 " style="font-size:15px;">Ontime</span>';
                            
                        }
                        else {
                           $status = ' <span class="badge badge-warning text-white text-normal p-2 " style="font-size:15px;">Late</span>';

                        }

                      ?>

                      <tr>
                        
                        <td><?php echo date('M d, Y', strtotime($row['date']))?></td>
                     
                         <td><?php
                          
                          if($row['time_in_morning'] == '00:00:00'){
                              echo '';
                          }
                          else{
                           echo date('h:i:s A', strtotime($row['time_in_morning']));  
                          }
                          
                       ?></td>
                          <td><?php
                          if($row['time_out_morning'] == '00:00:00'){
                              echo '';
                          }
                          else{
                           echo date('h:i:s A', strtotime($row['time_out_morning']));  
                          }
                          
                          ?></td>
                          <td><?php echo  $status?></td>

                      
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




  

  <?php include 'includes/scripts.php'; ?>
<?php include 'chart/csv.php'; ?>
  </div>
  <?php include 'includes/footer.php'; ?>


    </div>
</div>




</body>

