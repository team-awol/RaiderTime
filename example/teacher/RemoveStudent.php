<!DOCTYPE html>
<html>
    <head>    
	<title>Remove Student</title>
    <link rel="stylesheet" type="text/css" href="../stylesheet.css">
    <body>

<?php
 include "../nextRaiderTime.php"; 
$next_raidertime = get_next(); 
session_start();
    $student = $_GET["student"];
    $teacher = $_SESSION["teacher"];

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
        $subject = 'ERROR PAGE: removeStudent.php';
        $message = 'connection error';
        $headers = 'From: error@ahsraidertime.org' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
    }
    
    // confirm student is signed up for the given teacher
    $sql = "SELECT `$next_raidertime`, `NOTIFICATION` FROM students WHERE NAME = '$student'";
    $result = $conn->query($sql);
	$studentsSignedUp = "";
	$student_email;
    while ($row = $result->fetch_assoc()) {
        if ($row["TEACHER"] != $teacher) {
            $subject = 'ERROR PAGE: removeStudent.php';
            $message = 'Call to remove student, but student is not signed up for teacher';
            $headers = 'From: error@ahsraidertime.org' . "\r\n" .'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);
		}
		$student_email = $row["NOTIFICATION"];
    }

    $sql = "UPDATE students SET `$next_raidertime`='' WHERE NAME='$student'";

if ($conn->query($sql) === true) {
	echo "<p>student successfully removed</p>";
	$to      = $student_email;
    $message = 'You have been removed from the class you signed up for';
    $headers = 'From: atholtonADS@gmail.com' . "\r\n";
    mail($to, $subject, $message, $headers);
} else {
    echo "<p>Error romoving student</p>";
    $to      = 'atholtonads@gmail.com';
    $subject = 'ERROR PAGE: removeStudent.php';
    $message = 'removal error';
    $headers = 'From: error@ahsraidertime.org' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
}

?>
    <input id="button1" type="button" class="button" value="click here to return" onclick="window.location.replace('index.php');">
    </body>
</html>