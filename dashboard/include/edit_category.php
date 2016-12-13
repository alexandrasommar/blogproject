<?php
$catid = $_GET['cat'];

if(isset($_POST['update_cat'])) {
	if(!empty($_POST['name'])) {
		$cat = $_POST['name'];
		$query = "UPDATE categories SET cat_name = '{$cat}' WHERE cat_id = {$catid}";
		if($stmt->prepare($query)) {
			$stmt->execute();
			$message = "Kategorin är uppdaterad";
		} 
	}
} ?>
<?php 
if(isset($message)) {
	echo $message;
}

?>

<?php
$query = "SELECT * FROM categories WHERE cat_id = '{$catid}'";
if($stmt->prepare($query)) {
	$stmt->execute();
	$stmt->bind_result($cat_id, $cat_name);
	while(mysqli_stmt_fetch($stmt)) { ?>
		

<section class="form">
	<form action="" method="post">
		<div class="form__input">
			<label for="name">Redigera kategori</label>
			<input type="text" class="form-control" name="name" value="<?php echo $cat_name; ?>">
		</div>
		<div class="form__input">
			<input class="btn btn-primary" type="submit" name="update_cat" value="Uppdatera">
		</div>
	</form>
</section>
<?php
	}
}
?>