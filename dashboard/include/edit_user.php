<?php
$userid = $_GET['user'];
if(isset($_POST['update'])) {
		$first = mysqli_real_escape_string($conn, $_POST['firstname']);
		$last = mysqli_real_escape_string($conn, $_POST['lastname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$website = mysqli_real_escape_string($conn, $_POST['website']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$user = mysqli_real_escape_string($conn, $_POST['username']);
		$profilepic = $_FILES['profilepic']['name'];

		$query = "UPDATE users SET username = '{$user}', user_firstname = '{$first}', user_lastname = '{$last}', user_website = '{$website}', user_description = '{$description}' ";

		if(!empty($_POST['password'])) {
		$pass = mysqli_real_escape_string($conn, $_POST['password']);
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$query .= ", user_password = '{$pass}' ";
		}

		if(!empty($profilepic)) {
			$target_folder = "uploads/";
			$target_name = $target_folder . $profilepic;
			move_uploaded_file($_FILES['profilepic']['tmp_name'], "../uploads/$profilepic");
			$query .= ", user_image = '{$target_name}' ";
		}
			$query .=  "WHERE user_id = {$userid}";

		if($stmt->prepare($query)) {
			$stmt->execute();
			$message = "Användaren är uppdaterad.";
		} else {
			die("Query failed" . mysqli_error($conn));
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
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form__input">
				<label for="firstname">Förnamn</label>
				<input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
			</div>
			<div class="form__input">
				<label for="lastname">Efternamn</label>
				<input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
			</div>
			<div class="form__input">
				<label for="email">Email</label>
				<input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
			</div>
			<div class="form__input">
				<label for="website">Hemsida</label>
				<input type="text" class="form-control" name="website" value="<?php echo $website; ?>">
			</div>
			<div class="form__input">
				<label for="username">Användarnamn</label>
				<input type="text" class="form-control" name="username" value="<?php echo $dbuser; ?>">
			</div>
			<div class="form__input">
				<label for="password">Lösenord</label>
				<input type="password" class="form-control" name="password">
			</div>
			<div class="form-group">
				<label for="profilepic">Profilbild</label>
				<img src="../<?php echo $image; ?>" width="200">
				<input type="file" name="profilepic">
			</div>
			<div class="form__input">
				<label for="description">Beskrivning</label>
				<textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $description; ?></textarea>
			</div>
			<div class="form__input">
				<input class="btn" type="submit" name="update" value="Uppdatera">
			</div>
		</form>
	</section>


<?php
	}

}


?>
	