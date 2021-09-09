<?php
session_start();
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$emails = array(
    "AT and T" => "@txt.att.net",
    "Verizon" => "@vtext.com",
    "Sprint" => "@messaging.sprintpcs.com",
    "T-Mobile" => "@tmomail.net",
    "Virgin Mobile" => "@vmobl.com",
    "Tracfone" => "@mmst5.tracfone.com",
    "Metro PCS" => "@mymetropcs.com",
    "Boost Mobile" => "@sms.myboostmobile",
    "Cricket" => "@sms.cricketwireless.net",
    "Republic Wireless" => "@text.republicwireless.com ",
    "Google Fi" => "@msg.fi.google.com",
    "US Cellular" => "@email.uscc.net",
    "Ting" => "@message.ting.com",
    "Consumer Cellular" => "@mailmymobile.net",
    "C-Spire" => "@cspire1.com",
    "Page Plus" => "@vtext.com",
);

if (isset($_GET['number']) and isset($_GET["carrier"])) {
    $servername = "ahsraidertime.org";
    $username = "ahsraide_editing";
    $password = "cashmoney420";
    $database = "ahsraide_db734576708";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // update database with notification
    $email = str_replace("-", "", $_GET['number']). $emails[$_GET['carrier']];
	
    $sql = "UPDATE students SET `NOTIFICATION`='$email' WHERE EMAIL='$sEmail'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        if ($row1 = $result->fetch_assoc()) {
        }
    }
    $to   = $email;
    
    $message = 'Thank you for signing up to recieve notifications';
    $headers = "From: atholtonads@gmail.com" . "\r\n";
    mail($to, $subject, $message, $headers);

    header("LOCATION: index.php");
    exit();
} else {
    // get name and number ?>
<!DOCTYPE html>

<html>

<head>
    <meta name="google-signin-client_id" content="751418040846-avi5tm16ihmv7hehetgktpfc8un9trpf.apps.googleusercontent.com">
    <meta name="description" content="Sign up for a raider time classroom">
    <meta name="keywords" content="Atholton, Raider time">
    <meta name="author" content="Team AWOL">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="../stylesheetmain.css">
    <link rel="stylesheet" type="text/css" href="stylesheetstudent.css">  
</head>

<body >
<script> function submit() {
	var number = document.getElementById("searchbox").value;
	var carrier = document.getElementById("carrierSelect").value;
	window.location.href = "phoneSurvey.php?number=" + number + "&carrier=" + carrier;
}
</script>
    <nav role="navigation">

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
            </div>
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
        <div class="bigdiv" style="text-align: center;">
        <p style="font-size: 50px; text-align: center;">Contact Information</p>
        <p style="text-align: center;">Please enter your cell phone number and cellular carrier to get alerts from ahsraidertime.org</p>
        <br>

        <p style="text-align: center; font-size: 35px;">Phone Number</p>
        <input style="text-align: center; color: #444547; width: 100%; background-color: white; border: 2px; border-color: black; width: 20%" class="searchbox" type="text" id="searchbox" placeholder="ex: 1112223333">

        <br>
        <br>

        <p style="font-size: 35px; text-align: center;">Cellular Carrier</p>
        <select id="carrierSelect">
		<?php foreach ($emails as $key => $value) {
        echo  "<option value='$key'>$key</option> ";
    } ?>
        </select>
		<p>Note: if you do not see you carrier in the list, please email atholtonads@gmail.com</p>
        <br>
        <br>
        <br>
        <br>
        <button onclick="submit()" style="text-align: center;">Submit</button>
        </div>
</body>
</html>
<?php
} ?>