<?php

require_once("config.php");

	function DBConnect () {
		try {
			$pdo = new PDO('mysql:host=' . DB_HOSTNAME .';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
			return $pdo;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	$PDO = DBConnect();

	?>