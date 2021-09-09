<?php
 include "../nextRaiderTime.php";
$next_raidertime = get_next();
    session_start();

    if ($_SESSION == null) {
        header("LOCATION: http://ahsraidertime.org");
        exit();
    }
?>
<!DOCTYPE html>


<head>
    <title>Atholton High School Raider Time Sign-Up</title>
    <meta name="google-signin-client_id" content="751418040846-avi5tm16ihmv7hehetgktpfc8un9trpf.apps.googleusercontent.com">
    <meta name="description" content="Sign up for a raider time classroom">
    <meta name="keywords" content="Atholton, Raider time">
    <meta name="author" content="Team AWOL">

    <script src="https://apis.google.com/js/platform.js" async defer></script>
	<link rel="stylesheet" type="text/css" href="stylesheetteacher.css">
        
    </head>

<body>
        <div class="g-signin2" data-onsuccess="onSignIn" style="display: none;"></div>
        
        <nav role="navigation">
            <div id="menuToggle">

                <input type="checkbox" />
                
                <span></span>
                 <span></span>
                  <span></span>

                <ul id="menu">
                  <a href="http://ahs.hcpss.org/"><li><img src ="ahslogo.png" alt="logo" width="100" height="100" style="margin-left: -17px"></li></a>
                  <a href="http://ahsraidertime.org"><li>Home</li></a>
                  <a href="http://ahsraidertime.org/about"><li>FAQ's</li></a>
                  <a href="http://ahsraidertime.org/announcements"><li>Announcements</li></a>
                </ul>
            
            </div>
        </nav>

        <div class="body">
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
        $headers = 'From: error@ahsraidertime.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
    }
    session_start();
    $name = trim($_SESSION["name"]);
    $studentsSignedUp = "";
    $announcements = "";
    $sql = "SELECT NAME FROM students WHERE `$next_raidertime` = '$name'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $studentsSignedUp .=  $row["NAME"] . ", " ;
    }

    $sql = "SELECT * FROM teachers WHERE NAME = '$name'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) { // output data of each row
        echo "<p>ERROR UNKNOWN TEACHER ". $name . " </p>";
        echo "<p>Please contact atholtonADS@gmail.com</p>";
        echo "</div>\n</div>\n</body>\n</html>";
        $to      = 'atholtonads@gmail.com';
        $subject = 'ERROR PAGE: teacher index';
        $message = 'name: ' . $name;
        $headers = 'From: error@ahsraidertime.org' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
    } else {
        $row = $result->fetch_assoc();
        $room = $row["ROOM_NUMBER"];
        $max = $row["MAX_STUDENTS"];
        $details = $row["DETAILS"];
        $TID = $row["ID"]; ?>
            <script>
                var profile;

                window.onload = function() {
                    gapi.load('auth2', function() {
                        gapi.auth2.init().then(function() {
                            if (!gapi.auth2.getAuthInstance().isSignedIn.get()) {
                                //window.location.replace("http://ahsraidertime.org/");
                            }
                        });
                    });
                }

                function onSignIn(googleUser) {
                    profile = googleUser.getBasicProfile();
                    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                    console.log('Name: ' + profile.getName());
                    console.log('Image URL: ' + profile.getImageUrl());
                    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
                    if (profile == null || profile.getEmail() == null || profile.getName() !== "<?php echo $name ?>" || profile.getEmail().indexOf("hcpss.org") == -1 || profile.getEmail().indexOf("inst") !== -1) {
                        //if not signed in, or student account, not hcpss account or not the name of person in url
                        // window.location.replace("http://ahsraidertime.org/");
                    }
                }

                function signOut() {
                    var auth2 = gapi.auth2.getAuthInstance();
                    auth2.signOut().then(function() {
                        window.location.replace("http://ahsraidertime.org/");
                    });
                }
                
            function redirect() {
                window.location.replace("http://ahsraidertime.org/teacher/?name=<?php echo $name?>");
                return false;
                }
            </script>
            
        </div>
        
        
            <h1>Classroom Information</h1>
            
            <div class ="left">
                <p>Teacher: <?php echo $row["NAME"]; ?></p>
				<br>
                <form action="updateTeacher.php/?name=<?php echo $_SESSION['name']?>" method="post">
                    <p>Room Number: <input type="text" id="room" name="room" value="<?php echo $room; ?>"></p>
					<br>
                    <p>Max # of Students: <input type="text" id="max" name="max" value="<?php echo $max; ?>"></p>
					<br>
                    <p>Details: <input type="text" id="details" name="details" value="<?php echo $details; ?>"></p>
                    <br><input type="submit" id="button1" value="Save Classroom Settings">
                </form>
				<br>
                <p>Announcements: <?php
            $sql = "SELECT * FROM announcements WHERE TEACHER = '$name' ";
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
	
		<br><a href='printClass.php' target='_blank'><button>Print Roster</button></a>

            </div>
            <?php
    } ?>

        <div class = "footer">
            <p>Created by Team AWOL</p>
        </div>
        
</body>
</html>