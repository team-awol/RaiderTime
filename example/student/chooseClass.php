<?php
$tName = $_GET["teacher"];
$sName = $_SESSION["name"];
        $servername = "db734576708.db.1and1.com";
        $username = "dbo734576708";
        $password = "cashmoney420";
        $database = "db734576708";
        $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
?>
<!DOCTYPE html>

<html>

<head>
    <meta name="google-signin-client_id" content="751418040846-avi5tm16ihmv7hehetgktpfc8un9trpf.apps.googleusercontent.com">
    <meta name="description" content="Sign up for a raider time classroom">
    <meta name="keywords" content="Atholton, Raider time">
    <meta name="author" content="Team AWOL">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="stylesheetstudent.css">  
</head>

<body onload="onLoad()">
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
        
            <h1 style="text-align: center; font-size: 50px; font-weight: normal;">Sign-Up for a Class</h1>
    

		<?php
					$useragent=$_SERVER['HTTP_USER_AGENT'];
				if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
				
				echo "<div class=\"left\" style=\"text-align: left;\"><center><p>Select a teacher from below and sign-up</p><br><select id=\"searchlist\" id=\"searchbox\" style=\" width: 150px;\" onClick=\"deleteSelect\" onchange=\"display();\" value=\"Search\" >";
				
				$sql = "SELECT LNAMEF, NAME FROM teachers ORDER BY LNAME";
				$result = mysqli_query($conn, $sql);
			  if (mysqli_num_rows($result) > 0) {
				  while ($row = mysqli_fetch_assoc($result)) {
					  $tname = $row["NAME"];
					$lnamef = $row["LNAMEF"];
					 echo "<option value=\"$tname\">$lnamef</option>";
				  }
			  } 
				
				
				echo "</select></center></div>";
				}else
				echo "<p style=\"text-align: center;\">Select a teacher and click \"Sign-Up\"</p><div class=\"left\" style=\"text-align: left;\"><input style=\"text-align: center; color: #444547;width: 100%; background-color: white; border: 2px; border-color: black;\" class=\"searchbox\" type=\"text\" id=\"searchbox\" onClick=\"deleteSelect()\" onkeyup=\"updateSearch()\" placeholder=\"Search for a teacher here..\">
            <br>
            <div class=\"styled-select\" id=\"styled-select\">
                    <select style=\"overflow: auto; width: 100%; background: none; border: none; color: white; text-align: center; font-family: 'Lato'; font-weight: 300; font-size: 35px; height: 100%;\" id=\"searchlist\" onchange=\"display()\" size=\"10\" value=\"Search\"></select>
                </div>
            </div>";
				?>
            <div class="right">
                <p class="phead" id="phead2" style="font-weight: bold; font-size: 35px; display: inline;">Classroom Information</p><br><br><br>
                <p class="phead" id="phead3" style="font-size: 30px; font-weight: thin; display: inline;">Teacher:</p> 
                <p class="pinfo" id="info2" style="font-size: 30px; font-weight: thin; display: inline;"></p><br><br><br>
                <p class="phead" id="phead4" style="font-size: 30px; font-weight: thin; display: inline;">Room Number: </p>
                <p class="pinfo" id="info3" style="font-size: 30px; font-weight: thin; display: inline;"></p><br><br><br>
                <p class="phead" id="phead5" style="font-size: 30px; font-weight: thin; display: inline;">Details: </p>
                <p class="pinfo" id="info4" style="font-size: 30px; font-weight: thin; display: inline;"></p><br><br><br>
                <form>
                <input id="button" type="button" class="button" value="Sign-Up" onclick="signUp()" />
                </form><br><br>
                <input style="text-align: center;" id="cButton" type="button" class="button" onclick="window.location.href='index.php?name=<?php echo $sName ?>'" value="Cancel" />
            </div>

            <div class = "footer">
                <p>Created by Team AWOL</p>
            </div>
    <script>
        function onLoad() {
            //hide elements
            <?php
        
            if (isset($_GET["teacher"])&&$_GET["teacher"]!="") {
                echo "getInfo();";
            }
    ?>
        }

        function updateSearch() {
            var input = document.getElementById("searchbox");
            var filter = input.value.toUpperCase();
            var list = document.getElementById("searchlist");
            var names = <?php

        $sql = "SELECT NAME FROM teachers";
        $result = mysqli_query($conn, $sql);
         $resultsArray = [];
      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          echo "[";
          while ($row = mysqli_fetch_assoc($result)) {
              $resultsArray[] = "\"" . $row["NAME"] . "\"";
          }
          echo(join(", ", $resultsArray));
          echo "]";
      } else {
          echo "[\"error\"]";
      }
    
    ?>;
            var count = 1;

            while (list.length > 0) {
                list.remove(0);
            }
            if (filter !== "") {
                for (var i = 0; i < names.length; i++) {
                    var a = names[i].toUpperCase();
                    var b = a.indexOf(" ");
                    if (a.substring(0, filter.length) == filter) {
                        var option = document.createElement("option");
                        option.text = names[i];
                        list.add(option);
                        count++;
                    }
                    while (b > -1) {
                        a = a.substring(b + 1);
                        if (a.substring(0, filter.length) == filter) {
                            var option = document.createElement("option");
                            option.text = names[i];
                            list.add(option);
                            count++;
                        }
                        b = a.indexOf(" ");
                    }
                }
            }
            document.getElementById("styled-select").style.height = 15 * count + "px";
            document.getElementById("searchlist").style.height = 15 * count + "px";
        }

        function display() {
            var list = document.getElementById("searchlist");
            var name = list.value;
            window.location.href = "chooseClass.php?teacher=" + name;
        }

        function deleteSelect() {
            document.getElementById("searchbox").values = "";
        }

        function getInfo() {
            <?php
        $tName = $_GET["teacher"];
        $sql = "SELECT * FROM teachers WHERE NAME = '$tName'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $row1 = $row['NAME'];
        $row2 = $row['ROOM_NUMBER'];
        $row3 = $row['DETAILS'];
        
        echo "var input = document.getElementById('searchlist');
        	input.value = '$tName';
            document.getElementById('info2').innerHTML = '$row1';
    		document.getElementById('info3').innerHTML = '$row2';
    		document.getElementById('info4').innerHTML = '$row3';
        ";
    ?>
        }

        function signUp() {
            window.location.replace('http://ahsraidertime.org/student/updateSignUp.php?<?php echo 'teacher=' . $tName;?>');
        }

    </script>
</body>

</html>
