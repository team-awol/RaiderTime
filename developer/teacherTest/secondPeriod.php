<?php
    session_start();

 include "../nextRaiderTime.php";
$next_raidertime = get_next();

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
	<link rel="stylesheet" type="text/css" href="../stylesheetmain.css">
	<link rel="stylesheet" type="text/css" href="stylesheetteacher.css">
	<style> 
	
	table{
				width:100%;
				
				table-layout: fixed;
			}
			.tbl-header{
				background-color: rgba(255,255,255,0.3);
			}
			.tbl-content{
				margin-top: 0px;
				border: 1px solid rgba(255,255,255,0.3);
				overflow: auto;
			}
			th{
				padding: 20px 15px;
				text-align: left;
				font-weight: 500;
				font-size: 12px;
				color: #fff;
				text-transform: uppercase;
				overflow: auto;
			}
			tr{
				overflow: auto
			}
			
			td{
				padding: 15px;
				text-align: left;
				vertical-align:middle;
				font-weight: 300;
				font-size: 12px;
				color: #fff;
				border-bottom: solid 1px rgba(255,255,255,0.1);
				overflow: auto;
			}
</style>
    </head>

<body>
<div class="g-signin2" data-onsuccess="onSignIn" style="visibility: hidden;"></div>

    <div class="body">
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
							<th>Sign Up</th>
						</tr>
					</thead>
				</table>
			</div>
			
			<div class="tbl-content">
			
				<table cellpadding="0" cellspacing="0" border="0">
					<tbody>
					<?php
	$sql = "SELECT * FROM students WHERE `PERIOD2` = '$name' ORDER BY LNAME, FNAME";
	$result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["NAME"] . "</td><td id= '" . $row["NAME"] ." Teacher' >" . $row[$next_raidertime]."</td> </tr>\n";
        }

    ?>
					</tbody>
				</table>
			</div>
		</section>



        </div>
            </div>
        <div class = "footer">
            <p>Created by Team AWOL</p>
        </div>
        
</body>
</html>