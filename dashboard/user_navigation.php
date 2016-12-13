<header>
				<nav class="nav">
					<div class="nav__left">
						<span>Dashboard</span>
					</div>
					<div class="toggle-menu">
						<div class="">
							<span>Dashboard</span>
						</div>
						<div class="toggle-menu__bar">
							<input type="checkbox" id="menu-toggle">
     							<label for="menu-toggle" class="label-toggle"></label>
    						</input>
							<div class="hidden">
								<div class="hidden-flex">
								
								<div class="toggle-menu__list">
									<ul>
										<li class="accordion"><a href="#"><i class="fa fa-newspaper-o aside" aria-hidden="true"></i>Inlägg<i class="fa fa-caret-down" aria-hidden="true"></i></a></li>
										<div class="panel">
										<ul class="aside__nav--visible">
											<li>Visa alla inlägg</li>
											<li>Skriv nytt inlägg</li>
										</ul>
										</div>
										<li><a href="user_comments.php"><i class="fa fa-comments aside" aria-hidden="true"></i>Kommentarer</a></li>
										<li><a href="#"><i class="fa fa-bar-chart aside" aria-hidden="true"></i>Statistik</a></li>
										<?php
										if($_SESSION['role'] == 'admin') { ?>
											<li class="accordion"><a href="categories.php"><i class="fa fa-list aside" aria-hidden="true"></i>Kategorier<i class="fa fa-caret-down" aria-hidden="true"></i></a></li>
											<div class="panel">
												<ul class="aside__nav--visible">
													<li>Visa kategorier</li>
													<li>Lägg till kategori</li>
												</ul>
											</div>
											<li><a href="users.php"><i class="fa fa-user-circle-o aside" aria-hidden="true"></i>Användare</a></li>
										<?php } ?>
										<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i>Inställningar</a></li>
										<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>Logga ut</a></li>
									</ul>
								</div>
								</div>
								</div>
							</div>
						</div>
				
					<div class="nav__right dropdown">
						<ul class="aside__nav--header">
							<li><a href="#"><i class="fa fa-user header" aria-hidden="true"></i><?php echo $_SESSION['username']; ?><i class="fa fa-caret-down header" aria-hidden="true"></i></a></li>
							<div class="dropdown-content">
    							<ul class="dropdown-flex">
    								<li>Inställningar</li>
    								<li><a href="logout.php">Logga ut</a></li>
    							</ul>
  							</div>
						</ul>
					</div>
				</nav>
			</header>
			<div class="content_container">
				<aside>
					<div class="aside__nav">
					<div class="user-pic">
						<img src="../<?php echo $_SESSION['image'];?>" width="100" 
						alt="Bild på <?php echo $_SESSION['firstname'] ; ?>">
						<span><?php echo $_SESSION['firstname']; ?></span>
					</div>
						<ul class="aside__nav--height">
							<li class="accordion"><a href="#"><i class="fa fa-newspaper-o aside" aria-hidden="true"></i>Inlägg<i class="fa fa-caret-down" aria-hidden="true"></i></a></li>
							<div class="panel">
								<ul class="aside__nav--visible">
									<li><a href="user_posts.php"> Visa alla inlägg</a></li>
									<li><a href="write_post.php"> Skriv nytt inlägg</a></li>
								</ul>
							</div>
							<li><a href="user_comments.php"><i class="fa fa-comments aside" aria-hidden="true"></i>Kommentarer</a></li>
							<li><a href="statistics.php"><i class="fa fa-bar-chart aside" aria-hidden="true"></i>Statistik</a></li>
							<?php
							if($_SESSION['role'] == 'admin') { ?>
							<li class="accordion"><a href="categories.php"><i class="fa fa-list aside" aria-hidden="true"></i>Kategorier<i class="fa fa-caret-down" aria-hidden="true"></i></a></li>
							<div class="panel">
								<ul class="aside__nav--visible">
									<li>Visa kategorier</li>
									<li>Lägg till kategori</li>
								</ul>
							</div>
							<li><a href="users.php"><i class="fa fa-user-circle-o aside" aria-hidden="true"></i>Användare</a></li>
							<?php } ?>
						</ul>
					</div>
				</aside>