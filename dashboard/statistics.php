<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../include/head.php"; ?>

	<div class="container">
		<?php include "user_navigation.php"; ?>
		<main>
			<?php
			if(!isset($_SESSION['username'])) {
				header("Location: ../index.php");
			}
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
			if($post_cnt == 0) {
				echo "Tyvärr har du inga inlägg än, så ingen statistik kan visas. <a href='write_post.php'>Skriv inlägg här</a>";
			} else { ?>
			<div class="divTable">
				<div class="divTableBody">
					<div class="divTableRow divTableRow--header">
						<div class="divTableCell">Antal inlägg</div>
						<div class="divTableCell">Antal kommentarer totalt</div>
						<div class="divTableCell">Antal kommentarer i snitt per inlägg</div>
					</div>	<!-- .divTableRow header -->
					<div class="divTableRow">
						<div class="divTableCell"><?php echo $post_cnt; ?></div>
						<div class="divTableCell"><?php echo $comm_cnt; ?></div>
						<div class="divTableCell"><?php echo $average; ?></div>
						<?php } ?>
					</div> <!-- .divTableRow -->
				</div> <!-- .divTableBody -->
			</div> <!-- .divTable -->
		</main>
	</div> <!-- .container -->
	<!-- FontAwesom -->
	<script src="https://use.fontawesome.com/78a857f410.js"></script>
	<!-- JavaScript -->
	<script src="script.js"></script>
</body>
</html>