<?php
	session_start();
        $username = mysql_real_escape_string($_SESSION["username"]);
	$firstName = mysql_real_escape_string($_POST["firstName"]);
	$lastName = mysql_real_escape_string($_POST["lastName"]);

        $servername = "cis.gvsu.edu";
        $dbusername = "lamard";
        $dbpassword = "lamard7742";
        $dbname = "lamard";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        if($conn->connect_error) {
                die("Connection Failed");
        }

        $updateUser = "UPDATE users SET first_name='$firstName', last_name='$lastName' WHERE username='$username';";
        $conn->query($updateUser);
	$conn->query("COMMIT;");
		
	header("Location: /~lamard/Forum/Account.php");
?>
