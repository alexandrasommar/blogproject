<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../include/head.php"; ?>

<?php
if(!isset($_SESSION['username'])) {
	header("Location: ../index.php");
} ?>
	<div class="container">
		<?php include "user_navigation.php"; ?>
		<main>
			<?php
			// Delete comment
			if(isset($_GET['delete'])) {
				$_SESSION['delete'] = $_GET['delete'];
				?>
				<p class='red'>Är du säker på att du vill radera kommentaren?</p>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<div class="form__input">
						<input class="btn" type="submit" name="yes" value="Ja">
						<input class="btn--blue" type="submit" name="no" value="Nej">
					</div>
				</form>
			<?php
			}
			if(isset($_POST['yes'])) {
			$query = "DELETE FROM comments WHERE comment_id = '{$_SESSION['delete']}'";
				if($stmt->prepare($query)) {
					$stmt->execute();
					$message = "<p class='red'>Kommentaren är raderad</p>";
					unset($_SESSION['delete']);
				} else {
					die("Query failed" . mysqli_error($conn));
				}
			}  
			
			if(isset($message)) {
				echo $message;
			}

			$query = "SELECT comments.*, posts.post_title FROM comments LEFT JOIN posts ON posts.post_id = comments.comment_post_id ";

			if($_SESSION['role'] != 'admin') {
				$query .= "WHERE posts.post_author_id = '{$_SESSION['user_id']}' ";
			}

			$query .= "ORDER BY comment_date DESC";

			if($result = mysqli_query($conn, $query)) {
				$rows = mysqli_num_rows($result);
			}

			if($rows == 0) {
				echo "Tyvärr har du inga kommentarer ännu";
			} else { ?>
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
					</div> <!-- .divTableRow header -->
					<?php

					while ($row = mysqli_fetch_assoc($result)) {
						$com_id = $row['comment_id'];
						$com_post_id = $row['comment_post_id'];
						$com_author = $row['comment_author'];
						$com_date = $row['comment_date'];
						$com_email = $row['comment_email'];
						$content = $row['comment_content'];
						$website = $row['comment_website'];
						$post_title = $row['post_title'];
					?>
					<div class="divTableRow">
						<div class="divTableCell hidden-tablet"><?php echo "<a href='../post.php?post=$com_post_id'>$post_title</a>"; ?></div>
						<div class="divTableCell"><?php echo substr($com_date, 0, 10); ?></div>
						<div class="divTableCell hidden-mobile"><?php echo $com_author; ?></div>
						<div class="divTableCell hidden-tablet"><?php echo $com_email; ?></div>
						<div class="divTableCell hidden-small-desktop"><?php echo $website; ?></div>
						<div class="divTableCell"><?php echo $content; ?></div>
						<div class="divTableCell"><?php echo "<a href='user_comments.php?delete=$com_id'><i class='fa fa-trash-o' aria-hidden='true'></i></a>"?></div>
					</div> <!-- .divTableRow -->
					<?php
						}
					} mysqli_close($conn);
					?>	
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