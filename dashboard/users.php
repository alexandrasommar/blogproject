<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>

<div class="container">
	<?php include "user_navigation.php"; ?>
	<main>
	<?php

	if($_SESSION['role'] == 'admin') {
		include "all_users.php";
		echo "<a href='users.php?source=register'>Registrera ny användare</a>";

	if(isset($_GET['source'])) {
	    $source = $_GET['source'];
	} else {
	    $source = '';
	}

	switch ($source) {
	    case 'edit':
	        include "edit_user.php";
	        break;
	    case 'register':
	        include "registration.php";
	        break;
	    
	}

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