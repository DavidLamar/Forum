<html>

	<body>
		<?php include "Header.php"?>
		<form id="make-post" action="http://www.cis.gvsu.edu/~lamard/Forum/scripts/MakePost.php" method="POST">
			<div>
				<label>Title: </label>
				<input type="text" name="post-title"></input>
			</div>
			<div>
				<label>Post content:</label>
				<textarea name="post-content"></textarea>
			</div>

			<div>
				<button type="submit">Make Post</button>
			</div>
		</form>
	</body>

</html>
