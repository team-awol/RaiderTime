<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
session_start(); 
if ($_SESSION == null) {
	header("LOCATION: http://ahsraidertime.org");
	exit();
}

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
	$subject = 'ERROR PAGE: login';
	$message = 'connection error';
	$headers = 'From: error@ahsraidertime.org';
	mail($to, $subject, $message, $headers);
}
$sql = "SELECT NAME FROM administrators";
$result = $conn->query($sql);
$administrators = array();
while ($row = $result->fetch_assoc()) {
	$administrators[] = $row["NAME"];
}

// determine if admin or teacher
if (!in_array($_SESSION["name"], $administrators)) {
	header("LOCATION: http://ahsraidertime.org/");
	exit();
}
if (isset($_GET['week'])) {
	$next_raidertime = $_GET['week'];
	$previous_week = true;
	header("LOCATION: /studentTesting");
}?>