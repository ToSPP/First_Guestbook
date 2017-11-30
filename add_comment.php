<?php 
	include 'comment_controller.php';
	header('Location: index.php');
	if (isset($_POST['name']) && isset($_POST['text'])) {
		new Comment($_POST['name'], $_POST['text']);
	}
 ?>