<?php include 'Header.php'; ?>

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
		<hr>
			<form action="/~lamard/Forum/scripts/MakeComment.php" method="post">
				<div><label>Enter a comment:</label></div>
				<div>
					<textarea width="100%" name="comment"></textarea>
					<input type='hidden' value=<?php echo "$postId"?> name="postId"></input>
					<button type="submit">Post Comment</button>
				</div>
			</form>

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

                        $commentSelect = "SELECT * FROM comment WHERE postId=$postId ORDER BY date DESC;";
                        $result = $conn->query($commentSelect);
			$comment = $result->fetch_assoc();
                        while(isset($comment)) {
                                $currentComment = $comment["content"];
                                echo "<div>$currentComment</div>";
				$comment = $result->fetch_assoc();
                        }

		?>
	</body>

</html>
