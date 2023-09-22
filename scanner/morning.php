<?php include 'includes/header.php'; ?>
<?php include 'includes/conn.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
    <script>
        $(document).ready(function() {
            $('#dataTable_1').DataTable();
        });
    </script>

</head>
<body class="page-body login-page login-form-fall">
<?php include 'includes/navbar.php'; ?>


</nav><br>

<div class="container mt-5 text-center">
                    <div id="clockdate" style=" padding:30px; font-size:30px;border: 1px solid #3C8DBC;background-color: #3C8DBC">
                        <div class="clockdate-wrapper">
                            <div id="clock" style="font-weight: bold; color: #fff;font-size: 40px"></div>
                            <div id="date" style="color: #fff"><i class="fas fa-calendar"></i> <?php echo date('l, F j, Y'); ?></div>
                        </div>
                    </div>
                    <br>

        <div class="row ">
            <div class="col-md-6 ">

                 <label class="btn btn-primary active">
                    <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera 
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
                </label>
 
                 <video id="preview" width="100%"></video>
                <?php include 'monitoring/DTR_morning.php'; ?>


          
                 
                 <hr></hr>
            </div>


            <div class="col-md-6">
              
                <form action="" method="POST" class="form-harizontal">

                    <label><b>SCAN QR CODE</b></label>
                    <div class="form-group">
           
          </div>
          <script src="../dist/script.js"></script>
                    <input type="text" name="student_qrcode" id="student_qrcode"  placeholder="scan qrcode" class="form-control">
               
                </form>
                <hr>
                </hr>
               <div class="table-responsive">
                <table id="dataTable_1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STUDENT FULLNAME</th>
                            <th>TIME IN</th>
                            <th>TIME OUT</th>
                            <th>DATE</th>

                        </tr>
                    </thead>
                    <tbody>    
                    <?php 

              $sql= "SELECT * FROM monitoring LEFT JOIN student ON
               student.id = monitoring.student_id WHERE monitoring.date = '$today' AND monitoring.time = 'Morning'";
                   $query = $conn->query($sql);
                       while($row = $query->fetch_assoc()){
                        
                         ?>
                        <tr align="center">
                            <td><?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']; ?></td>
                       <td><?php
                          
                          if($row['time_in'] == '00:00:00'){
                              echo '';
                          }
                          else{
                           echo date('h:i:s A', strtotime($row['time_in']));  
                          }
                          
                       ?></td>
                          <td><?php
                          if($row['time_out'] == '00:00:00'){
                              echo '';
                          }
                          else{
                           echo date('h:i:s A', strtotime($row['time_out']));  
                          }
                          
                          ?></td>
                          
                            <td><?= date("M d, Y",strtotime($row['date'])); ?></td>

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
    <br>
    <br>

    <script src="https://code.jquery.com/jqu..." integrity="sha256-/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script type="text/javascript">
					let scanner = new Instascan.Scanner({
                        video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
					
					Instascan.Camera.getCameras().then(function (cameras){
						if(cameras.length>0){
							scanner.start(cameras[0]);
							$('[name="options"]').on('change',function(){
								if($(this).val()==1){
									if(cameras[0]!=""){
										scanner.start(cameras[0]);
									}else{
										alert('No Front camera found!');
									}
								}else if($(this).val()==2){
									if(cameras[1]!=""){
										scanner.start(cameras[1]);
									}else{
										alert('No Back camera found!');
									}
								}
							});
						}else{
							console.error('No cameras found.');
							alert('No cameras found.');
						}
					}).catch(function(e) {
                        console.error(e);
					});


                    scanner.addListener('scan', function(c) {
            document.getElementById('student_qrcode').value = c;
            document.forms[0].submit();

            document.getElementById('student_qrcode').reset();
        });
				</script>


<script>
        $(document).ready(function() {
            $('#dataTable_1').DataTable();
        });
    </script>


     <script type="text/javascript">
      document.oncontextmenu = document.body.oncontextmenu = function() {return false;}//disable right click
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>