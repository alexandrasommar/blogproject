<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>
<?php if(isset($_SESSION['username'])) { ?>

	<div class="container">
			<?php include "user_navigation.php"; ?>
				<main>
					<?php
					$query = "SELECT * FROM posts ";
					if($_SESSION['role'] != 'admin') {
						$query .= "WHERE post_author_id = '{$_SESSION['user_id']}'";
					}
					if($result = mysqli_query($conn, $query)) {
						$post_cnt = mysqli_num_rows($result);
					}
					$query = "SELECT comments.*, posts.post_author_id FROM comments LEFT JOIN posts ON posts.post_id = comments.comment_post_id ";
					if($_SESSION['role'] != 'admin') {
						 $query .= "WHERE post_author_id = '{$_SESSION['user_id']}'";
						}
					if($result = mysqli_query($conn, $query)) {
						$comm_cnt = mysqli_num_rows($result);
						if($post_cnt > 0) {
						$average = $comm_cnt / $post_cnt;
						$average = round($average, 1);
						}
					}


					?>
					<?php
							if($post_cnt == 0) {
								echo "Tyvärr har du inga inlägg än, så ingen statistik kan visas. <a href='write_post.php'>Skriv inlägg här</a>";
							} else {


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
							<td><?php echo $average; ?></td>
							<?php } ?>
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
<?php }else {
		header("Location: ../index.php");

	} ?>