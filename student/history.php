<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  <?php include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  } ?>
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Dashboard
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Dashboard</li>
                </ol>
              </div>
    </div>
        </section>




        <section class="content">

    <div class="row">
        <div class="col-xs-12">
          <div class="card">
            <div class="card-header with-border text-center">
            <h4 class=""id="date"></h4>
      <h4 id="time" class="text-bold"></h4>
                <div class="card-body">

                <table id='example2' class='display dataTable table-bordered' style="width:100%;">
                <thead class ="text-center">
                <tr>
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
                   $sql = "SELECT *, student.student_id AS stid, attendance.id AS attid FROM attendance LEFT JOIN student ON student.id=attendance.student_id ORDER BY attendance.date DESC, attendance.time_in DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $status = ($row['status'])?'<span class="badge badge-warning text-white text-normal " style="font-size:15px;">ontime</span>':'<span class="badge badge-danger text-white text-normal " style="font-size:15px;">late</span>';

                      ?>

                      <tr>
                        
                
                        <td><?php echo date('M d, Y', strtotime($row['date']))?></td>
                          <td><?php echo $row['stid']?></td>
                          <td><?php echo $row['fname'].' '.$row['lname']?></td>
                          <td><?php echo date('h:i A', strtotime($row['time_in']))?></td>
                          <td><?php echo date('h:i A', strtotime($row['time_out']))?></td>
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
    </div>



        </section>
    </div>
</div>

  <?php include 'chart/csv.php'; ?>
<?php include 'includes/scripts.php' ?>
<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);
});

  </script>

</body>
