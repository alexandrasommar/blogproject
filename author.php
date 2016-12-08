<?php include "head.php"; ?>

<div class="blog-post__image">

<?php include "header-navigation-menu.php"; ?>

</div> <!-- .blog-post__image -->

<?php $author = $_GET['author']; ?>

<div class="category__container">
<?php 
	$query = "SELECT * FROM users WHERE user_id = {$author}";
if($stmt->prepare($query)) {

		$stmt->execute();
		$stmt->bind_result($user_id, $username, $firstname, $lastname, $password, $email, $website, $image, $description, $role );

		while(mysqli_stmt_fetch($stmt)) {

			?>
		<div class="author-information-box">
			<div class="author-information-box__image">
				<img src="<?php echo $image;?>" alt="">
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

<section class="post">
<?php
$query = "SELECT posts.*, categories.cat_id, categories.cat_name, users.* FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id LEFT JOIN users ON posts.post_author_id = {$author}";
if($stmt->prepare($query)) {

		$stmt->execute();
		$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_author_id, $post_date, $post_image, $post_content, $post_status, $cat_id, $cat_name, $user_id, $username, $firstname, $lastname, $password, $email, $website, $image, $description, $role );

		while(mysqli_stmt_fetch($stmt)) {
			?>
			<article class="post__article">
				<div class="post__img">
					<a href="post.php"><img class="post__img--styling" src="img/volvo_bg_1.jpg" alt="Bil"></a>
				</div> <!-- .post__img -->
				<div class="post__text">
					<h2><a href="post.php"><?php echo $post_title ?></a></h2>
					<span>Av: <span class="author"><a href="author.html"><?php echo $post_author ?></a></span>, <?php echo $post_date; ?></span>
					<p><?php echo $post_content; ?></p>
				</div> <!-- .post__text -->
			</article> <!-- .post__article -->
			
			<?php 

		}
	}

			
?>
			
		</section> <!-- .post -->
	</div>

	<!-- Footer -->

<?php include "footer.php"; ?>