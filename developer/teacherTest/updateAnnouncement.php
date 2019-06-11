<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
    session_start();
$name = $_SESSION["name"];
include "../nextRaiderTime.php";
$next_raidertime = get_next();

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
        $subject = 'ERROR PAGE:  update announcement';
        $message = 'connection error';
        $headers = 'From: error@ahsraidertime.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }

    $announcement = preg_replace('/[^A-Za-z0-9!-.\ ?@]/', '', $_POST['announcement']);
    $room = $_POST['room'];
    $date = $_POST['date'];
    if (strcmp($date, "0000-00-00") == 0) {
        $date = $next_raidertime;
    }
	$ID = $_GET["ID"];
$sql = "UPDATE announcements SET ROOM_NUMBER='$room', ANNOUNCEMENT='$announcement', DATE='$date', OLD=0  WHERE ID='$ID'";

$conn->query($sql);

// alert students signed up for teacher about new announcement
/*
$sql = "SELECT NOTIFICATION FROM students WHERE `$next_raidertime` = '$name' OR `$next_raidertime` = '$room'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
	if ($row["NOTIFICATION"] !== ""){
        $to      = $row["NOTIFICATION"];
        $subject = $_SESSION["NAME"] . " has added created an announcement";
        $headers = "From: atholtonads@gmail.com" . "\r\n";
        mail($to, $subject, $announcement, $headers);
    }
}
*/

echo "<script>window.location.replace('http://ahsraidertime.com/teacher');</script>";
