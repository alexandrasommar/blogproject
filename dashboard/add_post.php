<?php include "../head.php"; ?>
<section class="form">
<form action="" method="post" enctype="multipart/form-data">
	<div class="form__input">
		<label for="title">Titel</label>
		<input type="text" class="form-control" name="title">
	</div>
	<div class="form__input">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" name="image">
	</div>
	<div class="form__input">
		<select name="post_category" id=""></select>
	</div>
	<div class="form__input">
		<input class="btn" type="submit" name="create_post" value="Publisera">
		<input class="btn" type="submit" name="create_post" value="Spara">
	</div>
</form>
</section>