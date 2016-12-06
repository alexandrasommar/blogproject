<?php require "include/db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<!-- Regular CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
</head>
<body>
	
	<!-- Header -->
	<div class="header__container--category">
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
					</nav>
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
	
	<div class="catagory-container">
		<div class="category-headline">
			<h3>Livet på landet</h3>
		</div>
		<div class="post-category">
			<div class="post-category-img">
				<div class="post__img"><a href="post.html"><img class="post__img--picture" src="img/volvo_bg_1.jpg" alt="Bil"></a></div>
			</div>
			<div class="post-category-text">
				<div class="post-text">
				<h2><a href="post.html">Lorem ipsum</a></h2>
				<span class="byline-category">Av: <span class="author">Johan Walberg</span>, 14 nov 2016</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis eos repellat nihil sed explicabo labore, mollitia provident optio sit eveniet.</p>
			</div>
			</div>
		</div>

		<div class="post-category">
			<div class="post-category-text">
				<div class="post-text post-text-category">
				<h2><a href="post.html">Lorem ipsum</a></h2>
				<span class="byline-category">Av: <span class="author">Johan Walberg</span>, 14 nov 2016</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis eos repellat nihil sed explicabo labore, mollitia provident optio sit eveniet.</p>
			</div>
			</div>
			<div class="post-category-img">
				<div class="post__img"><a href="post.html"><img class="post__img--picture" src="img/volvo_bg_1.jpg" alt="Bil"></a></div>
			</div>
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
</body>
</html>