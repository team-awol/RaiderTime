
<?php 
session_start();?><!DOCTYPE html>
<html>

<head>
	<title>Edit student</title>
	<link rel="stylesheet" type="text/css" href="../stylesheetmain.css">
    <link rel="stylesheet" type="text/css" href="../stylesheethome.css">
    <meta name="google-signin-client_id" content="751418040846-avi5tm16ihmv7hehetgktpfc8un9trpf.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>  
<div class="g-signin2" data-onsuccess="onSignIn" style="display: none;"></div>

<div class="section1">
	<div class="headleft">
		<center><a href="http://ahs.hcpss.org/"><img src="../images/atholtonhs.png" height="100px"></a></center>
	</div>
	
</div>
<div class="section2"></div>
<div class="section3"></div>
<div class="buttons">
<div class="body">
<?php
include "../nextRaiderTime.php";
$name = $_SESSION["name"]; // admin id
$ID = $_GET["ID"]; // announcement id

$servername = "ahsraidertime.org";
    $username = "ahsraide_editing";
    $password = "cashmoney420";
    $database = "ahsraide_db734576708";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $to      = 'atholtonads@gmail.com';
    $subject = 'ERROR PAGE: edit announcement';
    $message = 'connection error';
    $headers = 'From: error@ahsraidertime.org' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
}

?>
</div>
</div>
</body>
</html>