<?php
if($_SESSION['role'] == 'admin') {
if(isset($_POST['register'])) {
	if(!empty($_POST['firstname'])
		&& !empty($_POST['lastname'])
		&& !empty($_POST['email'])
		&& !empty($_POST['website'])
		&& !empty($_POST['user'])
		&& !empty($_POST['pass'])
		&& !empty($_FILES['profilepic'])
		&& !empty($_POST['description'])) {

		$first = mysqli_real_escape_string($conn, $_POST['firstname']);
		$last = mysqli_real_escape_string($conn, $_POST['lastname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$website = mysqli_real_escape_string($conn, $_POST['website']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$user = mysqli_real_escape_string($conn, $_POST['user']);
		$pass = mysqli_real_escape_string($conn, $_POST['pass']);

		$profilepic = $_FILES['profilepic']['name'];
		$target_folder = "uploads/";
		$target_name = $target_folder . $profilepic;
		move_uploaded_file($_FILES['profilepic']['tmp_name'], "../uploads/$profilepic");


		$pass = password_hash($pass, PASSWORD_DEFAULT);

		$query = "INSERT INTO users VALUES('', '{$user}', '{$first}', '{$last}', '{$pass}', '{$email}', '{$website}', '{$target_name}', '{$description}', 'editor')";

		if($stmt->prepare($query)) {
			$stmt->execute();
			$message = "Användaren är registrerad och kan nu logga in";
		} else {
			die("Query failed" . mysqli_error($conn));
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
						<label for="firstname">Förnamn</label>
						<input type="text" class="form-control" name="firstname">
					</div>
					<div class="form__input">
						<label for="lastname">Efternamn</label>
						<input type="text" class="form-control" name="lastname">
					</div>
					<div class="form__input">
						<label for="email">Email</label>
						<input type="text" class="form-control" name="email">
					</div>
					<div class="form__input">
						<label for="website">Hemsida</label>
						<input type="text" class="form-control" name="website">
					</div>
					<div class="form__input">
						<label for="user">Användarnamn</label>
						<input type="text" class="form-control" name="user">
					</div>
					<div class="form__input">
						<label for="pass">Lösenord</label>
						<input type="pass" class="form-control" name="pass">
					</div>
					<div class="form-group">
						<label for="profilepic">Profilbild</label>
						<input type="file" name="profilepic">
					</div>
					<div class="form__input">
						<label for="description">Beskrivning</label>
						<textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
					</div>
					<div class="form__input">
						<input class="btn" type="submit" name="register" value="Registrera">
					</div>
				</form>
			</section>
		
<?php } else {
	header("Location: index.php"); 
	}?>