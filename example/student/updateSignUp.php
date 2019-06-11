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
        $subject = 'ERROR PAGE:  update student sign up';
        $message = 'connection error';
        $headers = 'From: error@ahsraidertime.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
    }

    $student = trim($_SESSION["name"]);
	$teacher = $_GET['teacher'];


    $cou="SELECT count(*) as 'total' FROM testing WHERE SIGNUP = '$teacher'";
    $result = mysqli_query($conn,$cou);
    $row = $result->fetch_assoc();
    $count = $row['total'];
    //echo "num students signed up $count ";


    $cou="select MAX_STUDENTS as 'count' from teachers where NAME = '$teacher'";
    $result = mysqli_query($conn,$cou);
    $row = $result->fetch_assoc();
    $count_max = $row['count'];
    //echo "max students $count_max ";
	
	if($count >= $count_max){
      //echo "Class full";
      //$conn_>close();
      echo "<script>window.alert('Class Full');</script>";
      echo "<script>window.location.replace('chooseClass.php');</script>";
    }
	else{

	$sql = "UPDATE testing SET SIGNUP= '$teacher' WHERE NAME='$student'";

if ($conn->query($sql) === TRUE) {
} else {
}

$conn->close();

echo "<script>window.location.replace('index.php');</script>";
    }