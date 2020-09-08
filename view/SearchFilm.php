
<!DOCTYPE html>
<html>
<head>
	<title>Search Films</title>
	<link rel="stylesheet" type="text/css" href="public/site_recherche/web/css/my_style.css">
	
</head>
<body>
	<form action="index.php?action=GetFilmByName" method="POST">
		<input type="text" name="search" placeholder="Search film title.." autocomplete="off">
		<select name="nbr">
			<option>Nbr de résultat</option>
			<option value="5">5</option>
			<option value="10">10</option>
			<option value="15">15</option>
			<option value="20">20</option>
			<option value="25">25</option>
		</select><br>
	<?php 
	if(isset($thosegenre)) {
		echo "<h2>Genre</h2>";
		while($data = $thosegenre->fetch()) 
		{
			echo '<input type="checkbox" name="genre[]" value="'.$data["nom"].'"> <label for="genre[]">'.$data["nom"].'</label><br>';
		}
	}
	if(isset($thosedistrib)) {
		echo "<h2>Distributeur</h2>";
		while($dis = $thosedistrib->fetch())
		{
			echo '<input type="checkbox" name="distrib[]" value="'.$dis["nom"].'"> <label for="genre[]">'.$dis["nom"].'</label><br>';
		}
	}
	?>
		<input type="submit" value="Search">
	

	</form>
	<?php
	if (isset($Allgenre)) {
		?>		
		<div class="list-wrapper">
			<?php	
			foreach ($Allgenre as $key => $value) {	
						?>
				<div class="list-item">
					<h4> <?= $value['titre'] ?> </h4>
					<P> <?= $value['resum'] ?> </h4>
					
				</div>				
				<?php
			}
		
		}
		?>
		<?php
	if (isset($Alldistrib)) {
		?>		
		<div class="list-wrapper">
			<?php	
			foreach ($Alldistrib as $key => $value) {	
						?>
				<div class="list-item">
					<h4> <?= $value['titre'] ?> </h4>
					<P> <?= $value['resum'] ?> </h4>
					
				</div>				
				<?php
			}
		
		}
		?> 
<?php
	if (isset($DistribAndGenre)) {
		?>		
		<div class="list-wrapper">
			<?php	
			foreach ($DistribAndGenre as $key => $value) {	
						?>
				<div class="list-item">
					<h4> <?= $value['titre'] ?> </h4>
					<P> <?= $value['resum'] ?> </h4>
					
				</div>				
				<?php
			}
		
		}
		?> 

	</div>
	

</body>
<script src="public/site_recherche/web/js/jquery.js"></script>
<script src="public/site_recherche/web/js/my_script.js"></script>
<script type="text/javascript">
	$('.list-item').paginate(<?=$nbr?>);
</script>
</html>