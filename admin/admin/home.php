<?php include 'includes/session.php';


 ?>
 
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
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

    <div class="col-lg-6 col-xs-8" >
      <!-- small box -->

            <div id="chartContainer" >
          </div>

    </div>



    <div class="col-lg-6 col-xs-9">
         
       
    <div class="mapouter"><div class="gmap_canvas">
                    <iframe width="95%" height="400" style="position:absolute; " id="gmap_canvas" src="https://maps.google.com/maps?q=San%20Carlos%20Prepatory%20School&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <a href="https://putlocker-is.org"></a>
                            <br>
                    

                    
                </div>
    </div>



    

  </section>

  




    </div>



  <?php include 'chart/pie.php'; ?>






 
<?php include 'includes/footer.php'; ?>
</div>

<?php include 'chart/pie_bar.php'; ?>
<?php include 'includes/scripts.php'; ?>



</body>
</html>



<style>

@media (max-width: 667px) {      
#gmap_canvas{
   position:absolute;
   top:450px;
   width:90%; 

left:10px;
  }
          }


  </style>