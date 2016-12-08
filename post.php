<?php include "head.php"; ?>

	<!-- Header -->

<div class="blog-post__image">

<?php include "header-navigation-menu.php"; ?>
<!-- Kommenterade bort nedan kod då det gav mig ett felmeddelande. Ska den koden verkligen vara där? -->
<!-- <?php $post = $_GET["post"]; ?> -->

</div> <!-- .blog-post__image -->

	<!-- Post -->
	
	<section class="blog-post">
		<article class="blog-post__article">
			<div class="blog-post__date">
				<time>14 nov 2016</time>
				<span>1+ <i class="fa fa-heart blog-post__icon" aria-hidden="true"></i></span>
			</div> <!-- .blog-post__date -->
			<h2>Det är ett välkänt faktum att läsare</h2>
			<p>Det är ett välkänt faktum att läsare distraheras av läsbar text på en sida när man skall studera layouten. Poängen med Lorem Ipsum är att det ger ett normalt ordflöde, till skillnad från "Text här, Text här", och ger intryck av att vara läsbar text. Många publiseringprogram och webbutvecklare använder Lorem Ipsum som test-text, och en sökning efter "Lorem Ipsum" avslöjar många webbsidor under uteckling. Olika versioner har dykt upp under åren, ibland av olyckshändelse, ibland med flit (mer eller mindre humoristiska).</p>

				<!-- User information -->
				<div class="author-information-box">
					<div class="author-information-box__image">
						<img src="img/user-image.jpg" alt="">
					</div> <!-- .author-information-box__image -->
					<div class="author-information-box__text">
						<h3><author>Gunther Beard</author></h3>
						<p>Det är ett välkänt faktum att läsare distraheras av läsbar text på en sida när man skall studera layouten. Poängen med Lorem Ipsum är att det ger ett normalt ordflöde.</p>
					</div> <!-- .author-information-box__text -->
				</div> <!-- .author-information-box -->

				<!-- Comment information -->

				<div class="comments-box" id="comments">
					<div class="comments">
						<ul>
							<li class="accordion"><a href="#comments">Kommentera</a></li>
							<div class="panel">
								<div class="comment-form">
									<form action="">
										<input type="text" name="firstname" value="John">
										<input type="text" name="firstname" value="John">
										<input type="text" name="firstname" value="John">
										<input type="text" name="firstname" value="John">
									</form>
								</div>
							</div>
							<li class="accordion"><a href="#comments">Läs Kommentarer (x)</a></li>
							<div class="panel">
								<ul class="aside__nav--visible">
									<li>Visa alla inlägg</li>
									<li>Skriv nytt inlägg</li>
								</ul>
							</div>
						</ul>
					</div>
				</div>
		</article> <!-- .blog-post__article -->
	</section> <!-- .blog-post -->

	
	
	

	<!-- Footer -->

<?php include "footer.php"; ?>