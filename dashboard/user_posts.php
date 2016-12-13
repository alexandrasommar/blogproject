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
						<th>Datum</th>
						<th>Titel</th>
						<th>Kategori</th>
						<th>Bloggare</th>
						<th>Bild</th>
						<th>Text</th>
						<th>Status</th>
						<th>Redigera</th>
						<th>Radera</th>
					</tr>
					<tr>
					<?php
					$query = "SELECT posts.*, categories.cat_name FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id ";

					if($_SESSION['role'] != 'admin') {
						$query .= "WHERE post_author_id = {$_SESSION['user_id']} ";
					}

					$query .= "ORDER BY post_date DESC";

					if($stmt->prepare($query)) {

					$stmt->execute();
					$stmt->bind_result($post_id, $cat_id, $title, $author, $author_id, $date, $image, $content, $status, $cat_name);

					while(mysqli_stmt_fetch($stmt)) { ?>
							
							<td><?php echo $date; ?></td>
							<td><?php echo $title; ?></td>
							<td><?php echo $cat_name; ?></td>
							<td><?php echo $author; ?></td>
							<td><?php echo "<img src='../$image' width='20'>"; ?></td>
							<td><?php echo substr($content, 0, 60); ?></td>
							<td><?php
							if($status == 1) {
								echo "Publicerad";
							} else {
								echo "Utkast";
							}?></td>
							<td><?php echo "<a href='user_posts.php?source=edit&post=$post_id'>Redigera</a>"; ?></td>
							<td><?php echo "<a href='user_posts.php?delete=$post_id'>Radera</a>"; ?></td>
							</tr>

						<?php
							
							}

						}

							?>
					</table>

<?php
if(isset($_GET['source'])) {
	    $source = $_GET['source'];
	} else {
	    $source = '';
	}

	switch ($source) {
	    case 'edit':
	        include "edit_post.php";
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