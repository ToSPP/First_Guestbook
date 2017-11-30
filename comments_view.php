<?php 
		if ($parse_query == NULL || substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), 5) == 1) {
			$currentPage = 0;
		} else {
			$currentPage = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), 5) - 1;
		}
		if (intdiv(count($comments_all), 4) < $currentPage) {
			header('Location: index.php');
		} else {
			$start = $currentPage * 4;
		}
		if ($start == 0) {
			$end = 3;
		} else {
			$start + 3 < count($comments_all) - 1 ? $end = $start + 3 : $end = $start + (count($comments_all) - 1)%4;
		}

		for ($key=$start; $key <= $end; $key++) { ?>
			<div class="comment"><p><strong><?= $comments_all[$key]['created_at'] ?></strong> <span class="commenterName"><?= $comments_all[$key]['name'] ?></span><br>
			<span class="commentText"><?= $comments_all[$key]['text'] ?></span></p></div>
		<?php 
		} 
 ?>