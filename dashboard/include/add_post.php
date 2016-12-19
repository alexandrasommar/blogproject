<?php
$titleErr = $contentErr = $imgErr = "";
if (isset($_POST['publish']) || isset($_POST['save'])) {
		
	if (empty($_POST['title'])) {
		$titleErr = "<p class='red'>Du måste skriva en titel</p>";
	}
	if(empty($_FILES['image']['tmp_name'])) {
		$imgErr = "<p class='red'>Du måste ladda upp en bild till inlägget</p>";
	}

	if (empty($_POST['post_content'])) {
		$contentErr = "<p class='red'>Du måste skriva något i inlägget</p>";
	}

} 


	if(!empty($_POST['title'])
		&& !empty($_POST['post_content'])
		&& !empty($_POST['post_category'])
		&& !empty($_FILES['image']['name'])) {
	
	$title = $_POST['title'];
	$content = $_POST['post_content'];
	$category = $_POST['post_category'];

	$image = $_FILES['image']['name'];
	$target_folder = "uploads/";
	$target_name = $target_folder . $image;
	if(!move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/$image")) {
		echo "<p class='error'>Filen är för stor, den får vara max 2 MB</p>";
	} else {
		
	

	$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_author_id, post_date, post_image, post_content, post_status) VALUES ('{$category}', '{$title}', '{$_SESSION['firstname']}', {$_SESSION['user_id']}, CURDATE(), '{$target_name}', '{$content}' ";
	if(isset($_POST['save'])) {
		$query .= ", 0)";
		$_SESSION['success'] = "<p class='saved'>Inlägget är sparat.</p>";
		header("Location: user_posts.php");
	} else {
		$query .= ", 1)";
		$_SESSION['success'] = "<p class='public'>Inlägget är publicerat.</p>";
		header("Location: user_posts.php");
	}

	if($stmt->prepare($query)) {

		$stmt->execute();
		

	} else {

		die("quey" . mysqli_error($conn));
	}
	}
	 
}


?>
<section class="form">
<form action="" method="post" enctype="multipart/form-data">
<div class="form-message">
<?php 
if(isset($message)) {
	echo $message;
}

?>
</div>
	<div class="form__input">
	<div class="form-message">
	<?php echo $titleErr; ?>
	</div>
		<label for="title">Titel</label>
		<input type="text" class="form-control" name="title" value="<?php if(isset($_POST['title'])) {
			echo $_POST['title']; }?>">
	</div>
	<div class="form__input">
	<div class="form-message">
	<?php echo $contentErr; ?>
	</div>
		<label for="post_content">Text</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php if(isset($_POST['post_content'])) { echo $_POST['post_content']; } ?></textarea>
	</div>
	<div class="form-group">
		<label for="image">Post Image</label>
		<?php echo $imgErr; ?>
		<input type="file" name="image">
	</div>
	<div class="form__input">
		<label for="post_category">Välj kategori</label>
		<select name="post_category" id="">
		<?php
		 $query = "SELECT * FROM categories";
				    $select_categories = mysqli_query($conn,$query);   

				    while ($row = mysqli_fetch_assoc($select_categories)) {        
				    $cat_id = $row['cat_id'];
				    $cat_name = $row['cat_name'];

				    echo "<option value='$cat_id'>$cat_name</option>";
				 
					}
		?>
		</select>
	</div>
	<div class="form__input">
		<input class="btn" type="submit" name="publish" value="Publicera">
		<input class="btn--blue" type="submit" name="save" value="Spara">
	</div>
</form>
</section>