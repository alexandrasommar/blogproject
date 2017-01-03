<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../include/head.php"; ?>

<?php
if(!isset($_SESSION['username'])) {
	header("Location: ../index.php");
}
?>
		<div class="user_post_container">
			<?php include "user_navigation.php"; ?>
			<main>
				<?php
				// Delete post
				if(isset($_GET['delete'])) {
					$_SESSION['delete'] = $_GET['delete'];
					?>
					<p class='red'>Är du säker på att du vill radera inlägget?</p>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
						<div class="form__input">
							<input class="btn" type="submit" name="yes" value="Ja">
							<input class="btn--blue" type="submit" name="no" value="Nej">
						</div>
					</form>
					<?php
					}
					if(isset($_POST['yes'])) {
					$query = "DELETE FROM posts WHERE post_id = {$_SESSION['delete']}";
						if($stmt->prepare($query)) {
							$stmt->execute();
							$message = "Inlägget raderades";
							unset($_SESSION['delete']);
						}
					}

				if(isset($message)) {
				echo $message;
				}

				if(isset($_SESSION['success'])) {
				echo $_SESSION['success'];
				unset($_SESSION['success']);
				}
				
				if(isset($_GET['edit'])) {
				    include "include/edit_post.php";
				}

				?>
				<div class="divTable">
					<div class="divTableBody">
						<div class="divTableRow divTableRow--header">
							<div class="divTableCell hidden-tablet">Datum</div>
							<div class="divTableCell">Titel</div>
							<div class="divTableCell hidden-mobile">Kategori</div>
							<?php
							if($_SESSION['role'] == 'admin') { ?>
							<div class="divTableCell hidden-mobile">Bloggare</div>
							<?php } ?>
							<div class="divTableCell hidden-small-desktop hidden-tablet">Bild</div>
							<div class="divTableCell hidden-tablet">Text</div>
							<div class="divTableCell">Status</div>
							<div class="divTableCell">Redigera</div>
							<div class="divTableCell">Radera</div>
						</div> <!-- .divTableRow header -->
						<?php
						$query = "SELECT posts.*, categories.cat_name 
								  FROM posts LEFT JOIN categories 
								  ON posts.post_category_id = categories.cat_id ";

						if($_SESSION['role'] != 'admin') {
							$query .= "WHERE post_author_id = {$_SESSION['user_id']} ";
						}

						$query .= "ORDER BY post_date DESC";
						if($result = mysqli_query($conn, $query)) {
								$rows = mysqli_num_rows($result);
							}

						if($stmt->prepare($query) && $rows > 0) {
						$stmt->execute();
						$stmt->bind_result($post_id, $cat_id, $title, $author, $author_id, $date, $image, $content, $status, $likes, $cat_name);

						while(mysqli_stmt_fetch($stmt)) { ?>

						<div class="divTableRow">
							<div class="divTableCell hidden-tablet"><?php echo $date; ?></div>
							<div class="divTableCell">
							<?php if($status == 1) {
								echo "<a href='../post.php?post=$post_id'>$title</a>";
								} else {
									echo $title;
								}
							  ?></div>
							<div class="divTableCell hidden-mobile"><?php echo $cat_name; ?></div>
							<?php
							if($_SESSION['role'] == 'admin') { ?>
							<div class="divTableCell hidden-mobile"><?php echo $author; ?></div>
							<?php } ?>
							<div class="divTableCell hidden-small-desktop hidden-tablet"><?php echo "<img src='../$image' width='20' alt='$title'>"; ?></div>
							<div class="divTableCell hidden-tablet"><?php echo substr($content, 0, 60) . "..."; ?></div>
							<div class="divTableCell"><?php
							if($status == 1) {
								echo "Publicerad";
							} else {
								echo "Utkast";
							}?></div>
							<div class="divTableCell"><?php echo "<a href='user_posts.php?edit=$post_id' aria-label='Redigera'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>"; ?></div>
							<div class="divTableCell"><?php echo "<a href='user_posts.php?delete=$post_id' aria-label='Radera'><i class='fa fa-trash-o' aria-hidden='true'></i></a>"; ?></div>
						</div> <!-- .divTableRow -->

						<?php
							
							}

						} else {
							echo "Tyvärr har du inte skrivit några inlägg ännu. <a href='write_post.php'>Gör det här</a>";
						} 
						$stmt->close();
						$conn->close();

							?>
					</div> <!-- .divTableBody -->
				</div> <!-- .divTable -->
			</main>	
		</div> <!-- .user_post_container -->
	</div> <!-- .content_container -->
	<!-- FontAwesom -->
	<script src="https://use.fontawesome.com/78a857f410.js"></script>
	<!-- JavaScript -->
	<script src="script.js"></script>
</body>
</html>