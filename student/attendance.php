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


    <h1 class = "dashboard">QR-Code
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;QR-Code</li>
                </ol>
              </div>
    </div>
        </section>


 <section class="content ">

 <?php
    $ID = $user['id'];
 $view = "SELECT * from attendance where student_id = '$ID' AND date = '$today'";
 $result = $conn->query($view);
 $row = $result->fetch_assoc();
 
 ?>
 <div class="login-logo">
  		<p id="date" class="mt-0" ></p>
      <p id="time" class="text-bold mt-0"></p>
  	</div>
<div class="row">

<div class="row">


<button  class ="p-3 rounded-pill border-primary bg-primary w-50 m-auto col-xs-5 "  onClick="document.getElementById('pol').style.display='block'">Open QR Code</button>


    

<div>



<div class="row mt-5" id="pol"  style="display:none">
    <div class="col-xs-12  qr-show mx-auto">
        <div class="card card2 ">
            <div class="box-header with-border">
                <h3 class="text-center text-bold mt-2 ">Student QR Code</h3>
            </div>
                <img id="imageResult" class=" mx-auto" style="width:300px" src="../path/qrcode/<?= $user['student_id']; ?>.png"  alt="User Image" >            
             <h3 class="text-center text-bold mt-2 "><?php echo $user['qrcode'];?></h3>



            </div>
    

    </div>
    
</div>
</div>



<h4 class="text-muted text-center mt-3 mb-5">You Have Complete This Day?</h4>

</section>   

       
    </div>
</div>



<?php include 'includes/scripts.php' ?>


    <script>
      $(document).ready(function(){
          $(".hide-btn").click(function(){
              $(".box-show").hide();
              $(".show-btn").show();


          });
          $(".show-btn").click(function(){
              $(".box-show").show();
          });
      });


      $(document).ready(function(){
          $(".hide-qr").click(function(){
              $(".qr-show").hide();
              $(".show-qr").show();



          });
          $(".show-qr").click(function(){
              $(".qr-show").show();
          });
      });
    </script>


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

    .checkin{
        position:absolute;
         left:40px;
         font-size:25px;
    }
    .checkout{
        position:absolute; 
        right:120px;
        font-size:25px;
    }

    .checkinvalue{
        position:relative;
         left:110px;
         font-size:27px;
    }

    .checkoutvalue{
        float:right; 
        position:absolute;
         top:140px;
          right:130px;
          font-size:27px;
    }

    .card1{
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;

        border-radius:15px; 
         margin: auto;
    }
    .card2{
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      width: 68%;
       border-radius:15px;
        margin: auto;
    }
    @media (max-width: 667px) {      
      .card{
     width:100%;
    }
  #imageResult{
    width:100%;
    height:100%;
    }

    .checkin{
        position:absolute;
        left:-50px;         
         font-size:25px;
    }
    .checkout{
        position:absolute; 
        right: 40px;
        font-size:25px;
    }

    .checkinvalue{
        position:relative;
         left:20px;
         font-size:27px;
    }

    .checkoutvalue{
        position:relative;
        top:-26px;
        left:-25px;
      }
    }
    @media (max-width: 667px) {  
.imageResult{
width:800px;
}
}

</style>