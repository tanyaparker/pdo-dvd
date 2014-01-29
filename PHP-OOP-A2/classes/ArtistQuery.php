<?php

require_once('db.php');

class ArtistQuery {
  protected $pdo;
  protected $sql;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
    $this->sql = "SELECT * FROM artists";
  }

  public function orderByName()
  {
    $this->sql .= ' ORDER BY artist_name';
  }

  public function getAll()
  {
    $statement = $this->pdo->prepare($this->sql);
    $statement->execute();
    return $statement->fetchAll();
  }

}

?>