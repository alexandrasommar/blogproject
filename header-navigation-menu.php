		

		<?php 
		include ("include/db.php"); ?>

		<header class="header">
			<nav class="header__nav">
				<div class="header-container">

				<!-- Header navigation left -->

				<nav class="header__menu">
					<ul>
						<li><a href="#">Bilen</a></li>
						<li><a href="#">Kampanjen</a></li>
						<ul>
						    <li>
						        <a href="">Kategorier</a>
						        <ul>
						        <?php 
						        $query = "SELECT * FROM categories";
							    $select_categories = mysqli_query($conn,$query);   

							    while ($row = mysqli_fetch_assoc($select_categories)) {        
							    $cat_id = $row['cat_id'];
							    $cat_name = $row['cat_name'];

							    echo "<li><a href=''>$cat_name</a></li><br>";
								}
						        ?>   
						        </ul>
						    </li>
						    
						    <!-- etc. -->
						</ul>
					</ul>
				</nav> <!-- .header-menu -->

				<!-- Header navigation center -->

				<div class="header__menu">
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
		
				<!-- Header menu right -->

				<nav class="header__menu">
	                <ul>
	                	<li><a href="#">Arkiv</a></li>
	                    <li><a href="contact.php">Kontakt</a></li>
	                    <li><a href="dashboard/index.php">Dashboard</a></li>
	                </ul>
		        </nav> <!-- .header-menu -->

			</div> <!-- .header-menu__container -->

		</nav> <!-- .header__nav -->