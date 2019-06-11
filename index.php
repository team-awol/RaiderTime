<?php
session_start();
if ($_SESSION != null) {
    if (strpos($_SESSION["email"], "inst.hcpss") !== false) {
        // user is hcpss student
        header("LOCATION: http://ahsraidertime.com/student");
        exit();
    }
}
    ?>
<!DOCTYPE html>

<head>
	<title>Atholton Raider Time</title>
	<meta name="google-signin-client_id" content="751418040846-82kjldnl1oe6c90k4qfpbq4s9tpb9sk3.apps.googleusercontent.com">
	<meta name="description" content="Sign up for a raider time classroom">
	<meta name="keywords" content="Atholton, Raider time">
	<meta name="author" content="Team AWOL">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<link rel="stylesheet" type="text/css" href="stylesheetmain.css">
	<style>
.g-signin2 {
	width: 100%;
}

.g-signin2>div {
	margin: 0 auto;
}

.center {
	text-align: center;
	position: absolute;
	top: 30%;
	right: 0;
	left: 0;
	font-size: 50px;
}
</style>
</head>
<!--_____________________________________________________________________________________________________________-->

<body>

	<form action="login.php" method="post">
		<input type="hidden" name="id" id="userid">
	</form>

	<script>
		function onSignIn(googleUser) {
			var profile = googleUser.getBasicProfile();
			if (profile.getEmail().indexOf("hcpss.org") == -1) {
				var auth2 = gapi.auth2.getAuthInstance();
				auth2.signOut();
				window.alert("Only HCPSS google accounts allowed");
			}
			else {
				document.getElementById("userid").value = googleUser.getAuthResponse().id_token;
				document.getElementById("userid").form.submit();
			}
		}

	</script>
	<!--______________________________________________________________________________________________________-->
	<div class="center">
      <p>Atholton Raider Time</p>
		<div class="g-signin2" data-onsuccess="onSignIn" -theme="dark" data-width="190" data-height="70"></div>
  	</div>
	
  	
      
	  <?php include("menu.html");?>

	<div class="footer">
		<p>Created by Team AWOL</p>
	</div>
</body>

</html>