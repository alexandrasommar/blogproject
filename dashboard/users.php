<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>

<div class="container">
	<?php include "user_navigation.php"; ?>
	<main>
	<?php
	// om användaren är superadmin/admin så kan en lägga till nya användare och se ALLA användare
	// annars kan en bara se info om sig själv

	$userrole = $_SESSION['role'];

	if($_SESSION['role'] == 'admin') {
		echo "<a href='registration.php'>Registrera ny användare</a>";
		include "all_users.php";
	} else {
		$query = "SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}'";
		if($stmt->prepare($query)) {
		$stmt->execute();
		$stmt->bind_result($user_id, $dbuser, $firstname, $lastname, $dbpass, $email, $website, $image, $description, $role);
		while (mysqli_stmt_fetch($stmt)) {
			echo $dbuser;
			echo $firstname;
			echo $lastname;
		}
	}
}

	?>
	</main>
</div>
<!-- FontAwesom -->
		<script src="https://use.fontawesome.com/78a857f410.js"></script>
		<!-- JavaScript -->
		<script src="script.js"></script>
</body>
</html>