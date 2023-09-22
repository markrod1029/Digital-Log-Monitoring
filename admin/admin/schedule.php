<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Schedule List
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="#" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Schedule List</li>
                </ol>
              </div>
         <a href="add_schedule.php"  class="btn btn-primary  add mt-2"><i class="fa fa-plus"></i></a>

    </div> 

        </section>




        <section class="content">


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

        <div class="row">
        <div class="col-xs-12">
          <div class="card">
            <div class="box-header with-border">
            </div>
            <div class="box-body mt-3 mb-3 ml-2 mr-2">
            <table id='schedule' class='display dataTable table-bordered' style="width:100%;">
                <thead>
                <tr>
                  <th>Position</th>
                  <th>Morning Schedule</th>
                  <th>Afternoon Schedule</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM schedules";
                    $query = $conn->query($sql);
                    $data = array();
                    while($row = $query->fetch_assoc()){?>
                      
                        <tr>
                        <td><?php echo $row['position'];?></td>
                          <td><?php echo date('h:i A', strtotime($row['time_in_morning'])).'/'.date('h:i A', strtotime($row['time_out_morning']));?></td>
                          <td><?php echo date('h:i A', strtotime($row['time_in_afternoon'])).'/'.date('h:i A', strtotime($row['time_out_afternoon']));?></td>
                          <td>
                          <a href="edit_schedule.php?id=<?php echo $row['id'];?>" class="btn btn-success btn-sm  btn-flat" ><i class="fa fa-edit"></i> </a>
                          <a  name="delete" onclick="return confirm('Are you sure you want to remove this schedule?')" href="crud/schedule_delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm  btn-flat" ><i class="fa fa-trash"></i> </a>
                          </td>
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
    </section>   




    <?php include 'includes/footer.php'; ?>
  

  <?php include 'includes/scripts.php'; ?>
<?php include 'chart/csv.php'; ?>
  </div>


    </div>
</div>






<script>





        $(document).ready(function(){
            var empDataTable = $('#schedule').DataTable({
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
                columns: [0,1, 2, ]
                }
	    },
	    
	    {
		extend:    'excelHtml5',
	filename: 'student-schedule',
		titleAttr: 'Export to Excel',
		className: 'btn btn-success',
             
                exportOptions: {
                   columns: [0,1, 2, ]
                }
	    },
	    
	       {
		extend:    'csv',
	filename: 'student-schedule',
		titleAttr: 'Export to CSV',
		className: 'btn btn-success',
             
                exportOptions: {
                  columns: [0,1, 2, ]
                }
	    },
	   {
   extend: 'pdfHtml5',
filename: 'student-schedule',
exportOptions: {
    columns: [0,1, 2, ]
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
                columns: [0,1, 2, ]
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
</html>


