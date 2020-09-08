<?php
require_once('model/Database.php');

class DatabaseManager extends Database
{

	public function CheckBoxGenre()
	{
		$db = $this->dbConnect();
		$genre = $db->query('SELECT nom FROM genre');
		return $genre;
	}
	public function CheckBoxDistrib()
	{
		$db = $this->dbConnect();
		$distrib = $db->query('SELECT nom FROM distrib');
		return $distrib;
	}


}