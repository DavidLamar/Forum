<html>
	<style>
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
		}

		.post-block {
			width: 100%;
			border: 1px 3px 1px 3px;
			border-color: black;
			border-style: solid;
			padding: 5px;
			margin-bottom: 2px;
			box-sizing: border-box;
		}

		.button {
			display: inline-block;
			margin: 5px;
			padding: 5px;
			border: 2px solid black;
			cursor: pointer;
		}
	
		.button.disabled {
			border: 2px solid gray;
		}

		.button.selected {
			border: 2px solid white;
		}

		.page {
			display: none;
		}

		.page.selected {
			display: block;
		}

	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
		var switchLocality = function(button) {
			if($(button).hasClass("disabled")){
				return;
			}
			var localPage = document.getElementById("local-page");
			var globalPage = document.getElementById("global-page");
			
			if(button.id == "button-local") {
				document.getElementById("button-global").classList.remove("selected");
				button.classList.add("selected");
				localPage.classList.add("selected");
				globalPage.classList.remove("selected");
			} else {
				document.getElementById("button-local").classList.remove("selected");
				button.classList.add("selected");
				globalPage.classList.add("selected");
				localPage.classList.remove("selected");
			}
		};
	</script>

	<body>
		<?php include 'Header.php'; ?>
		<div class="content">
			<div class='locaity-select'>
				<div id="button-local" class="button" onClick="switchLocality(this);">Local</div>
				<div id="button-global" class="button selected" onClick="switchLocality(this);">Global</div>
			</div>

			<hr>			

			<div class='nav-bar'>
				<a href="MakePost.php">Make Post</a>
			</div>
			<hr>
			<div id="global-page" class="page selected">
				<?php
					$servername = "cis.gvsu.edu";
					$dbusername = "lamard";
					$dbpassword = "lamard7742";
					$dbname = "lamard";

					$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
					if($conn->connect_error) {
						die("Connection Failed");
					}

					$postId = mysql_real_escape_string($_GET['postId']);
					$postSelect = "SELECT * FROM post ORDER BY postid DESC;";
					$result = $conn->query($postSelect);
					$maxResults = 50;
					if($result->num_rows == 0) {
						echo "No posts yet";
					} else {
						for($i = 0; $i < $maxResults; $i++) {
							$currentPost = $result->fetch_assoc();
							if(isset($currentPost)){
								$title = $currentPost["title"];
								$currentPostId = $currentPost["postid"];
								echo "<div class='post-block' value='$currentPostId'><a href='Post.php?postId=$currentPostId'>$title</a></div>";
							}
						} 
					}
				?>
			</div>
			<div id="local-page" class="page">
				<?php 
					if(isset($_SESSION["location"])) {
						$location = $_SESSION["location"];
						$postSelectLocal = "SELECT * FROM post WHERE addr='$location' ORDER BY postid DESC;";
						$localResults = $conn->query($postSelectLocal);
						if($localResults->num_rows == 0) {
							echo "No posts yet";
						} else {
							for($j = 0; $j < $maxResults; $j++) {
								$currentPost = $localResults->fetch_assoc();
								if(isset($currentPost)){
									$title = $currentPost["title"];
									$currentPostId = $currentPost["postid"];
									echo "<div class='post-block' value='$currentPostId'><a href='Post.php?postId=$currentPostId'>$title</a></div>";
								}
							}	
						}
					} else {
						echo "You must be logged in to see your local feed.";
					}
				?>
			</div>
		</div>

	</body>

</html>
