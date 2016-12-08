<?php include "head.php"; ?>
	
<!-- Header -->

<div class="bg-img">

<?php include "header-navigation-menu.php"; ?>
<?php include "include/functions.php"; ?>
<?php include "header.php"; ?>

</div>
	
<h2 id="archive">ARKIV</h2>
	<form method="post" action="archive.php#archive">
		<select name="choose_month">
			<option value="">Välj månad</option>

			<?php selectMonth (); ?>
			
		</select>
		<input type="submit" name="submit" value="Välj">
	</form>
	<?php showMonths (); ?>

	

	

	<!-- Footer -->

<?php include "footer.php"; ?>