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
    $subject = 'ERROR PAGE: delete announcement';
    $message = 'connection error';
    $headers = 'From: error@ahsraidertime.org' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
}

$ID = $_GET["ID"];
$TID = $_GET["TID"];
// sql to delete a record
$sql = "DELETE FROM announcements WHERE ID='$ID'";

if ($conn->query($sql) === true) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
echo "<script>window.location.replace('index.php');</script>";

?> 