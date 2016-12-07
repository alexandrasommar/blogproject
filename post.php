<?php include "head.php"; ?>

<div class="header__container--post">

<?php include "header-navigation-menu.php"; ?>
<!-- <?php $post = $_GET["post"]; ?> -->
</div>

	<!-- Header -->
	

	<!-- Message -->

	<section class="article-container">
		<article class="post__article-text">
			<div class="post-date">
				<time>14 nov 2016</time>
				<span>1+ <i class="fa fa-heart post-heart" aria-hidden="true"></i></span>
			</div>
			<h2>Det är ett välkänt faktum att läsare</h2>
			<p>Det är ett välkänt faktum att läsare distraheras av läsbar text på en sida när man skall studera layouten. Poängen med Lorem Ipsum är att det ger ett normalt ordflöde, till skillnad från "Text här, Text här", och ger intryck av att vara läsbar text. Många publiseringprogram och webbutvecklare använder Lorem Ipsum som test-text, och en sökning efter "Lorem Ipsum" avslöjar många webbsidor under uteckling. Olika versioner har dykt upp under åren, ibland av olyckshändelse, ibland med flit (mer eller mindre humoristiska).</p>

				<!-- User information -->
				<div class="author-container-post">
					<div class="author-profile-post">
						<div class="author-user-image">
							<img src="img/user-image.jpg" alt="">
						</div>
						<div class="author-user-text">
							<h3><author>Gunther Beard</author></h3>
							<p>Det är ett välkänt faktum att läsare distraheras av läsbar text på en sida när man skall studera layouten. Poängen med Lorem Ipsum är att det ger ett normalt ordflöde.</p>
						</div>
					</div>
				</div>

				<!-- Comment information -->

				<div class="comments-container" id="comments">
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
		</article>
	</section>

	
	
	

	<!-- Footer -->

<?php include "footer.php"; ?>