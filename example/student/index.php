<?php
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
        header("LOCATION: http://ahsraidertime.com");
        exit();
    }
    //$haveNumber = false;
    $name = $_SESSION["name"];
    $sql = "SELECT * FROM testing WHERE NAME = '$name'";
    $result = $conn->query($sql);
    $error = false;
    if ($result->num_rows > 1) {
        $error = true;
    } elseif ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); ?>
<html>

<head>
    <title>Atholton High School Raider Time Sign-Up</title>
    <link rel="stylesheet" type="text/css" href="stylesheetstudent.css">
    <meta name="google-signin-client_id" content="751418040846-avi5tm16ihmv7hehetgktpfc8un9trpf.apps.googleusercontent.com">
</head>


<body>
    <!--______________________________________________________________________________________________-->
    <nav role="navigation">
  
            <div id="menuToggle">

                <input type="checkbox" />
                
                <span></span>
                <span></span>
                <span></span>
    
                <ul id="menu">
                  <a href="http://ahs.hcpss.org/"><li><img src ="ahslogo.png" alt="logo" width="100" height="100" style="margin-left: -17px"></li></a>
                  <a href="http://ahsraidertime.com"><li>Home</li></a>
                  <a href="http://ahsraidertime.com/about"><li>FAQ'S</li></a>
                  <a href="http://ahsraidertime.com/announcements"><li>Announcements</li></a>
                </ul>
            
            </div>
        </nav>
    <!--______________________________________________________________________________________________-->
        <div class="body">
            <p style="font-size: 50px; text-align: center;">Student Information</p>

			<?php
            //if (!$haveNumber)
          echo "  <p style=\"text-align: center;\">Click <u><a onclick=\"window.location.href='phoneSurvey.php'\" style=\"color: white;\">here</a></u> to be notified when adjustments have been made to your sign-up status</p>"; ?>
			<div class="content">
                 <div class="left">
                    <p style="font-size: 30px;">Name:
                        <?php echo $name?>
                    </p>
                    <form>
                        <input type="button" class="button" value="Change Sign-Up" onclick="window.location.href='chooseClass.php?name=<?php echo $name ?>'">
                    </form>

                    <button >Sign out</button>
                 </div>

                <div class="right">
                    <p style=" font-size: 35px;">Current Classroom Sign-Up
                    </p>
                    <p style="font-size: 30px;">Teacher:
                        <?php echo $row["SIGNUP"]; ?>
                    </p>
                    <p style="font-size: 30px;">Room Number:
                        <?php
                           
                echo"000"; ?>
                    </p>
                </div>
            </div>
        </div>

        
        <div class = "footer">
            <p>Created by Team AWOL</p>
        </div>
</body>

</html>

<?php
    } else {
        //echo "Not in db";
        // $id = rand(10000, 10000000000);
        $sqll = "INSERT INTO testing (NAME ) VALUES ('$name')";
        if ($conn->query($sqll) === true) {
            echo '<script language="javascript">';
            echo 'window.location.reload(true);';
            echo '</script>';
        } else {
            //echo "failed to add to db";
            echo $conn->query($sqll);
            $error = true;
        }
    }
    if ($error) {
        echo '<script language="javascript">';
        echo 'alert("Error with account: '.$name.'.  Please email atholtonADS@gmail.com to resolve.");';
        echo '</script>';
    }
    // echo $_GET["name"];
    $conn->close();
?>