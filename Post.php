<html>

	<body>
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
			$postSelect = "SELECT * FROM post WHERE postid = $postId;";
			$result = $conn->query($postSelect);
			$post = $result->fetch_assoc();
			$title = $post['title'];
			$poster = $post['poster'];
			$content = $post['content'];
			echo "<div class='title'>$title</div>
				<div class='poster'>$poster</div>
				<div class='content'>$content</div>";

		
		?>
	</body>

</html>
