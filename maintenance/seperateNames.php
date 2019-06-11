<?php 

$servername = "db734576708.db.1and1.com";
$username = "dbo734576708";
$password = "cashmoney420";
$database = "db734576708";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT NAME FROM teachers";
        $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
			  $name = $row['NAME'];
			  
              if (str_word_count($name) > 2) 
                  echo $name;
              
                  $spaceIndex = strrpos($name, ' ');
                  $fname = substr($name, 0, $spaceIndex);
				  $lname = substr($name, $spaceIndex);
				  $lnamef = $lname . ", " . $fname;
				  //$sqll = "UPDATE `teachers` SET `FNAME`='$fname', `LNAME`='$lname' WHERE NAME='$name'";
				  $sqll = "UPDATE teachers set LNAMEF='$lnamef' WHERE NAME='$name'"; 
				  $resultt = mysqli_query($conn, $sqll);
              
          }
      } else {
      }
?>