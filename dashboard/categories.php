<?php session_start(); ?>
<?php include "../include/db.php"; ?>
<?php include "../head.php"; ?>

<?php
if(isset($_GET['delete'])) {
	$catdel = $_GET['delete'];
	$query = "DELETE FROM categories WHERE cat_id = '{$catdel}'";
	    if($stmt->prepare($query)) {
	    	$stmt->execute();
	    	$message = "Kategorin raderades";
	    } else {
	    	echo mysqli_error($conn);
	    }
}
?>


<div class="container">
	<?php include "user_navigation.php"; ?>
	<main>
		

		

		<div class="divTable">
			<div class="divTableBody">
				<div class="divTableRow divTableRow--header">
					<div class="divTableCell">Kategorinamn</div>
					<div class="divTableCell">Redigera</div>
					<div class="divTableCell">Radera</div>
				</div>	
		<?php

		$query = "SELECT * FROM categories";
		if($stmt->prepare($query)) {
			$stmt->execute();
			$stmt->bind_result($cat_id, $cat_name);
			while(mysqli_stmt_fetch($stmt)) { ?>
				<div class="divTableRow">
					<div class="divTableCell"><?php echo $cat_name; ?></div>
					<div class="divTableCell"><?php echo "<a href='categories.php?source=edit&cat=$cat_id'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>"; ?></div>
					<div class="divTableCell"><?php echo "<a href='categories.php?delete=$cat_id'><i class='fa fa-trash-o' aria-hidden='true'></i></a>"; ?></div>
				</div>

		<?php
			}
		}


		?>	
			</div>
		</div>
				<div class="ad-category">
					<a href="categories.php?source=add">Lägg till ny kategori</a>
				</div>
		<?php
		if(isset($message)) {
			echo $message;
		}	
		?>
<?php

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

	</main>
</div>
<!-- FontAwesom -->
		<script src="https://use.fontawesome.com/78a857f410.js"></script>
		<!-- JavaScript -->
		<script src="script.js"></script>
</body>
</html>