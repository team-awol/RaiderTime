<?php
    session_start();

    if ($_SESSION == null) {
        header("LOCATION: http://ahsraidertime.com");
        exit();
    }
    
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
        $headers = 'From: error@ahsraidertime.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    //    mail($to, $subject, $message, $headers);
    }
    
    $sql = "SELECT * FROM teachers WHERE NAME = '$name'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) { // output data of each row
        //echo "<p>ERROR UNKNOWN TEACHER ". $name . " </p>";
        //echo "<p>Please contact atholtonADS@gmail.com</p>";
        //echo "</div>\n</div>\n</body>\n</html>";
        header("LOCATION: http://ahsraidertime.com/student");
        exit();
        $to      = 'atholtonads@gmail.com';
        $subject = 'ERROR PAGE: teacher index';
        $message = 'name: ' . $name;
        $headers = 'From: error@ahsraidertime.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
       // mail($to, $subject, $message, $headers);
    
     include "../nextRaiderTime.php";
    $next_raidertime = get_next();
    }
?>
<!DOCTYPE html>


<head>
    <title>Atholton High School Raider Time Sign-Up</title>
	<meta name="google-signin-client_id" content="751418040846-82kjldnl1oe6c90k4qfpbq4s9tpb9sk3.apps.googleusercontent.com">
    <meta name="description" content="Sign up for a raider time classroom">
    <meta name="keywords" content="Atholton, Raider time">
    <meta name="author" content="Team AWOL">

	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<link rel="stylesheet" type="text/css" href="../stylesheetmain.css">
	<link rel="stylesheet" type="text/css" href="stylesheetteacher.css">

    </head>

<body>
<nav role="navigation">
            <div id="menuToggle">

                <input type="checkbox" />
                
                <span></span>
                 <span></span>
                  <span></span>

                <ul id="menu">
                  <a href="http://ahs.hcpss.org/"><li><img src ="ahslogo.png" alt="logo" width="100" height="100" style="margin-left: -17px"></li></a>
                  <a href="http://ahsraidertime.com"><li>Home</li></a>
                  <a href="http://ahsraidertime.com/about"><li>FAQ's</li></a>
                  <a href="http://ahsraidertime.com/announcements"><li>Announcements</li></a>
                </ul>
            
            </div>
        </nav>
<div class="g-signin2" data-onsuccess="onSignIn" style="visibility: hidden;"></div>

<script>
        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function() {
                window.location.replace("http://ahsraidertime.com/logout.php");
            });
        }
    </script>
        <div class="g-signin2" data-onsuccess="onSignIn" style="display: none;"></div>
        <div class="body">
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
        $headers = 'From: error@ahsraidertime.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    //    mail($to, $subject, $message, $headers);
    }
	$name = trim($_SESSION["name"]);
	// delete announcements for this person if there is no text
	$sql = "DELETE FROM announcements WHERE ANNOUNCEMENT='' AND TEACHER='$name' "; 
    $result = $conn->query($sql);




    $sql = "SELECT * FROM teachers WHERE NAME = '$name'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) { // output data of each row
        //echo "<p>ERROR UNKNOWN TEACHER ". $name . " </p>";
        //echo "<p>Please contact atholtonADS@gmail.com</p>";
        //echo "</div>\n</div>\n</body>\n</html>";
        header("LOCATION: http://ahsraidertime.com/student");
        exit();
        $to      = 'atholtonads@gmail.com';
        $subject = 'ERROR PAGE: teacher index';
        $message = 'name: ' . $name;
        $headers = 'From: error@ahsraidertime.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
       // mail($to, $subject, $message, $headers);
    } else {
        $row = $result->fetch_assoc();
        $room = $row["ROOM_NUMBER"];
        $max = $row["MAX_STUDENTS"];
        $details = $row["DETAILS"];
		$TID = $row["ID"];
		$studentsSignedUp = "";
		$announcements = "";
		$sql = "SELECT NAME FROM students WHERE `$next_raidertime` = '$name' OR `$next_raidertime` = '$room' ORDER BY LNAME, FNAME";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			$studentsSignedUp .=  $row["NAME"] . ", " ;
		}
		$sql = "SELECT * FROM teachers WHERE NAME='$room'";
		$result = $conn->query($sql);
		$sharedRoom = false;
    	if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$sharedRoom = true; 
			$max = $row["MAX_STUDENTS"];
			$details = $row["DETAILS"];
		}
		
		
		?>

		
            <script>
                function signOut() {
                    var auth2 = gapi.auth2.getAuthInstance();
                    auth2.signOut().then(function() {
                        window.location.replace("http://ahsraidertime.com/");
                    });
                }
            </script>
            
        </div>
        
        
            <h1>Classroom Information</h1>
            
            <div class ="left">
                <p>Student Pass Color This Week: <?php $sql = "SELECT PASS_COLOR FROM dates WHERE DATE = '$next_raidertime'";$result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row1 = $result->fetch_assoc()) {
                echo $row1["PASS_COLOR"];
            }
        } ?></p>
                <p>Teacher: <?php echo $name; ?></p>
				<br>
                <form action="updateTeacher.php/?shared=<?php echo $sharedRoom;?>" method="post">
                    <p>Room Number: <br><input type="text" style="background: rgba(255, 255, 255, 10% ); border-bottom: 0px solid #545454" id="room" name="room" value="<?php echo $room; ?>"></p>
					<br>
                    <p>Max # of Students: <br><input type="text" style="background: rgba(255, 255, 255, 10% ); border-bottom: 0px solid #545454" id="max" name="max" value="<?php echo $max; ?>"></p>
					<br>
                    <p>Details: <br><input type="text" style="background: rgba(255, 255, 255, 10% ); border-bottom: 0px solid #545454;" id="details" name="details" value="<?php echo $details; ?>"></p>
                    <br><input type="submit"  id="button1" value="Save Classroom Settings">
                </form>
				<br>
                <p>Announcements: <?php
            $sql = "SELECT * FROM announcements WHERE TEACHER = '$name' AND OLD='0' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>";
                echo $row["ANNOUNCEMENT"];
                $AID = $row["ID"]; // anouncement id
                echo "<input id='button1' type='button' class='button' value='edit announcement' onclick=\"window.location.replace('editAnnouncement.php?ID=$AID')\">";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "No announcements<br>";
        } ?></p>
                
                <input id='button1' type='button' value='New Announcement' onclick="window.location.replace('createAnnouncement.php?teacher=<?php echo $TID; ?>&name=<?php echo $_SESSION['name']; ?>')">
            </div>
            
            
            <div class = "signed-up">

		<br><a href='printClass.php' target='_blank'><button>Print Roster</button></a>
		<br><br><a href='secondPeriod.php' target='_blank'><button>View Second Period Roster</button></a>
		
              <br><br><button onclick="signOut();" >Sign out</button>

                <p class="phead">Current Students Signed-Up:</p>
                <?php
        if ($studentsSignedUp != "") {
        } else {
            echo "<p>Nobody has signed up for this raidertime class yet</p>";
        }

        $strLen = strlen($studentsSignedUp);
        $currentStudent='';
        for ($x = 0; $x < $strLen; $x++) {
            $char = substr($studentsSignedUp, $x, 1);
            if ($char !== ',') {
                echo $char;
                $currentStudent .= $char;
            } else {
                $currentStudent = trim($currentStudent);
                if ($x < $strLen-2) {
                    // if not the last student
                    echo "<input id='button1' type='button' class='button' value='Remove Student' onclick=\"window.location.replace('removeStudent.php?student=$currentStudent')\"></li>\n\n<li>";
                } else {
                    echo "<input id='button1' type='button' class='button' value='Remove Student' onclick=\"window.location.replace('removeStudent.php?student=$currentStudent')\"></li>\n</li>\n";
                }
                $currentStudent = "";
            }
        } ?>
	
		

            </div>
            <?php
    } ?>

        
</body>
</html>