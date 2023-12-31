<head>
	<title>How to use Toastr</title>
	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<!-- Styles -->
	<style type="text/css">
		body {background: whitesmoke;text-align: center;}
		button{background-color: darkslategrey;color: white;border: 0;font-size: 18px;font-weight: 500;border-radius: 7px;padding: 10px 10px;cursor: pointer;white-space: nowrap;}
		#success{background: green;}
		#error{background: red;}
		#warning{background: coral;}
		#info{background: cornflowerblue;}
		#question{background: grey;}
	</style>
</head>
<body>
	<div>
		<h1>How to use <b>Toastr</b></h1>
		<div>
			<h4>Popup Type</h4>
			<p>Toastr have 4 popup type and the different is icon and background</p>
			<button id="success" >Success</button>
			<button id="info" >Info</button>
			<button id="error" >Error</button>
			<button id="warning">Warning</button>
		</div>
		<br>
		<div>
			<h4>Image and Loading</h4>
			<p>Popup notification with image and progress bar</p>
			<button id="image">Image and Loading</button>
		</div>
		<br>
		<div>
			<h4>Position</h4>
			<p>There is 8 Toastr position support</p>
			<p>
			<form id="positionForm">
				<input type="radio" name="position" value="top-left" checked>Top Left
				<input type="radio" name="position" value="top-center">Top Center
				<input type="radio" name="position" value="top-right">Top Right
				<input type="radio" name="position" value="top-full-width">Top Full Width
				<input type="radio" name="position" value="bottom-left">Bottom Left
				<input type="radio" name="position" value="bottom-center">Bottom center
				<input type="radio" name="position" value="bottom-right">Bottom right
				<input type="radio" name="position" value="bottom-full-width">Bottom Full Width
			</form>
			</p>
			<button id="position">Show Toast</button>
		</div>
	</div>

	<script type="text/javascript">
	// Default Configuration
		$(document).ready(function() {
			toastr.options = {
				'closeButton': true,
				'debug': false,
				'newestOnTop': false,
				'progressBar': false,
				'positionClass': 'toast-top-right',
				'preventDuplicates': false,
				'showDuration': '1000',
				'hideDuration': '1000',
				'timeOut': '5000',
				'extendedTimeOut': '1000',
				'showEasing': 'swing',
				'hideEasing': 'linear',
				'showMethod': 'fadeIn',
				'hideMethod': 'fadeOut',
			}
		});

	// Toast Type
		$('#success').click(function(event) {
			toastr.success('You clicked Success toast');
		});
		$('#info').click(function(event) {
			toastr.info('You clicked Info toast')
		});
		$('#error').click(function(event) {
			toastr.error('You clicked Error Toast')
		});
		$('#warning').click(function(event) {
			toastr.warning('You clicked Warning Toast')
		});

	// Toast Image and Progress Bar
		$('#image').click(function(event) {
			toastr.options.progressBar = true,
			toastr.info('<img src="https://image.flaticon.com/icons/svg/34/34579.svg" style="width:150px;">', 'Toast Image')
		});


	// Toast Position
		$('#position').click(function(event) {
			var pos = $('input[name=position]:checked', '#positionForm').val();
			toastr.options.positionClass = "toast-" + pos;
			toastr.options.preventDuplicates = false;
			toastr.info('This sample position', 'Toast Position')
		});
	</script>
</body>
<!DOCTYPE html>  
 <html>  
 <head>  
     <title>Toastr in PHP Code Example</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
     <style>
     .toast
     {
         position: absolute; 
         top: 10px; 
         right: 10px;
     }
 </style>
 </head>  
 <body class="bg-dark">  
     <div class="container mt-5 pt-5" >
         <div class="card mt-3">
             <div class="card-header text-center bg-info text-white">
                 <h1>Toastr in PHP Code Example</h1>
             </div>
             <div class="card-body">
                 <form id="submit_form">
                     <div class="mb-3"> 
                         <label>Email : </label>  
                         <input type="email" name="email" id="email" class="form-control" />  
                     </div>
                     <div class="mb-3">
                         <label>Message : </label>  
                             <textarea name="password" id="message" class="form-control" rows="5" ></textarea>  
                     </div>
                     <div class="d-flex justify-content-center">
                         <input type="button" name="submit" id="submit" class="btn btn-primary" value="Submit" />  
                     </div>  
                 </form>
             </div>
         </div>  
         <div class="toast" id="myToast" data-bs-autohide="true">
             <div class="toast-header">
                 <strong class="me-auto"><i class="bi-bell-fill"></i>notification</strong>
                 <small>1 sec ago</small>
                 <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
             </div>
             <div class="toast-body">
                 <p id="error_message"></p>
             </div>  
         </div> 
     </div>
 <script>  
     $(document).ready(function(){  
         $('#submit').click(function(){  
             var email = $('#email').val();  
             var message = $('#message').val();  
             if(email == '' || message == ''){  
                 $('#error_message').html("All Fields are required");
                 
             }else{  
                 $.ajax({  
                     url:"login_process.php",  
                     method:"POST",  
                     data:{email:email, message:message},  
                     success:function(data){
                         $('.toast').toast('show');
                         $('#error_message').html(data);  
                     }  
                 });  
             }  
         });  
     });  
 </script>  
 </body>  
 </html>  