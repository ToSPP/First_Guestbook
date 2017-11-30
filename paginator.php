<?php if (count($comments_all) > 4) { ?>
	<div class="paginator"> 
		<div class=<?php if ($parse_query == "page=1" || $parse_query == NULL) {
				echo '\'disabledFirst\'>&laquo;';
			} else {
				echo '\'firstPage\'><a href=\'?page=1\'>&laquo;</a>';
			} ?></div> 
		
		<?php for ($i=0; $i <= ceil(count($comments_all) / 4) - 1; $i++) { 
			$p = $i + 1;
			echo "<div class='page";
			if ($parse_query == 'page=' . $p || $parse_query === NULL && $p == 1) {
				echo " active";
			} echo "'><a href='?page=$p'>$p</a></div>";
			}
			echo "<div class='";
			if ($parse_query == 'page=' . $p) {
				echo "disabledLast";
			} else {
				echo "lastPage";
			}
			echo "'>";
			if ($parse_query == 'page=' . $p) {
				echo "&raquo;</div>"; 
			} else {
				echo "<a href='?page=$p'>&raquo;</a></div>"; 
			}
		?>
	</div>
<?php }	?>