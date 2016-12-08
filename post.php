<?php include "head.php"; ?>

	<!-- Header -->

<div class="blog-post__image">

<?php include "header-navigation-menu.php"; ?>


</div> <!-- .blog-post__image -->
<?php
$post = $_GET["post"]; 

if(isset($_POST['submit'])) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$website = $_POST['website'];
	$content = $_POST['content'];




	$query ="INSERT INTO comments(comment_post_id, comment_author, comment_date, comment_email, comment_content, comment_website) VALUES('{$post}', '{$name}', CURDATE(), '{$email}', '{$content}', '{$website}')";

	if($stmt->prepare($query)) {

		$stmt->execute(); 

		


	} else

	die("query failed" . mysqli_error($conn));
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
				<section class="blog-post">
					<div class="comments">
						<form method="post" action="">
						<label for="name">Namn</label>
						<input type="text" name="name" >

						<label for="email">Email</label>
						<input type="email" name="email" >

						<label for="website">Hemsida</label>
						<input type="text" name="website" >

						<label for="content">Inlägg</label>
						<textarea name="content"></textarea>
						<input type="submit" name="submit" value="Kommentera">
						</form>	



					</div>
</section>




	
	
	

	<!-- Footer -->

<?php include "footer.php"; ?>