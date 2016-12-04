<html>
	<head>
		<title>Login</title>
		<link href="forum.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<?php include "Header.php";?>
		<div class = "wrapper_login">
			<h1>CIS 371 Forum</h1>
			<form method="POST" id="login" action="/~lamard/Forum/scripts/Login.php">

				<div class = "form_field"> <label>Username:</label> <input type="text" name="username" /> </div> 
				<div class = "form_field"> <label>Password:</label> <input type="password" name="password" /> </div> 

				<div><button type="submit" class ="login loginEffect" >Login</button></div>
				<br/>
					
				<footer>Not a user? <a href="Signup.php">Sign up</a></footer> 
			</form>
		</div>
	</body>
</html>