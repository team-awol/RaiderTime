<?php  
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
$next_raidertime; 
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
<h1>Students who have not signed up Roster <?php echo $next_raidertime; ?></h1>
<pre>
<ul>
<?php
    // displays all students that haven't signed up for raidertime
    $name = trim($_SESSION["name"]);
		$sql = "SELECT * FROM students WHERE `$next_raidertime` ='' ORDER BY LNAME, FNAME";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			echo "<li>" . $row["NAME"] . "</li>\n";
		}

    ?>
	</ul>
	</pre>

	<button id = "printPageButton" onclick="window.print();">Print</button> 
	</body>
</html>