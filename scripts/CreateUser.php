<html>
	<body>

		<?php
			$username = mysql_real_escape_string($_POST["username"]);
			$password = $_POST["password"];
			$location = mysql_real_escape_string($_POST["location"]);

			$servername = "cis.gvsu.edu";
			$dbusername = "lamard";
			$dbpassword = "lamard7742";
			$dbname = "lamard";

			$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
			if($conn->connect_error) {
				die("Connection Failed");
			}

			$selectUser = "SELECT * FROM users WHERE username = '$username';";
			echo $selectUser;
			$results = $conn->query($selectUser);
				
			if($results->num_rows > 0){
				die("Sorry, that username has already been taken");
			}

			$hash = sha1($password);
			for($i = 0; $i < 100; $i++){
				$hash = sha1($hash);
			}
			$createUser = "INSERT INTO users VALUES ('" . mysql_real_escape_string($username) . "', '', '', '" . $hash . "', '$location');";
			$conn->query($createUser);
			$conn->query("COMMIT;");
			
			header("Location: https://www.cis.gvsu.edu/~lamard/Forum");
		?>

	</body>
</html>
