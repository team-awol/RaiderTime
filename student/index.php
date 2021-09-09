<?php

session_start();

 include "../nextRaiderTime.php";
$next_raidertime = get_next();
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
    //$sql = "SELECT * FROM students WHERE EMAIL = '$email'";
    //$dtname1 = ($conn->query($sql));
    //$dtname = $dtname1->fetch_assoc();
   if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
       //$haveNumber = strcmp($row["NOTIFICATION"] ,"") != 0;
       
        ?>
<html>

<head>
    <title>Atholton High School Raider Time Sign-Up</title>
	<meta name="google-signin-client_id" content="751418040846-82kjldnl1oe6c90k4qfpbq4s9tpb9sk3.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
	<link rel="stylesheet" type="text/css" href="../stylesheetmain.css">
	<link rel="stylesheet" type="text/css" href="stylesheetstudent.css">
	<style>
	.popup {
	margin: 70px auto;
	padding: 20px;
	
	border-radius: 5px;
	width: 500px;
	position: relative;
	padding-left: 15px;
	transition: all 1s ease-in-out;
}
	</style>
</head>
<body>  <?php include("../menu.html"); ?>



<div class="g-signin2" data-onsuccess="onSignIn" style="visibility: hidden;"></div>

    <script>
        function signOut() {
    		var auth2 = gapi.auth2.getAuthInstance();
			if (auth2 == null){
                window.location.replace("http://ahsraidertime.org/logout.php");
            }
    auth2.signOut().then(function () {
            window.location.replace("http://ahsraidertime.org/logout.php");
            });
        }
        
        function goAdmin() {
            window.location.replace("http://ahsraidertime.org/administrator");
        }
        
        function goAddDevelopers() {
            window.location.replace("http://ahsraidertime.org/administrator/addDevelopers.php");
        }
        function goTestingStudent() {
            window.location.replace("http://ahsraidertime.org/developer/studentTest");
        }
        function goTestingTeacher() {
            window.location.replace("http://ahsraidertime.org/developer/teacherTest");
        }
    </script>
        <div class="body">
            <p style="font-size: 50px; text-align: center; color: white;">Student Information</p>

			<?php
            //if (!$haveNumber)
          echo "  <p style=\"color: white; text-align: center;\">Click <u><a onclick=\"window.location.href='phoneSurvey.php'\" style=\"color:white;\">here</a></u> to be notified when adjustments have been made to your sign-up status</p>"; ?>
			<div class="content">
                 <div class="left">
                    <p style="font-size: 30px;">Name:
                        <?php echo $name?>
                    </p>
                    <form>
                        <input type="button" class="button" value="Change Sign-Up" onclick="window.location.href='chooseClass.php?name=<?php echo $name ?>'">
                    </form>
					<form>
					<a class="button" href="#popup1" >Show Pass</a>
						<div id="popup1" class="overlay">
							<div class="popup" style="background:<?php
    $sql = "SELECT PASS_COLOR FROM dates WHERE DATE = '$next_raidertime'";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
           while ($row1 = $result->fetch_assoc()) {
               echo $row1["PASS_COLOR"];
           }
       }
       ?>;">
							<h1>Student Pass</h1>
							<a class="close" href="#">&times;</a>
								<div class="content">
								<form action="thankyou/" method="post">
								<div>
									<div>
									<h2>Student Name: <?php 
									    echo $name;?></h2>
									</div>
								</div>
								<div>
									<div>
									<h2>Teacher: 
									        <?php 
									           echo $row[$next_raidertime];
									            
									        ?></h2>
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
                    <button class="button" onclick="signOut();">Sign out</button>
                    
                    <?php 
                        $sql = "SELECT * FROM `administrators` WHERE `EMAIL` = '$email'";
					    $result = $conn->query($sql);
                        if($result->num_rows > 0) {
                            echo "<button class=button onclick=goAdmin();>Admin Page</button>";
                            echo "<button class=button onclick=goAddDevelopers();>Add Developers</button>";
                            echo "<button class=button onclick=goTestingStudent();>Go to Student Testing Page</button>";
                        }
                    ?>
                    
                    
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

<?php
   } else {
       echo "	<script> alert(\"We do not have a record of your account! If this is an error please email atholtonads@gmail.com\");                window.location.replace(\"http://ahsraidertime.org/logout.php\");
	</script>";
   }
    $conn->close();
?>