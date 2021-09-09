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

// returns the value of var from google id
function get_var($var)
{
    $id = $_POST["id"]; // id from google
    $id_token = file(
      "https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=" . $id
    ); // decrypted id
    foreach ($id_token as $part) {
        // part is a factor of the user such as name or email
        // remove unecessary charcters
        $peice = str_replace("\"", "", $part);
        $peice = str_replace(",", "", $peice);
        $peice = substr($peice, 0, strpos($peice, ":") + 2);
        if (strpos($peice, $var) !== false) {
            $var = str_replace("\"", "", $part);
            $var = str_replace(",", "", $var);
            $var = substr($var, strpos($var, ":") + 2);
            return $var;
        }
    }
}

$name = trim(get_var("name"));
$email = trim(get_var("email"));

// connect to database
$servername = "ahsraidertime.com";
    $username = "ahsraide_editing";
    $password = "cashmoney420";
    $database = "ahsraide_db734576708";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $to = 'atholtonads@gmail.com';
    $subject = 'ERROR PAGE: login';
    $message = 'connection error';
    $headers = 'From: error@ahsraidertime.com';
    mail($to, $subject, $message, $headers);
}

// TODO check if id is expired


$emldom = (strpos($email, "@") !== false)
    ? substr($email, strrpos($email, "@")) : "";

if ((strcmp($emldom, "@hcpss.org") === 0)
    || (strcmp($emldom, "@inst.hcpss.org") === 0)
) {
	// user is hcpss
    session_start();
    $_SESSION["name"] = preg_replace('/[^A-Za-z0-9\- ]/', '', $name);
    $_SESSION["email"] = $email;
    // $_SESSION["exp"] = $exp; // when to auto logout
    // $_SESSION["img"] = $img_url;


    if (strcmp($emldom, "@inst.hcpss.org") === 0) {
        // user is student
        // get firstname and lastname
        $_SESSION["fname"] = preg_replace('/[^A-Za-z0-9\- ]/', '', trim(get_var("given_name")));
        $_SESSION["lname"] = preg_replace('/[^A-Za-z0-9\- ]/', '', trim(get_var("family_name")));
        // foward to student page
				header("LOCATION: /student");

		echo $_SESSION["name"];
		echo phpinfo();
		session_write_close(); session_regenerate_id(true);


		exit();
    } else {
        // user is not student
        // find out if user is teacher or administrator
        // get administrators names
        $sql = "SELECT NAME FROM administrators";
        $result = $conn->query($sql);
        $administrators = array();
        while ($row = $result->fetch_assoc()) {
            $administrators[] = $row["NAME"];
        }

        // determine if admin or teacher
        if (in_array($name, $administrators)) {
            header("LOCATION: http://ahsraidertime.com/administrator/");
            exit();
        } elseif (strcmp($emldom, "hcpss.org") === 0) {
            // teacher
            header("LOCATION: http://ahsraidertime.com/teacher/");
            exit();
        }
    }
}
// if user has not been identified or other error, just redirect to home page
header("LOCATION: http://ahsraidertime.com");
?>
