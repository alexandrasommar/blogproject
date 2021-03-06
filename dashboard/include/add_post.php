	<?php
	// if one of the fields are empty, or the image is too big or not an image display error message
	$titleErr = $contentErr = $imgErr = $catErr = "";
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

		if($_POST['post_category'] == "") {
			$catErr = "<p class='red'>Du måste välja en kategori</p>";
		}

	 	if (!empty($_FILES['image']['tmp_name']) && $_FILES['image']['type'] !== 'image/jpeg' && $_FILES['image']['type'] !== 'image/png') { 
			$imgErr = "<p class='red'>Endast jpg-och png-filer är tillåtna</p>";
		}

		if($_FILES['image']['size'] > 1024000) {
			$imgErr = "<p class='red'>Bilden är för stor, den får vara max 1 MB.</p>";
		}


		if(!empty($_POST['title'])
			&& !empty($_POST['post_content'])
			&& !empty($_POST['post_category'])
			&& !empty($_FILES['image']['name'])) {
		
			$title = ucfirst($_POST['title']);
			$content = ucfirst($_POST['post_content']);
			$category = $_POST['post_category'];

			$title = mysqli_real_escape_string($conn, $title);
			$content = mysqli_real_escape_string($conn, $content);

			$image = $_FILES['image']['name'];
			$target_folder = "uploads/";
			$target_name = $target_folder . $image;
			$name = pathinfo($image, PATHINFO_FILENAME);

			// if the image containes other characters than the ones specified, display error message
			if(!preg_match("/^[_a-zA-Z0-9-]+$/", $name)) {
				$imgErr = "<p class='red'>Vald bild: $image. Bildnamnet får inte innehålla å ä ö, mellanslag eller andra specialtecken. Vänligen ge bilden ett nytt namn och försök igen.</p>";
			}
			elseif(!move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/$image")) {
				echo "<p class='red'>Någonting gick fel med filuppladdningen. Vänligen försök igen.</p>";
			} else {
			$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_author_id, post_date, post_image, post_content, post_status) VALUES ('{$category}', '{$title}', '{$_SESSION['firstname']}', {$_SESSION['user_id']}, NOW(), '{$target_name}', '{$content}' ";
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

			}else {
				die("Query failed" . mysqli_error($conn));
			}
		  }
		}
	}


	?>

	<!-- Add post form -->
	<section class="form">
	<h2 class="invisible"></h2>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
			<div class="form-message">
				<?php 
				if(isset($message)) {
					echo $message;
				}

				?>
			</div> <!-- .form__input -->
			<div class="form__input">
				<?php echo $titleErr; ?>
				<label for="title">Titel</label>
				<input type="text" class="form-control" name="title" id="title" value="<?php if(isset($_POST['title'])) { echo $_POST['title']; }?>">
			</div> <!-- .form__input -->
			<div class="form__input">
				<?php echo $contentErr; ?>
				<label for="post_content">Text</label>
				<textarea class="form-control" name="post_content" id="post_content" cols="30" rows="10"><?php if(isset($_POST['post_content'])) { echo $_POST['post_content']; } ?></textarea>
			</div> <!-- .form__input -->
			<div class="form-group">
				<label for="image">Bild</label>
				<?php echo $imgErr; ?>
				<input type="file" name="image" id="image">
			</div> <!-- .form-group -->
			<div class="form__input">
				<label for="post_category">Välj kategori</label>
				<?php echo $catErr; ?>
				<select name="post_category" id="post_category">
					<option value="">Välj kategori</option>
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
			</div> <!-- .form__input -->
			<div class="form__input">
				<input class="btn" type="submit" name="publish" value="Publicera">
				<input class="btn--blue" type="submit" name="save" value="Spara">
			</div> <!-- .form__input -->
		</form>
	</section> <!-- .form -->