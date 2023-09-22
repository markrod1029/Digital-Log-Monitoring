<?php include('include/session.php');?>

<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>


                <?php include('include/header.php');?>
                <?php include('include/sidebar.php');?>
                <?php include('include/menubar.php');
                
                ?>

          
  <div class="content-wrapper">

  <section class="content-header">
  <h1 class="h3 mb-4 text-gray">Patient Management</h1>

        </section>

                    <span id="message"></span>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        	<div class="row">
                            	<div class="col">
                            		<h3 class="m-0 font-weight-bold text-success">Archive Patient</h3>
                            	</div>
                            	<div class="col" align="right">
                            		<a href="add_patient.php" type="button" name="add_doctor" id="add_doctor" class="btn btn-success btn-circle btn-sm"><i class="fas fa-plus"></i></a>
                            	</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Full Name</th>
                                            <th>Email Address</th>
                                            <th>Contact No.</th>
                                            <th>Address</th>
                                            <th>B-date</th>
                                            <th>Gender</th>
                                            <th> Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                          <?php 
                    
                    $sql = "SELECT * from patient_table Where patient_status = 'Archive'";

                    $query = mysqli_query($conn, $sql);
                    $data = array();

                    while ($row = mysqli_fetch_assoc($query)) 
                    {
                       
                    ?>
                        <tr>
                        <td><img src="<?php echo $row["patient_photo"]?>" class="img-thumbnail" width="75" />

                        <td><?php echo $row["patient_first_name"]. ' '.$row["patient_last_name"];;?></td>
                        <td><?php echo $row['patient_email_address'];?></td>
                        <td><?php echo $row['patient_phone_no'];?></td>
                        <td><?php echo $row['patient_address'];?></td>
                        <td><?php echo $row['patient_date_of_birth'];?></td>
                        <td><?php echo $row['patient_gender'];?></td>
                        <td><?php echo $row['patient_maritial_status'];?></td>
                    <div align="center">
                    <td>
                    <a  name="delete" onclick="return confirm('Are you sure you want to go to Active this patient?')" href="crud/active_patient.php?id=<?php echo $row['id']?>"  class="btn btn-secondary btn-circle btn-sm delete_button" ><i class="fas fa-undo"></i></button>
                    </div>
                    </td>
                    
                    <?php
                            }
                    ?>

                        </tr>        


                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php
                include('include/footer.php');?>


                