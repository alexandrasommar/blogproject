	<?php
	if(isset($_GET['delete'])) {
		$userdel = $_GET['delete'];
		$query = "DELETE FROM users WHERE user_id = {$userdel}";
		if($stmt->prepare($query)) {
			$stmt->execute();
			$message = "Användaren raderades";

		} else {
			echo mysqli_error($conn);
		}
	}


	?>
	<?php
	if(isset($message)) {
		echo $message;
	}

	?>
	<table>
		<tr>
			<th>Förnamn</th>
			<th>Efternamn</th>
			<th>Användarnamn</th>
			<th>Email</th>
			<th>Hemsida</th>
			<th>Profilbild</th>
			<th>Beskrivning</th>
			<th>Redigera</th>
			<th>Radera</th>
		</tr>
		<tr>
			<?php
			$query = "SELECT * FROM users";
					if($stmt->prepare($query)) {
						$stmt->execute();
						$stmt->bind_result($user_id, $dbuser, $firstname, $lastname, $dbpass, $email, $website, $image, $description, $role);
						while (mysqli_stmt_fetch($stmt)) { ?>
							<td><?php echo $firstname; ?></td>
							<td><?php echo $lastname; ?></td>
							<td><?php echo $dbuser; ?></td>
							<td><?php echo $email; ?></td>
							<td><?php echo $website; ?></td>
							<td><?php echo "<img src='../$image' width='20'>"; ?></td>
							<td><?php echo substr($description, 0, 60); ?></td>
							<td><?php echo "<a href='users.php?edit&user=$user_id'>Redigera</a>"; ?></td>
							<td><?php echo "<a href='users.php?delete=$user_id'>Radera</a>"; ?></td>
		</tr>
					<?php

						}
					} else {
						"query failed" . mysqli_error($conn);
					}



			?>
	</table>