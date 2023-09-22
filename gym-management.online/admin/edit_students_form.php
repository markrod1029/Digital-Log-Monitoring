   <div class="row-fluid">
       <a href="students.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Student</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Student</div>
                            </div>
                            <div class="block-content collapse in">
							<?php
							$query = mysqli_query($conn,"select * from student LEFT JOIN class ON class.class_id = student.class_id where student_id = '$get_id'")or die(mysqli_error());
							$row = mysqli_fetch_array($query);
							?>
                                <div class="span12">
								<form method="post">
								
								        <div class="control-group">
                                   
                                          <div class="controls">
                                            <select  name="cys" class="" required>
                                             	<option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
											<?php
											$cys_query = mysqli_query($conn,"select * from class order by class_name");
											while($cys_row = mysqli_fetch_array($cys_query)){
											
											?>
											<option value="<?php echo $cys_row['class_id']; ?>"><?php echo $cys_row['class_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
								
										<div class="control-group">
                                          <div class="controls">
                                            <input name="un" value="<?php echo $row['username']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "LRN" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input name="fn"  value="<?php echo $row['firstname']; ?>"  class="input focused" id="focusedInput" type="text" placeholder = "Firstname" required>
                                          </div>
                                        </div>
										
                                        <div class="control-group">
                                          <div class="controls">
                                            <input name="mn"  value="<?php echo $row['middlename']; ?>"  class="input focused" id="focusedInput" type="text" placeholder = "Middlename" required>
                                          </div>
                                        </div>

										<div class="control-group">
                                          <div class="controls">
                                            <input  name="ln"  value="<?php echo $row['lastname']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Lastname" required>
                                          </div>
                                        </div>
                                        <div class="control-group">
								   <div class="controls">
									 <select  name="sex" class="" required>
                      <option value="<?php echo $row['sex']; ?>">Sex</option>
										  <option>M</option>
										  <option>F</option>
									 </select>
								   </div>
								 </div>
								 <div class="control-group">
								   <div class="controls">
									 <select  name="lm" class=""  required>
                   <option value="<?php echo $row['learning_modality']; ?>">Learning Modality</option>
										  <option>Face to Face</option>
										  <option>Modular Distance Learning</option>
										  <option>Online Distance Learning</option>
									 </select>
								   </div>
								 </div>
								
										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i> Save</button> <!-- update -->
												
                                          </div>
                                        </div>

                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
		
	      <?php
                            if (isset($_POST['update'])) {
                               
                                $un = $_POST['un'];
                                $fn = $_POST['fn'];
                                $mn = $_POST['mn'];
                                $ln = $_POST['ln'];
                                $sex = $_POST['sex'];
                                $lm = $_POST['lm'];
                                $cys = $_POST['cys'];
                      

								mysqli_query($conn,"update student set username = '$un' , firstname ='$fn', middlename ='$mn', lastname = '$ln', sex = '$sex', learning_modality = '$lm' , class_id = '$cys' where student_id = '$get_id' ")or die(mysqli_error());

								?>
 
								<script>
								window.location = "students.php"; 
								</script>

                       <?php     }  ?>
	