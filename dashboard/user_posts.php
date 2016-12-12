<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>


	<div class="container">
			<?php include "user_navigation.php"; ?>
				<main>
				<table>
					<tr>
						<th>Post Id</th>
						<th>Kategori</th>
						<th>Titel</th>
						<th>Bloggare</th>
						<th>Datum</th>
						<th>Bild</th>
						<th>Text</th>
						<th>Status</th>
						<th>Redigera</th>
						<th>Radera</th>
					</tr>
					<tr>
					<?php
					$query = "SELECT posts.*, categories.cat_name FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id WHERE post_author_id = {$_SESSION['user_id']}";

					if($stmt->prepare($query)) {

					$stmt->execute();
					$stmt->bind_result($post_id, $cat_id, $title, $author, $author_id, $date, $image, $content, $status, $cat_name);

					while(mysqli_stmt_fetch($stmt)) { ?>
						
							<td><?php echo $post_id; ?></td>
							<td><?php echo $cat_name; ?></td>
							<td><?php echo $title; ?></td>
							<td><?php echo $author; ?></td>
							<td><?php echo $date; ?></td>
							<td><?php echo $image; ?></td>
							<td><?php echo substr($content, 0, 80); ?></td>
							<td><?php echo $status; ?></td>
							<td><?php echo "<a href='edit_post.php?edit=$post_id'>Redigera</a>"; ?></td>
							<td>Radera</td>
							</tr>

						<?php
							
							}

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