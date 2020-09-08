<?php

class Database
{
	protected function dbConnect()
	{
		$db = new PDO('mysql:host=localhost;dbname=epitech_tp;charset=utf8', 'root', '');
		return $db;
	}
}