<?php
session_start();
$_SESSION = array();

//remove PHPSESSID from browser
if ( isset( $_COOKIE[session_name()] ) )
setcookie( session_name(), “”, time()-3600, “/” );
$_SESSION = array();
session_destroy();

// redirect to home page
header("LOCATION: http://ahsraidertime.com");
exit();
?>