	<?php
	$catid = $_GET['cat'];

	// if the user pressed update, check the input. if successfull, 
	// update the category and send the user to categories.php
	if(isset($_POST['update_cat'])) {
		if(empty($_POST['name'])) {
			$message = "<p class='red'>Du måste ge ett namn till kategorin</p>";
		}

		if(!empty($_POST['name'])) {
			$cat = ucfirst($_POST['name']);
			$cat = mysqli_real_escape_string($conn, $cat);
			$query = "UPDATE categories SET cat_name = '{$cat}' WHERE cat_id = {$catid}";
			if($stmt->prepare($query)) {
				$stmt->execute();
				$_SESSION['success'] = "<p class='public'>Kategorin uppdaterades</p>";
				header("Location: categories.php");
			} 
		}
	} 

	if(isset($message)) {
		echo $message;
	}

	$query = "SELECT * FROM categories WHERE cat_id = '{$catid}'";
	if($stmt->prepare($query)) {
		$stmt->execute();
		$stmt->bind_result($cat_id, $cat_name);
		while(mysqli_stmt_fetch($stmt)) { ?>

		<!-- Edit Category Form -->
		<section class="form">
			<form action="categories.php?source=edit&cat=<?php echo $catid; ?>" method="post">
				<div class="form__input">
					<label for="name">Redigera kategori</label>
					<input type="text" class="form-control" name="name" id="name" value="<?php echo $cat_name; ?>">
				</div> <!-- .form__input -->
				<div class="form__input">
					<input class="btn btn-primary" type="submit" name="update_cat" value="Uppdatera">
				</div> <!-- .form__input -->
			</form>
		</section>
	<?php
		}
	}
	?>