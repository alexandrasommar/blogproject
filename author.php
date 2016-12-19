<?php include "include/head.php"; ?>
	
	<!-- Header -->

	<div class="blog-post__image">
		<?php include "header-navigation-menu.php"; ?>
	</div> <!-- .blog-post__image -->
	<div class="category__container">
		<?php 
			$author = $_GET['author'];
			$query = "SELECT * FROM users WHERE user_id = {$author}";
			if($stmt->prepare($query)) {

				$stmt->execute();
				$stmt->bind_result($user_id, $username, $firstname, $lastname, $password, $email, $website, $image, $description, $role );

				while(mysqli_stmt_fetch($stmt)) {

					?>
					<!-- Author information box -->

				<div class="author-information-box">
					<div class="author-information-box__image">
						<img src="<?php echo $image;?>" alt="Bild på <?php echo $firstname; ?>">
					</div> <!-- .author-information-box__image -->
					<div class="author-information-box__text">
						<h3><?php echo "$firstname $lastname"; ?></h3>
						<p><?php echo $description; ?></p>
					</div> <!-- .author-information-box__text -->
				</div> <!-- .author-information-box -->

				<?php
				}
			}
		?>
		<!-- Posts -->
		<section class="post">
			<div class="post__container">
				<?php
				$query = "SELECT posts.*, categories.cat_id, categories.cat_name, users.* FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id LEFT JOIN users ON posts.post_author_id = users.user_id WHERE posts.post_author_id = {$author} AND post_status = 1 ORDER BY post_date DESC";
					
					if($stmt->prepare($query)) {
						$stmt->execute();
						$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_author_id, $post_date, $post_image, $post_content, $post_status, $cat_id, $cat_name, $user_id, $username, $firstname, $lastname, $password, $email, $website, $image, $description, $role );

						while(mysqli_stmt_fetch($stmt)) {
							?>
					<article class="post__article">
						<div class="post__img">
							<a href="post.php?post=<?php echo $post_id; ?>"><img class="post__img--styling" src="<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>"></a>
						</div> <!-- .post__img -->
						<div class="post__text">
							<h2><a href="post.php?post=<?php echo $post_id; ?>"><?php 
						if (strlen($post_title) >= 31) {

							echo substr($post_title, 0, 31) . "..."; 

						} else {

							echo $post_title;
						}



						?></a></h2>
							<span>Av: <span class="author"><a href="author.php?author=<?php echo $post_author_id; ?>"><?php echo $post_author; ?></a></span>, <?php echo $post_date; ?></span>
							<p><?php echo substr($post_content, 0, 150) . "..."; ?></p>
						</div> <!-- .post__text -->
					</article> <!-- .post__article -->
				<?php 
					}
				}
						
				?>
			</div> <!-- post__container -->
		</section> <!-- .post -->
	</div> <!-- .category__container -->

	<!-- Footer -->

<?php include "include/footer.php"; ?>