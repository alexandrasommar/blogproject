<?php session_start(); ?>
<?php require_once "include/db.php"; ?>

	<header class="header">
		<nav class="header__nav">
			<div class="header-container">

				<!-- Header navigation left -->

				<nav class="header__menu header__menu--left header__menu--block">
						<ul>
							<li><a href='car.php#'>Bilen</a></li>
							<li><a href="archive.php">Arkiv</a></li>
							<li><a href='#'>Kategorier</a>
								<ul class="header__menu--dropdown">
									 <?php 
							        $query = "SELECT * FROM categories";
								    $select_categories = mysqli_query($conn,$query);   

								    while ($row = mysqli_fetch_assoc($select_categories)) {        
								    $cat_id = $row['cat_id'];
								    $cat_name = $row['cat_name'];

								    echo "<li><a href='category.php?cat=$cat_id'>$cat_name</a></li>";
									}
							        ?>   
								</ul> <!-- .header__menu dropdown -->
							</li>
						</ul>
				</nav> <!-- .header__menu left block -->

				<!-- Header navigation center -->

				<div class="header__menu header__menu--block">
		                <a href="index.php"><img class="logo-img" src="img/Volvo_Logos_Iron_Mark.png" alt="Volvo"></a>      
				</div> <!-- .header__menu block -->
			
				<!-- Responsive navigation. Hidden if bigger than 800px -->

				<div class="header__menu toggle-menu">
					<input type="checkbox" id="menu-toggle">
					<label for="menu-toggle" class="label-toggle"><span class="hidden">Meny</span></label>
					<div class="hidden">
	                	<div class="toggle-menu__list">
							<ul class="toggle-menu__flex-center">
								<li><a href="car.php">Bilen</a></li>
								<li><a href="category.php">Kategorier</a></li>
								<li><a href="archive.php">Arkiv</a></li>
								<?php if(isset($_SESSION['username'])) { ?>
								<li><a href="dashboard/index.php">Dashboard</a></li>
								<?php	} ?>
							</ul>
						</div> <!-- .toggle-menu__list -->
	                </div> <!-- .hidden -->
				</div> <!-- .header__menu toggle menu -->
	
				<!-- Header menu right -->

				<nav class="header__menu header__menu--right header__menu--block">
	                <ul>
	                    <!--<li><a href="contact.php">Kontakt</a></li> -->
	                    <?php if(isset($_SESSION['username'])) { ?>
	                    <li><a href="dashboard/index.php">Dashboard</a></li>
	                    <?php	} ?>
	                </ul>
		        </nav> <!-- .header-menu -->
			</div> <!-- .header-menu__container -->
		</nav> <!-- .header__nav -->