<?php
include('dbcon.php');
        
               $un = $_POST['un'];
               $fn = $_POST['fn'];
               $mn = $_POST['mn'];
               $ln = $_POST['ln'];
               $sex = $_POST['sex'];
               $class_id = $_POST['class_id'];
               $lm = $_POST['lm'];
               $un = $_POST['email'];

               mysqli_query($conn,"insert into student (username,firstname,middlename,lastname,sex,learning_modality,location,class_id,status,email)
		values ('$un','$fn','$mn','$ln','$sex','$lm','$email','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered')                                    
		") or die(mysqli_error()); ?>
<?php    ?>