<?php
include('header_dashboard.php');
include('session.php');

// Get the class_quiz_id from URL parameter
$get_id = $_GET['id'];

?>

<body id="class_div" class="bgdboard" style="background: url(admin/images/bgdboard.png)">
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('quiz_link.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <!-- breadcrumb -->
                    <?php
                    $class_query = mysqli_query($conn, "SELECT * FROM teacher_class
                                    LEFT JOIN class ON class.class_id = teacher_class.class_id
                                    LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                    WHERE teacher_class_id = '$get_id'") or die(mysqli_error());
                    $class_row = mysqli_fetch_array($class_query);
                    ?>
                   <!-- <ul class="breadcrumb">
                        <li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
                        <li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
                        <li><a href="#"><b>View Quiz</b></a></li>
                    </ul> -->
                    <!-- end breadcrumb -->
                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left"></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Quiz Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                  
                                        <?php
                                        $my_student = mysqli_query($conn, "SELECT * FROM student_class_quiz
                                            LEFT JOIN student ON student.student_id = student_class_quiz.student_id
                                            WHERE student_class_quiz.class_quiz_id = '$get_id' order by lastname") or die(mysqli_error());
                                        while ($row = mysqli_fetch_array($my_student)) {
                                            $student_name = $row['lastname'] . ' ' . $row['firstname'];
                                            $quiz_score = $row['grade'];
                                        ?>
                                            <tr>
                                                <td><?php echo $student_name; ?></td>
                                                <td><?php echo $quiz_score; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>

</html>
