<?php

require_once('model/SearchManager.php');
require_once('model/DatabaseManager.php');


function StartWebsite()
{
	require('view/acceuil.php');
}
function SearchFilmTab()
{
	$manager = new DatabaseManager();
	$thosegenre = $manager->CheckBoxGenre();
	$thosedistrib = $manager->CheckBoxDistrib();
	require('view/SearchFilm.php');
}
function SearchFilmByGenre($genre,$int)
{
	$manager = new SearchManager();
	$Allgenre = $manager->getFilmByGenre($genre);
	$nbr = $int;
	require('view/SearchFilm.php');
}
function SearchFilmByDistrib($distrib,$int)
{
	$manager = new SearchManager();
	$Alldistrib = $manager->getFilmByDistrib($distrib);
	$nbr = $int;
	require('view/SearchFilm.php');
}
function SearchFilmByGenreAndName($genre,$name,$int)
{
	$manager = new SearchManager();
	$Allgenre = $manager->getFilmByGenreAndName($genre,$name);
	$nbr = $int;
	require('view/SearchFilm.php');
}
function SearchFilmByDistribAndName($genre,$name,$int)
{
	$manager = new SearchManager();
	$Alldistrib = $manager->getFilmByDistribAndName($genre,$name);
	$nbr = $int;
	require('view/SearchFilm.php');
}
function SearchFilmByDistribAndGenre($distrib, $genre, $int)
{
	$manager = new SearchManager();
	$DistribAndGenre = $manager->SearchFilmByDistribAndGenre($distrib, $genre);
	$nbr = $int;
	require('view/SearchFilm.php');

}
function SearchFilmByDistribAndGenreAndName($distrib,$genre,$name,$int)
{
	$manager = new SearchManager();
	$DistribAndGenre = $manager->SearchFilmByDistribAndGenreAndName($distrib, $genre, $name);
	$nbr = $int;
	require('view/SearchFilm.php');
}
function SearchFilmByName($name,$int)
{
	$manager = new SearchManager();
	$Alldistrib = $manager->getFilmByName($name);
	$nbr = $int;
	require('view/SearchFilm.php');
}
function SearchMemberTab()
{
	require('view/SearchMember.php');
}
function SearchMemberByComplete($name,$prename,$int)
{
	$manager = new SearchManager();
	$member = $manager->getMemberByComplete($name,$prename);
	$nbr = $int;
	require('view/SearchMember.php');
}
function SearchMemberByName($name,$int)
{
	$manager = new SearchManager();
	$member = $manager->getMemberByName($name);
	$nbr = $int;
	require('view/SearchMember.php');
}
function SearchMemberByPrename($prename,$int)
{
	$manager = new SearchManager();
	$member = $manager->getMemberByPrename($prename);
	$nbr = $int;
	require('view/SearchMember.php');
}
function getAbonnement($id)
{
	$manager = new SearchManager();
	$abonnement = $manager->getAbonnement($id);
	require('view/SearchMember.php');
}