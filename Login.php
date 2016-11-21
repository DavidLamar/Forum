<html>
<head><link href="forum.css" rel="stylesheet" type="text/css"></head>
	<body>
	<?php include "Header.php";?>
	<div class = "wrapper">
	<h1>SUPER COOL TITLE</h1>
	<form method="POST" id="login" action="/~lamard/Forum/scripts/Login.php">
		<div>
			<div id = "username">
				Username: <input type="text" name="username" />
			</div>
			<div id ="password">
				Password: <input type="password" name="password" />
			</div>
		</div>
		<div>
			<button type="submit" class ="login loginEffect" >Login</button>
		</div>
		
		<div>
			Not a user? <a href="Signup.php">Sign up</a>
		</div> 
	</form>
	</div>

	</body>


</html>