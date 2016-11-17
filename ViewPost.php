<html>

	<body>
		<?php include "Header.php"?>
		
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
			$postSelect = "SELECT * FROM post WHERE postid = postId;";
			$result = $conn->query($postSelect);
			$currentPost = $result->fetch_assoc();
			$title = $currentPost['post-title'];
			$content = $currentPost['post-content'];
			echo "<div value='$postId>$title</div>";
			echo "<div>$content</div>";
		?>
	</body>

</html>