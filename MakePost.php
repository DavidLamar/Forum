<html>
<head>
		<title>Make Post</title>
		<link href="forum.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php include "Header.php"?>
		<div class = "wrapper">
		<form id="make-post" action="/~lamard/Forum/scripts/MakePost.php" method="POST">
			<div class = "form_field">
				<label>Title: </label>
				<input type="text" name="post-title"></input>
			</div>
			<div class = "form_field">
				<label>Post content:</label>
				<textarea name="post-content"></textarea>
			</div>
			<div class = "submit_button">
				<button type="submit">Make Post</button>
			</div>
		</form>
		</div>
	</body>
</html>