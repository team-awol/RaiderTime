<!DOCTYPE html>
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
        $subject = 'ERROR PAGE: announcements index';
        $message = 'connection error';
        $headers = 'From: error@ahsraidertime.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }

?>
<html>
<head>
<title>Announcements</title>
	<link rel="stylesheet" type="text/css" href="../stylesheetmain.css">
	<style>body {
	overflow: hidden;
	scroll: none;
}

.center {
	text-align: center;
	position: absolute;
	top: 30%;
	right: 0;
	left: 0;
	font-size: 50px;
}

.top {
	text-align: center;
	margin: auto;
	position: static;
	font-size: 50px;
}

#menu li {
	padding: 10px 0;
}

.g-signin2 {
	width: 100%;
}

.g-signin2>div {
	margin: 0 auto;
}

table {
	table-layout: fixed;
	width: 100%;
}

.tbl-header {
	background-color: rgba(255, 255, 255, 0.3);
}

.important {
	width: 50%;
}

.tbl-content {
	height: 300px;
	margin-top: 0px;
	border: 1px solid rgba(255, 255, 255, 0.3);
	overflow: auto;
}

th {
	padding: 20px 15px;
	text-align: left;
	font-weight: 500;
	font-size: 12px;
	color: #fff;
	text-transform: uppercase;
	overflow: auto;
}

tr {
	overflow: auto
}

td {
	padding: 15px;
	text-align: left;
	vertical-align: middle;
	font-weight: 300;
	font-size: 12px;
	color: #fff;
	border-bottom: solid 1px rgba(255, 255, 255, 0.1);
	overflow: auto;
}

section {
	margin: 50px;
}

::-webkit-scrollbar {
	width: 6px;
}

::-webkit-scrollbar-track {
	-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

::-webkit-scrollbar-thumb {
	-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}</style>	
</head>
<body>
<?php include("../menu.html");?>

		<div class="top">
			<p></p>Announcements
		</div>
		<section>
			<div class="tbl-header">
				<table cellpadding="0" cellspacing="0" border="0">
					<thead>
						<tr>
							<th>Date</th>
							<th>Teacher</th>
							<th>Room #</th>
							<th class="important">Announcement</th>
						</tr>
					</thead>
				</table>
			</div>
			
			<div class="tbl-content">
			
				<table cellpadding="0" cellspacing="0" border="0">
					<tbody>
						<?php
                                $todayDate = date("Y-m-d");
                    $sql = "UPDATE announcements SET OLD=1 WHERE (DATE < '$todayDate' && DATE > 0)";
                            if ($conn->query($sql) === true) {
                            } else {
                                $to      = 'atholtonads@gmail.com';
                                $subject = 'ERROR PAGE: main index';
                                $message = 'update announcements error';
                                $headers = 'From: error@ahsraidertime.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

                                mail($to, $subject, $message, $headers);
                            }
                $sql = "SELECT * FROM announcements WHERE OLD='0' AND DATE>0 ORDER BY DATE ASC";
                    $resultt = $conn->query($sql);
                    while ($rows = $resultt -> fetch_assoc()) {
                        $announcement = $rows["ANNOUNCEMENT"];
                        $teacher= $rows["TEACHER"];
                        $room= $rows["ROOM_NUMBER"];
                        $date= $rows["DATE"];
                        echo "\n\t\t\t\t\t\t<tr>\n" ;
                        echo "\t\t\t\t\t\t\t<td>".substr($date, 5, 2)."/".substr($date, -2)."/".substr($date, 2, 2)."</td>\n" ;
                        echo "\t\t\t\t\t\t\t<td>$teacher</td>\n" ;
                        echo "\t\t\t\t\t\t\t<td>$room</td>\n" ;
                        echo "\t\t\t\t\t\t\t<td class =\"important\">$announcement</td>\n" ;
                        echo "\t\t\t\t\t\t</tr>" ;
                    }
            ?>

					</tbody>
				</table>
			</div>
		</section>
		<div class ="footer">
			<p>Created by Team AWOL</a></p>
		</div>
</body>
</html>