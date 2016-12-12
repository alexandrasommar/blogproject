<?php include "../head.php"; ?>

<?php  

if(isset($_POST['publish']) || isset($_POST['save'])) {
	if(!empty($_POST['title'])
		&& !empty($_POST['post_content'])
		&& !empty($_POST['post_category'])
		&& !empty($_FILES['image'])) {
	
	$title = $_POST['title'];
	$content = $_POST['post_content'];
	$category = $_POST['post_category'];

	$image = $_FILES['image']['name'];
	$target_folder = "uploads/";
	$target_name = $target_folder . $image;
	move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/$image");

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
	}
}


?>


<?php 
if(isset($message)) {
	echo $message;
}

?>
<section class="form">
<form action="" method="post" enctype="multipart/form-data">
	<div class="form__input">
		<label for="title">Titel</label>
		<input type="text" class="form-control" name="title">
	</div>
	<div class="form__input">
		<label for="post_content">Text</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label for="post_image">Post Image</label>
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
		<input class="btn" type="submit" name="save" value="Spara">
	</div>
</form>
</section>