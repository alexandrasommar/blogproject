<?php include "head.php"; ?>

	<!-- Header -->

<div class="blog-post__image">

<?php include "header-navigation-menu.php"; ?>
<?php include "include/functions.php"; ?>

</div> <!-- .blog-post__image -->
<?php
$post = $_GET["post"]; 


$nameErr = $emailErr = $webErr = $contentErr = "";

if (isset($_POST['submit'])) {
		
	if (empty($_POST['name'])) {
		$nameErr = "<p>Du måste fylla i ditt namn</p>";
	}

	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$emailErr = "<p>Du måste fylla i en giltig epostadress</p>";
	}

	if (empty($_POST['website'])) {
		$webErr = "<p>Du måste fylla i en hemsideadress</p>";
	}

	if (empty($_POST['content'])) {
		$contentErr = "<p>Du måste skriva något i kommentaren</p>";
	} 

} 

if(isset($_POST['submit'])) {
	if(!empty($_POST['name']) 
		&& !empty($_POST['email']) 
		&& !empty($_POST['website']) 
		&& !empty($_POST['content'])) {

	$name = $_POST['name'];
	$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
	$website = $_POST['website'];
	$content = $_POST['content'];

	$name = mysqli_real_escape_string($conn, $name);
	$email = mysqli_real_escape_string($conn, $email);
	$website = mysqli_real_escape_string($conn, $website);
	$content = mysqli_real_escape_string($conn, $content);


	$query ="INSERT INTO comments(comment_post_id, comment_author, comment_date, comment_email, comment_content, comment_website) VALUES('{$post}', '{$name}', CURDATE(), '{$email}', '{$content}', '{$website}')";

	if($stmt->prepare($query)) {

		$stmt->execute(); 

	} else

	die("query failed" . mysqli_error($conn));
}

}

 ?>

<!-- Post -->
	
<section class="blog-post">
<?php
$query = "SELECT posts.*, categories.cat_id, categories.cat_name, users.* FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id LEFT JOIN users ON posts.post_author_id = users.user_id WHERE posts.post_id = {$post}";
if($stmt->prepare($query)) {

		$stmt->execute();
		$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_author_id, $post_date, $post_image, $post_content, $post_status, $cat_id, $cat_name, $user_id, $username, $firstname, $lastname, $password, $email, $website, $image, $description, $role );

		while(mysqli_stmt_fetch($stmt)) { ?>
		<article class="blog-post__article">
			<div class="blog-post__date">
				<time><?php echo $post_date; ?></time>
				<span>1+ <i class="fa fa-heart blog-post__icon" aria-hidden="true"></i></span>
			</div> <!-- .blog-post__date -->
			<h2><?php echo $post_title; ?></h2>
			<p><?php echo $post_content; ?></p>

				<!-- Author information box -->
				
				<?php include "author-information-box.php"; ?>

				<!-- Comment information -->
		
		</article> <!-- .blog-post__article -->			

<?php
		}
	}
?>

</section> <!-- .blog-post -->

	<section class="form">
		<form method="post" action="post.php?post=<?php echo $post; ?>#comment">
			<div class="form__input">
				<label for="name">Namn</label>
				<?php echo $nameErr; ?>
				<input type="text" name="name">
			</div>
			<div class="form__input">
				<label for="email">Email</label>
				<?php echo $emailErr; ?>
				<input type="email" name="email">
			</div>
			<div class="form__input">
				<label for="website">Hemsida</label>
				<?php echo $webErr; ?>
				<input type="text" name="website">
			</div>
			<div class="form__input">
				<label for="content">Inlägg</label>
				<?php echo $contentErr; ?>
				<textarea name="content"></textarea>
			</div>
			<div class="form__input">
				<input type="submit" name="submit" value="Kommentera">
			</div>
		</form>	
	</section>
	<section class="blog-post">
		<div class="comments">
			<?php countComments(); ?>
		</div>
	</section>

	<section class="blog-post">
		<?php
		$query = "SELECT * FROM comments WHERE comment_post_id = '{$post}'";
		if($stmt->prepare($query)) {

		$stmt->execute();
		$stmt->bind_result($comment_id, $comment_post_id, $comment_author, $comment_date, $comment_email, $comment_content, $comment_website);

		while(mysqli_stmt_fetch($stmt)) { ?>

			<div class="comments">
				<p><?php echo $comment_author; ?></p>
				<p><?php echo $comment_date; ?></p>
				<p><?php echo $comment_content; ?></p>

			</div>
		
	<?php

		}
		}	
		?>
	</section>
	
	
	

	<!-- Footer -->

<?php include "footer.php"; ?>