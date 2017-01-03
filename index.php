<?php include "include/head.php"; ?>
	
	<!-- Header -->

	<div class="bg-img">
		<?php include "include/header-navigation-menu.php"; ?>
		<?php include "include/header.php"; ?>
	
		
	<!-- Message -->

	<?php include "include/message.php"; ?>

	<!-- Posts -->

	<section class="post">
	<h2 class="invisible">blogginlägg</h2>
		<div class="post__container">
			<?php
			//limits number of posts to be displayed to 6
			$per_page = 6;
			if(isset($_GET["page"])) {
				$page = $_GET["page"];
			} else {
				$page = 1;
			}

			//calculates the number of pages to be displayed
			if($page == 1) {
				$page_1 = 0;
			} else {
				$page_1 = ($page * $per_page) - $per_page;
			}

			$post_query_count = "SELECT * FROM posts WHERE post_status = 1";
			$find_count = mysqli_query($conn, $post_query_count);
			$count = mysqli_num_rows($find_count);

			$count = ceil($count / $per_page);

			$query = "SELECT posts.*, categories.* 
					  FROM posts LEFT JOIN categories 
					  ON posts.post_category_id = categories.cat_id 
					  WHERE post_status = 1 ORDER BY post_date DESC 
					  LIMIT $page_1, $per_page";

			if($stmt->prepare($query)) {

				$stmt->execute();
				$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_author_id, $post_date, $post_image, $post_content, $post_status, $post_likes, $cat_id, $cat_name);

				$counter = 1;

				while(mysqli_stmt_fetch($stmt)) {

					//when three posts have been displayed, show slider.php
					if ($counter == 4) {
						?></div><?php
						include "include/slider.php";
						?><div class="post__container"><?php
					}

				$counter++;

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
					<span>Av: <span class="author"><a href="author.php?author=<?php echo $post_author_id; ?>"><?php echo $post_author; ?></a></span>, <?php echo substr($post_date, 0,10); ?></span>
					<p>Kategori: <?php echo "<a href='category.php?cat=$cat_id'>$cat_name</a>"; ?></p>
					<p><?php echo substr($post_content, 0, 150) . "..."; ?></p>
				</div> <!-- .post__text -->
			</article> <!-- .post__article -->
			<?php		
				}

			} 
			$stmt->close();
			$conn->close();

			?>
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