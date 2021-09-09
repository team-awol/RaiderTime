<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

session_start();

if ($_SESSION == null) {
   // header("LOCATION: http://ahsraidertime.org");
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
    $subject = 'ERROR PAGE: create announcement';
    $message = 'connection error';
    $headers = 'From: error@ahsraidertime.org' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
}

$name = $_SESSION["name"];

//if (strpos($_SESSION["email"], '@hcpss.org') !== false) {
    $sql = "INSERT INTO announcements (TEACHER, OLD) VALUES ('$name', 0)";
    if ($conn->query($sql) === true) {
        //echo "New record created successfully";
        $new_ID = $conn->insert_id;
        //echo "name";
        //echo $name;
        echo "<script>window.location.replace('editAnnouncement.php?ID=$new_ID');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      echo "<script>window.location.replace('index.php');</script>";
    }

    $conn->close();
/*} else {
	header("LOCATION: http://ahsraidertime.org");
    echo "error";
}
*/
?> 