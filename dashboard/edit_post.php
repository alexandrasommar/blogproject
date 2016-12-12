<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>

<?php  
$postid = $_GET['edit'];
?>

<?php
if(isset($_POST['update'])) {
	$title = $_POST['title'];
	$content = $_POST['post_content'];
	$category = $_POST['post_category'];

	$image = $_FILES['image']['name'];
	$target_folder = "uploads/";
	$target_name = $target_folder . $image;
	move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/$image");

	$query = "UPDATE posts SET post_title = '{$title}', post_content = '{$content}', post_category_id = '{$category}', post_image = '{$target_name}' WHERE post_id = {$postid}";
	if($stmt->prepare($query)) {
		$stmt->execute();
		$message = "Inlägget uppdaterades <a href='../post.php?post={$postid}'>Titta på inlägget</a>";
	} else {
		echo "query failed" . mysqli_error($conn);
	}
}


?>



	<div class="container">
		<?php include "user_navigation.php"; ?>
		<main>
		<?php if(isset($message)) {
			echo $message;
			}
			?>
			<?php
			$query = "SELECT * FROM posts WHERE post_id = {$postid}";
			if($stmt->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_author_id, $post_date, $post_image, $post_content, $post_status);
				while(mysqli_stmt_fetch($stmt)) {

			?>
			<section class="form">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form__input">
						<label for="title">Titel</label>
						<input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>">
					</div>
					<div class="form__input">
						<label for="post_content">Text</label>
						<textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
					</div>
					<div class="form-group">
						<label for="post_image">Bild</label>
						<img src="../<?php echo $post_image; ?>" width="100">
						<input type="file" name="image">
					</div>
					<div class="form__input">
						<select name="post_category" id="">
						<option>Välj kategori</option>
						<?php
						 $cat_query = "SELECT * FROM categories";
						 if($stmt->prepare($cat_query)) {
							$stmt->execute();
							$stmt->bind_result($cat_id, $cat_name);
							
							while(mysqli_stmt_fetch($stmt)) {
								echo "<option value='$cat_id'>$cat_name</option>";
								    	}
								    } else {
								    	echo "query failed" . mysqli_error($conn);
								  }
						?>
						</select>
					</div>
					<div class="form__input">
					<?php
					if($post_status == 0) {
						echo "<input class='btn' type='submit' name='publish' value='Publicera'>";
					}
					?>
						
					</div>
					<div class="form__input">
						<input class="btn" type="submit" name="update" value="Uppdatera">
					</div>
					<?php 	}
					}
					?>
				</form>
			</section>



		
		</main>
	</div>
	<!-- FontAwesom -->
		<script src="https://use.fontawesome.com/78a857f410.js"></script>
		<!-- JavaScript -->
		<script src="script.js"></script>
</body>
</html>
