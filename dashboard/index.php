<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>
<?php if(isset($_SESSION['username'])) { ?>

	<div class="container">
			<?php include "user_navigation.php"; ?>
				<main>
					
				</main>
			</div>
		</div>

		<!-- FontAwesom -->
		<script src="https://use.fontawesome.com/78a857f410.js"></script>
		<!-- JavaScript -->
		<script src="script.js"></script>
</body>
</html>
<?php }else {
		header("Location: ../index.php");

	} ?>