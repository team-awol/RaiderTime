 
<?php

/*
    returns the next raidertime date
    if necessary creates a new column in database for this week
*/
function get_next()
{
    // connect to database
    $servername = "ahsraidertime.com";
    $username = "ahsraide_editing";
    $password = "cashmoney420";
    $database = "ahsraide_db734576708";
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        $to = 'atholtonads@gmail.com';
        $subject = 'ERROR PAGE: teacher index';
        $message = 'connection error';
        $headers = 'From: error@ahsraidertime.com';
        mail($to, $subject, $message, $headers);
    }
    // get dates
    $sql = "SELECT DATE FROM dates ORDER BY DATE";
    $result = $conn->query($sql);
    $date = date('Y-m-d'); // current date
    while ($row = $result->fetch_assoc()) {
        // go through dates (in order) until a date that has not passed is reached
        if ($row["DATE"] >= $date) {
            $next_date = $row["DATE"]; // next raidertime
            // add column with next raidertime date to students table incase it doesn't exist yet
            $sql = "SHOW COLUMNS FROM `students` LIKE '$next_date'";
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) {
            } else {
                // create new column
                $sql = "ALTER TABLE `students` ADD `$next_date` TEXT AFTER `PERIOD2`";
                $result = $conn->query($sql);
                // set new column to period 2
                $sql = "UPDATE `students` SET `$next_date`=`PERIOD2`";
                $result = $conn->query($sql);
            }
            // return next raidertime
            return $next_date;
        }
    }
    // close connection
    $conn->close();
}
