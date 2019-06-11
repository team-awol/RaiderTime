<?php
session_start();
  $servername = "ahsraidertime.com";
    $username = "ahsraide_editing";
    $password = "cashmoney420";
    $database = "ahsraide_db734576708";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
    }
    if ($_SESSION == null) {
        header("LOCATION: http://ahsraidertime.com");
        exit();
    } else {
    }
/*
Adds all members of Ms. Rhee's period 2 class to the developers table, which is effectively the 2019-2020 ADS class
*/

$sql = "SELECT * FROM `students` WHERE `PERIOD2` = 'Hana Rhee'";
$result = $conn->query($sql);

$developersE = array();
$developersN = array();
	while ($row = $result->fetch_assoc()) {
		$developersE[] = $row['EMAIL'];
		$developersN[] = $row['NAME'];
	}

echo $result->num_rows."<br>";
for($i = 0; $i < 15; ++$i) {
    echo "EMAIL: " . $developersE[$i] . "<br>NAME: " . $developersN[$i] . "<br><br>";
}

for($i = 0; $i < 15; ++$i) {
    echo $developersE[$i] . " " . $developersN[$i];
    $name = $developersN[$i];
    $email = $developersE[$i];
    echo "<br>HERE<br>";
    $sql2 = "INSERT INTO `developers` (`NAME`,`EMAIL`) VALUES ('$name', '$email')";
    echo "<br>HERE<br>";
    if($result = $conn->$query($sql2) === TRUE) {}
    echo "<br>HERE<br>";
    //$i++;
}

?>