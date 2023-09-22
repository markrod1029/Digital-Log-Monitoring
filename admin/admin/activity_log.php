<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>

<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Activity Logs
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Activity Logs</li>
                </ol>
              </div>

    </div>
        </section>

      


        <section class="content">
        <?php
        if(isset($_SESSION['error'])){
          echo"
              <script type='text/javascript'>
              toastr.error('".$_SESSION['error']."', 'Error')
              toastr.options.timeOut = 3000;
              </script>
              
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
           
          <script type='text/javascript'>
          toastr.success('".$_SESSION['success']."', 'Success')
          toastr.options.timeOut = 3000;
          </script>
          ";
          unset($_SESSION['success']);
        }
      ?>
        <div class="row">
        <div class="col-xs-12">
          <div class="card">
            <div class="box-header with-border">
            </div>
            <div class="card-body mt-3 mb-3 ml-2 mr-2">
            <table id='empTable' class='display dataTable table-bordered' style="width:100%;">
                <thead>
                <tr>
                <th>#</th>
                <th>date</th>
                <th>Name</th>
                <th>Position</th>
                <th>Actions</th>
                
                </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $sql = "SELECT * from activity ORDER BY id ASC";

                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) 
                    {
          $timeLoged = new DateTime($row['time_loged']);
$currentDateTime = new DateTime();

$interval = $currentDateTime->diff($timeLoged);

$secondsDifference = $interval->s;
$minutesDifference = $interval->i;
$hoursDifference = $interval->h;
$daysDifference = $interval->d;
$monthsDifference = $interval->m;

$timeDifference = '';

if ($monthsDifference > 0) {
    $timeDifference = $monthsDifference . " month" . ($monthsDifference > 1 ? "s" : "");
} elseif ($daysDifference > 0) {
    $timeDifference = $daysDifference . " day" . ($daysDifference > 1 ? "s" : "");
} elseif ($hoursDifference > 0) {
    $timeDifference = $hoursDifference . " hour" . ($hoursDifference > 1 ? "s" : "");
} elseif ($minutesDifference > 0) {
    $timeDifference = $minutesDifference . " minute" . ($minutesDifference > 1 ? "s" : "");
} elseif ($secondsDifference > 0) {
    $timeDifference = $secondsDifference . " second" . ($secondsDifference > 1 ? "s" : "");
} else {
    $timeDifference = "just now";
}

$timeDifference .= " ago";



// echo $timeDifference;




                       
                    ?>
                        <tr>
                          <td><?php echo $row['id'];?></td>
                        <td><?php echo $timeDifference?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['position'];?></td>
                        <td><?php echo $row['status'];?></td>

                          
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
 