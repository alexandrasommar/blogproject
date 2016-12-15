<?php

$titleErr = $contentErr = "";

?>
<section class="form">
<form action="" method="post" enctype="multipart/form-data">

<?php

if (isset($_POST['publish']) || isset($_POST['save'])) {
		
	if (empty($_POST['title'])) {
		$titleErr = "<p>Du måste skriva en titel</p>";
	}

	if (empty($_POST['post_content'])) {
		$contentErr = "<p>Du måste skriva något i inlägget</p>";
	}

} 

if(isset($_POST['publish']) || isset($_POST['save'])) {
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
	if(move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/$image")) {
		echo "Filen laddades upp";
	} else {
		echo "Något gick fel" . mysqli_error($conn);
	}

	$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_author_id, post_date, post_image, post_content, post_status) VALUES ('{$category}', '{$title}', '{$_SESSION['firstname']}', {$_SESSION['user_id']}, CURDATE(), '{$target_name}', '{$content}' ";
	if(isset($_POST['save'])) {
		$query .= ", 0)";
		$message = "Inlägget är sparat";
	} else {
		$query .= ", 1)";
		$message = "Inlägget är publicerat";
	}

	if($stmt->prepare($query)) {

		$stmt->execute();
		

	} else {

		die("quey" . mysqli_error($conn));
	} 
	} else {
		$message = "Du måste fylla i alla fält";
	}
}


?>


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
		<input type="file" name="image">
	</div>
	<div class="form__input">
		<select name="post_category" id="">
		<option>Välj kategori</option>
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