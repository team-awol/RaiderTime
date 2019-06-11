<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
session_start();

include "../nextRaiderTime.php";
$next_raidertime = get_next();

// connect to database
$servername = "ahsraidertime.com";
    $username = "ahsraide_editing";
    $password = "cashmoney420";
    $database = "ahsraide_db734576708";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $subject = 'ERROR PAGE:  update student sign up';
    $message = 'connection error';
    $headers = 'From: error@ahsraidertime.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
}

$student = trim($_SESSION["name"]); // student name
$teacher = $_GET['teacher']; // teacher name
$email = $_SESSION["email"];

// get number of students signed up for teacher as $count
$cou = "SELECT count(*) as 'total' FROM students WHERE `$next_raidertime` = '$teacher'";
$result = mysqli_query($conn, $cou);
$row = $result->fetch_assoc();
$count = $row['total'];
// get max number of students for teacher
$cou = "SELECT MAX_STUDENTS from teachers where NAME = '$teacher'";
$resultt = mysqli_query($conn, $cou);
$row = $resultt->fetch_assoc();
$count_max = $row['MAX_STUDENTS'];

// if class is full alert user and reload page with teacher not selected
if ($count >= $count_max) {
    echo "<script>window.alert('Class Full');</script>";
    echo "<script>window.location.replace('chooseClass.php');</script>";
} else {
    // teacher has space in classroom
    // update database with student signed up for teacher during next raider time
    $sql = "UPDATE students SET `$next_raidertime`= '$teacher' WHERE EMAIL='$email'";
    if ($conn->query($sql) === TRUE) {}
    $conn->close();

    // return to main student page
    echo "<script>window.location.replace('index.php');</script>";
}