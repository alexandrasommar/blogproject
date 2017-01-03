<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../include/head.php";
	
	if(!isset($_SESSION['username'])) {
		header("Location: ../index.php");
	}
?>
		<div class="container">
			<?php include "user_navigation.php"; ?>
			<main>
				<?php include "include/add_post.php"; ?>
			</main>
		</div> <!-- .container -->
	</div> <!-- .content_container -->
	<!-- FontAwesom -->
	<script src="https://use.fontawesome.com/78a857f410.js"></script>
	<!-- JavaScript -->
	<script src="script.js"></script>
</body>
</html>