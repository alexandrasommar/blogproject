<?php include "include/head.php"; ?>
	
	<!-- Header -->

	<div class="author-bg-img">
		<?php include "include/header-navigation-menu.php"; ?>
		</header>
	</div> <!-- .blog-post__image -->

	<!-- Author information box -->
	<div class="category__container">
		<?php 
		$author = $_GET['author'];
		
		$query = "SELECT users.user_id, users.user_firstname, users.user_lastname, users.user_image, users.user_description FROM users WHERE user_id = {$author}";
		if($stmt->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($post_author_id, $firstname, $lastname, $image, $description);

			while(mysqli_stmt_fetch($stmt)) {
				include "include/author-information-box.php";
			}
		}
		?>
		
		<!-- Posts -->
		<section class="post">
			<div class="post__container">
				<?php
				$query = "SELECT posts.*, categories.cat_id, categories.cat_name 
						  FROM posts LEFT JOIN categories 
						  ON posts.post_category_id = categories.cat_id 
						  WHERE posts.post_author_id = {$author} AND post_status = 1 
						  ORDER BY post_date DESC";
					
					if($stmt->prepare($query)) {
						$stmt->execute();
						$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_author_id, $post_date, $post_image, $post_content, $post_status, $post_likes, $cat_id, $cat_name);

						while(mysqli_stmt_fetch($stmt)) {
							?>
					<article class="post__article">
						<div class="post__img--background post__image--styling" style="background-image: url(<?php echo $post_image;?>);">
						</div> <!-- .post__img -->
						<div class="post__text">
							<h2><a href="post.php?post=<?php echo $post_id; ?>">
							<?php 
							if (strlen($post_title) >= 31) {

								echo substr($post_title, 0, 31) . "..."; 

							} else {

								echo $post_title;

							}
							?></a></h2>
							<span>Av: <span class="author"><?php echo $firstname; ?></span>, <?php echo substr($post_date, 0, 10); ?></span>
							<p><?php echo substr($post_content, 0, 150) . "..."; ?></p>
							<a href="post.php?post=<?php echo $post_id; ?>">Läs mer</a>
						</div> <!-- .post__text -->
					</article> <!-- .post__article -->
				<?php 
					}
				} else {
					die("query failed" . mysqli_error($conn));
				}
				$stmt->close();
				$conn->close(); 
						
				?>
			</div> <!-- post__container -->
		</section> <!-- .post -->
	</div> <!-- .category__container -->

	<!-- Footer -->

<?php include "include/footer.php"; ?>