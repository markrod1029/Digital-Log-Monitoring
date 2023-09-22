<style>
.charts {
    position: absolute;
	margin: 35px 90px;
	text-align: center;
    font-size: 40px;

}
.boxs {
                position: static;
                width: 200;
                height: 70px;
                background: #2196d0cc;
                color: white; 
			}
            .boxs1 {
                position: static;
                width: 200px;
                height: 70px;
                background: #fbe952;
                color: white;
			}
            .boxs2 {
                position: static;
                width: 200px;
                height: 70px;
                background: #ff2121bf;
                color: white;
			}.boxs3 {
                position: static;
                width: 200px;
                height: 70px;
                background: #00ffa1cc;
                color: white;
			}
#boxss .sub{
    font-size: 20px;
    text-align: center;
    margin: 0px 5px 5px 100px;
    width: 300px;
    height: 100px;
    background-color: white;
}
#boxss .student{
    font-size: 20px;
    text-align: center;
    margin: 0px 5px 5px 100px;
    width: 300px;
    height: 100px;
    background-color: white;
}
#boxss .teacher{
    font-size: 20px;
    text-align: center;
    margin: 0px 5px 5px 100px;
    width: 300px;
    height: 100px;
    background-color: white;
}
#boxss .sub .student .teacher{
    color:#ff2121bf;
}

</style>
<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
<?php include('dashboardwelcome.php'); ?>
    <body class="bgdboard" style="background: url(images/bgdboard.png)">
		<?php include('navbar.php') ?>
        <div class="container-fluid">
        <ul class="box-info">
<div class="row-fluid">
					<?php include('sidebar_dashboard.php'); ?>
                <!--/span-->
                <div class="span9" id="content">
						<div class="row-fluid"></div>
						
                    <div class="row-fluid"  style="width:100%;">
            
                        <!-- block -->
                 <!--       <div id="block_bg" class="block" style="opacity:0.9">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Numbers</div>
                            </div>  -->
                         
                            <div class="block-content collapse in">
							        <div class="span12" >
						
									<?php 
								$query_reg_teacher = mysqli_query($conn,"select * from teacher where teacher_status = 'Registered' ")or die(mysqli_error());
								$count_reg_teacher = mysqli_num_rows($query_reg_teacher);
								?>
								
                                <div class="span3">
                                <ul class="boxs">
                                    <div class="charts" data-percent="<?php echo $count_reg_teacher; ?> style=padding"><?php echo $count_reg_teacher; ?> </div>
                                    <div class="chart-bottom-heading"><strong>Registered Teacher</strong>
                                    </div></ul>
                                </div>
								
								<?php 
								$query_student = mysqli_query($conn,"select * from student where status='Registered'")or die(mysqli_error());
								$count_student = mysqli_num_rows($query_student);
								?>
								
                                <div class="span3">
                                <ul class="boxs1">

                                    <div class="charts" data-percent="<?php echo $count_student ?>"><?php echo $count_student ?></div>
                                    <div class="chart-bottom-heading"><strong>Registered Students</strong>

                                    </div></ul>
                                </div>	
									<?php 
								$query_class = mysqli_query($conn,"select * from class")or die(mysqli_error());
								$count_class = mysqli_num_rows($query_class);
								?>
								
                                <div class="span3">
                                <ul class="boxs2">

                                    <div class="charts" data-percent="<?php echo $count_class; ?>"><?php echo $count_class; ?></div>
                                    <div class="chart-bottom-heading"><strong>Grade & Section</strong>

                                    </div></ul>
                                </div>
								
								
										<?php 
								$query_file = mysqli_query($conn,"select * from files")or die(mysqli_error());
								$count_file = mysqli_num_rows($query_file);
								?>
								
                                <div class="span3">
                                <ul class="boxs3">
                                    
                                    <div class="charts" data-percent="<?php echo $count_file; ?>"><?php echo $count_file; ?></div>
                                    <div class="chart-bottom-heading"><strong>Downloaded Files</strong>

                                    </div></ul>
                                </div>

						
                   </div>
                        </div>
                        <hr>
                <ul>
                    <table class="boxss" id="boxss" style="width: 100%; opacity: 0.9;">
                <tr>
                    
                  <th class="student"> <a href="students.php">ADD STUDENTS</a> <h5><a href="students.php">View Students</a> </h5>   </th>
                <th></th>
                  <th class="sub">  <a href="subjects.php">ADD SUBJECTS</a> <h5><a href="subjects.php">View Subjects</a> </h5></th>
                <th></th>
                   <th class="teacher"> <a href="teachers.php">ADD TEACHERS </a><h5><a href="teachers.php">View Teachers</a> </h5> </th></tr>

                <td class="student">
                <?php 
								$query_student = mysqli_query($conn,"select * from student")or die(mysqli_error());
								$count_student = mysqli_num_rows($query_student);
								?>
                    <div class="chart" data-percent="<?php echo $count_student ?>"><?php echo $count_student ?></div>
                    <div class="chart-bottom-heading"><strong>Students</strong>
                </td><td></td>
                <td class="sub">    
                <?php 
								$query_subject = mysqli_query($conn,"select * from subject")or die(mysqli_error());
								$count_subject = mysqli_num_rows($query_subject);
								?>
                    <div class="chart" data-percent="<?php echo $count_subject; ?>"><?php echo $count_subject; ?></div>
                    <div class="chart-bottom-heading"><strong>Subjects</strong>
                </td><td></td>
                <td class="teacher"> 
                <?php 
								$query_teacher = mysqli_query($conn,"select * from teacher")or die(mysqli_error());
								$count_teacher = mysqli_num_rows($query_teacher);
								?>
                    <div class="chart" data-percent="<?php echo $count_teacher; ?>"><?php echo $count_teacher ?></div>
                    <div class="chart-bottom-heading"><strong>Teachers</strong>
                 </td>

                    </table>
                </ul>
             
                        <!-- /block -->
						
                    </div>
                    </div>
                
                
                 
                 
                </div>
            </div>
    
            </ul>

         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

</html>