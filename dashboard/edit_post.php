<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>

<?php  
$postid = $_GET['edit'];
?>

	<div class="container">
		<?php include "user_navigation.php"; ?>
		<main>
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
								    $select_categories = mysqli_query($conn,$cat_query);   
								    while ($row = mysqli_fetch_assoc($select_categories)) {        
								    $cat_id = $row['cat_id'];
								    $cat_name = $row['cat_name'];

								    echo "<option value='$cat_id'>$cat_name</option>";
								 
									} 
						?>
						</select>
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
