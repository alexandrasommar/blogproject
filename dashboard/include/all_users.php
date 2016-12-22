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
	<div class="divTable">
		<div class="divTableBody">
			<div class="divTableRow divTableRow--header">
				<div class="divTableCell">Förnamn</div>
				<div class="divTableCell">Efternamn</div>
				<div class="divTableCell">Användarnamn</div>
				<div class="divTableCell">Email</div>
				<div class="divTableCell">Hemsida</div>
				<div class="divTableCell">Profilbild</div>
				<div class="divTableCell">Beskrivning</div>
				<div class="divTableCell">Redigera</div>
				<div class="divTableCell">Radera</div>
			</div>	
									
	
			<?php
			$query = "SELECT * FROM users";
					if($stmt->prepare($query)) {
						$stmt->execute();
						$stmt->bind_result($user_id, $dbuser, $firstname, $lastname, $dbpass, $email, $website, $image, $description, $role);
						while (mysqli_stmt_fetch($stmt)) { ?>
						<div class="divTableRow">
							<div class="divTableCell"><?php echo $firstname; ?></div>
							<div class="divTableCell"><?php echo $lastname; ?></div>
							<div class="divTableCell"><?php echo $dbuser; ?></div>
							<div class="divTableCell"><?php echo $email; ?></div>
							<div class="divTableCell"><?php echo $website; ?></div>
							<div class="divTableCell"><?php echo "<img src='../$image' width='20'>"; ?></div>
							<div class="divTableCell"><?php echo substr($description, 0, 10) . "..."; ?></div>
							<div class="divTableCell"><?php echo "<a href='users.php?edit&user=$user_id'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>"; ?></div>
							<div class="divTableCell"><?php echo "<a href='users.php?delete=$user_id'><i class='fa fa-trash-o' aria-hidden='true'></i></a>"; ?></div>
		</div>
					<?php

						}
					} else {
						"query failed" . mysqli_error($conn);
					}



			?>
	</div>