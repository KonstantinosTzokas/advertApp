<?php

// DATABASE COMMUNICATION USING PDO //

namespace Classes;

use PDO;

// Connect to database using PDO

class dbCon 
{
	private static $pdo;
	private $host = "127.0.0.1";
	private $user = "realEstate";
	private $pwd = "password";
	private $dbName = "realestate";

		public function __construct()
	{
		$this->connect();
	}

	//Iniatilize PDO or coonect  to database

	protected function connect() {
		try {
			self::$pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName . ';charset=UTF8', $this->user, $this->pwd, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]);
		} catch (PDOException $e) {
			throw new Exception(sprintf('Could not connect to database. Error: %s', $e->getMessage()));
		}	
	}

	//Execute SQL query function

	protected function execute($sql, $parameters)
	{
		//Prepare statement
		$statement = $this->getPdo()->prepare($sql);

		//Execute
		$status = $statement->execute($parameters);
		if (!$status) {
			throw new Exception($statement->errorInfo()[2]);
		}
		
		// 
		return $status;
	}

	//fetch All SQL query 

	protected function fetchAll($sql, $parameters = [], $type = PDO::FETCH_ASSOC)
	{		
		//Prepare statement
		$statement = $this->getPdo()->prepare($sql);

		//Execute
		$status = $statement->execute($parameters);
		if (!$status) {
			throw new Exception($statement->errorInfo()[2]);
		}
		
		// Fetch
		return $statement->fetchAll($type);
	}


	protected function getPdo()
	{
		return self::$pdo;
	}

}


