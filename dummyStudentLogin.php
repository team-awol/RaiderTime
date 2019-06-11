<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
/*
 * before starting session:
 * confirm that user is valid
 * name
 * google id
 * email
 * confirm that id has not expired
 *
 *
 * session data:
 * name
 * email
 * image url
 */
;

    session_start();
    $_SESSION["name"] = "dummy";
    $_SESSION["email"] = "123@456.com";
    // $_SESSION["exp"] = $exp; // when to auto logout
    // $_SESSION["img"] = $img_url;
	
	
        // user is student
        // get firstname and lastname
        $_SESSION["fname"] = "dummy";
        $_SESSION["lname"] = "dum";
        // foward to student page
				header("LOCATION: /student");
		
exit();

?>