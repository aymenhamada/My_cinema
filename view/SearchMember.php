<!DOCTYPE html>
<html>
<head>
	<title>Search Member</title>
	<link rel="stylesheet" type="text/css" href="public/site_recherche/web/css/my_style.css">
</head>
<body>
	<form action="index.php?action=GetMemberByName" method="POST">
	<input type="text" name="name" placeholder="name" autocomplete="off">
	<input type="text" name="prename" placeholder="prename" autocomplete="off"><br>
	<select name="nbr">
			<option>Nbr de résultat</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="5">5</option>
			<option value="7">7</option>
		</select>
	<input type="submit" name="Search">
	</form>
<?php
	if (isset($member)) {
		?>		
		<div class="list-wrapper">
			<?php	
			while ($data = $member->fetch())
			{
				?>
				<div class="list-item">
					<h4> <?=  $data['nom']."  ".$data['prenom'] ?> </h4>
					<p> <?=  "Date de Naissance :".$data['date_naissance']."  "."email :".$data['email']."  "."Code Postal :".$data['cpostal']."  "."Ville :".$data['ville'] ?> </p>
					<a href=index.php?action=Abonnement&amp;id=<?= $data['id_perso'] ?> ><p>Voir l'abonnement</p></a>
				</div>				
				<?php
			}
			$member->closeCursor();
		}
		?> 
<?php if(isset($abonnement)) {
	?>
	<div class="list-wrapper">
			<?php	
			while ($data = $abonnement->fetch())
			{
				?>
				<div class="list-item">
					<h4> <?=  $data['nom'] ?> </h4>
					 
				</div>				
				<?php
			}
			$abonnement->closeCursor();
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