<?php
 include "../nextRaiderTime.php"; 
$next_raidertime = get_next();
session_start();
    if ($_SESSION == null) {
        echo "null session";
        header("LOCATION: http://atholtonraidertime.com");
        exit();
    }


    $name = trim($_SESSION["name"]);
?>

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
<h1>Raider Time Roster for <?php echo $name . " " ; echo $next_raidertime; ?></h1>
<pre>
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
        $headers = 'From: error@atholtonraidertime.com';
        mail($to, $subject, $message, $headers);
    }
    $sql = "SELECT NAME FROM students WHERE `$next_raidertime` = '$name'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo$row["NAME"] . "\n";
    }
    ?>
	</pre>

	<button id = "printPageButton" onclick="window.print();">Print</button> 
	</body>
</html>