<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "include/head.php"; ?>

		<div class="container">
			<?php include "include/user_navigation.php"; ?>
			<main>
			<?php
			if(!isset($_SESSION['username'])) {
				header("Location: ../index.php");
			}

			if(isset($_SESSION['success'])) {
				echo $_SESSION['success'];
				unset($_SESSION['success']);
			}

			// if the user is admin, display content. else redirect to index
			if($_SESSION['role'] == 'admin') {
				echo "<div class='ad-category'>";
				echo "<a href='registration.php'>Registrera ny användare</a>";
				echo "</div>";
				


			if(isset($_GET['edit'])) {
				include "include/edit_user.php";
			}

			include "include/all_users.php";
			
			} else {
				header("Location: index.php");

			}
			?>
			</main>
		</div> <!-- .container -->
	</div> <!-- .content_container -->
</body>
</html>