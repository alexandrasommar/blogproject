<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>
<?php
if(isset($_POST['register'])) {
	if(!empty($_POST['firstname'])
		&& !empty($_POST['lastname'])
		&& !empty($_POST['email'])
		&& !empty($_POST['website'])
		&& !empty($_POST['username'])
		&& !empty($_POST['password'])
		&& !empty($_FILES[''])) {
		
	}
}



?>
	<div class="container">
		<?php include "user_navigation.php"; ?>
		<main>
			<section class="form">
				<form action="registration.php" method="post" enctype="multipart/form-data">
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
						<label for="username">Användarnamn</label>
						<input type="text" class="form-control" name="username">
					</div>
					<div class="form__input">
						<label for="password">Lösenord</label>
						<input type="password" class="form-control" name="password">
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
		</main>
	</div>
		<!-- FontAwesom -->
		<script src="https://use.fontawesome.com/78a857f410.js"></script>
		<!-- JavaScript -->
		<script src="script.js"></script>
</body>
</html>