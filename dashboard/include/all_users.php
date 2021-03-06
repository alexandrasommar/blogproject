	<?php
	if(!isset($_SESSION['username'])) {
		header("Location: ../index.php");
	}
	// Delete user
	if(isset($_GET['delete'])) {
		$_SESSION['delete'] = $_GET['delete'];
	
	?>
	<p class='red'>Är du säker på att du vill radera användaren?</p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<div class="form__input">
			<input class="btn" type="submit" name="yes" value="Ja">
			<input class="btn--blue" type="submit" name="no" value="Nej">
		</div>
	</form>
	<?php
	}
	if(isset($_POST['yes'])) {
		
		$query = "DELETE FROM users WHERE user_id = {$_SESSION['delete']}";
		
		if($stmt->prepare($query)) {
			$stmt->execute();
			$message = "<p class='public'>Användaren raderades</p>";
			unset($_SESSION['delete']);
		}
	}

	if(isset($message)) {
		echo $message;
	}

	?>
	<div class="divTable">
		<div class="divTableBody">
			<div class="divTableRow divTableRow--header">
				<div class="divTableCell hidden-small-desktop">Förnamn</div>
				<div class="divTableCell hidden-small-desktop">Efternamn</div>
				<div class="divTableCell">Användarnamn</div>
				<div class="divTableCell hidden-small-desktop">Email</div>
				<div class="divTableCell hidden-mobile">Hemsida</div>
				<div class="divTableCell hidden-mobile">Profilbild</div>
				<div class="divTableCell hidden-mobile">Beskrivning</div>
				<div class="divTableCell">Redigera</div>
				<div class="divTableCell">Radera</div>
			</div> <!-- .divTableBody div TableRow header -->	
			<?php
			$query = "SELECT * FROM users";
			if($stmt->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($user_id, $dbuser, $firstname, $lastname, $dbpass, $email, $website, $image, $description, $role);
				while (mysqli_stmt_fetch($stmt)) { ?>
				<div class="divTableRow">
					<div class="divTableCell hidden-small-desktop"><?php echo $firstname; ?></div>
					<div class="divTableCell hidden-small-desktop"><?php echo $lastname; ?></div>
					<div class="divTableCell"><?php echo $dbuser; ?></div>
					<div class="divTableCell hidden-small-desktop"><?php echo $email; ?></div>
					<div class="divTableCell hidden-mobile"><?php echo $website; ?></div>
					<div class="divTableCell hidden-mobile"><?php echo "<img src='../$image' width='20' alt='Bild på $firstname'>"; ?></div>
					<div class="divTableCell hidden-mobile"><?php echo substr($description, 0, 10) . "..."; ?></div>
					<div class="divTableCell"><?php echo "<a href='users.php?edit&user=$user_id' aria-label='Redigera'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>"; ?></div>
					<div class="divTableCell"><?php echo "<a href='users.php?delete=$user_id' aria-label='Radera'><i class='fa fa-trash-o' aria-hidden='true'></i></a>"; ?></div>
				</div> <!-- .divTableRow -->
				<?php

					}
				} else {
					"query failed" . mysqli_error($conn);
				} 
				$stmt->close();
				$conn->close();
				?>
		</div> <!-- .divTableBody -->
	</div> <!-- .divTable -->