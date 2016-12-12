<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>
<?php include "../include/functions.php"; ?>

	<div class="container">
			<?php include "user_navigation.php"; ?>
				<main>
				<?php
				$query = "SELECT * FROM posts WHERE post_author_id = '{$_SESSION['user_id']}'";
				if($result = mysqli_query($conn, $query)) {
					$post_cnt = mysqli_num_rows($result);
				}
				//välja comments baserat på comment post id och att det överrensstämmer med de post id som användaren gjort?!
				$query = "SELECT * FROM comments";
				if($result = mysqli_query($conn, $query)) {
					$comm_cnt = mysqli_num_rows($result);
				}

				?>
				<table>
					<tr>
						<th>Antal inlägg</th>
						<th>Antal kommentarer totalt</th>
						<th>Antal kommentarer i snitt per inlägg</th>
					</tr>
					<tr>
						<td><?php echo $post_cnt; ?></td>
						<td><?php echo $comm_cnt; ?></td>
						<td></td>
					</tr>
				</table>










				</main>
			</div>
		</div>

		<!-- FontAwesom -->
		<script src="https://use.fontawesome.com/78a857f410.js"></script>
		<!-- JavaScript -->
		<script src="script.js"></script>
</body>
</html>