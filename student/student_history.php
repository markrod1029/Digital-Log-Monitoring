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


    <h1 class = "dashboard">Attendance History
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Attendnce</li>
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
    <div class="card-body mt-3 mb-3 ml-2 mr-2">
    <h3 class ="text-center">Student History </h3>

    <table id='example2' class='display dataTable table-bordered mx-auto' style="width:100%;">
        <thead>
        <tr>
                 <!-- <th><h3 class ="text-center">Student History And Information</h3></th> -->
           
                <center> <th><h6 class="text-bold">Date Attendance</h6></th>
                <th><h6 class="text-bold ">Time In</h6></th>
                <th><h6 class="text-bold">Time Out</h6></th>     
                <th><h6 class="text-bold">Your Status</h6></th>     
        </tr>
        </thead>
        <tbody>

           
        <?php
        $userid = $user['id'];
               $sql = "SELECT * FROM attendance where student_id = '$userid'";
                $query = $conn->query($sql);
                while($row = $query->fetch_assoc()){
                  $status = ($row['status'])?'<span class="badge badge-warning text-white text-normal " style="font-size:15px; width:100px;">ontime</span>':'<span class="badge badge-danger text-white text-normal " style="width:100px; font-size:15px;">late</span>';

                  ?>
                         <tr>
                          
                         <td><h6><?php echo date('M d, Y', strtotime($row['date']))?></h6></td> 
                         <td><h6><?php echo date('h:i A', strtotime($row['time_in']))?></h6></td> 
                         <td><h6><?php echo date('h:i A', strtotime($row['time_out']))?></h6></td> 
                         <td><h6><?php echo $status?></h6></td> </center>
                        
                        </tr>
                    <?php
                    }?>
        </tbody>
    </table>
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


$(function () {
  // Smooth Scroll
  $('a[href*=#]').bind('click', function(e){
    var anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: $(anchor.attr('href')).offset().top
    }, 1000);
    e.preventDefault();
  });
});

  </script>

</body>



<style>


</style>