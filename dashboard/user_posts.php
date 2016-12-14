<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>

<?php
if(isset($_GET['delete'])) {
	$postdel = $_GET['delete'];
	$query = "DELETE FROM posts WHERE post_id = {$postdel}";
	if($stmt->prepare($query)) {
		$stmt->execute();
		$message = "Inlägget raderades";
	}
}
?>
	<div class="user_post_container">
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
					</div>
			
				
				<?php
				$query = "SELECT posts.*, categories.cat_name FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id ";

				if($_SESSION['role'] != 'admin') {
					$query .= "WHERE post_author_id = {$_SESSION['user_id']} ";
				}

				$query .= "ORDER BY post_date DESC";
				if($result = mysqli_query($conn, $query)) {
						$rows = mysqli_num_rows($result);
					}

				if($stmt->prepare($query) && $rows > 0) {
				$stmt->execute();
				$stmt->bind_result($post_id, $cat_id, $title, $author, $author_id, $date, $image, $content, $status, $cat_name);

				while(mysqli_stmt_fetch($stmt)) { ?>

				<div class="divTableRow">
						
						<div class="divTableCell hidden-tablet"><?php echo $date; ?></div>
						<div class="divTableCell"><?php echo $title; ?></div>
						<div class="divTableCell hidden-mobile"><?php echo $cat_name; ?></div>
						<?php
						if($_SESSION['role'] == 'admin') { ?>
						<div class="divTableCell hidden-mobile"><?php echo $author; ?></div>
						<?php } ?>
						<div class="divTableCell hidden-small-desktop hidden-tablet"><?php echo "<img src='../$image' width='20'>"; ?></div>
						<div class="divTableCell hidden-tablet"><?php echo substr($content, 0, 60) . "..."; ?></div>
						<div class="divTableCell"><?php
						if($status == 1) {
							echo "Publicerad";
						} else {
							echo "Utkast";
						}?></div>
						<div class="divTableCell"><?php echo "<a href='user_posts.php?source=edit&post=$post_id'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>"; ?></div>
						<div class="divTableCell"><?php echo "<a href='user_posts.php?delete=$post_id'><i class='fa fa-trash-o' aria-hidden='true'></i></a>"; ?></div>
						</div>

					<?php
						
						}

					} else {
						echo "Tyvärr har du inte skrivit några inlägg ännu. <a href='write_post.php'>Gör det här</a>";
					}

						?>
				</div>
				<?php
				if(isset($_GET['source'])) {
					    $source = $_GET['source'];
					} else {
					    $source = '';
					}

					switch ($source) {
					    case 'edit':
					        include "include/edit_post.php";
					        break;
					    
					}

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