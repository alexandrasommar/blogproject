<?php include "../head.php"; ?>

<?php  

if(isset($_POST['publish'])) {

	$title = $_POST['title'];
	$content = $_POST['post_content'];
	$category = $_POST['post_category'];

	$image = $_FILES['image']['name'];
	$target_folder = "img/";
	$target_name = $target_folder . $image;
	move_uploaded_file($_FILES['image']['tmp_name'], "../img/$image");

	$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_author_id, post_date, post_image, post_content, post_status) VALUES ('{$category}', '{$title}', '{$_SESSION['firstname']}', {$_SESSION['user_id']}, CURDATE(), '{$target_name}', '{$content}', 1)";

	if($stmt->prepare($query)) {

		$stmt->execute();

	} else {

		die("quey" . mysqli_error($conn));
	}

}


if(isset($_POST['save'])) {

	$title = $_POST['title'];
	$content = $_POST['post_content'];
	//$image = $_POST['image'];
	$category = $_POST['post_category'];

	$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_author_id, post_date, post_content, post_status) VALUES ('{$category}', '{$title}', '{$_SESSION['firstname']}', {$_SESSION['user_id']}, CURDATE(), '{$content}', 0)";

	if($stmt->prepare($query)) {

		$stmt->execute(); 
	}


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
		<input class="btn" type="submit" name="publish" value="Publisera">
		<input class="btn" type="submit" name="save" value="Spara">
	</div>
</form>
</section>