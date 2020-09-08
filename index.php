<?php
require('controller/frontend.php');
try{

	if (isset($_GET['action'])) {

		if($_GET['action'] == 'SearchFilm') {
			SearchFilmTab();
		}
		elseif($_GET['action'] == 'GetFilmByName') {
			if (!empty($_POST['genre']) && empty($_POST['distrib'])) {
				if(!empty($_POST['search'])) {

					SearchFilmByGenreAndName($_POST['genre'],$_POST['search'],$_POST['nbr']);
				}
				else{
					SearchFilmByGenre($_POST['genre'],$_POST['nbr']);	
				}
			}
			elseif (!empty($_POST['distrib']) && empty($_POST['genre'])) {
				if (!empty($_POST['search'])) {
					SearchFilmByDistribAndName($_POST['distrib'],$_POST['search'],$_POST['nbr']);
				}
				else{
					SearchFilmByDistrib($_POST['distrib'],$_POST['nbr']);
				}
			}
			elseif(!empty($_POST['distrib']) && !empty($_POST['genre'])){
				if(!empty($_POST['search'])) {
					SearchFilmByDistribAndGenreAndName($_POST['distrib'],$_POST['genre'],$_POST['search'],$_POST['nbr']);

				}
				else{
					SearchFilmByDistribAndGenre($_POST['distrib'],$_POST['genre'],$_POST['nbr']);

				}
			}
			elseif(empty($_POST['distrib']) && empty($_POST['genre'])) {
				SearchFilmByName($_POST['search'],$_POST['nbr']);
					
			}
			
		}
		elseif ($_GET['action'] == 'SearchMember') {
			SearchMemberTab();
		}
		elseif ($_GET['action'] == 'GetMemberByName') {

			if (!empty($_POST['name']) || !empty($_POST['prename'])) {
				if (!empty($_POST['name']) && !empty($_POST['prename'])) {
					SearchMemberByComplete($_POST['name'],$_POST['prename'],$_POST['nbr']);
				}
				elseif(!empty($_POST['name'])) {
					SearchMemberByName($_POST['name'],$_POST['nbr']);
				}elseif(!empty($_POST['prename'])) {
					SearchMemberByPrename($_POST['prename'],$_POST['nbr']);
				}
				
			}
			else{
				throw new Exception("Veuillez rechercher un membre");
				
			}
		}
		elseif ($_GET['action'] == 'Abonnement') {
			if (!empty($_GET['id'])) {
				getAbonnement($_GET['id']);
			}
		}
	}
	else {
		StartWebsite();
	}




}
catch(Exception $e) {
	echo "Erreur : ".$e->getMessage();
}