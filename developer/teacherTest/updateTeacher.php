<?php
session_start();

// todo open in new tab then close tab
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
        $subject = 'ERROR PAGE: update teacher';
        $message = 'connection error';
        $headers = 'From: error@ahsraidertime.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }
$room = $_POST['room'];
    $max = $_POST['max'];
    $details = $_POST['details'];
	$name = $_SESSION["name"];
	$sharedRoom = $_GET["shared"];
    if (!$sharedRoom) {
        $sql = "UPDATE teachers SET ROOM_NUMBER='$room', MAX_STUDENTS='$max', DETAILS='$details' WHERE NAME='$name'";
        if ($conn->query($sql) === true) {
        } else {
        }
    } else {
		$sql = "UPDATE teachers SET  MAX_STUDENTS='0', DETAILS='$details' WHERE NAME='$name'";
        if ($conn->query($sql) === true) {
        } else {
		}
        $sql = "UPDATE teachers SET ROOM_NUMBER='$room', MAX_STUDENTS='$max', DETAILS='$details' WHERE NAME='$room'";
        if ($conn->query($sql) === true) {
        } else {
        }
	}

$conn->close();
echo "<script>window.location.replace('http://ahsraidertime.org/teacher/?name=".$name."');</script>";
