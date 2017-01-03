<?php
if(isset($_POST['create_cat'])) {
	if(!empty($_POST['name'])) {
		$catname = ucfirst($_POST['name']);
		$catname = mysqli_real_escape_string($conn, $catname);

		// check if category name already exists
		$query = "SELECT categories.cat_name FROM categories WHERE cat_name = '{$catname}'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$dbcat = $row['cat_name'];

		if($catname = $dbcat) {
			$message = "<p class='red'>Kategorin finns redan. Välj ett annat namn.</p>";
		} 
		
		else {
		$catname = ucfirst($_POST['name']);
		$catname = mysqli_real_escape_string($conn, $catname);
		$query = "INSERT INTO categories VALUES(NULL, '{$catname}')";
		
		if($stmt->prepare($query)) {
			$stmt->execute();
			$_SESSION['success'] = "Kategorin lades till.";
			header("Location: categories.php");
		} 
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
<h2 class="invisible"></h2>
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