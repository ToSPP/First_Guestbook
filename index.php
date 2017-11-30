<!DOCTYPE html>
<html>
<head>
	<title>My PHP Guestbook</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<h1>Guest Book</h1>
<?php 
	include 'comment_controller.php';

	$comments_all = array_reverse(Comment::show()); 
	$parse_query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
	include 'paginator.php';
	include 'comments_view.php';
?>
	
<?php 
	if (isset($_POST['name']) && isset($_POST['text']) && strlen(trim($_POST['name'])) >= 3 && strlen(trim($_POST['name'])) <= 32 && strlen(trim($_POST['text'])) > 1 && strlen(trim($_POST['text'])) <= 300) {
		echo "<div class='addComment'>Comment added.</div>";	
		header('Refresh: 3');
	}		
	if (isset($_POST['name']) && (strlen(trim($_POST['name'])) < 3 || strlen(trim($_POST['name'])) > 32)) {
		echo "<div class='errorComment'>Name should exist 3 or more characters (max 32).</div>";	
		header('Refresh: 3');
	}
	if (isset($_POST['text']) && (strlen(trim($_POST['text'])) <= 1 || strlen(trim($_POST['text'])) > 300)) {
		echo "<div class='errorComment'>Please, add comment text (max 300).</div>";	
		header('Refresh: 3');
	}		
 ?>
<form method="post" action=<?php if (isset($_POST['name']) && isset($_POST['text']) && strlen(trim($_POST['name'])) >= 3 && strlen(trim($_POST['name'])) <= 32 && strlen(trim($_POST['text'])) > 1 && strlen(trim($_POST['text'])) <= 300) {
			new Comment($_POST['name'], $_POST['text']);
			}
		?>>
	<input type="text" name="name" placeholder="Your name" class="commenterName" required>
	<textarea name="text" placeholder="Your comment (max 300 char.)" class="commentText" required></textarea>
	<input type="submit" class="btnSubmit" value="Add comment">
</form>

</body>
</html>