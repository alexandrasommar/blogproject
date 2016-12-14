<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>

<div class="container">
	<?php include "user_navigation.php"; ?>
	<main>
<?php
if($_SESSION['role'] != 'admin') {
	header("Location: index.php");
}


$firstErr = $lastErr = $emailErr = $webErr = $userErr = $passErr = $descErr = "";
if(isset($_POST['register'])) {
	if (empty($_POST['firstname'])) {
		$firstErr = "Du måste fylla i förnamn";
	}
	if (empty($_POST['lastname'])) {
		$lastErr = "Du måste fylla i efternamn";
	}
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$emailErr = "Du måste fylla i en giltig email";
	}

	if (empty($_POST['website'])) {
		$webErr = "Du måste fylla i hemsida";
	}
	if (empty($_POST['username'])) {
		$userErr = "Du måste ange ett användarnamn";
	}
	if (empty($_POST['password'])) {
		$passErr = "Du måste ange ett lösenord";
	}
	if (empty($_POST['description'])) {
		$descErr = "Du måste fylla i en beskrivning";
	}

	if(!empty($_POST['firstname'])
		&& !empty($_POST['lastname'])
		&& !empty($_POST['email'])
		&& !empty($_POST['website'])
		&& !empty($_POST['username'])
		&& !empty($_POST['password'])
		&& !empty($_FILES['profilepic'])
		&& !empty($_POST['description'])) {

		$first = mysqli_real_escape_string($conn, $_POST['firstname']);
		$last = mysqli_real_escape_string($conn, $_POST['lastname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$website = mysqli_real_escape_string($conn, $_POST['website']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$user = mysqli_real_escape_string($conn, $_POST['username']);
		$pass = mysqli_real_escape_string($conn, $_POST['password']);

		$profilepic = $_FILES['profilepic']['name'];
		$target_folder = "uploads/";
		$target_name = $target_folder . $profilepic;
		move_uploaded_file($_FILES['profilepic']['tmp_name'], "../uploads/$profilepic");


		$pass = password_hash($pass, PASSWORD_DEFAULT);

		$query = "INSERT INTO users VALUES('', '{$user}', '{$first}', '{$last}', '{$pass}', '{$email}', '{$website}', '{$target_name}', '{$description}', 'editor')";

		if($stmt->prepare($query)) {
			$stmt->execute();
			$message = "Användaren är registrerad och kan nu logga in. <a href='users.php'>Se alla användare</a>";
		} 
 
	}  
}



?>			<?php
				if(isset($message)) {
					echo $message;
				}


			?>
			
			<section class="form">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form__input">
						<label for="firstname">Förnamn</label>
						<?php echo $firstErr; ?>
						<input type="text" class="form-control" name="firstname" value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>">
					</div>
					<div class="form__input">
						<label for="lastname">Efternamn</label>
						<?php echo $lastErr; ?>
						<input type="text" class="form-control" name="lastname" value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>">
					</div>
					<div class="form__input">
						<label for="email">Email</label>
						<?php echo $emailErr; ?>
						<input type="text" class="form-control" name="email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
					</div>
					<div class="form__input">
						<label for="website">Hemsida</label>
						<?php echo $webErr; ?>
						<input type="text" class="form-control" name="website" value="<?php if(isset($_POST['website'])) { echo $_POST['website']; } ?>">
					</div>
					<div class="form__input">
						<label for="username">Användarnamn</label>
						<?php echo $userErr; ?>
						<input type="text" class="form-control" name="username" value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>">
					</div>
					<div class="form__input">
						<label for="password">Lösenord</label>
						<?php echo $passErr; ?>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="form-group">
						<label for="profilepic">Profilbild</label>
						<input type="file" name="profilepic">
					</div>
					<div class="form__input">
						<label for="description">Beskrivning</label>
						<?php echo $descErr; ?>
						<textarea class="form-control" name="description" id="" cols="30" rows="10"><?php if(isset($_POST['description'])) { echo $_POST['description']; } ?></textarea>
					</div>
					<div class="form__input">
						<input class="btn" type="submit" name="register" value="Registrera">
					</div>
				</form>
			</section>
		</main>
	</div>
		<!-- FontAwesom -->
		<script src="https://use.fontawesome.com/78a857f410.js"></script>
		<!-- JavaScript -->
		<script src="script.js"></script>
</body>
</html>