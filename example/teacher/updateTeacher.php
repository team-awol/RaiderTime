<?php
session_start();

// todo open in new tab then close tab

    $servername = "db734576708.db.1and1.com";
    $username = "dbo734576708";
    $password = "cashmoney420";
    $database = "db734576708";
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
    $name = $_GET['name'];
echo $name;
echo "<br>";
echo $max;
echo "<br>";
echo $details;
echo "<br>";
echo $name;
echo "<br>";

$sql = "UPDATE teachers SET ROOM_NUMBER='$room', MAX_STUDENTS='$max', DETAILS='$details' WHERE NAME='$name'"; 
if ($conn->query($sql) === TRUE) {} else {}

$conn->close();
echo "<script>window.location.replace('http://ahsraidertime.org/teacher/?name=".$name."');</script>";
?>
