<div class="author-information-box author-information-box--small author-information-box--full-width">
	<div class="author-information-box__image">
		<img src="<?php echo $image; ?>" alt="Bild på <?php echo $firstname; ?>">
	</div> <!-- .author-information-box__image -->
	<div class="author-information-box__text">
		<h3><cite><a href="author.php?author=<?php echo $post_author_id; ?>"><?php echo "$firstname $lastname"; ?></a></cite></h3>
		<p><?php echo $description; ?></p>
	</div> <!-- .author-information-box__text -->
</div> <!-- .author-information-box -->