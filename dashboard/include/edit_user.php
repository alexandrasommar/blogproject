<?php
$userid = $_GET['user'];
if(isset($_POST['update'])) {
		$first = mysqli_real_escape_string($conn, $_POST['firstname']);
		$last = mysqli_real_escape_string($conn, $_POST['lastname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$website = mysqli_real_escape_string($conn, $_POST['website']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$user = mysqli_real_escape_string($conn, $_POST['username']);
		

		$query = "UPDATE users SET username = '{$user}', user_firstname = '{$first}', user_lastname = '{$last}', user_website = '{$website}', user_description = '{$description}' ";

		if(!empty($_POST['password'])) {
		$pass = mysqli_real_escape_string($conn, $_POST['password']);
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$query .= ", user_password = '{$pass}' ";
		}

		if(!empty($_FILES['profilepic']['name'])) {
			$profilepic = $_FILES['profilepic']['name'];
			$tmp_dir = $_FILES['profilepic']['tmp_name'];
			$target_folder = "uploads/";
			$target_name = $target_folder . $profilepic;
			$name = pathinfo($profilepic, PATHINFO_FILENAME);

			if($_FILES['profilepic']['size'] > 1024000) {
				$imgErr = "<p class='red'>Bilden är för stor, den får vara max 1 MB.</p>";

			}
			if($_FILES['profilepic']['type'] !== 'image/jpeg' && $_FILES['profilepic']['type'] !== 'image/png') {
				$imgErr = "<p class='red'>Endast jpg- och png-filer är tillåtna.</p>";
					
			}
			if(!preg_match("/^[_a-zA-Z0-9-]+$/", $name)) {
					$imgErr = "<p class='red'>Vald bild: $profilepic. Bildnamnet får inte innehålla å ä ö, mellanslag eller andra specialtecken. Vänligen ge bilden ett nytt namn och försök igen.</p>";
			} 

			if (!isset($imgErr)) {
				move_uploaded_file($tmp_dir, "../uploads/$profilepic");
						$query .= ", user_image = '{$target_name}' ";
			}
		}
			
			if(!isset($imgErr)) {
				$query .=  "WHERE user_id = {$userid}";
				if($stmt->prepare($query)) {
				$stmt->execute();
				$_SESSION['success'] = "<p class='public'>Användaren är uppdaterad.</p>";
				header("Location: users.php");
				} else {
					die("Query failed" . mysqli_error($conn));
			}


			}
			
 
		}

?>


<?php
if (isset($message)) {
	echo $message;
}

$query = "SELECT * FROM users WHERE user_id = {$userid}";

if($stmt->prepare($query)) {
	$stmt->execute();
	$stmt->bind_result($user_id, $dbuser, $firstname, $lastname, $dbpass, $email, $website, $image, $description, $role);
	while (mysqli_stmt_fetch($stmt)) { ?>
	
	<section class="form">
		<form action="users.php?edit&user=<?php echo $userid; ?>" method="post" enctype="multipart/form-data">
			<div class="form__input">
				<label for="firstname">Förnamn</label>
				<input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $firstname; ?>">
			</div> <!-- .form__input -->
			<div class="form__input">
				<label for="lastname">Efternamn</label>
				<input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $lastname; ?>">
			</div> <!-- .form__input -->
			<div class="form__input">
				<label for="email">Email</label>
				<input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
			</div> <!-- .form__input -->
			<div class="form__input">
				<label for="website">Hemsida</label>
				<input type="text" class="form-control" name="website" id="website" value="<?php echo $website; ?>">
			</div> <!-- .form__input -->
			<div class="form__input">
				<label for="username">Användarnamn</label>
				<input type="text" class="form-control" name="username" id="username" value="<?php echo $dbuser; ?>">
			</div> <!-- .form__input -->
			<div class="form__input">
				<label for="password">Lösenord</label>
				<input type="password" class="form-control" name="password" id="password">
			</div> <!-- .form__input -->
			<div class="form-group">
				<label for="profilepic">Profilbild</label>
				<?php if(isset($imgErr)) { echo $imgErr; } ?>
				<img src="../<?php echo $image; ?>" width="200" alt="Bild på <?php echo $firstname; ?>">
				<input type="file" name="profilepic" id="profilepic">
			</div> <!-- .form group -->
			<div class="form__input">
				<label for="description">Beskrivning</label>
				<textarea class="form-control" name="description" id="description" cols="30" rows="10"><?php echo $description; ?></textarea>
			</div> <!-- .form__input -->
			<div class="form__input">
				<input class="btn" type="submit" name="update" value="Uppdatera">
			</div> <!-- .form__input -->
		</form>
	</section> <!-- .form -->


<?php
	}

}


?>
	