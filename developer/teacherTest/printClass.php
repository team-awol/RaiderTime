<?php
session_start();
 include "../nextRaiderTime.php"; 
$next_raidertime = get_next();
    if ($_SESSION == null) {
        echo "null session";
        header("LOCATION: http://ahsraidertime.com");
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
        $subject = 'ERROR PAGE: teacher index';
        $message = 'connection error';
        $headers = 'From: error@ahsraidertime.com';
        mail($to, $subject, $message, $headers);
    }

	if($name == 'Carolyn Pilcher' || $name == 'Natalie Kelly' || $name == 'Kathleen Koehnlein'){
    	$sql =  "SELECT NAME FROM students WHERE `$next_raidertime` = 'Media Center' ORDER BY LNAME, FNAME";
    }else{
    	$sql = "SELECT NAME FROM students WHERE `$next_raidertime` = '$name' ORDER BY LNAME, FNAME";
    }

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo$row["NAME"] . "\n";
    }
    ?>
	</pre>

	<button id = "printPageButton" onclick="window.print();">Print</button> 
	</body>
</html>