<?php include "include/db.php"; ?>
<?php include "head.php"; ?>

<?php

if(isset($_POST['loggin'])) {

	if(!empty($_POST['username']) && !empty ($_POST['password'])) {

		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "SELECT * FROM users WHERE username = '{$username}'";

		if($stmt->prepare($query)) {

		$stmt->execute();
		$stmt->bind_result($user_id, $dbuser, $firstname, $lastname, $dbpass, $email, $website, $image, $description, $role );

		$stmt->fetch();

		if($password === $dbpass) {

			header("Location: dashboard/index.php");
		}







	}

	}



}





?>



	<section class="login">
		<div class="login__box">
			<div class="login__image">
				<img src="img/Volvo_Ocean_Race_Edition.jpg" alt="">
				<div class="login__form">
					<form method="post" action="" class="login__input">
							<span>Logga in</span>
							<input type="text" name="username" placeholder="Användarnamn">
							<input type="text" name="password" placeholder="Lösenord">
							<input type="submit" name="loggin" value="Logga in">
					</form> <!-- .login__input -->
				</div> <!-- .login__form -->
			</div> <!-- .login__image -->
		</div> <!-- .login__box -->
	</section> <!-- .login -->
</body>
</html>