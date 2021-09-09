<?php
 include "../nextRaiderTime.php";
$next_raidertime = get_next();
   session_start();
    $servername = "db734576708.db.1and1.com";
    $username = "dbo734576708";
    $password = "cashmoney420";
    $database = "db734576708";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if ($_SESSION == null) {
        header("LOCATION: http://ahsraidertime.org");
        exit();
    }
    //$haveNumber = false;
    $name = $_SESSION["name"];
	$email = $_SESSION["email"];
	$fname = $_SESSION["fname"];
	$lname = $_SESSION["lname"];
    $sql = "SELECT * FROM students WHERE EMAIL = '$email'";
    $result = $conn->query($sql);
    $error = false;
    if ($result->num_rows > 1) {
        $error = true;
    } elseif ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$haveNumber = strcmp($row["NOTIFICATION"] ,"") != 0;
		$sql = "UPDATE students SET LNAME='$lname', FNAME='$fname' WHERE NAME='$name'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row1 = $result->fetch_assoc()) {}
        } 
        ?>
<html>

<head>
    <title>Atholton High School Raider Time Sign-Up</title>
    <meta name="google-signin-client_id" content="751418040846-avi5tm16ihmv7hehetgktpfc8un9trpf.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
	<link rel="stylesheet" type="text/css" href="../stylesheetmain.css">
	<link rel="stylesheet" type="text/css" href="stylesheetstudent.css">
    <style>
    .btn {
	display: block;
	float: left;
	margin: 10px 10px 10px 0;
	padding: 12px 18px;
	background: #fff;
	border: 2px solid #C9D6DE;
	color: #52616A;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	cursor: pointer;
}
 .btn:hover {
	background: #C9D6DE;
	color: #fff;
}
</style>
</head>
<body>
<nav role="navigation">
  </div>
            <div id="menuToggle">

                <input type="checkbox" />
                
                <span></span>
                <span></span>
                <span></span>
    
                <ul id="menu">
                  <a href="http://ahs.hcpss.org/"><li><img src ="ahslogo.png" alt="logo" width="100" height="100" style="margin-left: -17px"></li></a>
                  <a href="http://ahsraidertime.org"><li>Home</li></a>
                  <a href="http://ahsraidertime.org/about"><li>FAQ'S</li></a>
                  <a href="http://ahsraidertime.org/announcements"><li>Announcements</li></a>
                </ul>
        </nav>
  <div class="snowflakes" aria-hidden="true">
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❄
  </div>
     <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❄
  </div>
</div>

<div class="g-signin2" data-onsuccess="onSignIn" style="visibility: hidden;"></div>

    <script>
        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
    			auth2.signOut().then(function () {
                window.location.replace("http://ahsraidertime.org/logout.php");
            });
        }
    </script>
        <div class="body">
            <p style="font-size: 50px; text-align: center; color: white;">Student Information</p>

			<?php 
			//if (!$haveNumber)
          echo "  <p style=\"color: white; text-align: center;\">Click <u><a onclick=\"window.location.href='phoneSurvey.php'\" style=\"color:white;\">here</a></u> to be notified when adjustments have been made to your sign-up status</p>";
            ?>
			<div class="content">
                 <div class="left">
                    <p style="font-size: 30px;">Name:
                        <?php echo $name?>
                    </p>
                    <form>
                        <input type="button" class=".btn" value="Change Sign-Up" onclick="window.location.href='chooseClass.php?name=<?php echo $name ?>'">
                    </form>
					<form>
					<!--<a class="button" href="#popup1">Show Pass</a>
						<div id="popup1" class="overlay">
							<div class="popup">
							<h1>Student Pass</h1>
							<a class="close" href="#">&times;</a>
								<div class="content">
								<form action="thankyou/" method="post">
								<div>
									<div>
									<h2>Student Name: <?php echo $name?></h2>
									</div>
								</div>
								<div>
									<div>
									<h2>Teacher: <?php echo $row[$next_raidertime];?></h2>
									</div>
								</div>
								<div>
									<div>
										<h2>Room #: <?php
											$tName = $row[$next_raidertime];
											$sql = "SELECT ROOM_NUMBER FROM teachers WHERE NAME = '$tName'";
											$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											while ($row1 = $result->fetch_assoc()) {
											echo $row1["ROOM_NUMBER"];
										}
									} else {
										// cant get room number
									} ?></h2>
									</div>
								</div>
								<div>
									<h2>Date: <?php echo date("m/d/Y")?></h2>
								</div>
						</form>
						</div>
					</div>
				</div>
				</form>
                -->
                    <button class=".btn" onclick="signOut();">Sign out</button>
                 </div>

                <div class="right">
                    <p style=" font-size: 35px;">Current Classroom Sign-Up
                    </p>
                    <p style="font-size: 30px;">Teacher:
                        <?php echo $row[$next_raidertime]; ?>
                    </p>
                    <p style="font-size: 30px;">Room Number:
                        <?php
                            $tName = $row[$next_raidertime];
        $sql = "SELECT ROOM_NUMBER FROM teachers WHERE NAME = '$tName'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row1 = $result->fetch_assoc()) {
                echo $row1["ROOM_NUMBER"];
            }
        } else {
            // cant get room number
        } ?>
                    </p>
                </div>
            </div>
        </div>

</body>

</html>

<?php } else {  
	echo "	<script> alert(\"We do not have a record of your account! If this is an error please email atholtonads@gmail.com\");                window.location.replace(\"http://ahsraidertime.org/logout.php\");
	</script>";
	
    }
    $conn->close();
?>