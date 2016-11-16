<html>

	<body>
		<?php
			include "Header.php";
		?>

		<div>
			<?php
				session_start();
				$servername = "cis.gvsu.edu";
                                $dbusername = "lamard";
                                $dbpassword = "lamard7742";
                                $dbname = "lamard";

                                $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
                                if($conn->connect_error) {
                                        die("Connection Failed");
                                }
				
				$username = mysql_real_escape_string($_SESSION["username"]);
				$selectUser = "SELECT * FROM users WHERE username='$username';";
				$result = $conn->query($selectUser);
				$user = $result->fetch_assoc();
				if(isset($user)){
					$firstName = $user["first_name"];
					$lastName = $user["last_name"];
					echo "<label>$username</label><hr>";
					echo "<div><label>First Name: </label> $firstName </div>";
					echo "<div><label>Last Name: </label> $lastName</div><br><hr>";
				} else {
					header("Location: http://http://www.cis.gvsu.edu/~lamard/Forum/Login.php");
					exit();
				}
			?>
		</div>

		<form method="post" action="/~lamard/Forum/scripts/ChangePassword.php">
			<label>Change Password:</label>
			<hr>
			<div>
				<label>Current Password:</label>
				<input type='password' name='current'></input>
			</div>
			<div>
				<label>New Password:</label>
				<input type='password' name='new'></label>
			</div>
			<div>
				<label>Confirm New Password:</label>
				<input type='password' name='confirm-new'></input>
			</div>
			<button type='submit'>Save</button>
		</form>

		<form method="post" action="/~lamard/Forum/scripts/UpdateAccountInfo.php">
			<label>Account Information:</div>
			<hr>
			<div>
				<label>First Name: </label>
				<input type='text' name='firstName'></input>
			</div>
			<div>
				<label>Last Name:</label>
				<input type='text' name='lastName'></input>
			</div>
			<button type='submit'>Save</button>
		</form>
	</body>

</html>
