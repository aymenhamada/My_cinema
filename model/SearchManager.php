<?php

require_once('model/Database.php');

class SearchManager extends Database
{
	public function getFilmByName($name)
	{
		$db = $this->dbConnect();
		$films = $db->prepare('SELECT titre, resum FROM film WHERE titre LIKE ?');
		$films->execute(array("%$name%"));
		return $films;
	}
	public function getFilmByGenre($genre)
	{
		$genreArray = $genre;
		$tab_genre = array();
		$db = $this->dbConnect();
		$recherche = $db->prepare('SELECT film.titre, film.resum FROM genre INNER JOIN film ON film.id_genre = genre.id_genre WHERE genre.nom = ?');
		for($i=0;$i<count($genreArray);$i++) {		
			$recherche->execute(array($genreArray[$i]));
			while ($donnes = $recherche->fetch())
			{
				$tab_genre[] = $donnes;
			}
		}
		return $tab_genre;
	}
	public function getFilmByDistrib($distrib)
	{
		$distribArray = $distrib;
		$tab_distrib = array();
		$db = $this->dbConnect();
		$recherche = $db->prepare('SELECT film.titre, film.resum FROM distrib INNER JOIN film ON film.id_distrib = distrib.id_distrib WHERE distrib.nom = ?');
		for($i=0;$i<count($distribArray);$i++) {		
			$recherche->execute(array($distribArray[$i]));
			while ($donnes = $recherche->fetch())
			{
				$tab_distrib[] = $donnes; 
			}
		}
		return $tab_distrib;
	}

	public function getFilmByGenreAndName($genre,$name)
	{
		$genreArray = $genre;
		$tab_genre = array();
		$db = $this->dbConnect();
		$recherche = $db->prepare('SELECT film.titre, film.resum FROM genre INNER JOIN film ON film.id_genre = genre.id_genre WHERE genre.nom = ? AND film.titre LIKE  ?');
		for($i=0;$i<count($genreArray);$i++) {		
			$recherche->execute(array($genreArray[$i],"%$name%"));
			while ($donnes = $recherche->fetch())
			{
				$tab_genre[] = $donnes;
			}
		}
		return $tab_genre;
	}
	public function getFilmByDistribAndName($distrib,$name)
	{
		$distribArray = $distrib;
		$tab_distrib = array();
		$db = $this->dbConnect();
		$recherche = $db->prepare('SELECT film.titre, film.resum FROM distrib INNER JOIN film ON film.id_distrib = distrib.id_distrib WHERE distrib.nom = ? AND film.titre LIKE  ?');
		for($i=0;$i<count($distribArray);$i++) {		
			$recherche->execute(array($distribArray[$i],"%$name%"));
			while ($donnes = $recherche->fetch())
			{
				$tab_distrib[] = $donnes;
			}
		}
		return $tab_distrib;
	}
	public function SearchFilmByDistribAndGenre($distrib,$genre)
	{
		$distribArray = $distrib;
		$tab_all = array();
		$genreArray = $genre;
		$db = $this->dbConnect();
		$recherche = $db->prepare("SELECT film.titre, film.resum FROM distrib INNER JOIN film ON film.id_distrib = distrib.id_distrib INNER JOIN genre ON genre.id_genre = film.id_genre WHERE distrib.nom = ? OR genre.nom = ?"); 

		for($i=0;$i<count($distribArray);$i++) {		
			$recherche->execute(array($distribArray[$i],$genreArray[$i]));
			while ($donnes = $recherche->fetch())
			{
			
				$tab_all[] = $donnes;
			}
		}
		return $tab_all;

	}
	public function SearchFilmByDistribAndGenreAndName($distrib,$genre,$name)
	{
		$distribArray = $distrib;
		$tab_all = array();
		$genreArray = $genre;
		$db = $this->dbConnect();
		$recherche = $db->prepare("SELECT film.titre, film.resum FROM distrib INNER JOIN film ON film.id_distrib = distrib.id_distrib INNER JOIN genre ON genre.id_genre = film.id_genre WHERE distrib.nom = ? AND genre.nom = ? AND film.titre LIKE ?"); 

		for($i=0;$i<count($distribArray);$i++) {		
			$recherche->execute(array($distribArray[$i],$genreArray[$i],"%$name%"));
			while ($donnes = $recherche->fetch())
			{
			
				$tab_all[] = $donnes;
			}
		}
		return $tab_all;

	}
	public function getMemberByName($name)
	{
		$db = $this->dbConnect();
		$member = $db->prepare('SELECT * FROM fiche_personne WHERE nom LIKE ?');
		$member->execute(array("%$name%"));
		return $member;
	}
	public function getMemberByPrename($prename)
	{
		$db = $this->dbConnect();
		$member = $db->prepare('SELECT * FROM fiche_personne WHERE prenom LIKE ?');
		$member->execute(array("%$prename%"));
		return $member;
	}
	public function getMemberByComplete($name,$prename)
	{
		$db = $this->dbConnect();
		$member = $db->prepare('SELECT * FROM fiche_personne WHERE nom LIKE ? AND prenom LIKE ?');
		$member->execute(array("%$name%","%$prename%"));
		return $member;
	}
	public function getAbonnement($id)
	{
		$db = $this->dbConnect();
		$abonnement = $db->prepare('SELECT abonnement.nom FROM membre INNER JOIN abonnement ON abonnement.id_abo = membre.id_abo INNER JOIN fiche_personne ON fiche_personne.id_perso = membre.id_fiche_perso WHERE membre.id_fiche_perso = ?');
		$abonnement->execute(array($id));
		return $abonnement;
	}

}