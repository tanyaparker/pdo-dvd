<?php

namespace ITP;

class Auth {

	protected $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function attempt($username, $password) {
		$encrypted = SHA1($password);
		$sql = "SELECT *
				FROM users
				WHERE username = $username
				AND password = $encrypted";

		$statement = $this->pdo->prepare($sql);
    	$statement->execute();
    	return $statement->fetchAll();
	}
}

?>