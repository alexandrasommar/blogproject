<?php include "head.php"; ?>

<div class="header__container--post">


	
</div>

<?php include "header-navigation-menu.php"; ?>

<div class="catagory-container">

<?php 

$category = $_GET['cat'];

$query = "SELECT * FROM posts WHERE post_category_id = {$category}";

if($stmt->prepare($query)) {

		$stmt->execute();
		$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_status);

		while(mysqli_stmt_fetch($stmt)) {

			?>

			<div class="post-category">
			<div class="post-category-img">
				<div class="post__img"><a href="post.html"><img class="post__img--picture" src="img/volvo_bg_1.jpg" alt="Bil"></a></div>
			</div>
			<div class="post-category-text">
				<div class="post-text">
				<h2><a href="post.html"><?php echo $post_title;?></a></h2>
				<span class="byline-category">Av: <span class="author"><?php echo $post_author; ?></span>,<?php echo $post_date ?></span>
				<p><?php echo $post_content ?></p>
			</div>
			</div>
		</div>



			<?php

		}
}



?>


	<!-- Message -->
	
	
		<div class="category-headline">
			<h3><?php echo $category;  ?></h3>
		</div>
		

		<div class="post-category">
			<div class="post-category-text">
				<div class="post-text post-text-category">
				<h2><a href="post.html">Lorem ipsum</a></h2>
				<span class="byline-category">Av: <span class="author">Johan Walberg</span>, 14 nov 2016</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis eos repellat nihil sed explicabo labore, mollitia provident optio sit eveniet.</p>
			</div>
			</div>
			<div class="post-category-img">
				<div class="post__img"><a href="post.html"><img class="post__img--picture" src="img/volvo_bg_1.jpg" alt="Bil"></a></div>
			</div>
		</div>
	</div>

	

	

	<!-- Footer -->

<?php include "footer.php"; ?>