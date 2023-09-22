<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Student List</h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Student List</li>
                </ol>
              </div>

    </div>
        </section>

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



    <section class="content">

<div class="row">
<div class="col-xs-12">
  <div class="card">
    <div class="box-header with-border">
    </div>
    <div class="card-body mt-3 mb-3 ml-2 mr-2">
    <table id='studenttable' class='display dataTable table-bordered' style="width:100%;">
        <thead>
        <tr>
                 <th>Photo</th>
                <th>QR Code</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Email Address</th>
                <th>Phone No.</th>
                <th>Student</th>
                <th>Schedule</th>
                <th>Action</th>
        </tr>
        </thead>
        <tbody>
          <?php 
                    $student =$user['student'];
                    $sql = "SELECT *, student.id AS stid FROM student LEFT JOIN schedules ON schedules.id=student.schedule_id 
                    WHERE student.schedule_id = '$student'  ";

                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $image = (!empty($row['photo'])) ? '../../path/images/'.$row['photo'] : '../../path/images/profile.jpg';
                       
                    ?>
                         <tr>
                        <td><img src="<?php echo (!empty($row['photo']))? '../../path/images/'.$row['photo']:'../../path/images/profile.jpg'; ?>" width="50px" height="50px"> 
                       </td>
                       <td><center><img src="../../path/qrcode/<?= $row['student_id']; ?>.png" width="50px" height="50px"></center></td>
                        <td><?php echo $row['student_id'];?></td>
                        <td><?php echo $row['fname'].' '.$row['lname']; ?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['position'] ;?></td>
                        <td><?php echo date('h:i A', strtotime($row['time_in_morning'])).' - '.date('h:i A', strtotime($row['time_out_morning'])).'<br>'.date('h:i A', strtotime($row['time_in_afternoon'])).' - '.date('h:i A', strtotime($row['time_out_afternoon'])); ?></td>

                            <td> 
                            <center>
                            <a href="student_information.php?id=<?php echo $row['stid'];?>" class="btn btn-success btn-sm  btn-flat" ><i class="fa fa-eye"></i> </a>
                            <a href="edit_student.php?id=<?php echo $row['stid'];?>" class="btn btn-primary btn-sm  btn-flat" ><i class="fa fa-edit"></i> </a>
                            <a  name="delete" onclick="return confirm('Are you sure you want to remove this User?')" href="crud/student_delete.php?id=<?php echo $row['stid'];?>" class="btn btn-danger btn-sm  btn-flat" ><i class="fa fa-trash"></i> </a>
                            </center>
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

    <?php include 'includes/scripts.php'; ?>
<?php include 'chart/csv.php'; ?>
  </div>
  <?php include 'includes/footer.php'; ?>

</div>



<script>





        $(document).ready(function(){
            var empDataTable = $('#studenttable').DataTable({
                dom: 'Blfrtip',
                "scrollX": true,
                "lengthChange": false,
   responsive: true,
        "searching": true,
 
             buttons:[ 
                 
                    {
		extend:    'copy',

		className: 'btn btn-success',
               
                exportOptions: {
                columns: [ 2, 3,4,5,6,7]
                }
	    },
	    
	    {
		extend:    'excelHtml5',
	filename: 'student-info',
		titleAttr: 'Export to Excel',
		className: 'btn btn-success',
             
                exportOptions: {
                    columns: [ 2, 3,4,5,6,7]
                }
	    },
	    
	       {
		extend:    'csv',
	filename: 'student-info',
		titleAttr: 'Export to CSV',
		className: 'btn btn-success',
             
                exportOptions: {
                   columns: [ 2, 3,4,5,6,7]
                }
	    },
	   {
   extend: 'pdfHtml5',
filename: 'student-info',
exportOptions: {
    columns: [2, 3, 4, 5, 6, 7]
},
customize: function (doc) {
    // Add some text to the top of the PDF
    doc.content.splice(0, 0, {
        text: 'San Carlos Preparatory School',
        style: 'header'
    }, {
        text: 'San Carlos City Pangasinan',
        style: 'subheader'
    });

    // Define custom styles for the text
    doc.styles.header = {
        fontSize: 18,
        bold: true,
        alignment: 'center'
    };
    doc.styles.subheader = {
        fontSize: 14,
        bold: false,
        alignment: 'center'
    };

    // Remove the default table styling
    doc.styles.tableHeader = {
        fillColor: '#3C8DBC',
        color: '#fff',
        bold: true
    };
    doc.styles.tableBodyEven = {};
    doc.styles.tableBodyOdd = {};
    doc.styles.tableFooter = {
        fillColor: '#3C8DBC',
        color: '#fff',
        bold: true
    };

}
},
        
	     {
                extend:    'print',
       extend: 'print',
            exportOptions: {
                columns: [  2, 3, 4, 5, 6,7]
            },
            customize: function ( win ) {
                // Add an image to the top of the printed output
      
                $(win.document.body).prepend('<img src="https://preparatory-log.online/admin/admin/logo.png" style=" position:absolute; left:300px; top:-1px; text-center;width:70px;height:70px;">');
               
                // Add some text to the top of the printed output
                $(win.document.body).prepend('<h4 style="text-align:center;margin-top:5px;">San Carlos Preparatory School </h4><h5 style="text-align:center; margin-buttom:20px;"> San Carlos City Pangasinan</h5>');
                    $(win.document.body).find('h1:first').remove();
         
            }
        }
        ],
            });

        });

    
        </script>

</body>
