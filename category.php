<?php include "head.php"; ?>

<div class="blog-post__image">

<?php include "header-navigation-menu.php"; ?>
	
</div>



<div class="catagory-container">
<?php
$category = $_GET['cat'];
$query = "SELECT * FROM categories WHERE cat_id = {$category}";
if($stmt->prepare($query)) {

		$stmt->execute();
		$stmt->bind_result($cat_id, $cat_name);
		while(mysqli_stmt_fetch($stmt)) {

?>
			<div class="category-headline">
				<h3><?php echo $cat_name; } }?></h3>
			</div>

<?php 



$query = "SELECT * FROM posts WHERE post_category_id = {$category} AND post_status = 1";



if($stmt->prepare($query)) {

		$stmt->execute();
		$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_status);


		while(mysqli_stmt_fetch($stmt)) { ?>

			<div class="post-category">
				<div class="post-category-img">
					<div class="post__img"><a href="post.php?post=<?php echo $post_id; ?>"><img class="post__img--picture" src="img/volvo_bg_1.jpg" alt="Bil"></a></div>
				</div>
				<div class="post-category-text">
					<div class="post-text">
						<h2><a href="post.php?post=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h2>
						<span class="byline-category">Av: <span class="author"><?php echo $post_author; ?></span>,<?php echo $post_date; ?></span>
						<p><?php echo $post_content; ?></p>
					</div>
				</div>
			</div>
			


			
			<?php
			
			
		
		}
		
		
		?>
	
		<?php
}



?>


	
	
	
		
	</div>

	

	

	<!-- Footer -->

<?php include "footer.php"; ?>