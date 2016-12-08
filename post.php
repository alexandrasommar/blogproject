<?php include "head.php"; ?>

	<!-- Header -->

<div class="blog-post__image">

<?php include "header-navigation-menu.php"; ?>


</div> <!-- .blog-post__image -->
<?php $post = $_GET["post"]; ?>
<!-- Post -->
	
<section class="blog-post">
<?php
$query = "SELECT posts.*, categories.cat_id, categories.cat_name, users.* FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id LEFT JOIN users ON posts.post_author_id = users.user_id WHERE posts.post_id = {$post}";
if($stmt->prepare($query)) {

		$stmt->execute();
		$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_author_id, $post_date, $post_image, $post_content, $post_status, $cat_id, $cat_name, $user_id, $username, $firstname, $lastname, $password, $email, $website, $image, $description, $role );

		while(mysqli_stmt_fetch($stmt)) { ?>
		<article class="blog-post__article">
			<div class="blog-post__date">
				<time><?php echo $post_date; ?></time>
				<span>1+ <i class="fa fa-heart blog-post__icon" aria-hidden="true"></i></span>
			</div> <!-- .blog-post__date -->
			<h2><?php echo $post_title; ?></h2>
			<p><?php echo $post_content; ?></p>

				<!-- Author information box -->
				
				<?php include "author-information-box.php"; ?>

				<!-- Comment information -->

				<div class="comments-box" id="comments">
					<div class="comments">
						<ul>
							<li class="accordion"><a href="#comments">Kommentera</a></li>
							<div class="panel">
								<div class="comments-box__form">
																		<!-- comment post form -->
								    <!-- todo: Kommentarsfält ska valideras med hjälp av regex. Primärt e-postadressen, dvs. kommentaren ska inte sättas in i databasen om man inte har skrivit en korrekt utformad e-postadress. -->

								    <em>Fyll i alla fält för att publicera din kommentar.</em>
								    <br> <!-- CSS-fix? Lite luft här, mellan "Tänk på"-texten och formuläret. Om det inte finns något för det i CSS:en så kanske en br duger.-->
								    <form method="post" action=""> <!-- todo: action: mellan citationstecknen: Lägg in så att vid klick på Publicera-knappen så publiceras texten under "Läs kommentarer" och förslag: automatiskt blir "Visa alla inlägg" aktivt på samma sida (för att man ska se var ens egen kommentar hamnar). Kommentarsfälten ska då åter bli nollställda. Likaså ska det läggas in en publiceringstidpunkt ovanför kommentaren. --> 
								        <p>Namn:</p>
								        <input type="text" name="namn" placeholder="Förnamn Efternamn" autocomplete><br>
								        <p>E-postadress:</p>
								        <input type="email" name="e-postadress" autocomplete><br>  <!-- Vi ska använda regex för att validera e-postadressen -->
								        <p>Din webbadress:</p>
								        <input type="url" name="webbadress" placeholder="http://www.adressen.se" autocomplete><br>  <!-- Finns det ngt som gör att http:// eller https:// inte behöver skrivas av användaren? -->
								        <br> <!-- CSS-fix hellre än br?: Ngt slags liten avgränsare eller luft här för att skilja kommentatör-uppgifterna från kommentarfältet. Det lyfter fram kommentarfältet på ett lagom sätt. -->
								        <p>Din kommentar:</p>
								        <textarea name="comment-text" rows="5" cols="40"></textarea><br> <!-- todo: CSS för textarea: border: 1px solid #EFEFEF -->
								        <br>
								        <input type="submit" value="Publicera"> <input type="submit" value="Avbryt">    <!-- Är det schysst att även ha en "Avbryt"-knapp som tömmer alla fält om man ångrar sig och inte vill kommentera? -->
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



<?php
		}
	}




?>
	

	</section> <!-- .blog-post -->

	
	
	

	<!-- Footer -->

<?php include "footer.php"; ?>