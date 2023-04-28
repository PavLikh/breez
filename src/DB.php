<?php

namespace App;

use PDO;


/**
 * Класс для работы с БД
 */
class DB
{
	/** @type object|null  объект PDO */
	protected $pdo;

	function __construct()
	{
		// database.php данные для подключения к БД
		$db = require_once dirname(__DIR__) . "/config/database.php";
		// Connect
		$this->pdo = new PDO("mysql:host=172.19.0.1; dbname=" . $db['database'], $db['username'], $db['password']);
	}

}

?>
