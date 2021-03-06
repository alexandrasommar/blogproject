<header>
	<nav class="nav">
		<div class="nav__left">
			<span><a href="index.php">Dashboard</a></span>
		</div> <!-- .nav__left -->
		<div class="toggle-menu">
			<div class="toggle-menu__logo">
				<span><a href="index.php">Dashboard</a></span>
			</div> <!-- .toggle-menu__logo -->
			<div class="toggle-menu__bar">
				<input type="checkbox" id="menu-toggle">
					<label for="menu-toggle" class="label-toggle"></label>
				<div class="hidden">
					<div class="hidden-flex">
						<div class="toggle-menu__list">
							<ul>
								<li><a href="../index.php"><i class="fa fa-home aside" aria-hidden="true"></i>Till bloggen</a></li>
								<li><a href="user_posts.php"><i class="fa fa-newspaper-o aside" aria-hidden="true"></i>Visa alla inlägg</a></li>
								<li><a href="write_post.php"><i class="fa fa-pencil aside" aria-hidden="true"></i>Skriv nytt inlägg</a></li>
								<li><a href="user_comments.php"><i class="fa fa-comments aside" aria-hidden="true"></i>Kommentarer</a></li>
								<li><a href="statistics.php"><i class="fa fa-bar-chart aside" aria-hidden="true"></i>Statistik</a></li>
								<?php
								if($_SESSION['role'] == 'admin') { ?>
									<li><a href="categories.php"><i class="fa fa-list aside" aria-hidden="true"></i>Kategorier</a></li>
									<li><a href="users.php"><i class="fa fa-user-circle-o aside" aria-hidden="true"></i>Användare</a></li>
								<?php } ?>
								<li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logga ut</a></li>
							</ul>
						</div> <!-- .toggle-menu__list -->
					</div> <!-- .hidden-flex -->
				</div> <!-- .hidden -->
			</div> <!-- .toggle-menu__bar -->
		</div> <!-- .toggle-menu -->
	
		<div class="nav__right dropdown">
			<ul class="aside__nav--header">
				<li><img src="../<?php echo $_SESSION['image'];?>" width="15" 
			alt="Bild på <?php echo $_SESSION['firstname'] ; ?>"><?php echo $_SESSION['username']; ?></li>
			</ul> <!-- .aside__nav header -->
		</div> <!-- .nav__right dropdown -->
	</nav> <!-- .nav -->
</header>
<div class="content_container">
	<aside>
		<div class="aside__nav">
			<ul class="aside__nav--height">
				<li><a href="../index.php"><i class="fa fa-home aside" aria-hidden="true"></i>Till bloggen</a></li>
				<li><a href="user_posts.php"><i class="fa fa-newspaper-o aside" aria-hidden="true"></i>Visa alla inlägg</a></li>
				<li><a href="write_post.php"><i class="fa fa-pencil aside" aria-hidden="true"></i>Skriv nytt inlägg</li>
				<li><a href="user_comments.php"><i class="fa fa-comments aside" aria-hidden="true"></i>Kommentarer</a></li>
				<li><a href="statistics.php"><i class="fa fa-bar-chart aside" aria-hidden="true"></i>Statistik</a></li>
				<?php
				if($_SESSION['role'] == 'admin') { ?>
				<li><a href="categories.php"><i class="fa fa-list aside" aria-hidden="true"></i>Kategorier</a></li>
				<li><a href="users.php"><i class="fa fa-user-circle-o aside" aria-hidden="true"></i>Användare</a></li>
				<?php } ?>
				<li><a href="logout.php"><i class="fa fa-sign-out aside" aria-hidden="true"></i>Logga ut</a></li>
			</ul> <!-- .aside__nav height -->
		</div> <!-- .aside__nav -->
	</aside>