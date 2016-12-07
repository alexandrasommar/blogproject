<?php include "head.php"; ?>

<div class="header__container--post">

<?php include "header-navigation-menu.php"; ?>
	
</div>



<div class="catagory-container">

<?php 

$category = $_GET['cat'];

$query = "SELECT posts.*, categories.cat_name FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id WHERE post_category_id = {$category}";
if ($result = mysqli_query($conn, $query)) { 
		$row_cnt = mysqli_num_rows($result);
	}
		mysqli_free_result($result);


if($stmt->prepare($query)) {

		$stmt->execute();
		$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_status, $cat_name);

		
		
		while(mysqli_stmt_fetch($stmt)) { ?>


			<?php
			
			
			for ($i=0; $i < $row_cnt; $i++) { 

			if ($i & 1) { 

				?>
			<div class="post-category">
				<div class="post-category-img">
					<div class="post__img"><a href="post.html"><img class="post__img--picture" src="img/volvo_bg_1.jpg" alt="Bil"></a></div>
				</div>
				<div class="post-category-text">
					<div class="post-text">
						<h2><a href="post.html"><?php echo $post_title;?></a></h2>
						<span class="byline-category">Av: <span class="author"><?php echo $post_author; ?></span>,<?php echo $post_date; ?></span>
						<p><?php echo $post_content; ?></p>
					</div>
				</div>
			</div>
			<?php
			
			}elseif(!$i & 1) { ?>

			<div class="post-category">
				<div class="post-category-text">
					<div class="post-text post-text-category">
						<h2><a href="post.html"><?php echo $post_title; ?></a></h2>
						<span class="byline-category">Av: <span class="author"><?php echo $post_author; ?></span>, <?php echo $post_date; ?></span>
						<p><?php echo $post_content; ?></p>
					</div>
				</div>
				<div class="post-category-img">
					<div class="post__img"><a href="post.html"><img class="post__img--picture" src="img/volvo_bg_1.jpg" alt="Bil"></a>
					</div>
				</div>
			</div>


			
			<?php
			
				}
			
		
		}
		
		}
		?>
	<div class="category-headline">
			<h3><?php echo $cat_name;  ?></h3>
			</div>
		<?php
}



?>


	
	
	
		
	</div>

	

	

	<!-- Footer -->

<?php include "footer.php"; ?>