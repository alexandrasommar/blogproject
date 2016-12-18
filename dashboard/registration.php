<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../include/head.php"; ?>

	<div class="container">
		<?php include "user_navigation.php"; ?>
		<main>
			<?php
			if($_SESSION['role'] != 'admin') {
				header("Location: index.php");
			}

			// if one of the fields are empty, or the email is incorrect display error messages
			$firstErr = $lastErr = $emailErr = $webErr = $userErr = $passErr = $imgErr = $descErr = "";
			if(isset($_POST['register'])) {
				if (empty($_POST['firstname'])) {
					$firstErr = "<p class='red'>Du måste fylla i förnamn</p>";
				}
				if (empty($_POST['lastname'])) {
					$lastErr = "<p class='red'>Du måste fylla i efternamn</p>";
				}
				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
					$emailErr = "<p class='red'>Du måste fylla i en giltig email</p>";
				}
							 
				if(empty($_FILES['profilepic']['tmp_name'])) {
					$imgErr = "<p class='red'>Du måste ladda upp en profilbild</p>";
				}

				if (empty($_POST['website'])) {
					$webErr = "<p class='red'>Du måste fylla i hemsida</p>";
				}
				if (empty($_POST['username'])) {
					$userErr = "<p class='red'>Du måste ange ett användarnamn</p>";
				}
				if (empty($_POST['password'])) {
					$passErr = "<p class='red'>Du måste ange ett lösenord</p>";
				}
				if (empty($_POST['description'])) {
					$descErr = "<p class='red'>Du måste fylla i en beskrivning</p>";
				}

			if(!empty($_POST['firstname'])
				&& !empty($_POST['lastname'])
				&& !empty($_POST['email'])
				&& !empty($_POST['website'])
				&& !empty($_POST['username'])
				&& !empty($_POST['password'])
				&& !empty($_FILES['profilepic'])
				&& !empty($_POST['description'])) {

				// checks if username already exists
				$user = mysqli_real_escape_string($conn, $_POST['username']);
				$query = "SELECT users.username FROM users WHERE username = '{$user}'";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$dbuser = $row['username'];

				if($user = $dbuser) {
					$userErr = "<p class='red'>Användarnamnet finns redan registrerat. Välj ett annat.</p>";
				} 

				$username = mysqli_real_escape_string($conn, $_POST['username']);
				$first = mysqli_real_escape_string($conn, $_POST['firstname']);
				$last = mysqli_real_escape_string($conn, $_POST['lastname']);
				$email = mysqli_real_escape_string($conn, $_POST['email']);
				$website = mysqli_real_escape_string($conn, $_POST['website']);
				$description = mysqli_real_escape_string($conn, $_POST['description']);
				
				$pass = mysqli_real_escape_string($conn, $_POST['password']);
				$pass = password_hash($pass, PASSWORD_DEFAULT);

				
				$profilepic = $_FILES['profilepic']['name'];	
				$target_folder = "uploads/";
				$target_name = $target_folder . $profilepic;
				move_uploaded_file($_FILES['profilepic']['tmp_name'], "../uploads/$profilepic");
				

				$query = "INSERT INTO users VALUES('', '{$username}', '{$first}', '{$last}', '{$pass}', '{$email}', '{$website}' ";
				if(!empty($profilepic)) {
					$query .= ", '{$target_name}' ";
				}
					$query .= ", '{$description}', 'editor')";
				if($stmt->prepare($query)) {
					$stmt->execute();
					$_SESSION['success'] = "Användaren är registrerad och kan nu logga in.";
					header("Location: users.php");
				} 
		 		
			  }
			}
			?>

			<!-- Registration form -->

			<section class="form">
				<form action="registration.php" method="post" enctype="multipart/form-data">
					<div class="form__input">
						<label for="firstname">Förnamn</label>
						<?php echo $firstErr; ?>
						<input type="text" class="form-control" name="firstname" value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>">
					</div> <!-- .form__input -->
					<div class="form__input">
						<label for="lastname">Efternamn</label>
						<?php echo $lastErr; ?>
						<input type="text" class="form-control" name="lastname" value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>">
					</div> <!-- .form__input -->
					<div class="form__input">
						<label for="email">Email</label>
						<?php echo $emailErr; ?>
						<input type="text" class="form-control" name="email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
					</div> <!-- .form__input -->
					<div class="form__input">
						<label for="website">Hemsida</label>
						<?php echo $webErr; ?>
						<input type="text" class="form-control" name="website" value="<?php if(isset($_POST['website'])) { echo $_POST['website']; } ?>">
					</div> <!-- .form__input -->
					<div class="form__input">
						<label for="username">Användarnamn</label>
						<?php echo $userErr; ?>
						<input type="text" class="form-control" name="username" value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>">
					</div> <!-- .form__input -->
					<div class="form__input">
						<label for="password">Lösenord</label>
						<?php echo $passErr; ?>
						<input type="password" class="form-control" name="password" value="<?php if(isset($_POST['password'])) { echo $_POST['password']; }?>">
					</div> <!-- .form__input -->
					<div class="form-group">
						<label for="profilepic">Profilbild</label>
						<?php echo $imgErr; ?>
						<input type="file" name="profilepic">
					</div> <!-- .form-group -->
					<div class="form__input">
						<label for="description">Beskrivning</label>
						<?php echo $descErr; ?>
						<textarea class="form-control" name="description" id="" cols="30" rows="10"><?php if(isset($_POST['description'])) { echo $_POST['description']; } ?></textarea>
					</div> <!-- .form__input -->
					<div class="form__input">
						<input class="btn" type="submit" name="register" value="Registrera">
					</div> <!-- .form__input -->
				</form>
			</section> <!-- .form -->
		</main>
	</div> <!-- .container -->
	<!-- FontAwesom -->
	<script src="https://use.fontawesome.com/78a857f410.js"></script>
	<!-- JavaScript -->
	<script src="script.js"></script>
</body>
</html>