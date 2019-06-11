<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
session_start(); 
if ($_SESSION == null) {
	header("LOCATION: http://ahsraidertime.com");
	exit();
}

$servername = "ahsraidertime.com";
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
	$headers = 'From: error@ahsraidertime.com';
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
	header("LOCATION: http://ahsraidertime.com/");
	exit();
}
if (isset($_GET['week'])) {
	$next_raidertime = $_GET['week'];
	$previous_week = true;
}?>
<!DOCTYPE html>
<html>
<head>
<style>html, body {
    height:100%;
    width:100%;
    margin:0;
    padding:0;
}
@media print {
  #printPageButton {
    display: none;
  }
}
</style>
</head>
<body>
<h1>Raider Time Roster <?php echo $next_raidertime; ?></h1>

<?php

    $teacher_names = array();
    $sql = "SELECT LNAMEF, NAME FROM teachers ORDER BY LNAMEF";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $teacher_names[] = $row["NAME"];
        $teacher_lnamef[] = $row["LNAMEF"];
    }
    
    // prints students that are assigned to a teacher
    foreach ($teacher_names as &$teacher) {
        echo "<h2>" . $teacher_lnamef[array_search($teacher, $teacher_names)] . "</h2>";
        echo "<ul>";
        $sql = "SELECT NAME FROM students WHERE `$next_raidertime` = '$teacher' ORDER BY LNAME, FNAME";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row["NAME"] . "</li>\n";
        }
        echo "</ul>";
    }
$conn->close();
    ?>
	
	<button id = "printPageButton" onclick="window.print();">Print</button> 
	</body>
</html>