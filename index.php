<?php include "head.php"; ?>
	
	<!-- Header -->
	<div class="bg-img">

<?php include "header-navigation-menu.php"; ?>
<?php include "header.php"; ?>
	
	</div>

	<?php include "message.php"; ?>

	<section class="post">
	<?php 
	$query = "SELECT posts.*, categories.cat_id, categories.cat_name, users.user_id FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id LEFT JOIN users ON posts.post_author_id = users.user_id";

	if($stmt->prepare($query)) {

		$stmt->execute();
		$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_author_id, $post_date, $post_image, $post_content, $post_status, $cat_id, $cat_name, $user_id);

		while(mysqli_stmt_fetch($stmt)) {

			?>

			<article class="post__article">
			<div class="post__img"><a href="post.php?post=<?php echo $post_id; ?>"><img class="post__img--styling" src="img/volvo_bg_1.jpg" alt="Bil"></a></div>
			<div class="post__text">
				<h2><a href="post.php?post=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h2>
				<span>Av: <span class="author"><a href="author.php?author=<?php echo $user_id; ?>"><?php echo $post_author ?></a></span>,<?php echo $post_date; ?></span>
				<p>Kategori: <?php echo "<a href='category.php?cat=$cat_id'>$cat_name</a>"; ?></p>
				<p><?php echo substr($post_content, 0, 150); ?></p>
			</div>
		</article>

		<?php




		
		}

	}




	?>


	<!-- Message -->



	<!-- Posts -->

	
		
	</section>

	<!-- Slider -->

	

	<!-- Footer -->

<?php include "footer.php"; ?>