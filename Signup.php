<html>

	<body>
		<?php include "Header/php"?>
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
				<button type="submit">Create Account</button>
			</div>
		</form>

	</body>

</html>
