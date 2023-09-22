<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  $month = date('m');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Data Analytics Afternoon
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Senior </li>

                </ol>
              </div>
    </div>
        </section>





        <section class="content">


      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card">
          <ul class="nav nav-pills custom-pills mb-2" style="font-size:17px;">
                            
                            <li class="nav-item">
                                <a class="nav-link " id="pills-timeline-tab"  href="senior_morning_daily.php">Daily</a>
                            </li>

                      

                            <li class="nav-item">
                                <a class="nav-link show-btn" id="pills-setting-tab" style="border-bottom: solid 2px blue; color:#3C8DBC;"  href="senior_morning_monthly.php"  style="  color:#3C8DBC;">Monthly</a>
                            </li>

                          
                        </ul>
            <div class="box-header with-border">
              <h3 class="box-title">Yearly Ontime and Late Afternoon Report</h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Select Year: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2022; $i<=2065; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
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
            <?php include 'chart/afternoon/senior_afternoon_monthly_bar.php'; ?>

<?php include 'chart/afternoon/senior_afternoon_monthly_pie.php'; ?>

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


