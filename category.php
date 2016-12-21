<?php include "include/head.php"; ?>

	<!-- Header -->

	<div class="blog-post__image">
		<?php include "header-navigation-menu.php"; ?>
	</div>


	<!-- Category -->

	<div class="catagory-container">
		<?php
		$category = $_GET['cat'];
		$query = "SELECT * FROM categories WHERE cat_id = {$category}";
		if($stmt->prepare($query)) {

				$stmt->execute();
				$stmt->bind_result($cat_id, $cat_name);
				while(mysqli_stmt_fetch($stmt)) {

		?>
		<div class="category-headline" id="cat">
			<h3><?php echo $cat_name; } }?></h3>
			<a href="category.php?cat=<?php echo $category; ?>&sort=desc#cat">Visa senaste</a>
			<a href="category.php?cat=<?php echo $category; ?>&sort=asc#cat">Visa äldsta</a>
		</div> <!-- .category-headline -->

		<?php 
		$query = "SELECT * FROM posts WHERE post_category_id = {$category} AND post_status = 1 ";
		// sort the posts with latest or oldest first
		if(isset($_GET['sort'])) {
			$sort = $_GET['sort'];
			if($sort == "desc") {
				$query .= " ORDER BY post_date DESC";
			} else if($sort == "asc") {
				$query .= " ORDER BY post_date ASC";
			}
		}

		if($stmt->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_author_id, $post_date, $post_image, $post_content, $post_status);

			while(mysqli_stmt_fetch($stmt)) { ?>
			
			<!-- Posts -->
			
			<div class="post-category">
				<div class="post-category-img">
					<div class="post__img"><a href="post.php?post=<?php echo $post_id; ?>"><img class="post__img--styling" src="<?php echo $post_image;?>" alt="<?php echo $post_title; ?>"></a></div>
				</div> <!-- .post-category-img -->
				<div class="post-category-text">
					<div class="post-text">
						<h2><a href="post.php?post=<?php echo $post_id; ?>"><?php 
						if (strlen($post_title) >= 31) {

							echo substr($post_title, 0, 31) . "..."; 

						} else {

							echo $post_title;
						}



						?></a></h2>
						<span class="byline-category">Av: <span class="author"><a href="author.php?author=<?php echo $post_author_id; ?>"><?php echo $post_author; ?></span>, <?php echo substr($post_date, 0, 10); ?></span>
						<p><?php echo substr($post_content, 0, 150) . "..."; ?></p>
					</div> <!-- .post-text -->
				</div> <!-- .post-category-text -->
			</div> <!-- .post-category -->
				<?php
				}
			}
				
				?>
	</div> <!-- .catagory-container -->

	<!-- Footer -->

<?php include "include/footer.php"; ?>