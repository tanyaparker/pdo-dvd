<?php

namespace ITP;

class Auth {

	protected $pdo;
	protected $user_name;
	protected $user_email;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function attempt($username, $password) {
		$sql = "SELECT *
				FROM users
				WHERE username = ?
				AND password = SHA1(?)";

		$statement = $this->pdo->prepare($sql);
		$statement->bindParam(1, $username);
		$statement->bindParam(2, $password);
    	$statement->execute();

    	$results = $statement->fetchAll();
    	$num = sizeof($results);

    	if($num == 1) {
    		$this->user_name = $results[0]['username'];
    		$this->user_email = $results[0]['email'];
    		return true;
    	}
    	else {
    		return false;
    	}
	}
}

?>