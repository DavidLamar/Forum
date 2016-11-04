<?php
	$username = $_POST["username"];
	$password = $_POST["password"];
	$_SESSION["logged_in"] = false;

	$servername = "cis.gvsu.edu";
	$dbusername = "lamard";
	$dbpassword = "lamard7742";
	$dbname = "lamard";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	} 
	$selectUser = "SELECT * FROM users WHERE username = '" . mysql_real_escape_string($username) . "';";
	$result = $conn->query($selectUser);
	$hash = sha1($password);
	for($i = 0; $i < 100; $i++){
		$hash = sha1($hash);
	}

	if($result->num_rows < 1){
		die("Invalid username and password");
	}
	
	$user = $result->fetch_assoc();
	if(count($result) > 0 && strcmp($user["password"], $hash) == 0){
		session_start();
		$_SESSION["logged_in"] = true;
		$_SESSION["username"] = $username;
		$_SESSION["user_first_name"] = $user["first_name"];
		$_SESSION["user_last_name"] = $user["last_name"];
		header("Location: http://www.cis.gvsu.edu/~lamard/Test");	
	} else {
		echo "Invalid username and password";
	}

?>
