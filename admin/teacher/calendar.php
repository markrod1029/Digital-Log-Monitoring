<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
 
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Event Calendar
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Calendar</li>
                </ol>
              </div>
    </div>
        </section>


 <section class="content card mx-3">

 
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
 <div class="container py-2" id="page-container">
       
        <div class ="w-85 card1 mx-auto mb-5"id="calendar"></div>

    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1"  id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0 bg-primary">
                    <h5 class="modal-title  mx-auto pl-5">Calendar Event Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Title</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>

                
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                    <a type="button"  class="btn btn-primary btn-sm rounded-0 text-white" id="done" data-id="">Update</a>
                    <a  class="btn btn-danger btn-sm rounded-0 text-white" id="delete" data-id="">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

 

</section>   

       
</div>
</div>

<?php 
$sched = $conn->query("SELECT * FROM `schedule_list`");
$sched_res = [];
foreach($sched->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $row;
}
?>
<?php 
if(isset($conn)) $conn->close();
?>

<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>

<?php include 'includes/scripts.php' ?>


</body>
<style>

@media (max-width: 667px) {      
      #page-container{
   
        width:100%;
          }
</style>
