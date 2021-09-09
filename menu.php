<?php

session_start();

    $servername = "ahsraidertime.org";
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
        header("LOCATION: http://ahsraidertime.org");
        exit();
    } else {
    }
    //$haveNumber = false;
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $fname = $_SESSION["fname"];
    $lname = $_SESSION["lname"];
    $sql = "SELECT * FROM students WHERE EMAIL = '$email'";
    $result = $conn->query($sql);
   if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
       //$haveNumber = strcmp($row["NOTIFICATION"] ,"") != 0;

?>

<html>

    <body>
        <nav role="navigation">

	        <div id="menuToggle">

		    <input type="checkbox" />

		    <span></span>
		    <span></span>
		    <span></span>

		        <ul id="menu">
		            <a href="http://ahs.hcpss.org/"><li><img src ="ahslogo.png" alt="logo" width="100" height="100" style="margin-left: -17px"></li></a>
		            <a href="http://ahsraidertime.org"><li>Home</li></a>
		            <a href="http://ahsraidertime.org/about/"><li>FAQ'S</li></a>
		            <a href="http://ahsraidertime.org/announcements/"><li>Announcements</li></a>
                    <?php
                        $emldom = (strpos($email, "@") !== false)
                            ? substr($email, strrpos($email, "@")) : "";
	                $allowed = array(".", "-", "_");
	                $emlloc = substr($email, 0, strrpos($email, "@"));
                        if ((strcmp($emldom, "hcpss.org")
                            || strcmp($emldom, "@inst.hcpss.org"))
                            && ctype_alnum(str_replace($allowed, "", $emlloc))
                        ) {
                            // email is not a SQL injection
                            $sql = "SELECT * FROM `administrators` WHERE `EMAIL` = '$email'";
                            $results = $conn->query($sql);
                            if($results->num_rows > 0) {
                                echo "<a href=http://ahsraidertime.org/dummyStudentLogin.php><li>Test Account</li></a>";
                            }
                        }
                    ?>
		        </ul>

	        </div>
        </nav>
    </body>

</html>
