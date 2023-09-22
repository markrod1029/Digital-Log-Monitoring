<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>

<div id="container">
    
			<div class="login-container">
	

	<div class="login-header login-caret">
		
		<div class="login-content">
			
        <img src="../path/images/logo.png" class="img-circle"  width="90" height="90" alt="User Image">  
			<h1 class ="title" >Preparatory Digital Log Monitoring With Data Analytics </h1>
			
			<!-- progress bar indicator -->
			
		</div>
		
	</div>
	
	

</div>

		</div>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        setTimeout(function(){
            $('.loader_bg').fadeToggle();
        }, 1500);
    </script>



<style>
.loader_bg{
    position: fixed;
    z-index: 99999999;
    background: #fff;
    width: 100%;
    height: 100%;
}
.loader{
    border: 0 soild transparent;
    border-radius: 50%;
    width: 120px;
    height: 120px;
    position: absolute;
    top: calc(50vh - 75px);
    left: calc(50vw - 75px);
}
.loader:before, .loader:after{
    content: '';
    border: 0.4em solid #3C8DBC;
    border-radius: 50%;
    width: inherit;
    height: inherit;
    position: absolute;
    top: 0;
    left: 0;
    animation: loader 2s linear infinite;
    opacity: 0;
}
.loader:before{
    animation-delay: .5s;
}
@keyframes loader{
    0%{
        transform: scale(0);
        opacity: 0;
    }
    50%{
        opacity: 1;
    }
    100%{
        transform: scale(1);
        opacity: 0;
    }
}






    </style>

		<style>


body {
    font-family: "Noto Sans", sans-serif, "Helvetica Neue", Helvetica, Arial, sans-serif;
    
    display: block;
    margin: 0;
}

*, *:before, *:after {
    box-sizing: border-box;
}

.login-page .login-header {
    position: relative;
    background: #256587;
    padding: 20px 0;
    transition: all 550ms ease-in-out;
}

.login-page .login-header.login-caret:after {
    position: absolute;
    content: '';
    left: 50%;
    bottom: 0;
    margin-left: -25.5px;
    width: 0px;
    height: 0px;
    border-style: solid;
    border-width: 23px 26.5px 0 26.5px;
    border-color: #256587 transparent transparent transparent;
    bottom: -23px;
    transition: all 550ms ease-in-out;
}

.login-page .login-content {
  
    margin: 0 auto;
    text-align: center;
    transition: all 550ms ease-in-out;
}





.content{
     height:640px;

    }

/*
 * Page: Login & Register
 * ----------------------
 */

 .login{
  width:420px;
   margin-left:10px;
    background: #256587;
     border-color: #256587;
   font-size:19px;

 }
.login-logo,
.register-logo {
  font-size: 35px;
  text-align: center;
  font-weight: 300;
}
.login-logo a,
.register-logo a {
  color: #444;
}
.login-page,
.register-page {
  background: #d2d6de;
}
.login-box,
.register-box {
  width: 450px;
  margin: 1% auto;
 
}

 .title{
  color:white; 
  font-size:29px;
}
@media (max-width: 768px) {
  .login-box,
  .register-box {
    position:relative;
    width: 93%;
  }

  
.content{
     height:540px;

    }

  .login{
width:300px;
}

.title{
  color:white; 
  font-size:23px;
}
.img-circle{
  width:70px;
  height:70px;
}
}

.content{
  position:relative;
  top:80px
}

.login-box-body,
.register-box-body {
  background: #fff;
  padding: 20px;
  border-top: 0;
  color: #666;
}
.login-box-body .form-control-feedback,
.register-box-body .form-control-feedback {
  color: #777;
}
.login-box-msg,
.register-box-msg {
  margin: 0;
  text-align: center;
  padding: 0 20px 20px 20px;
}


.forgot{
	float:right;
	text-decoration:none !important;
	font-size:17px;
	margin:5px 0 5px 0;
}
.forgot:hover{
color:gray;

}

    /**CSS FOR THE RING**/
	.form-control {
  border-top-style: none;
  border-right-style: none;
  border-left-style: none;
  height:45px;
	font-size:15px;

  
}

input:focus, input.form-control:focus {

outline:none !important;
outline-width: 0 !important;
box-shadow: none;
-moz-box-shadow: none;
-webkit-box-shadow: none;
}

.form-control-feedback{
	margin-top:5px;
	font-size:16px;
}


.form-control:focus {
  outline: none;
}
.glyphicon-ring {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  border: 4px solid white;
  color: white;
  display: inline-table;
  text-align: center;
}
/**CSS FOR ICON WITH NO BACKGROUND COLOR**/

.glyphicon-ring .glyphicon-bordered {
  font-size: 43px;
  vertical-align: middle;
  display: table-cell;
}
/**WITH AN ADDED BACKGROUND COLOR**/


.glyphicon-teal {
  background: #3C8DBC;
  color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}


		</style>