<link rel="icon" href="logo.png">
<?php
 include 'session.php';

 
if(isset($_POST["submit"]))
{
	@$plumber_ID=$_GET['plumber_ID'];
	@$complaint_ID=$_GET['complaint_ID'];
	@$client_ID32=$_GET['client_ID'];
	@$date=$_POST['date'];
	@$visited='0';
	
	$client=mysqli_query($connect,"SELECT * FROM tblclients WHERE client_ID='$client_ID32' ")or die(mysqli_error($connect));
	$crw=mysqli_fetch_assoc($client);
	$email=$crw['ClientEmail'];
	$name= $crw['client_fname'].' '.$crw['client_mname'].' '. $crw['client_lname'] ;
	
	if(empty($date))
	{

		$_SESSION['error'] = 'Date is Empty!';


		echo
		"
			<script>
				window.location='../complaints.php?cmp=$complaint_ID';
			</script>
		";
	}else
	{
		$invalid=mysqli_query($connect,"SELECT * FROM inspection_schedule_for_complaints WHERE date='$date' and plumber_ID='$plumber_ID' ")or die(mysqli_error($connect));
		$rw=mysqli_num_rows($invalid);
		if($rw>0)
		{

			$_SESSION['error'] = "Entered Date ($date) Unavailable!";

			
			$name = $user['Fname'].' '.$user['Mname'].' '.$user['Lname']; 
			$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$name', 'Plumber',   NOW(),  'Complaint Date ($date) Unavailable')";
				$query = mysqli_query($connect,$insert);
	


			echo
			"
				<script>
					window.location='../complaints.php?cmp=$complaint_ID';
				</script>
			";
			return false;
		}else
		{
			$set=mysqli_query($connect, "INSERT INTO inspection_schedule_for_complaints(complaint_ID,plumber_ID,date,visited)
			VALUES('$complaint_ID','$plumber_ID','$date','0')
			")or die(mysqli_error($connect));
			
			$update=mysqli_query($connect,"UPDATE tblcomplaints SET  scheduled = '1' WHERE complaint_ID='$complaint_ID'")or die(mysqli_error($connect));
			
			require("PHPMailer-Master/src/PHPMailer.php");
			require("PHPMailer-Master/src/SMTP.php");
			
			$mailto= $email;
			$body="Dear Ma'am/Sir ".$name.";\n \nYour concern has been received. Your concern or complaint will be addressed and scheduled for inspection.\n Your Schedule: ".$date."\n Thank you very much!";
			$mail= new PHPMailer\PHPMailer\PHPMailer();
			$mail->isSMTP();
			$mail->Host= "mail.smtp2go.com";
			$mail->SMTPAuth= true;
			$mail->Username="psu.edu.ph";
			$mail->Password="Jmt564956495649";
			$mail->SMTPSecure="tls";
			$mail->Port="2525";
			$mail->From="jhonhelterrado@gmail.com";
			$mail->FromName="JMT";
			$mail->addAddress($mailto,"JMT");
			$mail->isHTML= true;
			$mail->Subject= "URBIZTONDO WATER SERVICES (Complaint Response)";
			$mail->Body= $body;
			if(!$mail->send())
			{
			
				
			$_SESSION['error'] = "Mailer Error".$mail->ErrorInfo;;

				
			}else
			{
				
			$_SESSION['success'] = "Successfully Scheduled ($date) and Sent to Client!";
				 

			
			$name = $user['Fname'].' '.$user['Mname'].' '.$user['Lname']; 
			$insert = "INSERT INTO activity( name, position,  time_loged, status)
				VALUES( '$name', 'Plumber',   NOW(),  'Successfully Scheduled ($date) and Sent to Client')";
				$query = mysqli_query($connect,$insert);

			echo
			"
				<script>
					window.location='../scheduled-complaints.php';
				</script>
			";
			}
			
		}
		
		
	}
}



?>
