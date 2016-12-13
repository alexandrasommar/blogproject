<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>

<div class="container">
	<?php include "user_navigation.php"; ?>
	<main>
	<?php

	if($_SESSION['role'] == 'admin') {
		echo "<a href='registration.php'>Registrera ny användare</a>";
		include "all_users.php";
	} else {
		header("Location: index.php");

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