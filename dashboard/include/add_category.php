<?php
if(isset($_POST['create_cat'])) {
	if(!empty($_POST['name'])) {
		$catname = ucfirst($_POST['name']);
		$catname = mysqli_real_escape_string($conn, $catname);
		$query = "INSERT INTO categories VALUES(NULL, '{$catname}')";
		if($stmt->prepare($query)) {
			$stmt->execute();
			$_SESSION['success'] = "Kategorin lades till.";
			header("Location: categories.php");
		}

	} else {
		$message = "Du måste fylla i namn på kategorin";
	}
}

?>
<?php 
if(isset($message)) {
	echo $message;
}

?>
<section class="form">
	<form action="categories.php?source=add" method="post">
		<div class="form__input">
			<label for="name">Lägg till ny kategori</label>
			<input type="text" class="form-control" name="name" id="name">
		</div>
		<div class="form__input">
			<input class="btn btn-primary" type="submit" name="create_cat" value="Lägg till">
		</div>
	</form>
</section>