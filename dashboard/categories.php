<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../include/head.php"; ?>

	<?php
	if(!isset($_SESSION['username'])) {
		header("Location: ../index.php");
	}
	if($_SESSION['role'] !== 'admin') {
		header("Location: index.php");
	}

	?>
	<div class="container">
		<?php include "user_navigation.php"; ?>
		<main>

		<!-- Add Category -->
		<div class="ad-category">
			<a href="categories.php?source=add">Lägg till ny kategori</a>
		</div>
		<?php
		// Delete category
		if(isset($_GET['delete'])) {
			$_SESSION['delete'] = $_GET['delete'];
		
		?>
		<p class='red'>Är du säker på att du vill radera kategorin?</p>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<div class="form__input">
				<input class="btn" type="submit" name="yes" value="Ja">
				<input class="btn--blue" type="submit" name="no" value="Nej">
			</div>
		</form>
		<?php
		}
		if(isset($_POST['yes'])) {
			$query = "DELETE FROM categories WHERE cat_id = {$_SESSION['delete']}";
			    if($stmt->prepare($query)) {
			    	$stmt->execute();
			    	$message = "<p class='public'>Kategorin raderades</p>";
			    	unset($_SESSION['delete']);
			    } else {
			    	echo mysqli_error($conn);
			    }
			}

		if(isset($message)) {
			echo $message;
		}
		if(isset($_SESSION['success'])) {
		echo $_SESSION['success'];
		unset($_SESSION['success']);
		}

		if(isset($_GET['source'])) {
			$source = $_GET['source'];
			} else {
			    $source = '';
			}

			switch ($source) {
			    case 'edit':
			        include "include/edit_category.php";
			        break;
			    case 'add':
			        include "include/add_category.php";
			        break;    
			    }
				
			?>
			<!-- Display all categories -->
			<div class="divTable">
				<div class="divTableBody">
					<div class="divTableRow divTableRow--header">
						<div class="divTableCell">Kategorinamn</div>
						<div class="divTableCell">Redigera</div>
						<div class="divTableCell">Radera</div>
					</div> <!-- .divTableRow header -->	
					<?php
					$query = "SELECT * FROM categories";
					if($stmt->prepare($query)) {
						$stmt->execute();
						$stmt->bind_result($cat_id, $cat_name);
						while(mysqli_stmt_fetch($stmt)) { ?>
					<div class="divTableRow">
						<div class="divTableCell"><?php echo $cat_name; ?></div>
						<div class="divTableCell"><?php echo "<a href='categories.php?source=edit&cat=$cat_id' aria-label='Redigera'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>"; ?></div>
						<div class="divTableCell"><?php echo "<a href='categories.php?delete=$cat_id' aria-label='Radera'><i class='fa fa-trash-o' aria-hidden='true'></i></a>"; ?></div>
					</div> <!-- .divTableRow -->
					<?php
						}
					}

					?>	
				</div>
			</div> <!-- .divTable -->
		</main>
	</div> <!-- .container -->
	<!-- FontAwesom -->
	<script src="https://use.fontawesome.com/78a857f410.js"></script>
	<!-- JavaScript -->
	<script src="script.js"></script>
</body>
</html>