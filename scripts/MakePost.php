<html>

<style>
	.error {
		padding: 10px;
	}
</style>

<body>
<?php
	include "Header.php";
	session_start();
	$username = $_SESSION["username"];
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
	$location = mysql_real_escape_string($_SESSION["location"]);
	$date = getDate();
	$date = $date[0];

	if(!isset($username) || !isset($_SESSION["logged_in"])){
		header("Location: /~lamard/Forum/Login.php");
		exit();	
	}

	$makePost = "INSERT INTO post VALUES($currentPost, '$poster', '$title', '$content', $date, '$location');";
	$conn->query($makePost);
	$conn->query("COMMIT;");

	//Update the post number. This gives us "unique" posts for later.
	$nextPost = $currentPost + 1;
	$updateCurrentPost = "UPDATE admin SET currentPost = " . $nextPost . " WHERE name = 'Admin';";
	$conn->query($updateCurrentPost);
	$conn->query("COMMIT;");

	header("Location: /~lamard/Forum/Post.php?postId=$currentPost");	
?>

</body>

</html>
