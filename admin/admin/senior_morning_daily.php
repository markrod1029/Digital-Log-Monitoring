<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('m');
  $month = date('M-Y');
  if(isset($_GET['month'])){
    $year = $_GET['month'];
  }
?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Data Analytics Morning
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Senior Morning</li>

                </ol>
              </div>
    </div>
        </section>





        <section class="content">

        <div class="row  mx-auto">

<div class="col-sm-5  mx-auto">
  <div class="info-box bg-gradient-primary">
    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
      <div class="info-box-content">
        <span class="info-box-text h4">Senior Morning Ontime</span>
        </div>
  </div>
</div>

<div class="col-sm-5  mx-auto">
  <div class="info-box bg-gradient-danger">
    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
      <div class="info-box-content">
      <span class="info-box-text h4">Senior Morning Late</span>
        </div>
  </div>
</div>

</div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card">
          <ul class="nav nav-pills custom-pills mb-2" style="font-size:17px;">
                            
                       
                            <li class="nav-item">
                                <a class="nav-link show-btn" id="pills-setting-tab" style="border-bottom: solid 2px blue; color:#3C8DBC;" href="senior_morning_daily.php"  style="  color:#3C8DBC;">Daily </a>
                            </li>
                           

                            <li class="nav-item">
                                <a class="nav-link show-btn" id="pills-setting-tab" href="senior_morning_monthly.php"  style="  color:#3C8DBC;">Monthly</a>
                            </li>

                           
  
                        </ul>
            <div class="box-header with-border">
              <h3 class="box-title ml-3"><?php echo $month ?> <br> Days Ontime and Late Morning Report</h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Select Month: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=1; $i<=12; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "

                            <option value='".$i."' ".$selected.">".$i.$Month."</option>
                          ";
                        }
                      ?>
                    </select>

                  </div>
                </form>

              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <br>
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:350px"></canvas>

                  


                

        <div class="box-body">
                <br>
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <br>
 
            </div>
              </div>

              
            </div>
    
            
<?php include 'chart/morning/senior_morning_daily_bar.php'; ?>
<?php include 'chart/morning/senior_morning_daily_pie.php'; ?>
          </div>
        </div>
      </div>
        

  </section>

  




    </div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>
</div>


 
 
 

<style>
 .row1 {
     margin-left: 160px;
 }

 .morning{
  position:relative; left:870px;

 }
 
 
 @media (max-width: 767px) {
   .row1 {
     margin-left: 0;
 }

 .morning{
  position:relative; left:0;
  margin-right:14px;
 }
 }
 </style>

</body>
</html>


