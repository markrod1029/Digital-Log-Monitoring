
<?php include('include/session.php');?>

<?php 
error_reporting(0);

  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>


                <?php include('include/header.php');?>
                <?php include('include/sidebar.php');?>
                <?php include('include/menubar.php'); ?>

          
  <div class="content-wrapper wrapper">
<body>
  <div class="wrapper">
  <section class="chat-area">
      <header>
      <?php 
          $doctor_id = mysqli_real_escape_string($conn, $_GET['doctor_id']);
          $sql = mysqli_query($conn, "SELECT * FROM doctor_table WHERE doctor_id = {$doctor_id}");
          $sql1 = mysqli_query($conn, "SELECT * FROM admin_table WHERE id = {$doctor_id}");

          if(mysqli_num_rows($sql) > 0 || mysqli_num_rows($sql1) > 0 ){
            $row = mysqli_fetch_assoc($sql);
            $row1 = mysqli_fetch_assoc($sql1);
            
            $sql1 = "UPDATE messages SET message_status = '5' WHERE outgoing_msg_id = '$doctor_id'";
            $conn->query($sql1);

          }else{
            header("location: users.php");
          }
        ?>
        <a href="message.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        
        <?php if($row['doctor_id'] == $doctor_id){?>

        
         <img src="../images/<?php echo $row['doctor_profile_image']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['doctor_name'] ?></span>
          <p><?php echo $row['chat_status']; ?></p>
        </div>
        
       
        <?php }
        
        else{?>
        
        <img src="../images/<?php echo $row1['photo']; ?>" alt="">
        <div class="details">
          <span><?php echo $row1['admin_firstname'].' '. $row1['admin_lastname'] ?></span>
          <p><?php echo $row1['chat_status']; ?></p>
        </div>
            
        <?php } ?>
        
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $doctor_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>
  <?php include 'include/footer.php'; ?>

</body>
</html>