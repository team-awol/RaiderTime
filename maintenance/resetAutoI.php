<?php
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
	 $subject = 'ERROR PAGE: teacher index';
	 $message = 'connection error';
	 $headers = 'From: error@ahsraidertime.org';
	 mail($to, $subject, $message, $headers);
 }
$sql = "ALTER TABLE students AUTO_INCREMENT = 1";
if ($conn->query($sql) === TRUE) {
	echo "success";
}

?>