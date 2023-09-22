<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Attendance Report
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Attendance Report</li>
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
            <table id='empTable' class='display dataTable table-bordered' style="width:100%;">
                <thead>
                <tr>
                <th class="hidden"></th>
                  <th>Date</th>
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                   $sql = "SELECT *, student.student_id AS stid, attendance.id AS attid FROM attendance LEFT JOIN student ON student.id=attendance.student_id ORDER BY attendance.date DESC, attendance.time_in_morning DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $status = ($row['status'])?'<span class="badge badge-warning text-white text-normal " style="font-size:15px;">ontime</span>':'<span class="badge badge-danger text-white text-normal " style="font-size:15px;">late</span>';

                      ?>

                      <tr>
                        
                          <td class='hidden'>
                            </td>
                        <td><?php echo date('M d, Y', strtotime($row['date']))?></td>
                          <td><?php echo $row['stid']?></td>
                          <td><?php echo $row['fname'].' '.$row['lname']?></td>
                          <td><?php echo date('h:i A', strtotime($row['time_in_morning']))?></td>
                          <td><?php echo date('h:i A', strtotime($row['time_out_morning']))?></td>
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

