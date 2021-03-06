<?php
	session_start();
?>
<link href="forum.css" rel="stylesheet" type="text/css">

<style>
	.header {
        	box-sizing: border-box;
                position: relative;
                padding: 10px;
                width: 100%;
                height: 70px;
                background-color: #ffffff;
        }
        body {
                margin: 0;
                padding: 0;
        }
        .logo-container {
                position: absolute;
                left: 10;
                bottom: 0;
        }
        .user-info {
                background-color: #e7e4df;
                padding: 10px;
                position: fixed;
                right: 0;
                top: 0;
		}  
</style>

<div class='header'>
        <div class='logo-container'>
        	<span class='logo'>
			<h1><a href='/~lamard/Forum'>CIS 371 Forum</a></h1>
		</span>
        </div>
        <div class='user-info'>
		<?php
                        if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
                                echo "Hello <a href='/~lamard/Forum/Account.php'>" . $_SESSION["username"] . "</a>, <a href='/~lamard/Forum/scripts/Logout.php'>Log out?</a>";
                        } else {
                        	echo "<a href='Login.php'>Log In</a> | <a href='Signup.php'>Sign Up</a>";
                	}
		?>
	</div>
</div>
