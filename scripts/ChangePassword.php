<?php
	session_start();
	$username = $_SESSION["username"];
    $password = $_POST["current"];
	$newPassword = $_POST["new"];

	$servername = "cis.gvsu.edu";
	$dbusername = "lamard";
	$dbpassword = "lamard7742";
	$dbname = "lamard";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	if($conn->connect_error) {
		die("Connection Failed");
	}

	$selectUser = "SELECT * FROM users WHERE username = '" . mysql_real_escape_string($username) . "';";
	$results = $conn->query($selectUser);

	$user = $results->fetch_assoc();

	$hash = sha1($password);
	
	for($i = 0; $i < 100; $i++){
		$hash = sha1($hash);
	}

	if($hash != $user["password"]){
		die("Password was incorrect");
	} else {
		$newHash = sha1($newPassword);
		for($i = 0; $i < 100; $i++){
			$newHash = sha1($newHash);
		}
		$update = "UPDATE users SET password='$newHash' WHERE username='$username';";
		$conn->query($update);
		$conn->query("COMMIT;");
	}

	header("Location: http://www.cis.gvsu.edu/~lamard/Forum/Account.php");
?>
