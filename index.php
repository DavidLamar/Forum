<?php
	session_start();
?>

<html>

	<style>
		body {
			margin: 0;
			padding: 0;
		}

		.header {
			box-sizing: border-box;
			position: relative;
			padding: 10px;
			width: 100%;
			height: 70px;
			background-color: red;
		}

		.logo-container {
			position: absolute;
			left: 10;
			bottom: 0;
		}

		.user-info {
			background-color: green;
			padding: 10px;
			position: fixed;
			right: 0;
			top: 0;
		}



		.content {
			padding: 10px;
			width: 80%;
			background-color: gray;
			margin: auto;
			min-height: 5000px;
		}

	</style>

	<body>
		<div class="header">
			<div class="logo-container">
				<span class="logo">Logo</span>
			</div>
			<div class="user-info">
				<?php
					if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
						echo "Hello " . $_SESSION["username"] . ", <a href='Logout.php'>Log out?</a>";
					} else {
						echo "<a href='Login.html'>Log In</a> | <a href='Signup.html'>Sign Up</a>";
					}	
				?>
			</div>
		</div>

		<div class="content">
			<div class='nav-bar'>
				<a href="MakePost.html">Make Post</a>
			</div>
			<hr>
		</div>

	</body>


</html>
