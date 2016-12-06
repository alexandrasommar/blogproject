<?php include "head.php"; ?>
	
	<!-- Header -->
	<div class="header__container--post">
		<header>
			<div class="header-menu__container">
				<div class="header-container">

				<!-- Header navigation left -->

				<div class="header-menu header-menu__left">
					<nav>
						<ul>
							<li><a href="#">Bilen</a></li>
							<li><a href="#">Kampanjen</a></li>
							<li><a href="category.html">Kategorier</a></li>
						</ul>
					</nav>
				</div> <!-- .header-menu & header-menu__left -->

				<!-- Header navigation center -->

				<div class="header-menu header-menu__logo">
		                <a href="index.html"><img class="logo-img" src="img/Volvo_Logos_Iron_Mark.png" alt="Volvo"></a>         
				</div> <!-- .header-menu & header-menu__logo -->
				
				<!-- Responsive navigation. Hidden if bigger than 800px -->

				<div class="header-menu toggle-menu">
					<input type="checkbox" id="menu-toggle">
						<label for="menu-toggle" class="label-toggle"></label>
					</input>
					<div class="hidden">
		                	<div class="toggle-menu__list">
									<ul class="toggle-menu__flex-center">
										<li><a href="#">Bilen</a></li>
										<li><a href="#">Kampanjen</a></li>
										<li><a href="category.html">Kategorier</a></li>
										<li><a href="#">Arkiv</a></li>
										<li><a href="#">Kontakt</a></li>
										<li><a href="dashboard/index.html">Dashboard</a></li>
										<li><a href="#">Logga ut</a></li>
									</ul>
								</div>
		                </div>
				</div>
		
				<!-- Header navigation right -->

				<div class="header-menu header-menu__right">
		        	<nav>
		                <ul>
		                	<li><a href="#">Arkiv</a></li>
		                    <li><a href="index.html#nyheter">Kontakt</a></li>
		                    <li><a href="dashboard/index.html">Dashboard</a></li>
		                </ul>
		            </nav>
		        </div> <!-- .header-menu & header-menu__right -->
			</div> <!-- .header-menu__container -->
		</header>
	</div>

	<!-- Message -->

	<div class="article-container">
		<div class="post__article">
			<div class="post-date">
				<span>14 nov 2016</span>
				<span>1+ <i class="fa fa-heart post-heart" aria-hidden="true"></i></span>
			</div>
			<h2>Det är ett välkänt faktum att läsare</h2>
			<p>Det är ett välkänt faktum att läsare distraheras av läsbar text på en sida när man skall studera layouten. Poängen med Lorem Ipsum är att det ger ett normalt ordflöde, till skillnad från "Text här, Text här", och ger intryck av att vara läsbar text. Många publiseringprogram och webbutvecklare använder Lorem Ipsum som test-text, och en sökning efter "Lorem Ipsum" avslöjar många webbsidor under uteckling. Olika versioner har dykt upp under åren, ibland av olyckshändelse, ibland med flit (mer eller mindre humoristiska).</p>
		</div>
	</div>

	
	<!-- User information -->
<div class="author-container-post">
	<div class="author-profile-post">
			<div class="author-user-image">
				<img src="img/user-image.jpg" alt="">
			</div>
			<div class="author-user-text">
				<h3>Gunther Beard</h3>
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
	

	<!-- Footer -->

	<div class="footer-container">
		<div class="nav">
			<ul class="ul-nav">
				<li><a href="#">About</a></li>
				<li><a href="#">People</a></li>
				<li><a href="#">Archive</a></li>
				<li><a href="#">Volvo</a></li>
			</ul>
		</div>
		<div class="nav-social-icon">
			<ul class="ul-social">
				<li><a href="#"><img class="social-icon" src="img/facebook.svg" alt="Facebook icon"></a></li>
				<li><a href="#"><a href="#"><img class="social-icon" src="img/youtube.svg" alt="Youtube icon"</a></li>
				<li><a href="#"><a href="#"><img class="social-icon" src="img/instagram.svg" alt="Instagram icon"</a></li>
				<li><a href="#"><a href="#"><img class="social-icon" src="img/twitter.svg" alt="Twitter icon"</a></li>
			</ul>
		</div>
		<div class="volvo-logo"><img class="volvo-icon" src="img/volvo-logo.svg" alt="Volvo logo"></div>
	</div>




	<script src="https://use.fontawesome.com/78a857f410.js"></script>
	<script src="script.js"></script>
</body>
</html>