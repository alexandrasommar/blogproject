<?php include "include/head.php"; ?>
	
	<!-- Header -->

	<div class="bg-img">
		<?php include "include/header-navigation-menu.php"; ?>
		<?php include "include/header.php"; ?>
	
		
	<!-- Message -->

	<?php include "include/message.php"; ?>

	<!-- Posts -->

	<section class="post">
		<div class="post__container">
			
			<?php include "include/index_posts.php"; ?>

		</div> <!-- .post__container -->
				
		<!-- Pagination -->
		<div class="pagination">
			<?php
			for ($i = 1; $i <= $count; $i++) {
				if($i == $page) {
					echo "<a href='index.php?page={$i}' class='current'>{$i}</a>";
				} else {
					echo "<a href='index.php?page={$i}'>{$i}</a>";
				}
			}

			?>
		</div> <!-- .pagination -->
	</section> <!-- .post -->
	<!-- Footer -->
<?php include "include/footer.php"; ?>