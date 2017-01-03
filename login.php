<?php include "include/db.php"; ?>
<?php include "include/head.php"; ?>

	<?php

	if(isset($_POST['loggin'])) {

		if(!empty($_POST['username']) && !empty ($_POST['password'])) {

			$username = $_POST['username'];
			$password = $_POST['password'];

			$query = "SELECT * FROM users WHERE username = '{$username}'";

			if($stmt->prepare($query)) {

			$stmt->execute();
			$stmt->bind_result($user_id, $dbuser, $firstname, $lastname, $dbpass, $email, $website, $image, $description, $role);

			$stmt->fetch();

			// checks the password against the hashed one. 
			// if it is correct, the user is redirected to dashboard and a session starts
			if(password_verify($password, $dbpass)) {
				session_start();
				$_SESSION['user_id'] = $user_id;
				$_SESSION['username'] = $dbuser;
				$_SESSION['firstname'] = $firstname;
				$_SESSION['lastname'] = $lastname; 
				$_SESSION['email'] = $email;
				$_SESSION['website'] = $website;
				$_SESSION['image'] = $image;
				$_SESSION['desc'] = $description; 
				$_SESSION['role'] = $role;

				header("Location: dashboard/index.php");
			} else {
				$message = "Du har fyllt i fel användarnamn eller lösenord";
			} 

		} 
		$stmt->close();
		$conn->close();  

		} else {
			$message = "Du måste fylla i användarnamn och lösenord";
		} 

	} 

	?>

	<section class="login">
	<h2 class="hidden">Login</h2>
		<div class="login__box">
			<div class="login__image">
				<img src="img/Volvo_Ocean_Race_Edition.jpg" alt="">
				<div class="login__form">
					<form method="post" action="login.php" class="login__input">
							<span>Logga in</span>
							<?php 
							if(isset($message)) {
								echo $message;
							}
							 ?>
							<input type="text" name="username" placeholder="Användarnamn">
							<input type="password" name="password" placeholder="Lösenord">
							<input type="submit" name="loggin" value="Logga in">
					</form> <!-- .login__input -->
				</div> <!-- .login__form -->
			</div> <!-- .login__image -->
		</div> <!-- .login__box -->
	</section> <!-- .login -->
</body>
</html>