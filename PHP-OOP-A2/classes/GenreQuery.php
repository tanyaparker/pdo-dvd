<?php

require_once('db.php');

class GenreQuery {
  protected $pdo;
  protected $sql;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
    $this->sql = "SELECT * FROM genres";
  }

  public function orderByGenre()
  {
    $this->sql .= ' ORDER BY genre';
  }

  public function getAll()
  {
    $statement = $this->pdo->prepare($this->sql);
    $statement->execute();
    return $statement->fetchAll();
  }

}

?>