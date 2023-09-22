<?php
  include 'includes/conn.php';
require_once "libs/phpqrcode/qrlib.php";

function rand_string($length) {
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  return substr(str_shuffle($chars), 0, $length);
}


    $sql1 = "SELECT * FROM student ";
	$query1 = $conn->query($sql1);
	  while($row = $query1->fetch_assoc()){
	      
	      
$pathDir = 'path/qrcode/';
$filename = $pathDir . $student_id . '.png';
if (!is_file($filename) || (time() - filemtime($filename)) > 86400) {

    
    
	      $student_id = $row['student_id'];
	      
	       if(!is_file('../../path/qrcode/'.$student_id.'.png'))
          $codeContents = ''.rand_string(8); 
          QRcode::png($codeContents, $pathDir.''.$student_id.'.png', QR_ECLEVEL_L, 5);
      
$sql = "UPDATE student SET qrcode = $codeContents ";
$query = $conn->query($sql);

echo $codeContents;
	      
	      
	  }
    
}






<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--<title>Coming Soon</title>-->
<!--<meta http-equiv="content-type" content="text/html; charset=utf-8" >-->
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--<style type="text/css">-->
<!--body {-->
  /*background: linear-gradient(90deg, white, gray);*/
<!--  background-color: #eee;-->
<!--}-->

<!--body, h1, p {-->
<!--  font-family: "Helvetica Neue", "Segoe UI", Segoe, Helvetica, Arial, "Lucida Grande", sans-serif;-->
<!--  font-weight: normal;-->
<!--  margin: 0;-->
<!--  padding: 0;-->
<!--  text-align: center;-->
<!--}-->

<!--.container {-->
<!--  margin-left:  auto;-->
<!--  margin-right:  auto;-->
<!--  margin-top: 177px;-->
<!--  max-width: 1170px;-->
<!--  padding-right: 15px;-->
<!--  padding-left: 15px;-->
<!--}-->

<!--.row:before, .row:after {-->
<!--  display: table;-->
<!--  content: " ";-->
<!--}-->

<!--h1 {-->
<!--  font-size: 48px;-->
<!--  font-weight: 300;-->
<!--  margin: 0 0 20px 0;-->
<!--}-->

<!--.lead {-->
<!--  font-size: 21px;-->
<!--  font-weight: 200;-->
<!--  margin-bottom: 20px;-->
<!--}-->

<!--p {-->
<!--  margin: 0 0 10px;-->
<!--}-->

<!--a {-->
<!--  color: #3282e6;-->
<!--  text-decoration: none;-->
<!--}-->
<!--</style>-->
<!--</head>-->

<!--<body>-->
<!--<div class="container text-center" id="error">-->

<!--  <svg height="100" width="100">-->
<!--    <circle cx="50" cy="50" r="31" stroke="#679b08" stroke-width="9.5" fill="none" />-->
<!--    <circle cx="50" cy="50" r="6" stroke="#679b08" stroke-width="1" fill="#679b08" />-->
<!--    <line x1="50" y1="50" x2="35" y2="50" style="stroke:#679b08;stroke-width:6" />-->
<!--    <line x1="65" y1="35" x2="50" y2="50" style="stroke:#679b08;stroke-width:6" />-->
<!--    <path d="M59 65 L83 65 L75 87 Z" fill="#679b08" />-->
<!--    <rect width="20" height="9" x="70" y="56" style="fill:#eee;stroke-width:0;" />-->
<!--  </svg>-->
<!--  <div class="row">-->
<!--    <div class="col-md-12">-->
<!--      <div class="main-icon text-success"><span class="uxicon uxicon-clock-refresh"></span></div>-->
<!--      <h1>Future home of something quite cool.</h1>-->
<!--      <p class="lead">If you're the <strong>site owner</strong>, <a href="/cpanel">log in</a> to launch this site</p>-->
<!--      <p class="lead">If you are a <strong>visitor</strong>, check back soon.</p>-->
<!--    </div>-->
<!--  </div>-->

<!--</div>-->

<!--</body>-->
<!--</html>-->
