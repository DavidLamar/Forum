<?php
	$username = mysql_real_escape_string($_GET["username"]);

        $servername = "cis.gvsu.edu";
        $dbusername = "lamard";
        $dbpassword = "lamard7742";
        $dbname = "lamard";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }

	$selectUser = "SELECT * FROM users where username='$username';";
	$result = $conn->query($selectUser);
	$firstResult = $result->fetch_assoc();
	if(isset($firstResult)){
		echo "false";
	} else {
		echo "true";
	}

?>
