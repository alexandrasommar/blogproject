<?php include "head.php"; ?>
	
<!-- Header -->

<div class="bg-img">

<?php include "header-navigation-menu.php"; ?>
<?php include "header.php"; ?>

</div>
	
	<!-- Message -->

	<?php include "message.php"; ?>

	<!-- Posts -->

	<section class="post">
		<div class="post__container">
	
	<?php 
	$query = "SELECT posts.*, categories.* FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id WHERE post_status = 1 ORDER BY post_date DESC";

	if($stmt->prepare($query)) {

		$stmt->execute();
		$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_author_id, $post_date, $post_image, $post_content, $post_status, $cat_id, $cat_name);

		$counter = 1;

		while(mysqli_stmt_fetch($stmt)) {


			if ($counter == 4) {
				?></div><?php
				include "slider.php";
				?><div class="post__container"><?php
			}

		$counter++;

		?>

		<article class="post__article">
			<div class="post__img">
				<a href="post.php?post=<?php echo $post_id; ?>"><img class="post__img--styling" src="<?php echo $post_image; ?>" alt="Bil"></a>
			</div> <!-- .post__img -->
			<div class="post__text">
				<h2><a href="post.php?post=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h2>
				<span>Av: <span class="author"><a href="author.php?author=<?php echo $post_author_id; ?>"><?php echo $post_author ?></a></span>,<?php echo $post_date; ?></span>
				<p>Kategori: <?php echo "<a href='category.php?cat=$cat_id'>$cat_name</a>"; ?></p>
				<p><?php echo substr($post_content, 0, 150) . "..."; ?></p>
			</div> <!-- .post__text -->
		</article> <!-- .post__article -->

		<?php




		
		}

	}




	?>


	<!-- Message -->



	<!-- Posts -->

		</div>
	</section>

	<!-- Footer -->

<?php include "footer.php"; ?>