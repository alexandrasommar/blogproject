<?php include "head.php"; ?>
	
	<!-- Header -->
	<div class="bg-img">

<?php include "header-navigation-menu.php"; ?>
<?php include "header.php"; ?>
	
	</div>

	<?php include "message.php"; ?>

	<section class="post">
	<?php 


	$query = "SELECT * FROM posts";

	if($stmt->prepare($query)) {

		$stmt->execute();
		$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_status);

		while(mysqli_stmt_fetch($stmt)) {

			?>

			<article class="post__article">
			<div class="post__img"><a href="post.php?post=<?php echo $post_id; ?>"><img class="post__img--styling" src="img/volvo_bg_1.jpg" alt="Bil"></a></div>
			<div class="post__text">
				<h2><a href="post.php?post=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h2>
				<span>Av: <span class="author"><a href="author.php"><?php echo $post_author ?></a></span>,<?php echo $post_date; ?></span>
				<p><?php echo $post_content; ?></p>
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