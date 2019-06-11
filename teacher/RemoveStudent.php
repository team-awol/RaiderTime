<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Remove Student</title>
<link rel="stylesheet" type="text/css" href="../stylesheet.css">


<body>

<?php
if (strcmp( date("Y-m-d", time()), $next_raidertime) == 0) {
	echo "<script>alert(\"It is too late to remove a student this week! \");window.location.assign(\"https://atholtonraidertime.com/teacher\");</script>";
	exit();
}

include "../nextRaiderTime.php";
$next_raidertime = get_next();
$student = $_GET["student"];
$teacher = $_SESSION["teacher"];

// connect to database
$servername = "ahsraidertime.com";
    $username = "ahsraide_editing";
    $password = "cashmoney420";
    $database = "ahsraide_db734576708";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $to = 'atholtonads@gmail.com';
    $subject = 'ERROR PAGE: removeStudent.php';
    $message = 'connection error';
    $headers = 'From: error@atholtonraidertime.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
}

// confirm student is signed up for the given teacher
$sql = "SELECT `$next_raidertime`, `NOTIFICATION` FROM students WHERE NAME = '$student'";
$result = $conn->query($sql);
$student_email; // notification email for student
while ($row = $result->fetch_assoc()) {
    if ($row["TEACHER"] != $teacher) {
        $subject = 'ERROR PAGE: removeStudent.php';
        $message = 'Call to remove student, but student is not signed up for teacher';
        $headers = 'From: error@atholtonraidertime.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
    }
    $student_email = $row["NOTIFICATION"];
}

$sql = "UPDATE students SET `$next_raidertime`='' WHERE NAME='$student'";

if ($conn->query($sql) === true) {
    echo "<p>student successfully removed</p>";
    // email student that they have been removed
    $to = $student_email;
    $message = 'You have been removed from the class you signed up for';
    $headers = 'From: atholtonADS@gmail.com' . "\r\n";
    mail($to, $subject, $message, $headers);
} else {
    // could't remove student from class for some reason
    echo "<p>Error romoving student</p>";
    $to = 'atholtonads@gmail.com';
    $subject = 'ERROR PAGE: removeStudent.php';
    $message = 'removal error';
    $headers = 'From: error@atholtonraidertime.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
}

?>
    <input id="button1" type="button" class="button"
		value="click here to return"
		onclick="window.location.replace('index.php');">
</body>
</html>