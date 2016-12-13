<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>


	<div class="container">
			<?php include "user_navigation.php"; ?>
				<main>
					<?php
					include "include/add_post.php";
					?>
				</main>
			</div>
		</div>

		<!-- FontAwesom -->
		<script src="https://use.fontawesome.com/78a857f410.js"></script>
		<!-- JavaScript -->
		<script src="script.js"></script>
</body>
</html>