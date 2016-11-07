<html>

	<body>
	<?php include "Header.php";?>
	<form method="POST" id="login" action="/~lamard/Forum/scripts/Login.php">
		<div>
			<div>
				Username: <input type="text" name="username" />
			</div>
			<div>
				Password: <input type="password" name="password" />
			</div>
		</div>
		<div>
			<button type="submit">Login</button>
		</div>
		<div>
			Not a user? <a href="Signup.php">Sign up</a>
		</div>
	</form>

	</body>


</html>
