<?php session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Edit announcement</title>
	<link rel="stylesheet" type="text/css" href="../stylesheetmain.css">
    <link rel="stylesheet" type="text/css" href="stylesheetteacher.css">
    <meta name="google-signin-client_id" content="751418040846-avi5tm16ihmv7hehetgktpfc8un9trpf.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>  
<div class="g-signin2" data-onsuccess="onSignIn" style="display: none;"></div>

<div class="section1">
	<div class="headleft">
		<center><a href="http://ahs.hcpss.org/"><img src="../images/atholtonhs.png" height="100px"></a></center>
	</div>
	
</div>
<div class="section2"></div>
<div class="section3"></div>
<div class="buttons">
<div class="body">
<?php
 include "../nextRaiderTime.php";
 $next_raidertime = get_next();
$name = $_SESSION["name"]; // teacher id
$ID = $_GET["ID"]; // announcement id

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
    $subject = 'ERROR PAGE: edit announcement';
    $message = 'connection error';
    $headers = 'From: error@ahsraidertime.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
}

$sql = "SELECT * FROM announcements WHERE ID = $ID ";
if ($ID != null) {
    $result = $conn->query($sql);
}
        if ($result->num_rows > 0) {
			$row = $result->fetch_assoc(); 
			$date = $row["DATE"];
			if (strcmp($date, "00/00/00") == 0 ){
				//$date = date('m/d/y', $next_raidertime);

			}
			?>
            <form action="updateAnnouncement.php/?ID=<?php echo $ID?>" method="post">
                <center><p class="phead">Announcement:</p>
				<p>Only numbers and letters please</P>
                <input type="text" class="editbox" id="announcement" name="announcement" value="<?php echo $row["ANNOUNCEMENT"]; ?>" required>
                <p class="phead">Room Number:</p>
                <input type="text" class="editbox" id="room" name="room" value="<?php echo $row["ROOM_NUMBER"]; ?>" required>
                <p class="phead">Date</p>
                <input type="date" class="editbox" id="date" name="date" value=<?php echo $date; ?> required>
				<br>
                <input type="submit" id="button1" class="button" value="Save announcement">
            </form>

			<input id='button1' type='button' class='button' value='Delete Announcement' onclick="window.location.replace('http://ahsraidertime.com/teacher/deleteAnnouncement.php?<?php echo 'ID=' . $ID; ?>')">
			</center>
			<?php
        } else {
            echo "<p>error editing annonucement</p>";
        }
?>
</div>
</div>
</body>
</html>