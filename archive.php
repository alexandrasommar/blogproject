<?php include "include/head.php"; ?>
<?php include "include/functions.php"; ?>
	
	<!-- Header -->

	<div class="bg-img">
		<?php include "include/header-navigation-menu.php"; ?>
		<?php include "header.php"; ?>
	
		
	<h2 id="archive">ARKIV</h2>
	<form method="post" action="archive.php#archive">
		<label for="choose_month">Välj månad</label>
		<select name="choose_month" id="choose_month">
			<option value="">Välj månad</option>
			<?php selectMonth (); ?>
		</select>
		<input type="submit" name="submit" value="Välj">
	</form>

	<?php
	// If the visitor selected a month, posts are displayed
	// based on that selection 

	if(isset($_POST['submit'])) {
	if(!empty($_POST['submit'])) {
	$month = $_POST['choose_month'];
	$query = "SELECT posts.*, categories.* 
			  FROM posts LEFT JOIN categories 
			  ON posts.post_category_id = categories.cat_id 
			  WHERE SUBSTRING(post_date,6,7) = {$month} 
			  AND posts.post_status = 1 
			  ORDER BY posts.post_date DESC";

	$stmt = $conn->stmt_init();
	if($stmt->prepare($query)) {
	$stmt->execute();
	$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_author_id, $post_date, $post_image, $post_content, $post_status, $post_likes, $cat_id, $cat_name);
	$month = strftime('%B', mktime(0, 0, 0, $month, 10));
	echo "<h2>" . $month . "</h2>"; ?>
	
	<!-- Posts -->
	<section class="post">
		<div class="post__container">
			<?php while(mysqli_stmt_fetch($stmt)) { ?>
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
					<span>Av: <span class="author"><a href="author.php?author=<?php echo $post_author_id; ?>"><?php echo $post_author; ?></a></span>, <?php echo substr($post_date, 0, 10); ?></span>
					<p>Kategori: <?php echo "<a href='category.php?cat=$cat_id'>$cat_name</a>"; ?></p>
					<p><?php echo substr($post_content, 0, 150) . "..."; ?></p>
				</div> <!-- .post__text -->
			</article> <!-- .post__article -->
			<?php
				} 
				$stmt->close();
				$conn->close();
			?> 
		</div> <!-- .post__container -->
	</section> <!-- .post -->
	<?php
		} else { 
			echo "Välj en månad i listan"; 
			}
	 	} 
	} 
	
		?>

	<!-- Footer -->

<?php include "include/footer.php"; ?>