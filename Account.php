<html>
	<head>
		<title>Account Information</title>
		<link href="forum.css" rel="stylesheet" type="text/css">
	</head>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
		var userLocation;
                var getFormattedAddress = function() {
                        var location = document.getElementsByName("location")[0];
			var disp = document.getElementById("location-display");
                        location.value = userLocation.results[4].formatted_address;
			disp.innerHTML = userLocation.results[4].formatted_address;
                }
                var getLocation = function() {
                        if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(getUserLocationInfo);
                        } else {
                                console.log("No Location Info");
                        }
                }
                var getUserLocationInfo = function(position) {
                        var latitude = position.coords.latitude;
                        var longitude = position.coords.longitude;
                        var link = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + latitude + "," + longitude + "&key=AIzaSyCbiCD9tKmXS4xzxbDO3LJmvbjIZV6HuEE";
                        $.ajax({url: link,
                                success: function(result){
                                userLocation = result;
                                getFormattedAddress();
                                },
                                error: function(){
                                    console.log("Unable to retrieve location information");
                                }
                        });
                }
                $(document).ready(function() {
                        getLocation();
                });
	</script>
	
	<body>
		<?php
			include "Header.php";
		?>
		
		<div class = "wrapper">
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
						$loc = $user["addr"];
						echo "<h1>$username</h1><hr>";
						echo "<div><h2>First Name: </h2> $firstName </div>";
						echo "<div><h2>Last Name: </h2> $lastName</div>";
						echo "<div><h3>Location: </h3> $loc </div><br><hr>";
					} else {
						header("Location: /~lamard/Forum/Login.php");
						exit();
					}
				?>
			</div>

			<form id="password" method="post" action="/~lamard/Forum/scripts/ChangePassword.php">
				<h2>Change Password</h2>
				<hr>
				<div class = "form_field">
					<label>Current Password:</label>
					<input type='password' name='current'></input>
				</div>
				<div class = "form_field">
					<label >New Password:</label>
					<input type='password' name='new'></label>
				</div>
				<div class = "form_field">
					<label>Confirm New Password:</label>
					<input type='password' name='confirm-new'></input>
				</div>
				<button type='submit' onclick="return verify()">Save</button>
			</form>

			<form method="post" action="/~lamard/Forum/scripts/UpdateAccountInfo.php">
				<h2>Account Information</h2>
				<hr>
				<div class = "form_field">
					<label>First Name: </label>
					<input type='text' name='firstName'></input>
				</div>
				<div class = "form_field">
					<label>Last Name:</label>
					<input type='text' name='lastName'></input>
				</div>
				<button type='submit'>Save</button>
			</form>

			<form method="post" action="/~lamard/Forum/scripts/UpdateLocation.php">
				<h2> Location</h2>
				<hr>
				<div>
					*Your locaton will remain the place where you created your account. If you change it here, it will remain the same location until changed again. This is the location used to access your local feed.
					<br>
					<input name="location" type="hidden"></input></br>
					<label>New Location: </label><span id="location-display"></span>
				</div></br>
				<button type="submit">Update Location</button>
			</form>
		</div>
	</body>
	
	<script>
		//TODO: verify current password
		function verify(){
			var pass = document.getElementById('password').elements[1].value;
			var match = document.getElementById('password').elements[2].value;
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
				//May want to write string compare function for this
				if (pass == match) {
					return true;
				}
				else {
					alert("Please enter the same password twice.");
					return false;
				}
			}
		}
	</script>
</html>