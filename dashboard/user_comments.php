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
					 <div class="divTable">
				<div class="divTableBody">
					<div class="divTableRow divTableRow--header">
						<div class="divTableCell hidden-tablet">Inlägg</div>
						<div class="divTableCell">Datum</div>
						<div class="divTableCell hidden-mobile">Författare</div>
						<div class="divTableCell hidden-tablet">Email</div>
						<div class="divTableCell hidden-small-desktop">Hemsida</div>
						<div class="divTableCell">Text</div>
						<div class="divTableCell">Radera</div>
					</div>
					<?php
					$query = "SELECT comments.*, posts.post_title FROM comments LEFT JOIN posts ON posts.post_id = comments.comment_post_id ";

					if($_SESSION['role'] != 'admin') {
						$query .= "WHERE posts.post_author_id = '{$_SESSION['user_id']}' ";
					}

					$query .= "ORDER BY comment_date DESC";

					if($result = mysqli_query($conn, $query)) {
						$rows = mysqli_num_rows($result);
					}

					if($stmt->prepare($query) && $rows > 0) {

					$stmt->execute();
					$stmt->bind_result($com_id, $com_post_id, $com_author, $com_date, $com_email, $content, $website, $post_title);

					while(mysqli_stmt_fetch($stmt)) { ?>
							<div class="divTableRow">
	<div class="divTableCell hidden-tablet"><?php echo "<a href='../post.php?post=$com_post_id'>$post_title</a>"; ?></div>
	<div class="divTableCell"><?php echo $com_date; ?></div>
	<div class="divTableCell hidden-mobile"><?php echo $com_author; ?></div>
	<div class="divTableCell hidden-tablet"><?php echo $com_email; ?></div>
	<div class="divTableCell hidden-small-desktop"><?php echo $website; ?></div>
	<div class="divTableCell"><?php echo $content; ?></div>
	<div class="divTableCell"><?php echo "<a href='user_comments.php?delete=$com_id'><i class='fa fa-trash-o' aria-hidden='true'></i></a>"?></div>
</div>

						<?php
							
							} 
						}else {

							echo "Tyvärr har du inga kommentarer ännu";
							}





							?>
				
						
					</div>


					
				</main>
			</div>
		</div>

		<!-- FontAwesom -->
		<script src="https://use.fontawesome.com/78a857f410.js"></script>
		<!-- JavaScript -->
		<script src="script.js"></script>
</body>
</html>