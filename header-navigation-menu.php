<body>
	
	<!-- Header -->
		<header class="header">
			<nav class="header__nav">
				<div class="header-container">

				<!-- Header navigation left -->

				<div class="header__menu header-menu__left">
					<nav>
						<ul>
							<li><a href="#">Bilen</a></li>
							<li><a href="#">Kampanjen</a></li>
							<li><a href="category.php">Kategorier</a></li>
						</ul>
					</nav>
				</div> <!-- .header-menu & header-menu__left -->

				<!-- Header navigation center -->

				<div class="header__menu header-menu__logo">
		                <a href="index.php"><img class="logo-img" src="img/Volvo_Logos_Iron_Mark.png" alt="Volvo"></a>         
				</div> <!-- .header-menu & header-menu__logo -->
				
				<!-- Responsive navigation. Hidden if bigger than 800px -->

				<div class="header__menu toggle-menu">
					<input type="checkbox" id="menu-toggle">
						<label for="menu-toggle" class="label-toggle"></label>
					</input>
					<div class="hidden">
		                	<div class="toggle-menu__list">
									<ul class="toggle-menu__flex-center">
										<li><a href="#">Bilen</a></li>
										<li><a href="#">Kampanjen</a></li>
										<li><a href="category.php">Kategorier</a></li>
										<li><a href="#">Arkiv</a></li>
										<li><a href="#">Kontakt</a></li>
										<li><a href="dashboard/index.php">Dashboard</a></li>
										<li><a href="#">Logga ut</a></li>
									</ul>
								</div>
		                </div>
				</div>
		
				<!-- Header navigation right -->

				<div class="header__menu header-menu__right">
		        	<nav>
		                <ul>
		                	<li><a href="#">Arkiv</a></li>
		                    <li><a href="contact.php">Kontakt</a></li>
		                    <li><a href="dashboard/index.php">Dashboard</a></li>
		                </ul>
		            </nav>
		        </div> <!-- .header-menu & header-menu__right -->
			</div> <!-- .header-menu__container -->

		</nav> <!-- .header__nav -->