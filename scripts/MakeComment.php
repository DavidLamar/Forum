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

        $selectCurrentPost = "select currentComment from admin where name = 'Admin';";
        $result = $conn->query($selectCurrentPost);
        $cc = $result->fetch_assoc();
        $currentComment = $cc["currentComment"];

        $content = mysql_real_escape_string($_POST["comment"]);
        $poster = mysql_real_escape_string($_SESSION["username"]);
	$postId = mysql_real_escape_string($_POST["postId"]);
        $date = getDate();
        $date = $date[0];
	
	$addComment = "INSERT INTO comment VALUES($currentComment, $postId, '$username', '$content', $date);";
	$conn->query($addComment);
	$conn->query("COMMIT;");
	
	$nextComment = $currentComment + 1;
        $updateCurrentComment = "UPDATE admin SET currentComment = " . $nextComment . " WHERE name = 'Admin';";
        $conn->query($updateCurrentComment);
        $conn->query("COMMIT;");
	header("Location: /~lamard/Forum/Post.php?postId=$postId");
?>
