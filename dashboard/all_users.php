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
							<td>Redigera</td>
							<td>Radera</td>
		</tr>
					<?php

						}
					} else {
						"query failed" . mysqli_error($conn);
					}



			?>
	</table>