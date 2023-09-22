<?php include 'includes/session.php';


 ?>
 
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">
   
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

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">About Us
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;About Us</li>
                </ol>
              </div>
    </div>
        </section>




        <section class="content">


        <?php
                    $sql = "SELECT * FROM aboutus";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){?>
                      

    <div class="row">
        <div class="col-xs-14">
            <div class="card bg-default text-white" style="background:#367FA9;">
            <ul class="mr-4" style="position:relative; right:20px;">
        <a href="#" class="dropdown-toggle text-white" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
        <ul class="dropdown-menu">
            <li>
            <a href="#" onclick="var password = prompt('Please enter the password:');
if (password != null) {
  if(password === 'preparatory'){
    window.location = 'edit_aboutus.php?id=<?php echo $row['id'];?>';
  }else {
    alert('Wrong Password')
  }
}"><i class="icon-arrow-up text-center ml-5"></i>Edit</a>

              <!-- <i class="icon-arrow-up text-center ml-5"></i><a href="#">Edit</a> -->
            </li>
        </ul>
</ul>          
                <h1 class="text-center mb-5 mt-3 ">About Us</h1>

                <p class="h4 text-center w-75 mx-auto mb-5"><?php echo $row['about']?></p>

            </div>
        </div>
    </div>


    <?php
    }
    ?>
    

<!--    <div class="container mb-5 mt-4">-->
<!--  <div class="row">-->

<!--  <h2 class="text-center mb-5 mt-3"  style="color: #233d63; font-family:mukta,  sans-serif;">Capstone Team</h2>-->

<!--    <div class="col-sm  mx-auto">-->
<!--    <img src="../../images/rig.jpg"  onclick="myFunction(this);"  alt=" Logo" style="margin-left:80px;" class=" img-circle  mb-4" width="200" height="200">-->
<!--    <h5 class="text-center" style="color: #233d63; font-family:mukta, sans-serif;">Rigs Ivan S. Amor</h5>-->
<!--    <h5 class="text-center" style="color: #233d63; font-family:mukta,  sans-serif;">Doyong, San Carlos City</h5>-->
<!--    </div>-->
<!--    <div class="col-sm">-->
<!--    <img src="../../images/felisse.jpg" style="margin-left:80px;" alt=" Logo" class=" img-circle   mb-4" width="200" height="200">-->
<!--     <h5 class="text-center" style="color: #233d63; font-family:mukta, sans-serif;">Felisse R. Bartido</h5>-->
<!--    <h5 class="text-center" style="color: #233d63; font-family:mukta,  sans-serif;">Coliling, San Carlos City</h5>-->
<!--    </div>-->
<!--    <div class="col-sm">-->
<!--    <img src="../../path/images/rod.jpg" style="margin-left:80px;" alt=" Logo" class=" img-circle mb-4" width="200">-->
<!--    <h5 class="text-center" style="color: #233d63; font-family:mukta, sans-serif;">Mark Rod P. Cadayong</h5>-->
<!--    <h5 class="text-center" style="color: #233d63; font-family:mukta,  sans-serif;">Lilimasan, San Carlos City</h5>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->




    
<!-- The expanding image container -->
<div class="container">
  <!-- Close the image -->
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

  <!-- Expanded image -->
  <img id="expandedImg" style="width:100%">

  <!-- Image text -->
  <div id="imgtext"></div>
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