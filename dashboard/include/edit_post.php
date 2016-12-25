	<?php
	$postid = $_GET['edit'];
	$query = "SELECT posts.*, categories.cat_name FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id WHERE post_id = {$postid}";

	if($result = mysqli_query($conn, $query)) {
		while ($row = mysqli_fetch_assoc($result)) {
			$post_id = $row['post_id'];
			$category_id = $row['post_category_id'];
			$post_title = $row['post_title'];
			$post_author = $row['post_author'];
			$post_author_id = $row['post_author_id'];
			$post_date = $row['post_date'];
			$post_image = $row['post_image'];
			$post_content = $row['post_content'];
			$post_status = $row['post_status'];
			$current_cat = $row['cat_name'];
		}
	}

	if(isset($_POST['update']) || isset($_POST['publish'])) {	
		$title = ucfirst($_POST['title']);
		$content = ucfirst($_POST['post_content']);
		$category = $_POST['post_category'];

  		$query = "UPDATE posts SET post_title = '{$title}', post_content = '{$content}', post_category_id = '{$category}' ";

		if(!empty($_FILES['image']['name'])) {
			$image = $_FILES['image']['name'];
			$tmp_dir = $_FILES['image']['tmp_name'];
			$target_folder = "uploads/";
			$target_name = $target_folder . $image;
			
				if($_FILES['image']['size'] > 1024000) {
					$imgErr = "<p class='red'>Bilden är för stor, den får vara max 1 MB.</p>";
				}
				if($_FILES['image']['type'] !== 'image/jpeg' && $_FILES['image']['type'] !== 'image/png') {
						$imgErr = "<p class='red'>Endast jpg- och png-filer är tillåtna.</p>";
						
				} 

				if (!isset($imgErr)) {
					move_uploaded_file($tmp_dir, "../uploads/$image");
							$query .= ", post_image = '{$target_name}' ";
				}
			
			}
				
		if(isset($_POST['publish'])) {
		$query .= ", post_status = 1, post_date = CURTIME() ";
		}

		if(!isset($imgErr)) {
		$query .= "WHERE post_id = {$postid}";
		if($stmt->prepare($query)) {
			$stmt->execute();
			$_SESSION['success'] = "<p class='public'>Inlägget uppdaterades</p>";
			header("Location: user_posts.php");
			
			
		} else {
			echo "query failed";
		}
		}	
	} 
				

	if(isset($message)) {
		echo $message;
	}

	?>

	<!-- Edit Post Form -->
	<section class="form">
		<form action="user_posts.php?edit=<?php echo $postid; ?>" method="post" enctype="multipart/form-data">
			<div class="form__input">
				<label for="title">Titel</label>
				<input type="text" class="form-control" name="title" id="title" value="<?php echo $post_title; ?>">
			</div> <!-- .form__input -->
			<div class="form__input">
				<label for="post_content">Text</label>
				<textarea class="form-control" name="post_content" id="post_content" cols="30" rows="10"><?php echo $post_content; ?></textarea>
			</div> <!-- .form__input -->
			<div class="form-group">
				<label for="post_image">Bild</label>
				<img src="../<?php echo $post_image; ?>" width="100">
				<?php if(isset($imgErr)) { echo $imgErr; } ?>
				<input type="file" name="image" id="image">
			</div> <!-- .form-group -->
			<div class="form__input">
				<label for="post_category">Välj kategori</label>
				<select name="post_category" id="post_category">
					<option value="<?php echo $category_id; ?>"><?php echo $current_cat; ?></option>
					<?php
					 $cat_query = "SELECT * FROM categories WHERE NOT cat_name = '{$current_cat}'";
					 if($stmt->prepare($cat_query)) {
						$stmt->execute();
						$stmt->bind_result($cat_id, $cat_name);
							
						while(mysqli_stmt_fetch($stmt)) {
							
							echo "<option value='$cat_id'>$cat_name</option>";	
							    	
							    } 
							} 
					?>
				</select>
			</div> <!-- .form__input -->
			<div class="form__input">
				<?php
				if($post_status == 0) {
					echo "<input class='btn' type='submit' name='publish' value='Publicera'>";
				}
				?>
			</div> <!-- .form__input -->
			<div class="form__input">
				<input class="btn" type="submit" name="update" value="Uppdatera">
			</div> <!-- .form__input -->
		</form>
	</section> <!-- .form -->

