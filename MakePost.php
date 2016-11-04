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

	$selectCurrentPost = "select currentPost from admin where name = 'Admin';";
	$result = $conn->query($selectCurrentPost);
	$cp = $result->fetch_assoc();
	$currentPost = $cp["currentPost"];

	$title = mysql_real_escape_string($_POST["post-title"]);
	$content = mysql_real_escape_string($_POST["post-content"]);
	$poster = mysql_real_escape_string($_SESSION["username"]);
	$date = getDate();
	$date = $date[0];

	$makePost = "INSERT INTO post VALUES($currentPost, '$poster', '$title', '$content', $date);";
	$conn->query($makePost);
	$conn->query("COMMIT;");

	//Update the post number. This gives us "unique" posts for later.
	$nextPost = $currentPost + 1;
	$updateCurrentPost = "UPDATE admin SET currentPost = " . $nextPost . " WHERE name = 'Admin';";
	$conn->query($updateCurrentPost);
	$conn->query("COMMIT;");

	header("Location: http://www.cis.gvsu.edu/~lamard/Forum/Post.php?postId=$currentPost");	
?>
