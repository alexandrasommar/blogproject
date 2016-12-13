<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>

<?php
if(isset($_GET['delete'])) {
	$delete = $_GET['delete'];
	$query = "DELETE FROM comments WHERE comment_id = {$delete}";
	if($stmt->prepare($query)) {
		$stmt->execute();
		$message = "Kommentaren är raderad";
	} else {
		echo "query failed";
	}
}


?>

	<div class="container">
			<?php include "user_navigation.php"; ?>
				<main>
					<?php 
					if(isset($message)) {
						echo $message;
					}

					 ?>
					<table>
					<tr>
						<th>Inlägg</th>
						<th>Datum</th>
						<th>Författare</th>
						<th>Email</th>
						<th>Hemsida</th>
						<th>Text</th>
						<th>Radera</th>
					</tr>
					<tr>
					<?php
					$query = "SELECT comments.*, posts.post_title FROM comments LEFT JOIN posts ON posts.post_id = comments.comment_post_id ";

					if($_SESSION['role'] != 'admin') {
						$query .= "WHERE posts.post_author_id = '{$_SESSION['user_id']}' ";
					}

					$query .= "ORDER BY comment_date DESC";

					if($stmt->prepare($query)) {

					$stmt->execute();
					$stmt->bind_result($com_id, $com_post_id, $com_author, $com_date, $com_email, $content, $website, $post_title);

					while(mysqli_stmt_fetch($stmt)) { ?>
							<td><?php echo "<a href='../post.php?post=$com_post_id'>$post_title</a>"; ?></td>
							<td><?php echo $com_date; ?></td>
							<td><?php echo $com_author; ?></td>
							<td><?php echo $com_email; ?></td>
							<td><?php echo $website; ?></td>
							<td><?php echo $content; ?></td>
							<td><?php echo "<a href='user_comments.php?delete=$com_id'>Radera</a>"?></td>
							
							</tr>

						<?php
							
							} 
						}else {

							die("query" . mysqli_error($conn));
							}





							?>
				
						
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