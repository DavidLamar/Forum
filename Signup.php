<html>

<head>
		<title>Sign Up!</title>
		<link href="forum.css" rel="stylesheet" type="text/css">
	</head>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
		var userLocation;
                var getFormattedAddress = function() {
			var location = document.getElementsByName("location")[0];
                        location.value = userLocation.results[4].formatted_address;
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
		<?php include "Header.php"?>
		
		<div class = "wrapper">
		<h1>Sign Up</h1>
		<form id="signup" method="POST" action="/~lamard/Forum/scripts/CreateUser.php">
			<div>
				<div class = "form_field">
					<label>Username:</label> <input type="text" id="username" name="username"/>
				</div>
				<div class = "form_field">
					<label>Password:</label> <input type="password" id="password" name="password"/>
				</div>
				<div class = "form_field">
					<label>Re-enter Password:</label> <input type="password" id="verify"/>
				</div>
				<input type="hidden" name="location" value=""></input>
			</div></br>
			<div>
				<button type="submit" class = "submit_button" onclick="return confirm()">Create Account</button>
			</div>
		</form>
			</div>
		</body>
	<script>
		function confirm(){
			var name = document.getElementById('signup').elements[0].value;
            var pass = document.getElementById('signup').elements[1].value;
			var match = document.getElementById('signup').elements[2].value;
			
			// User must have entered a username.
            if (!name) {
            	alert("Please enter a username");
                return false;
            }
			/*Password must be greater than 5 characters, with at least
			one special character and one number. Here we must use regular
			expressions to check the input.*/
			var special = pass.search(/[!@#$%^&*()]/g);
			var numeral = pass.search(/[0-9]/g);
			if (special == -1 || numeral == -1 || pass.length < 6) { 
				alert("Password must be longer than 5 characters and must "+
				"contain at least one numeral and one special character.");
				return false;
			} else {
				if (pass == match) {
					return true;
				}
				else {
					alert("Please enter the same password twice.");
					return false;
				}
			}
			return false;
		}
	</script>
</html>