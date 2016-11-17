<html>

	<body>
		<?php include "Header.php"?>
		<form id="signup" method="POST" action="/~lamard/Forum/scripts/CreateUser.php">
			<div>
				<div>
					Username: <input type="text" name="username"/>
				</div>
				<div>
					Password: <input type="password" name="password" />
				</div>
				<div>
					Re-enter Password: <input type="password" name="verify" />
				</div>
			</div>
			<div>
				<button type="submit" onclick="return verify()">Create Account</button>
			</div>
		</form>

	</body>
	<script>
	//ADD VERIFICATION
		function verify(){
			var pass = document.getElementById('login').elements[1].value;
			var special = pass.search(/[!@#$%^&*()]/g);
			var numeral = pass.search(/[0-9]/g);
			/*Password must be greater than 5 characters, with at least
			one special character and one number. Here we must use regular
			expressions to check the input.*/
			if (special == -1 || numeral == -1 || pass.length < 6) { 
				alert("Password must be longer than 5 characters and must "+
				"contain at least one numeral and one special character.");
				return false;
			} else {
				return true;
			}
		}
	</script>

</html>
