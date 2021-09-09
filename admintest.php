<?php include "nextRaiderTime.php";
$next_raidertime = get_next();
    session_start();
	if (strcmp($_SESSION["name"], "Gregory Ho") != 0 && strcmp($_SESSION["name"], "Sky Cen") != 0 && strcmp($_SESSION["email"], "wrichm6130@inst.hcpss.org") != 0) {
	    // user is not administrator
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300" type="text/css" />
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/metropolis" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="/administrator/stylesheetadmin.css">
        
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
		<h1>Administrator</h1>
		<a href='printStudents.php' target='_blank'><button>Print Rosters</button></a>

<a href='printClasses.php' target='_blank'><button>Print Classes</button></a>
<br>
    <?php
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
            $subject = 'ERROR PAGE: teacher index';
            $message = 'connection error';
            $headers = 'From: error@ahsraidertime.org' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);
        }
        session_start();
        $name = trim($_SESSION["name"]);
    ?>
              <section>
			<div class="tbl-header">
				<table cellpadding="0" cellspacing="0" border="0">
					<thead>
						<tr>
							<th>Student</th>
							<th>Teacher</th>
							<th></th>
						</tr>
					</thead>
				</table>
			</div>
			
			<div class="tbl-content">
			
				<table cellpadding="0" cellspacing="0" border="0">
					<tbody>
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
                        $name = trim($_SESSION["name"]);
                        $dropdown = "<select>";
                        $sql = "SELECT NAME FROM teachers ORDER BY NAME";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            $dropdown.= "<option value=" . $row["NAME"] . ">".$row["NAME"] . "</option>";
                        }
                        $dropdown.="</select>";
                        $sql = "SELECT * FROM students ORDER BY NAME";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["NAME"] . "</td><td id= '" . $row["NAME"] ." Teacher' >" . $row[$next_raidertime]."</td> <td><button onClick=\"getElementById('" . $row["NAME"] ." Teacher').innerHTML='$dropdown'\">Change</button></td></tr>\n";
                        }

                    ?>
					</tbody>
				</table>
			</div>
		</section>
          <button>Submit Changes</button>
            </div>

        <div class = "footer">
            <p>Created by Team AWOL</p>
        </div>
        
</body>
</html>