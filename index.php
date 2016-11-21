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
		}
	
		.button.disabled {
			border: 2px solid gray;
		}

		.button.selected {
			border: 2px solid white;
		}

	</style>

	<body>
		<?php include 'Header.php'; ?>
		<div class="content">
			<div class='locaity-select'>
				<div class="button disabled">Local</div>
				<div class="button selected">Global</div>
			</div>

			<hr>			

			<div class='nav-bar'>
				<a href="MakePost.php">Make Post</a>
			</div>
			<hr>

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
				for($i = 0; $i < $maxResults; $i++) {
					$currentPost = $result->fetch_assoc();
					if(isset($currentPost)){
						$title = $currentPost["title"];
						$currentPostId = $currentPost["postid"];
						echo "<div class='post-block' value='$currentPostId'><a href='Post.php?postId=$currentPostId'>$title</a></div>";
					}
				} 
			?>
		</div>

	</body>

</html>
