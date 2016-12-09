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
						<th>Bloggid</th>
						<th>Datum</th>
						<th>Bild</th>
						<th>Text</th>
						
					</tr>
					<tr>
					<?php
					$query = "SELECT comments.*, posts.post_author_id FROM comments LEFT JOIN comments ON posts.post_id = comments.comment_post_id WHERE posts.post_author_id = '{$_SESSION['user_id']}'";

					if($stmt->prepare($query)) {

					$stmt->execute();
					$stmt->bind_result($com_id, $com_post_id, $com_author, $com_date, $com_email, $content, $website, $post_author);

					while(mysqli_stmt_fetch($stmt)) { ?>
						
							<td><?php echo $com_id; ?></td>
							<td><?php echo $com_post_id; ?></td>
							<td><?php echo $com_author; ?></td>
							<td><?php echo $com_date; ?></td>
							<td><?php echo $com_email; ?></td>
							<td><?php echo $content; ?></td>
							<td><?php echo $website; ?></td>
							<td><?php echo $post_author; ?></td>
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