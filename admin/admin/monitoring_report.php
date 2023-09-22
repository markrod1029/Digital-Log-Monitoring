<?php include 'includes/session.php'; ?>
<?php include 'includes/main_header.php';?>
<?php include 'includes/menu_bar.php';?>
  <?php include 'includes/main_sidebar.php';?>
  
  <div class="content-wrapper">

  <section class="content-header">
    <div class="card" style="position:absolute; top:20px;width:100%; padding:20px 0 20px 0; ">


    <h1 class = "dashboard">Monitoring Report
    </h1>
    <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li ><a href="home.php" ><i class="fas fa-dashboard"> &nbsp;</i>Home &nbsp;</a> </li>
                  <li class="breadcrumb-item active"> /&nbsp;Monitoring Report</li>
                </ol>
              </div>
    </div>
        </section>




        <section class="content">



    
        <div class="row  mx-auto">

<div class="col-sm-3  mx-auto">
<div class="info-box">
  <span class="info-box-icon bg-success"><i class="far fa-calendar-alt"></i></span>
  <div class="info-box-content">
    <span class="info-box-text text-bold">Ontime</span>
    <span class="info-box-text">Ontime Login</span>
  </div>
</div>
</div>

<div class="col-sm-3  mx-auto">
<div class="info-box">
  <span class="info-box-icon bg-danger"><i class="far fa-calendar-alt"></i></span>
  <div class="info-box-content">
    <span class="info-box-text text-bold">Late</span>
    <span class="info-box-text">Late Login</span>
  </div>
</div>
</div>


<div class="col-sm-3  mx-auto">
<div class="info-box">
  <span class="info-box-icon bg-warning"><i class="far fa-calendar-alt"></i></span>
  <div class="info-box-content">
    <span class="info-box-text text-bold">Late/Ontime</span>
    <span class="info-box-text">Multiple Login</span>
  </div>
</div>
</div>


</div>


        <div class="row">
        <div class="col-xs-12">
          <div class="card">
            <div class="box-header with-border">
            </div>
            <div class="box-body  mt-3 mb-3 ml-2 mr-2">
            <table id='morning' class='display dataTable table-bordered' style="width:100%;">
                <thead>
                <tr>
                  
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>Student</th>
                  <th>Date</th>
                  <th>Times of the Day</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php   
                $sql = "SELECT *
            FROM monitoring
            LEFT JOIN student ON student.id = monitoring.student_id
            ORDER BY STR_TO_DATE(monitoring.date, '%M %d, %Y') DESC, monitoring.time_in DESC";

                                $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                        if($row['status_monitoring'] == 1){
                           $status = ' <span class="badge badge-success text-white text-normal p-2 " style="font-size:15px;">Ontime</span>';
                        }

                        else if($row['status_monitoring'] == 0){
                            $status = '<span class="badge badge-danger text-white text-normal p-2 " style="font-size:15px;">Late</span>';
                            
                        }

                        
                        else if($row['status_monitoring'] == 2){
                              $status = ' <span class="badge badge-warning text-white text-normal p-2 " style="font-size:15px;">Ontime</span>';
                            
                        }
                        else {
                           $status = ' <span class="badge badge-warning text-white text-normal p-2 " style="font-size:15px;">Late</span>';

                        }

                      ?>

                      <tr>
                        
                      
                          <td><?php echo $row['stid']?></td>
                          <td><?php echo $row['fname'].' '.$row['lname']?></td>
                          <td><?php echo $row['student']?></td>
                            <td><?php echo date('F d, Y', strtotime($row['date']))?></td>
                          <td><?php echo $row['time']?></td>
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
                          <td><?php echo  $status?></td>

                      
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




  

  <?php include 'includes/scripts.php'; ?>
<?php include 'chart/csv.php'; ?>
  </div>
  <?php include 'includes/footer.php'; ?>


    </div>
</div>



<script>





        $(document).ready(function(){
            var empDataTable = $('#morning').DataTable({
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
                  columns: [0,1, 2,3,4, 5]
                }
	    },
	    
	    {
		extend:    'excelHtml5',
	filename: 'morning-report',
		titleAttr: 'Export to Excel',
		className: 'btn btn-success',
             
                exportOptions: {
                   columns: [0,1, 2,3,4, 5]
                }
	    },
	    
	       {
		extend:    'csv',
		filename: 'morning-report',
		titleAttr: 'Export to CSV',
		className: 'btn btn-success',
             
                exportOptions: {
                    columns: [0,1, 2,3,4, 5]
                }
	    },
	   {
   extend: 'pdfHtml5',
	filename: 'morning-report',
exportOptions: {
      columns: [0,1, 2,3,4, 5]
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
                 columns: [0,1, 2,3,4, 5]
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

